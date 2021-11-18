@extends('templates.maincontainer')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css" />
<style>
    #imprimir {
        display: block;
        width: 80mm;
        background: white;
        position: fixed;
        top: 0;
        right: -100%;
        color: black;
    }
    
    #fakeDte{
        display: block;
        width: 80mm;
        background: white;
        position: fixed;
        top: 0;
        right: -100%;
        color: black;
    }

    input[type="checkbox"] {
        display: block;
        height: 23px;
        width: 23px;
    }

    input[type="number"] {
        display: block;
        width: 120px;
    }

    #modal-table .row {
        margin: 0px;
    }

    #modal-table .row:nth-child(2) .col-sm-12 {
        margin: 0px;
        padding: 0px;
    }

    .dataTables_filter,
    .dataTables_info {
        display: none;
    }

    .table-dark.table-hover tbody tr:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, .85);
    }

    .bg-select {
        background: #0d47a1;
    }

    .bg-select:hover {
        background-color: #0d47a1 !important;
    }

    .inputtable {
        height: 33px;
    }

    .number {
        width: 120px;
    }
    .text-rojo td{
        color:crimson!important;
    }
    select:disabled {
        background-color:white;
        color:black;
        opacity: 1;
        border-color: rgb(133, 133, 133);
    }

    input:disabled{
        background-color:white;
        color:black;
        opacity: 1;
        border-color: rgb(133, 133, 133);
    }

    .btn-purple{
        color: #fff;
        background-color: #6f42c1;
        border-color: #6f42c1;
    }

    .btn-purple:hover {
        color: #fff;
        background-color: #5f39a7;
        border-color: #5f39a7;
    }

    .botones .btn{
        width: 300px;
        margin-bottom: 1rem;
    }
</style>
@section('content')
    <style>
        .btn-purple{
            color: #fff;
            background-color: #6a1b9a;
            border-color: #6a1b9a;
        }

        .btn-purple:hover {
            color: #fff;
            background-color: #4a148c;
            border-color: #4a148c;
        }

        .btn-orange{
            color: #fff;
            background-color: #ef6c00;
            border-color: #ef6c00;
        }

        .btn-orange:hover {
            color: #fff;
            background-color: #e65100;
            border-color: #e65100;
        }

        .btn-indigo{
            color: #fff;
            background-color: #283593;
            border-color: #283593;
        }

        .btn-indigo:hover {
            color: #fff;
            background-color: #1a237e;
            border-color: #1a237e;
        }
    </style>
    <div class="container p-3">
        <h1>Orden: {{ $order->internal_id }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-sm table-dark">
                    <tr>
                        <th>
                            Apertura
                        </th>
                        <td>
                            {{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Garzón
                        </th>
                        <td>
                            {{ $order->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Selector
                        </th>
                        <td>
                            {{ $order->table->tabletype->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Mesa
                        </th>
                        <td>
                            {{ $order->table->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tipo
                        </th>
                        <td style="padding:0px">
                            <select name="ordertype_id" class="inputtable w-100" id="ordertype" {{$order->dte_token!=null || $order->closed==1  ? "disabled" :""}}>
                                @foreach ($ordertypes as $ordertype)
                                    <option value="{{ $ordertype->id }}" {{$ordertype->id==$order->ordertype_id ? "selected":""}}>{{ $ordertype->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col">
                @if($order->table->tabletype_id!=1)
                <table class="table table-striped table-sm table-dark" id="clientBox">
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td id="client_name">
                            {{ $order->client ? $order->client->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Teléfono
                        </th>
                        <td id="client_phone">
                            {{ $order->client ? $order->client->phone : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Comuna
                        </th>
                        <td id="client_commune">
                            {{ $order->client ? $order->client->commune->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dirección
                        </th>
                        <td id="client_address">
                            {{ $order->client ? $order->client->address : '' }}
                        </td>
                    </tr>
                    @if($order->dte_token==null && $order->closed!=1)
                    <tr>
                        <td colspan="2" class="p-0 m-0">
                            <div class="btn-group w-100" role="group">
                                <a class="btn btn-primary btn-sm" style="border:none" id="clientButton">
                                    <span class="material-icons">person</span>
                                    Clientes
                                </a>
                                <a class="btn btn-info btn-sm"  style="border:none" id="historyButton">
                                    <span class="material-icons">folder</span>
                                    Pedidos
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                </table>
                @endif
            </div>
        </div>
        <table class="table table-striped table-sm table-dark">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th width=1>
                        Comanda
                    </th>
                    <th width=1>
                        Cant.
                    </th>
                    <th width=1>
                        P.Unit.
                    </th>
                    <th width=1 style="text-align: right">
                        P.Total.
                    </th>
                    @if($order->dte_token==null && $order->closed!=1)
                    <th width=1 style="text-align: right">
                        
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $orderdetail)
                    @if($order->closed==0 && $orderdetail->enabled==1 || $order->closed==1)
                    <tr {{$orderdetail->enabled==0 ? "class=text-danger" : ""}} id="orderdetail_{{$orderdetail->id}}">
                        <td>
                            {{ $orderdetail->product->name }}<br>
                            <small>{{ $orderdetail->enabled==1 ? $orderdetail->description : "(eliminado)"}}</small>
                        </td>
                        <td align="center" id="command_{{$orderdetail->id}}">
                            @if($orderdetail->command)
                                <i class="text-success material-icons">done</i>
                            @else
                                <i class="text-muted material-icons">more_horiz</i>
                            @endif
                        </td>
                        <td align="right">
                            {{ number_format($orderdetail->quantity, 0, '', '.') }}
                        </td>
                        <td align="right">
                            {{ number_format($orderdetail->unit_ammount, 0, '', '.') }}
                        </td>
                        <td align="right">
                            {{ number_format($orderdetail->total_ammount, 0, '', '.') }}
                        </td>
                        @if($order->dte_token==null && $order->closed!=1)
                        <td align="right" width="20">
                            <a class="btn btn-sm btn-danger material-icons p-0"  onclick="eliminarModal('{{$orderdetail}}')">close</a>
                        </td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="d-flex flex-wrap justify-content-between">
            <div>
                <form id="paymentForm">
                    {{ csrf_field() }}
                    <table class="table table-striped table-sm table-dark">
                        <tr>
                            <th colspan="2" style="text-align: center">
                                Forma de pagos
                            </th>
                        </tr>
                        <tr>
                            <th width=1>
                                Transferencia
                            </th>
                            <td class="p-0 m-0">
                                <input type="number" size="6" min="0" id="transfer" name="transfer" class="dinero inputtable" value="{{$order->transfer}}" {{$order->closed==1 ? "readonly " :""}}>
                            </td>
                        </tr>
                        <tr>
                            <th width=1>
                                T. de Débito
                            </th>
                            <td class="p-0 m-0">
                                <input type="number" size="6" min="0" id="debit_card" name="debit_card" class="dinero inputtable" value="{{$order->debit_card}}" {{$order->closed==1 ? "readonly " :""}}>
                            </td>
                        </tr>
                        <tr>
                            <th width=1>
                                T. de Crédito
                            </th>
                            <td class="p-0 m-0">
                                <input type="number" size="6" min="0" id="credit_card" name="credit_card" class="dinero inputtable" value="{{$order->credit_card}}" {{$order->closed==1 ? "readonly " :""}}>
                            </td>
                        </tr>
                        <tr>
                            <th width=1>
                                Efectivo
                            </th>
                            <td class="p-0 m-0">
                                <input type="number" size="6" min="0" id="efective" name="efective" class="dinero inputtable" value="{{$order->efective}}" {{$order->closed==1 ? "readonly " :""}}>
                            </td>
                        </tr>
                        <tr>
                            <th width=1>
                                Vuelto
                            </th>
                            <td id="pay_back">

                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap">
                                Pago restante
                            </th>
                            <td id="pay_left">

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div>
                <form id="extraForm">
                    {{ csrf_field() }}
                    <input name="client_id" type="hidden" value="{{$order->client_id}}">
                    <table class="table table-striped table-sm table-dark">
                        <tr>
                            <th colspan="4" style="text-align: center">
                                Adicionales
                            </th>
                        </tr>

                        <tr>
                            <th colspan="3">
                                Consumo total
                            </th>
                            <td id="order_total">
                                ${{ number_format($order->Total, 0, '', '.') }}
                            </td>
                        </tr>

                        <tr>
                            <th width=1>
                                Descuento
                            </th>
                            <td class="p-0 m-0" width=1>
                                <select name="discount" id='discount' class="inputtable number dinero"  {{$order->dte_token!=null || $order->closed==1 ? "disabled" :""}}>
                                    <option value="0">0</option>
                                    @foreach ($discounts as $discount)
                                        <option value="{{ $discount->ammount }}" {{$order->discount==$discount->ammount ? "selected": ""}}>{{ number_format($discount->ammount, 0, '', '.') }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="p-0 m-0">
                                <input type="text" name="discount_description" class="inputtable number" placeholder="Razón del descuento" value="{{$order->discount_description}}"  {{$order->dte_token!=null || $order->closed==1 ? "readonly " :""}}>
                            </td>
                            <td id='discount_total'>
                                0
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Propina
                            </th>
                            <td class="p-0 m-0" width=1>
                                <select name="tip_type" id='tip_type' class="inputtable number dinero" {{$order->dte_token!=null || $order->closed==1 ? "disabled" :""}}>
                                    <option value="0"   {{$order->tip_type==0 ? "selected": ""}}>0</option>
                                    <option value="10"  {{$order->tip_type==10 ? "selected": ""}}>10%</option>
                                    <option value="-1"  {{$order->tip_type==-1 ? "selected": ""}}>Cantidad</option>
                                </select>
                            </td>
                            <td class="p-0 m-0" width=1>
                                <input type="number" size="6" id="tip" name="tip" class="inputtable dinero" value={{$order->tip}} readonly>
                            </td>
                            <td id='tip_total'>
                                0
                            </td>
                        </tr>

                        <tr id="deliveryTr">
                            <th width=1 colspan="2">
                                Despacho
                            </th>
                            <td class="p-0 m-0" width=1>
                                <select name="delivery" id="delivery" class="inputtable number dinero"  {{$order->dte_token!=null || $order->closed==1 ? "disabled" :""}}>
                                    <option value="0" {{0 == $order->delivery ? "selected" : ""}}>0</option>
                                    @foreach ($deliveries as $delivery)
                                        <option value="{{$delivery->ammount}}" {{$order->delivery==$delivery->ammount ? "selected": ""}}>
                                            {{ number_format($delivery->ammount, 0, '', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td id="delivery_total">
                                0
                            </td>
                        </tr>

                        <tr>
                            <th colspan=3 style="white-space: nowrap">
                                Total a pagar
                            </th>
                            <td id="pay_total">
                                0
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
        <hr>
        @if($order->enabled==1)
            @if($order->closed==0)
            <div class="d-flex flex-wrap justify-content-between botones">
                <a href="{{ url('/orders/' . $order->id .'/products') }}" class="btn btn-success btn-lg">
                    <span class="material-icons">add_shopping_cart</span>
                    Agregar
                </a>
                <a href="{{ url('/orders/'. $order->id.'/changetable') }}" class="btn btn-orange btn-lg">
                    <span class="material-icons">deck</span>
                    Cambiar Mesa
                </a>
            </div>
            @endif
            <div class="d-flex flex-wrap justify-content-between botones">
                @if($order->closed==0)
                    <button onclick="comanda(0)" class="btn btn-primary btn-lg">
                        <span class="material-icons">receipt</span>
                        Comanda Parcial
                    </button>
                @endif
                <button onclick="comanda(1)" class="btn btn-info btn-lg">
                    <span class="material-icons">receipt</span>
                    Comanda Completa
                </button>
                <button onclick="extraStore()" class="btn btn-purple btn-lg">
                    <span class="material-icons">receipt_long</span>
                    Boleta
                </button>
            </div>
            @if($order->closed==0)
            <button type="button" class="btn btn-lg btn-block btn-indigo" onclick="paymentStore()">
                <span class="material-icons">price_check</span>
                Cerrar Venta
            </button>
            @endif
            @if($order->enabled==1)
            <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#AnularModal">
                <span class="material-icons">close</span>
                Anular Venta
            </button>
            @endif
        @else
            <h3 class="text-danger">Razón de anulación:</h3>
            <p>{{$order->description}}</p>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="clientList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0" id="modal-table">
                    <div class="p-2">
                        <form id="client-form" class="was-validated">
                            {{ csrf_field() }}
                            <input type="hidden" name="id">
                            <input type="hidden" name="company_id" value="{{ $order->company_id }}">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6 mb-2">
                                    <label class="mb-1">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="client-name"
                                        required>
                                </div>
                                <div class="form-group col-12 col-sm-6 mb-2">
                                    <label class="mb-1">Teléfono</label>
                                    <input type="text" class="form-control form-control-sm" name="phone"
                                        id="client-phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-sm-6 mb-2">
                                    <label class="mb-1">Región</label>
                                    <select class="custom-select custom-select-sm" name="region_id" id="region_select">
                                    </select>
                                </div>
                                <div class="form-group col-12 col-sm-6 mb-2">
                                    <label class="mb-1">Comuna</label>
                                    <select class="custom-select custom-select-sm" name="commune_id"
                                        id="commune_select">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-1">Dirección</label>
                                <input type="text" class="form-control form-control-sm" name="address" required>
                            </div>
                        </form>
                        <div>
                            <button type="button" class="btn btn-success" onclick="clientStore()">
                                <span class="material-icons">send</span>
                                Guardar
                            </button>
                            <button type="button" class="btn btn-primary" onclick="clientNew()">
                                <span class="material-icons">person_add</span>
                                Nuevo
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <span class="material-icons">close</span>
                                Volver
                            </button>
                        </div>
                    </div>
                    <div style="display:block;width:100%;min-height:40vh" id='container'>
                        <table id="tabla" class="table objtable table-dark table-sm mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Comuna</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="eliminarModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="detachForm">
                    {{ csrf_field() }}
                    <div class="modal-body" align="center">
                        ¿Desea borrar <br>"<i class="text-danger font-weight-bold" id="product_name"></i>"<br>de la orden?
                    </div>
                    <input type="hidden" value="0" name="orderdetail_id">
                </form>
                <div class="modal-footer p-0 justify-content-between">
                    <button type="button" class="btn btn-danger" onclick="eliminarProducto()">
                        <span class="material-icons">send</span>
                        Eliminar
                    </button>                                
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="material-icons">close</span>
                        Cerrar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="historyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pedidos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">                        
                    <div style="display:block;width:100%;min-height:50vh;max-height:90vh;overflow-y:overlay" id='container'>
                        <table class="table objtable table-dark table-sm mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Orden
                                    </th>
                                    <th>
                                        Detalle
                                    </th>
                                    <th>
                                        Repetir
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="historyList">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AnularModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content  bg-dark">
                <form id="anularForm" method="POST" action="{{url('/orders/disable')}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Anular Venta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ csrf_field() }}
                    <div class="modal-body" align="center">
                        ¿Desea Anular de la Orden {{$order->internal_id}}?
                        <input type="hidden" value="{{$order->id}}" name="order_id">
                        <div class="form-group">
                            <label>Razón de la anulación</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer p-0 justify-content-between">
                        <button class="btn btn-danger" type="submit">
                            <span class="material-icons">send</span>
                            Anular
                        </button>                     
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">
                            <span class="material-icons">close</span>
                            Cerrar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="imprimir">
        <h3 style="margin-bottom:0px">ORDEN: {{ $order->internal_id }}</h3>
        <h3 style="margin-top:0px">{{ $order->table->name }}</h3>
        <table style="margin-bottom:10mm;font-size:14px;width:100%">
            <thead>
                <tr>
                    <th align="left">
                        Producto
                    </th>
                    <th width="1">
                        Cant.
                    </th>
                </tr>
            </thead>
            <tbody id="comandList">
            </tbody>
        </table>
        <hr>
    </div>

    <div id="fakeDte">
        <h3 style="margin-bottom:0px;border-bottom:2px solid" align="center">*** CUENTA ***</h3>
        <table style="margin-bottom:2mm;font-size:14px;width:100%;border-bottom:2px dashed">
            <tbody>
                <tr><th align="left">MESA</th><td>{{$order->table->name}}</td></tr>
                <tr><th align="left">GÁRZON</th><td>{{ $order->user->name }}</td></tr>
                <tr><th align="left">NUMERO</th><td>{{ $order->internal_id }}</td></tr>
                <tr><th align="left">FECHA</th><td> {{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</td></tr>
            </tbody>
        </table>
        <table style="margin-bottom:2mm;font-size:13px;width:100%;border-bottom:2px dashed">
            <thead>
                <tr>
                    <th align="left">
                        PRODUCTO
                    </th>
                    <th width="1">
                        PRECIO
                    </th>
                </tr>
            </thead>
            <tbody id="DteProducts">
            </tbody>
        </table>
        <table style="margin-bottom:8mm;font-size:14px;width:100%">
            <tbody id="DteTotals">
            </tbody>
        </table>
        <hr>
    </div>

    <script src="{{ url('/') }}/js/pdf.js"></script>
    <script type="text/javascript" src="https:////cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

    <!--SCRIPT DE COMANDA Y BOLETA-->
    <script>
        var imprimir = document.getElementById('imprimir');

        var fakeDte = document.getElementById('fakeDte');
        var DteProducts = document.getElementById('DteProducts');
        var DteTotals = document.getElementById('DteTotals');

        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

        function PrintComanda() {
            var mywindow = window.open('', 'PRINT', 'height=1,width=1');

            mywindow.document.write('<html><head></head><title>Comanda</title>');
            mywindow.document.write(
                '<style>*{font-family:Arial, sans-serif;} body{max-width:80mm}</style><body>'
            );
            mywindow.document.write(imprimir.innerHTML);
            mywindow.document.write('</body></html>');
            if(isAndroid) {
                mywindow.onfocus = function(){mywindow.close();};
            }else{
                mywindow.onafterprint  = function(){mywindow.close();};
            }
            mywindow.document.close(); // necessary for IE >= 10

            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.print();
            return true;
        }

        function PrintFakeDte() {
            $.get("{{ url('/') }}/ajax/fakeDte/{{ $order->id }}", function(data) {
                var respuesta = data.response;

                DteProducts.innerHTML="";

                respuesta.Detalle.forEach(el => {
                    var newtr = document.createElement('tr');

                    var newtd = document.createElement('td');      
                    var newbr = document.createElement('br');
                    newtd.innerText = el.producto +"\n" +el.cantidad+" X $"+miles(parseInt(el.unitario));   
                    newtr.appendChild(newtd);

                    var newtd2 = document.createElement('td');
                    newtd2.innerText = "$"+miles(parseInt(el.total));                   
                    newtr.appendChild(newtd2);
                    DteProducts.appendChild(newtr);
                });

                DteTotals.innerHTML="";

                respuesta.Totales.forEach(el => {
                    var newtr = document.createElement('tr');
                    var newtd = document.createElement('th'); 
                    newtd.align="left";
                    newtd.innerText = el.name;   
                    newtr.appendChild(newtd);

                    var newtd2 = document.createElement('td');
                    newtd2.width="1px"
                    if( el.name  === "TOTAL A PAGAR"){
                        newtd2.style.fontWeight ="bold"
                        newtd2.style.fontSize ="16px"
                    }
                    newtd2.innerText = "$"+miles(el.value);                   
                    newtr.appendChild(newtd2);
                    DteTotals.appendChild(newtr);
                });

                var mywindow = window.open('', 'PRINT', 'height=1,width=1');
                mywindow.document.write('<html><head></head><title>Boleta</title>');
                mywindow.document.write(
                    '<style>*{font-family:Arial, sans-serif;} body{max-width:80mm}</style><body>'
                );
                mywindow.document.write(fakeDte.innerHTML);
                mywindow.document.write('</body></html>');
                if(isAndroid) {
                    mywindow.onfocus = function(){mywindow.close();};
                }else{
                    mywindow.onafterprint  = function(){mywindow.close();};
                }
                mywindow.document.close(); // necessary for IE >= 10

                mywindow.focus(); // necessary for IE >= 10*/
                mywindow.print();
                return true;
            }).fail(function(xhr, status, error) {
                alert(xhr.responseJSON.response);
            });
        }
        
        function PrintBoleta(){
            $.get("{{ url('/') }}/ajax/generateInvoice/{{ $order->id }}", function(data) {
                var pdfData = atob(data.response.PDF==null ? data.response.pdf : data.response.PDF);
                var pdfjsLib = window['pdfjs-dist/build/pdf'];
                pdfjsLib.GlobalWorkerOptions.workerSrc = "{{ url('/') }}/js/pdf.worker.js";

                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function(pdf) {
                    console.log('PDF loaded');

                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        console.log('Page loaded');
                        
                        var scale = 3;
                        var viewport = page.getViewport({scale: scale});

                        // Prepare canvas using PDF page dimensions
                        //var canvas = document.getElementById('the-canvas');
                        var canvas = document.createElement("canvas");
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);

                        renderTask.promise.then(function () {
                            console.log('Page rendered');
                            var mywindow2 = window.open('', 'PRINT', 'height=1,width=1');
                            mywindow2.document.write('<html><head><title>Boleta</title>');
                            mywindow2.document.write(
                                '<style>@page{margin-left: 0px;margin-right: 0px;margin-top: 0px;margin-bottom: 0px;} canvas{width:100%}</style>'
                                );
                            mywindow2.document.write('</head><body></body></html>');
                            mywindow2.document.body.appendChild(canvas);
                            mywindow2.document.close();
                            if(isAndroid) {
                                mywindow2.onfocus = function(){mywindow2.close();};
                            }else{
                                mywindow2.onafterprint  = function(){mywindow2.close();};
                            }
                            mywindow2.focus();
                            mywindow2.print();
                        });
                    });
                }, function (reason) {
                    // PDF loading error
                    alert(reason);
                });
                
            }).fail(function(xhr, status, error) {
                alert(xhr.responseJSON.response);
            });
        }

        function comanda(tipo) {
            $.ajax({
                url: "{{ url('/orders/'.$order->id.'/command') }}",
                type: "GET",
                processData: false, // tell jQuery not to process the data
                contentType: false // tell jQuery not to set contentType
            }).done(function(data) {
                if (typeof(data) == 'object') {
                    var toprint = 0;
                    $('#comandList').html('');
                    data.forEach(element => {
                        if( (tipo==1  || element.recent==1) && element.enabled==1){
                            $('#command_'+element.id).html('<i class="text-success material-icons">done</i>');
                            $('#comandList').append("<tr><td>"+element.product.name+"</td><td>"+element.quantity+"</td></tr>");
                            toprint++;
                        }
                    });
                    if(toprint>0){
                        PrintComanda();
                    }else{
                        if(tipo==1){
                            alert("Sin Productos en la comanda");
                        }else{                      
                            alert("Todos los productos ya fueron impresos");
                        }
                    }
                } else {
                    alert(data);
                }
            }).fail(function() {
                alert("error al recibir respuesta del servidor");
            });
        }

        var __PDF_DOC,
            __TOTAL_PAGES,
            __PAGE_RENDERING_IN_PROGRESS = 0;
        page_index = 0;

    </script>

    <!--SCRIPT DE CLIENTES-->
    <script>
        var clients = [];
        var regions = [];
        var communes = [];

        var commune_select = document.getElementById('commune_select');
        var region_select = document.getElementById('region_select');
        var clientForm = document.getElementById('client-form');


        var client_name = document.getElementById('client_name');
        var client_phone = document.getElementById('client_phone');
        var client_commune = document.getElementById('client_commune');
        var client_address = document.getElementById('client_address');

        var rowselect = document.getElementsByClassName("bg-select");

        clientForm.onsubmit = function(e) {
            e.preventDefault();
            return false;
        }

        var clienttable;
        var historytable;

        function rowStore(data) {
            var fila = clienttable.row("#" + data.id);
            if (fila.id()) {
                fila.data(data).draw(false);
            } else {
                clienttable.row.add(data).draw(false);
            }
            client_name.innerHTML = data.name;
            client_phone.innerHTML = data.phone;
            client_commune.innerHTML = data.commune.name;
            client_address.innerHTML = data.address;

            setSelectRow(clienttable.row("#" + data.id).node());

            $('#clientList').modal('hide');
        }

        function clientNew() {
            if (rowselect[0]) {
                rowselect[0].classList.remove('bg-select');
            }
            clientForm['region_id'].value = region_company;
            comunaLoad();
            clientForm['commune_id'].value = commune_company;
            clientForm['name'].value = '';
            clientForm['phone'].value = '';
            clientForm['address'].value = '';
            clientForm['id'].value = '';
        }
        var loadclient = true;

        function clientStore() {
            if (
                clientForm['name'].value == '' ||
                clientForm['phone'].value == '' ||
                (clientForm['address'].value == '' & clientForm['address'].required==true)
            ) {
                alert("Falta Agregar Información");
            } else if (loadclient) {
                loadclient = false;
                var formData = new FormData(clientForm);
                $.ajax({
                    url: "{{ url('/clients/store') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false // tell jQuery not to set contentType
                }).done(function(data) {
                    if (typeof(data) == 'object') {
                        extraForm['client_id'].value=data.id;
                        rowStore(data);
                    } else {
                        alert(data);
                    }
                }).fail(function() {
                    alert("error al recibir respuesta del servidor");
                }).always(function() {
                    loadclient = true;
                });
            }
        }

        function regionLoad() {
            regions.forEach(el => {
                var newoption = document.createElement('option');
                newoption.value = el.id;
                newoption.text = el.name;
                region_select.appendChild(newoption);
            });
        }

        region_select.onchange = comunaLoad;

        function comunaLoad() {
            var value = region_select.value;
            commune_select.innerHTML = '';
            communes.forEach(el => {
                if (el.region_id == value) {
                    var newoption = document.createElement('option');
                    newoption.value = el.id;
                    newoption.text = el.name;
                    commune_select.appendChild(newoption);
                }
            });
        }


        $('#clientButton').click(function() {
            $('#clientList').modal('show');
        });

        $('#historyButton').click(function() {
            $.get("{{ url('orders/'.$order->id.'/clienthistory') }}", function(data) {
                if(typeof data === 'object'){
                    loadHistory(data);
                }else{
                    toastError(data);
                }
            });
        });

        function loadHistory(data){
            $('#historyList').html('');

            data.forEach(order => {
                if(order.closed==1 && order.enabled==1){
                    var ntr = document.createElement('tr');
                    //agregar numero de orden
                    var ntd = document.createElement('td');
                    ntd.append(order.internal_id);
                    ntr.append(ntd);

                    //agregar detalle de 
                    var nul = document.createElement('div');
                    nul.classList.add('mb-0');
                    order.orderdetails.forEach(orderdetail => {
                        if(orderdetail.enabled==1){
                            var nli = document.createElement('div');
                            nli.classList.add('row');

                            var ndiv = document.createElement('div');
                            ndiv.classList.add('col-12','col-sm-8');
                            ndiv.append(orderdetail.product.name+" X"+orderdetail.quantity);
                            nli.append(ndiv);

                            var nsmall = document.createElement('div');
                            nsmall.classList.add('col-12','col-sm-4');
                            nsmall.append("$" + miles(orderdetail.total_ammount*1) + " -> $" + miles(orderdetail.quantity*orderdetail.product.price));
                            nli.append(nsmall);

                            nul.append(nli);
                        }
                    });
                    var ntd = document.createElement('td');
                    ntd.append(nul);
                    ntr.append(ntd);


                    //agregar numero de orden
                    var ntd = document.createElement('td');
                    var na = document.createElement('a');
                    na.classList.add("btn", "btn-primary","material-icons");
                    na.innerText="refresh";
                    na.href="{{url('orders/'.$order->id.'/repeat')}}/"+order.id;
                    ntd.append(na);
                    ntr.append(ntd);

                    $('#historyList').append(ntr);
                }
            });

            $('#historyModal').modal('show');
        }

        var region_company = {!! $order->company->commune->region_id !!};
        var commune_company = {!! $order->company->commune_id !!};

        $(document).ready(function() {

            $.get("{{ url('clients/getdata') }}", function(data) {
                datos = JSON.parse(data);

                clients = datos.clients;
                regions = datos.regions;
                communes = datos.communes;
                regionLoad();
                region_select.value = region_company;
                comunaLoad();
                commune_select.value = commune_company;
                clienttable = $('#tabla').DataTable({
                    scrollY: "35vh",
                    scrollCollapse: true,
                    paging: false,
                    fixedHeader: true,
                    info: false,
                    responsive: true,
                    data: clients,
                    rowId: 'id',
                    columns: [{
                            "data": "name",
                            "width": "30%"
                        },
                        {
                            "data": "commune.name",
                            "width": "20%"
                        },
                        {
                            "data": "address",
                            "width": "35%"
                        },
                        {
                            "data": "phone",
                            "width": "15%"
                        },
                    ],
                    order: [
                        [0, "desc"]
                    ],
                });

                @if ($order->client);
                    var fila = clienttable.row("#{{ $order->client->id }}");
                    if(fila.id()){
                    setSelectRow(fila.node());
                    }
                @endif
            });

            var primera = true;
            $('#clientList').on('shown.bs.modal', function() {
                if (primera) {
                    clienttable.columns.adjust().draw();
                    primera = false;
                }
                var rowpos = $('.bg-select').eq(0).position();
                if(rowpos){
                    $('.dataTables_scrollBody').eq(0).scrollTop(rowpos.top);
                }
            });


            $('#client-name').on('keyup', function() {
                if (clienttable.column(0).search() !== this.value) {
                    clienttable
                        .column(0)
                        .search(this.value)
                        .draw();
                }
            });

            $('#client-phone').on('keyup', function() {
                if (clienttable.column(3).search() !== this.value) {
                    clienttable
                        .column(3)
                        .search(this.value)
                        .draw();
                }
            });

            $('#tabla tbody').on('click', 'tr', function() {
                setSelectRow(this);
            });
        });

        function setSelectRow(rowElement) {
            if (rowselect[0]) {
                rowselect[0].classList.remove('bg-select');
            }
            rowElement.classList.add('bg-select');
            var client = clienttable.row(rowElement).data();
            clientForm['region_id'].value = client.commune.region_id;
            comunaLoad();
            clientForm['commune_id'].value = client.commune_id;
            clientForm['name'].value = client.name;
            clientForm['phone'].value = client.phone;
            clientForm['address'].value = client.address;
            clientForm['id'].value = client.id;
        }
    </script>

    <!--SCRIPT DE ADICIONALES Y PAGOS-->
    <script>
        var extraForm = document.getElementById('extraForm');
        var paymentForm = document.getElementById('paymentForm');
        var order_total = document.getElementById('order_total');

        //TOTAL CONSUMO
        let TotalBase = parseFloat("{{ $order->Total }}");
        var FaltaPagar = 0;
        var difference = 0;
        
        //Adicionales
        var discount        = document.getElementById('discount');
        var discount_total  = document.getElementById('discount_total');

        var tip_type        = document.getElementById('tip_type');
        var tip             = document.getElementById('tip');
        var tip_total       = document.getElementById('tip_total');

        var delivery        = document.getElementById('delivery');
        var delivery_total  = document.getElementById('delivery_total');

        //FORMAS DE PAGOS
        var transfer        = document.getElementById('transfer');
        var debit_card      = document.getElementById('debit_card');
        var credit_card     = document.getElementById('credit_card');
        var efective        = document.getElementById('efective');

        //PAGOS
        var pay_total       = document.getElementById('pay_total');
        var pay_back        = document.getElementById('pay_back');
        var pay_left        = document.getElementById('pay_left');
        
        var detachForm      = document.getElementById('detachForm');

        function disabledPaymend(){
            paymentForm['transfer'].disabled=true;
            paymentForm['debit_card'].disabled=true;
            paymentForm['credit_card'].disabled=true;
            paymentForm['efective'].disabled=true;
        }

        function disabledExtra(){
            extraForm['delivery'].disabled=true;
            ordertype.disabled=true;
            extraForm['discount'].disabled=true;
            extraForm['discount_description'].disabled=true;
            extraForm['tip_type'].disabled=true;
            extraForm['tip'].disabled=true;
        }
        
        //TODOS LOS CAMPOS RELACIONADOS CON DINERO AL CAMBIAR EJECUTAN LA FUNCION CALCULAR
        var dinero = document.querySelectorAll(".dinero");
        dinero.forEach(input =>input.onchange = calcular);
        

        calcular();

        var extraForm = document.getElementById('extraForm');
        extraForm.onsubmit = function(e) {
            e.preventDefault();
            return false;
        }        
        
        var paymentForm = document.getElementById('paymentForm');
        paymentForm.onsubmit = function(e) {
            e.preventDefault();
            return false;
        }

        //Mostrar cosas de Delivery
        var clientBox = document.getElementById('clientBox');
        var ordertype = document.getElementById('ordertype');        
        var deliveryTr = document.getElementById('deliveryTr');

        function motrarClientBox(){
            $.get("{{url('orders/'.$order->id.'/ordertype_id')}}/"+ordertype.value, function(data) {
                console.log(data);
            });
            if(ordertype.value==2){
                deliveryTr.style.display='table-row';
                clientForm.address.required=true;
            }else{
                deliveryTr.style.display='none';
                clientForm.address.required=false;
                delivery.value="0";
            }
        }

        motrarClientBox();
        ordertype.onchange = motrarClientBox;
        //

        var loadState=true;

        function paymentStore(){
            if(
                FaltaPagar !=0
            ){
                alert("Falta pagar: $"+miles(FaltaPagar));
                return false;
            }else if(loadState) {
                loadState = false;
                var formData = new FormData(paymentForm);
                formData.append("difference", difference);
                $.ajax({
                    url: "{{ url('/orders/'.$order->id.'/paymentStore') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false // tell jQuery not to set contentType
                }).done(function(data) {
                    if (typeof(data) == 'object') {
                        disabledPaymend();
                        location.reload();
                        return true;
                    } else {
                        alert(data);
                        return false;
                    }
                }).fail(function(xhr, status, error) {
                    alert(xhr.responseJSON.response);
                }).always(function() {
                    loadState = true;
                });
            }
        }

        
        function extraStore(){
            if(
                extraForm['discount_description'].value == '' &&
                extraForm['discount'].value != 0
            ){
                alert("Falta agregar razon del descuento");
                return false;
            }else if(
                ordertype.value=="2" && (extraForm['client_id'].value=="" || extraForm['delivery'].value==0)
            ){
                alert("para Entrega a domicilio debe ingresar la información del cliente y costo de Despacho");
                return false;
            }else if(
                ordertype.value=="3" && extraForm['client_id'].value==""
            ){
                alert("Es necesario ingresar información del cliente");
                return false;
            }else{
                loadState = false;
                var formData = new FormData(extraForm);
                $.ajax({
                    url: "{{ url('/orders/'.$order->id.'/extraStore') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false // tell jQuery not to set contentType
                }).done(function(data) {
                    if (typeof(data) == 'object') {
                        console.log('entre');
                        disabledExtra();
                        PrintFakeDte();
                        //PrintBoleta();
                    } else {
                        alert(data);
                    }
                }).fail(function(xhr, status, error) {
                    alert(xhr.responseJSON.response);
                }).always(function() {
                    loadState = true;
                });
            }
        }

        function eliminarModal(objeto){
            var json =  JSON.parse(objeto);
            $('#product_name').html(json.product.name);
            detachForm['orderdetail_id'].value = json.id;
            $('#eliminarModal').modal('show');
        }

        function eliminarProducto(){
            var formData = new FormData(detachForm);
            $.ajax({
                url: "{{ url('/orders/products/detach') }}",
                type: "POST",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false // tell jQuery not to set contentType
            }).done(function(data) {
                if (typeof(data) == 'object') {
                    TotalBase=data.Total; 
                    order_total.innerHTML=miles(TotalBase);
                    $('#orderdetail_'+detachForm.orderdetail_id.value).remove();
                    /*              
                    extraForm['orderdetail_id[]'].forEach(input =>{
                        if(input.value == detachForm['orderdetail_id'].value){
                            input.parentElement.parentElement.remove();
                        }
                    });*/
                    calcular();
                    $('#eliminarModal').modal('hide');
                } else {
                    alert(data);
                }
            }).fail(function() {
                alert("error al recibir respuesta del servidor");
            }).always(function() {
                loadState = true;
            });
        }

        function calcular(input){

            if(input){
                if(!input.target.value){
                    input.target.value=0;
                }
            }
            //VALOR BASE
            var total_pay=TotalBase;

            //ADICIONALES------------------------------------------------

            //DESCUENTO
            var discount_ammount    = discount.value ? parseFloat(discount.value) : 0;
            total_pay = total_pay + discount_ammount
            discount_total.innerHTML = '$'+miles(total_pay);

            //PROPINA
            if(tip_type.value==-1){
                tip.readOnly=false;
            }else{
                tip.readOnly=true;
                tip.value = Math.round((tip_type.value/100) * total_pay);
            }
            var tip_ammount         = tip.value ? parseFloat(tip.value) : 0;
            total_pay = total_pay + tip_ammount
            tip_total.innerHTML = '$'+miles(total_pay);

            //DELIVERY
            var delivery_ammount    = delivery.value ? parseFloat(delivery.value) : 0;
            total_pay = total_pay + delivery_ammount
            delivery_total.innerHTML = '$'+miles(total_pay);

            //TOTAL A PAGAR
            pay_total.innerHTML = '$'+miles(total_pay);

            //FORMA DE PAGO----------------------------------------------------

            //TRANSFERENCIA
            var transfer_ammount = transfer.value ? parseFloat(transfer.value) : 0;
            total_pay = total_pay - transfer_ammount;

            //TRAJETA DE DEBITO
            var debit_card_ammount = debit_card.value ? parseFloat(debit_card.value) : 0;
            total_pay = total_pay - debit_card_ammount;

            //TRAJETA DE CREDITO
            var credit_card_ammount = credit_card.value ? parseFloat(credit_card.value) : 0;
            total_pay = total_pay - credit_card_ammount;

            //PAGO EFECTIVO
            var efective_ammount = efective.value ? parseFloat(efective.value) : 0;
            total_pay = total_pay - efective_ammount;

            if(total_pay<0){
                pay_back.innerHTML = '$'+miles(total_pay*-1);
                difference=total_pay;
            }else{
                pay_back.innerHTML = '$'+0;
            }
            
            if(total_pay>0){
                pay_left.innerHTML = '$'+miles(total_pay);
                FaltaPagar=total_pay;
            }else{
                pay_left.innerHTML = '$'+0;
                FaltaPagar=0;
            }
        }

        function miles(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
@stop
