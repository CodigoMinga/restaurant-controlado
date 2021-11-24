<?php

namespace App\Http\Controllers;

use Auth;
use App\Client;
use App\Order;
use App\Orderdetail;
use App\Ordertype;
use App\Table;
use App\Tabletype;
use App\Producttype;
use App\Discount;
use App\Delivery;
use App\Product;
use App\Cashregister;
use App\Http\Controllers\SalesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\LowStockMail;
use App\Item;
use Illuminate\Http\Response;


class OrderController extends Controller
{
    public function tables()
    {
        $company = session('company');
        //busco ultima caja registrada de la compañia
        $cashregister = Cashregister::where('company_id',$company->id)->orderBy('id', 'desc')->first();

        if(!$cashregister){
            $cashregister = new Cashregister;
            $cashregister->closed = 'not null';
        }
        if($cashregister->closed==null){

            $tabletypes = Tabletype::with(['tables'=>function($query) use($company){
                $query->where('company_id',$company->id)->where('enabled',1);
            }])->get();

            return view('orders.tableselection', compact('tabletypes'));
        }else{
            return view('cashregister.notfound');
        }
    }

    public function list(){
        $company = session('company');
        $orders = Order::where('company_id',$company->id)->get();
        foreach ($orders as $key => $order) {
            $order->total=$order->Total;
            $order->ordertype;
            $order->user;
            $order->table;
        }
        return view('orders.list', compact('orders'));
    }

    public function tableorder($table_id){
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->where('closed','!=',1)->first();
        if (!isset($order)) {
            return view('orders.start', compact('table'));
        }else{
            return redirect('/orders/'.$order->id);
        }
    }

    public function start($table_id)
    {
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->where('closed','!=',1)->first();
        if (!isset($order)) {
            $order = new Order();
            $order->table_id = $table->id;
            $order->user_id = Auth::user()->id;
            $order->company_id = $table->company_id;
            $cashregister = Cashregister::where('company_id',$table->company_id)->whereNull('closed')->orderBy('id', 'desc')->first();
            $order->cashregister_id = $cashregister->id;
            //Añade el numero interno de la orden, si no hay ninguna la crea como primera
            $last_order = Order::latest('internal_id')->where('company_id','=',$table->company_id)->first();
            if(isset($last_order)){
                $order->internal_id = $last_order->internal_id + 1;
            }else{
                $order->internal_id = 1;
            }
            $order->save();
        }
        return redirect('/orders/'.$order->id)->with('success', 'Order Iniciada');;
    }

    public function paymentStore($order_id, Request $request)
    {
        $order  = Order::findOrFail($order_id);
        if($order->dte_token){
            $order->fill($request->all());
            $order->closed=1;
            $order->save();
            return $order;
        }else{
            return 'No se puede cerrar la venta, la boleta no ha sido emitida';
        }
    }

    public function extraStore($order_id, Request $request)
    {
        $order  = Order::findOrFail($order_id);
        if($order->CommandComplete){                
            $order->fill($request->all());
            $delivery = Delivery::where('company_id',$order->company_id)->where('ammount',$request->delivery)->first();
            if($delivery){
                $order->delivery_commission =  $delivery->delivery_commission;
            }

            $order->save();
            return $order;
        }else{
            return new Response([
                'response' => "Falta emitir Comanda o No tiene Productos",
                'request' => ""
            ], 400); 
        }
    }


    public function disable(Request $request)
    {
        $input = $request->all();
        $order = Order::findOrFail($input['order_id']);
        if($order->dte_token==null){
            $order->description = $input['description'];
            $order->enabled = 0;
            $order->closed=1;
            $order->save();
            return redirect('/orders/'.$order->id)->with('success','Orden Anulada con exito');
        }else{
            //$result = (new SalesHelper)->removeDte($order->id);
            $order->description = $input['description'];
            $order->enabled = 0;
            $order->closed=1;
            $order->save();
            return redirect('/orders/'.$order->id)->with('success','Orden Anulada con exito');
            return $result;
        }
    }

    
    public function ordertype($order_id,$ordertype_id)
    {
        $order  = Order::findOrFail($order_id);
        $order->ordertype_id = $ordertype_id;
        $order->save();
        return true;
    }

    public function details($order_id){
        $order = Order::findOrFail($order_id);
        if($order->table->tabletype_id==1){
            $ordertypes = Ordertype::whereIn('id',[1])->get();
        }else{
            $ordertypes = Ordertype::whereIn('id',[2,3])->get();
        }

        $discounts = Discount::all();
        $deliveries = Delivery::where('company_id',$order->company_id)->get();
        return view('orders.details', compact('order','ordertypes','discounts','deliveries'));
    }

    public function products($order_id)
    {
        $order = Order::findOrFail($order_id);
        if($order->dte_token==null){
            $producttypes = Producttype::where('company_id',$order->company_id)->get();
            return view('orders.products', compact('producttypes','order'));
        }else{
            return back()->with('error','No se puede agregar más productos, la boleta ya fue emitida');
        }
    }

    public function productAttach(Request $request)
    {
        $input = $request->all();

        $order      = Order::findOrFail($input['order_id']);
        $product    = Product::findOrFail($input['product_id']);

        if($order->dte_token==null){
            $orderdetail = new Orderdetail();
            $orderdetail->product_id    = $product->id;
            $orderdetail->order_id      = $order->id;
            $orderdetail->quantity      = $input['quantity'];
            $orderdetail->description   = $input['description'];
            $orderdetail->unit_ammount  = $product->price;
            $orderdetail->total_ammount = intval($input['quantity']) * intval($product->price);
            $orderdetail->save();
            $this->substock($orderdetail);
            $order->Total=$order->Total;
            return $order;
        }else{
            return "La boleta ya fue emitida, Agregar productos";
        }
    }


    public function productDetach(Request $request)
    {
        $input = $request->all();
        $orderdetail    = Orderdetail::findOrFail($input['orderdetail_id']);
        $order          = $orderdetail->order;
        if($order->dte_token==null){
            if($orderdetail->enabled){
                $orderdetail->enabled = 0;
                $orderdetail->save();
                $this->addstock($orderdetail);
                $order->Total=$order->Total;
            }
            return $order;
        }else{
            return "La boleta ya fue emitida, no se puede eliminar";
        }
    }

    public function changetable($order_id)
    {
        $company = session('company');
        $order = Order::findOrFail($order_id);
        if($order->dte_token==null){
            $tabletypes = Tabletype::with(['tables'=>function($query) use($company){
                $query->where('company_id',$company->id)->where('enabled',1);
            }])->get();
            return view('orders.changetable', compact('tabletypes','order'));
        }else{
            return back()->with('error','No se puede cambiar la mesa, la boleta ya fue emitida');
        }
    }

    public function changetableProcess($order_id,$table_id)
    {
        $order  = Order::findOrFail($order_id);
        $table  = Table::findOrFail($table_id);
        $order->table_id = $table->id;
        $order->save();
        return redirect('/orders/'.$order->id)->with('success', 'Mesa cambiada correctamente');
    }

    public function command($order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderdetails = $order->orderdetails;
        foreach ($orderdetails as $key => $orderdetail) {
            $orderdetail->product;
            if($orderdetail->command==0  && $orderdetail->enabled){
                $orderdetail->command=1;
                $orderdetail->save();
                $orderdetail->recent=1;
            }
        }
        return $orderdetails;
    }

    public function substock($orderdetail){
        $item_ids=[];
        $prescription= $orderdetail->product->prescriptions->last();
        if($prescription){
            $prescriptiondetails = $prescription->prescriptiondetails;
            $item_ids=[];
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                if($prescriptiondetail->item_id){
                    $item_ids[]=$this->subitem($prescriptiondetail->item ,($orderdetail->quantity * $prescriptiondetail->quantity));
                }
                if($prescriptiondetail->product_id){
                    $sub = $this->subproduct($prescriptiondetail->product,($orderdetail->quantity * $prescriptiondetail->quantity));
                    foreach ($sub as $keys => $item_id) {
                        $item_ids[]=$item_id;
                    }
                }
            }
            $items = Item::whereIn('id',$item_ids)->whereRaw('stock < warning')->get();
            if(COUNT($items)>0){
                //$this->lowStockMail($items);
            }        
        }
    }

    public function subitem($item,$quantity){
        $stock = $item->stock;
        $item->stock = $stock - ($quantity);
        $item->save();
        return $item->id;
    }

    
    public function subproduct($product,$cant){
        $item_ids=[];
        $prescription= $product->prescriptions->last();
        if($prescription){
            $prescriptiondetails = $prescription->prescriptiondetails;
            $item_ids=[];
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                if($prescriptiondetail->item_id){
                    $item_ids[]=$this->subitem($prescriptiondetail->item,($cant * $prescriptiondetail->quantity));
                }
                if($prescriptiondetail->product_id){
                    $sub = $this->subproduct($prescriptiondetail->product,($cant * $prescriptiondetail->quantity));
                    foreach ($sub as $keys => $item_id) {
                        $item_ids[]=$item_id;
                    }
                }
            }
        }
        return $item_ids;
    }

    public function addstock($orderdetail){
        $prescription= $orderdetail->product->prescriptions->last();
        if($prescription){
            $prescriptiondetails = $prescription->prescriptiondetails;
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                if($prescriptiondetail->item_id){
                    $this->additem($prescriptiondetail->item ,($orderdetail->quantity * $prescriptiondetail->quantity));
                }
                if($prescriptiondetail->product_id){
                    $this->addproduct($prescriptiondetail->product,($orderdetail->quantity * $prescriptiondetail->quantity));
                }
            }
        }
    }

    public function additem($item,$quantity){
        $stock = $item->stock;
        $item->stock = $stock + ($quantity);
        $item->save();
        return $item->id;
    }

    public function addproduct($product,$cant){
        $prescription= $product->prescriptions->last();
        if($prescription){
            $prescriptiondetails = $prescription->prescriptiondetails;
            $item_ids=[];
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                if($prescriptiondetail->item_id){
                    $this->additem($prescriptiondetail->item,($cant * $prescriptiondetail->quantity));
                }
                if($prescriptiondetail->product_id){
                    $this->addproduct($prescriptiondetail->product,($cant * $prescriptiondetail->quantity));
                }
            }
        }
    }


    public function history($order_id)
    {
        $order = Order::findOrFail($order_id);
        if($order->client_id){
            $client = Client::findOrFail($order->client_id);
            foreach ($client->orders as $key => $order_item) {
                foreach ($order_item->orderdetails as $key => $orderdetail) {
                    $orderdetail->product;
                }
            }
            return $client->orders;
        }else{
            return 'necesita seleccionar cliente';
        }
    }



    public function repeat($order_id,$order_id_old)
    {
        $order      = Order::findOrFail($order_id);
        
        if($order->dte_token==null){
            $order_old  = Order::findOrFail($order_id_old);
            foreach ($order_old->orderdetails as $key => $orderdetail_old) {
                if($orderdetail_old->enabled){
                    $product    = Product::findOrFail($orderdetail_old->product_id);
                    $orderdetail = new Orderdetail();
                    $orderdetail->product_id    = $product->id;
                    $orderdetail->order_id      = $order->id;
                    $orderdetail->quantity      = $orderdetail_old->quantity;
                    $orderdetail->description   = $orderdetail_old->description;
                    $orderdetail->unit_ammount  = $product->price;
                    $orderdetail->total_ammount = intval($orderdetail_old->quantity) * intval($product->price);
                    $orderdetail->save();
                    $this->substock($orderdetail);
                }
            }
            return redirect('/orders/'.$order->id)->with('success', 'Orden Repetida');
        }else{
            return redirect('/orders/'.$order->id)->with('error', 'La boleta ya fue emitida, no se puede repetir la orden');
        }
    }


    public function lowStockMail($items){
        $subject = "ALERTA - bajo Stock, fecha: ".date("m-d-Y H:i");


        //busca solo los usuarios con permisos de SUPERADMIN y ADMIN asociados a la compañia del item a notificar
        /*
        $receivers = DB::table('company_user')
            ->leftJoin('role_user','company_user.user_id','=','role_user.user_id')
            ->leftJoin('users','company_user.user_id','users.id')
            ->select('company_user.*','role.*')
            ->where('company_id','=',$item->company_id)
            ->whereIn('role_user.id',[1,2])
        ->select('*')
        ->get()
        ->pluck('email');
*/
        //valida que la lista de correos sea valida

        $filterd_emails = array();
        /*
        foreach($receivers as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            } else {
                array_push($filterd_emails,$email);
            }
        }*/

        //si el listado de correos no tiene elementos se los envia a valdo
        if(count($filterd_emails) == 0){
            array_push($filterd_emails,'roberto30589@gmail.com');
            $subject = $subject." NO EXISTEN DESTINATARIOS";
        }

        $status = Mail::to($filterd_emails)->send(new LowStockMail($subject,$items));
        return "CORREO ENVIADO ".$status;
    }
}
