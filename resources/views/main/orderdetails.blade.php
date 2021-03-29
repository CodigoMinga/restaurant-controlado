@extends('templates.maincontainer')
<style>
    #imprimir{
        display: block;
        width: 80mm;
        background: white;
        position: fixed;
        top:0;
        right:-100%;
        color:black;
    }
    input[type="checkbox"]{
        display: block;
        height: 23px;
        width:23px;
    }
    input[type="number"]{
        display: block;
        width:120px;
    }
</style>
@section('content')
    <div class="p-3">
        <h1>Orden: {{$order->internal_id}}</h1>
        <table class="table table-striped table-sm table-dark w-50">
            <tr>
                <th>
                    Apertura
                </th>
                <td>
                    {{date("d/m/Y H:i:s", strtotime($order->created_at))}}
                </td>
            </tr>
            <tr>
                <th>
                    Garzón
                </th>
                <td>
                    $order->user->name
                </td>
            </tr>
            <tr>
                <th>
                    Mesa
                </th>
                <td>
                    {{$order->table->name}}
                </td>
            </tr>
        </table>
        <table class="table table-striped table-sm table-dark">
            <thead>
                <tr>
                    <th width=1>
                        Seleccionar
                    </th>
                    <th>
                        Producto
                    </th>
                    <th width=1>
                        Cant.
                    </th>
                    <th width=1>
                        Precio Unit.
                    </th>
                    <th width=1 style="text-align: right">
                        Precio Total.
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $orderdetail)
                    <tr>
                        <td align="center">
                            <input type="checkbox" name="" id="">
                        </td>
                        <td>
                            {{$orderdetail->product->name}}
                        </td>
                        <td align="right">
                            {{number_format($orderdetail->quantity, 0, '', '.')}}
                        </td>
                        <td align="right">
                            {{number_format($orderdetail->unit_ammount, 0, '', '.')}}
                        </td>
                        <td align="right">
                            {{number_format($orderdetail->total_ammount, 0, '', '.')}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot align="right">
                <tr>
                    <th colspan="4" >
                        <p class="m-0" align="right">Total</p>
                    </th>
                    <td>
                        {{number_format($order->Total, 0, '', '.') }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4" >
                        <p class="m-0" align="right">IVA</p>
                    </th>
                    <td>
                        {{number_format($order->Total*0.19, 0, '', '.') }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4" >
                        <p class="m-0" align="right">A pagar</p>
                    </th>
                    <td>
                        {{number_format($order->Total*1.19, 0, '', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
        <table style="color:white">
            <tr>
                <th>
                    Descuento
                </th>
                <td width=1>
                    <input type="number"    size="6" value="0" id="descuento" class="dinero">
                </td>
                <td>
                    <input type="text"      placeholder="Razón del descuento">
                </td>
            </tr>
            <tr>
                <th>
                    T.de Debito
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="debito" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    T.de Credito
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="credito" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    Efectivo
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="efectivo" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    Vuelto
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="vuelto" readonly>
                </td>
            </tr>
        </table>
        <hr>
        <a href="{{url('/productselection/'.$order->id)}}" class="btn btn-success btn-lg">
            Agregar
        </a>
        <button  onclick="Print()" class="btn btn-primary btn-lg">
            Comanda
        </button>
    </div>
    <div id="imprimir">
        <h3 style="margin-bottom:0px">ORDEN: {{$order->id}}</h3>
        <h3 style="margin-top:0px">{{$order->table->name}}</h3>
        <table style="margin-bottom:10mm;font-size:14px;width:100%">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th width="1">
                        Cant.
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $orderdetail)
                    <tr>
                        <td>
                            {{$orderdetail->product->name}}
                        </td>
                        <td align="right">
                            {{$orderdetail->quantity}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
    <script>
        let Total=parseFloat("{{$order->Total*1.19}}");
        var imprimir = document.getElementById('imprimir');

        var descuento = document.getElementById('descuento');
        var debito = document.getElementById('debito');
        var credito = document.getElementById('credito');
        var efectivo = document.getElementById('efectivo');
        var vuelto = document.getElementById('vuelto');

        var dinero = document.querySelectorAll(".dinero");
        function Print()
            {
                var mywindow = window.open('', 'PRINT', 'height=1,width=1');

                mywindow.document.write('<html><head><title>Comanda</title>');
                mywindow.document.write('<style>*{font-family:Arial, sans-serif;} @page{margin-left: 4mm;margin-right: 4mm;margin-top: 0px;margin-bottom: 0px;}</style>');
                mywindow.document.write(imprimir.innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/
                mywindow.onafterprint = function(event) {mywindow.close()};
                mywindow.print();

                return true;
            }
        dinero.forEach(input => 
            input.onkeyup = function(){

                vuelto.value= - Total + parseFloat(descuento.value) + parseFloat(debito.value) + parseFloat(credito.value) + parseFloat(efectivo.value);
            }
        )
    </script>
@stop