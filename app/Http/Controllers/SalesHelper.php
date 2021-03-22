<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Order;


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

        $order = Order::findOrFail($order_id);
        $paramsArr = [];
        $paramsArr['response'] = self::RESPONSES;
        $paramsArr['dte'] = [];
        $idDoc = [
            'TipoDTE' => self::BOLETA_ELECTRONICA,
            'Folio' => $order->id,
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
                "NmbItem" => $detail->product->id,
                "QtyItem" => $detail->quantity,
                "PrcItem" => $detail->unit_ammount,
                "MontoItem" => $detail->total_ammount
            ]);
            $total += $detail->total_ammount;
        }


        $emisor = [
            'RUTEmisor' => "76795561-8",
            'RznSocEmisor' => "HAULMER SPA",
            "GiroEmisor" => "VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET; COMERCIO ELEC",
            "DirOrigen" => "ARTURO PRAT 527   CURICO",
            "CmnaOrigen" => "Curicó",
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


        $url = self::URL_DESARROLLO;
        $apiKey = self::API_KEY_DESARROLLO;
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
                "Idempotency-Key: " . rand(10, 99999999),
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
            return [
                'response' => $err,
                'request' => $paramsArr
            ];
        } else {
            return [
                'response' => $response,
                'request' => $paramsArr
            ];
        }
    }
}
