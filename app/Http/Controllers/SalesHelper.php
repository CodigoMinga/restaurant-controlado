<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Order;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class SalesHelper extends Controller
{
    const FACTURA_ELECTRONICA = 33;
    const BOLETA_ELECTRONICA = 39;
    const BOLETA_VENTA_SERVICIO = 3;
    const API_KEY_DESARROLLO = "928e15a2d14d4a6292345f04960f4bd3";
    const BASE_URL = "https://dev-api.haulmer.com/v2";
    const RESPONSES = ["XML", "PDF", "TIMBRE", "LOGO", "FOLIO", "RESOLUCION","80MM"];
    const ACTIVIDAD_RESTAURANTE = 561000;
    const URL_DESARROLLO = "https://dev-api.haulmer.com/";
    const URL_PRODUCCION = "https://api.haulmer.com/";

    /**
     * @param order_id $order_id
     */
    public function generateInvoice($order_id){


        //busca si existe la orden en la DB
        $order = Order::find($order_id);

        if(isset($order)){
            //valida si la boleta ya fue emitida, existe token no deja emitirla denuevo
            if(isset($order->dte_token)){
                return new Response([
                    'response' => "Esta boleta ya fue emitida, existe token, puede re-imprimirla",
                    'request' => ""
                ], 400);
            }

            $paramsArr = [];
            $paramsArr['response'] = self::RESPONSES;
            $paramsArr['dte'] = [];
            $idDoc = [
                'TipoDTE' => self::BOLETA_ELECTRONICA,
                'Folio' => 0,
                'FchEmis' => date('Y-m-d'),

                'IndServicio' => self::BOLETA_VENTA_SERVICIO
            ];

            $paramsArr['dte']['Encabezado'] = [];
            $paramsArr['dte']['Encabezado']['IdDoc'] = $idDoc;

            $empresa = $order->company->id;

            $orderdetails = $order->orderdetails;


            $detalle = [];
            $total = 0;
            $ct = 0 ;
            foreach($orderdetails as $detail) {
                $ct = $ct + 1;
                array_push($detalle, [
                    "NroLinDet" => $ct,
                    "NmbItem" => $detail->product->name,
                    "QtyItem" => $detail->quantity,
                    "PrcItem" => $detail->unit_ammount,
                    "MontoItem" => $detail->total_ammount
                ]);
                $total += $detail->total_ammount;
            }


            $emisor = [
                'RUTEmisor' => $order->company->rut,
                'RznSocEmisor' => $order->company->razon_social,
                "GiroEmisor" =>  $order->company->giro,
                "DirOrigen" =>  $order->company->direccion,
                "CmnaOrigen" =>  $order->company->comuna
            ];


            $paramsArr['dte']['Encabezado']['Emisor'] = $emisor;
            $paramsArr['dte']['Encabezado']['Receptor'] = ["RUTRecep" => "66666666-6"];
            $totales = [
                "MntTotal" => $total ,
                "VlrPagar" => $total ,
                "IVA" => round($total - ($total  / 1.19)),
                "MntNeto" => round(($total  / 1.19))
            ];
            $paramsArr['dte']['Encabezado']['Totales'] = $totales;
            $paramsArr['dte']['Detalle'] = $detalle;

            $curl = curl_init();

            if (app()->environment('production')){
                $url = self::URL_PRODUCCION;
                $apiKey = $order->company->api_key_openfactura;
            }else{
                $url = self::URL_DESARROLLO;
                $apiKey = self::API_KEY_DESARROLLO;
            }

            $order->empotency_key = "MingaRulz-" . Str::random(10). '-' . $order->id;
            $order->save();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url . "v2/dte/document"  ,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($paramsArr),
                CURLOPT_HTTPHEADER => [
                    "apikey: " . $apiKey,
                    "Idempotency-Key: " . $order->empotency_key
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);

            $response = json_decode($response);
            $err = json_decode($err);


            curl_close($curl);

            $paramsArr['adicionales_empresa'] = "prueba de texto adicional";
            $paramsArr['adicionales_datos_empresa'] = "prueba de texto adicional2";

            //return json_encode($paramsArr,JSON_UNESCAPED_SLASHES);
            if ($err) {
                return new Response([
                    'response' => $err,
                    'request' => $paramsArr
                ], 400);
            } else {

                $order->dte_token= $response->TOKEN;
                $order->dte_folio= $response->FOLIO;
                $order->fecha_resolucion_sii= $response->RESOLUCION->fecha;
                $order->save();
                return new Response([
                    'response' => $response,
                    'request' => $paramsArr
                ], 201);
            }

        }else{
            return new Response([
                'response' => "Error la orden enviada no existe en la DB",
                'request' => ""
            ], 400);

        }
    }


    public function printAgainInvoice($order_id){
        $order = Order::find($order_id);


        if(isset($order)){
            if(isset($order->dte_token)){
                if (app()->environment('production')){
                    $url = self::URL_PRODUCCION;
                    $apiKey = $order->company->api_key_openfactura;
                }else{
                    $url = self::URL_DESARROLLO;
                    $apiKey = self::API_KEY_DESARROLLO;
                }
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => $url . "v2/dte/document/".$order->dte_token."/pdf"  ,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => false,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "apikey: " . $apiKey
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                $response = json_decode($response);
                $err = json_decode($err);


                curl_close($curl);

                if ($err) {
                    return new Response([
                        'response' => $err,
                    ], 400);
                } else {
                    return new Response([
                        'response' => $response,
                    ], 201);
                }

            }else{

                return new Response([
                    'response' => "Error la orden no tiene ninguna BOLETA emitida",
                    'request' => ""
                ], 400);
            }

        }else{
            return new Response([
                'response' => "Error la orden enviada no existe en la DB",
                'request' => ""
            ], 400);
        }


    }

    public function removeDte($order_id){
        $order = Order::find($order_id);


        if(isset($order)){
            if(isset($order->dte_token)){
                if (app()->environment('production')){
                    $url = self::URL_PRODUCCION;
                    $apiKey = $order->company->api_key_openfactura;
                }else{
                    $url = self::URL_DESARROLLO;
                    $apiKey = self::API_KEY_DESARROLLO;
                }
                $curl = curl_init();

                $paramsArr['Dte'] = 52;
                $paramsArr['Folio'] = $order->dte_folio;

                $paramsArr['Fecha'] = $order->fecha_resolucion_sii->format('Y-m-d');
                //$paramsArr['Fecha'] = $order->created_at->format('Y-m-d');

                //return json_encode($paramsArr);
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url . "v2/dte/anularDTE52/"  ,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => false,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($paramsArr),
                    CURLOPT_HTTPHEADER => [
                        "apikey: " . $apiKey,
                        "Content-Type: application/json"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                $response = json_decode($response);
                $err = json_decode($err);


                curl_close($curl);

                if ($err) {
                    return new Response([
                        'response' => $err,
                    ], 400);
                } else {
                    return new Response([
                        'response' => $response,
                    ], 201);
                }

            }else{
                return new Response([
                    'response' => "La orden no tiene una BOLETA asociada",
                    'request' => ""
                ], 400);
            }

        }else{
            return new Response([
                'response' => "Error la orden enviada no existe en la DB",
                'request' => ""
            ], 400);
        }

    }
}
