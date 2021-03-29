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
</style>
@section('content')
    <div class="p-3">
        <h1>Orden: {{$order->id}}</h1>
        <table class="table table-striped table-sm table-dark">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th>
                        Cant.
                    </th>
                    <th>
                        Precio Unit.
                    </th>
                    <th>
                        Precio Total.
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $orderdetail)
                    <tr>
                        <td>
                            {{$orderdetail->product->name}}
                        </td>
                        <td>
                            {{$orderdetail->quantity}}
                        </td>
                        <td>
                            {{$orderdetail->unit_ammount}}
                        </td>
                        <td>
                            {{$orderdetail->total_ammount}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" >
                        <p class="m-0" align="right">Total</p>
                    </th>
                    <td>
                        {{$order->Total}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3" >
                        <p class="m-0" align="right">IVA</p>
                    </th>
                    <td>
                        {{$order->Total*0.19}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3" >
                        <p class="m-0" align="right">A pagar</p>
                    </th>
                    <td>
                        {{$order->Total*1.19}}
                    </td>
                </tr>
            </tfoot>
        </table>
        <a href="{{url('/productselection/'.$order->id)}}" class="btn btn-success btn-lg">
            Agregar
        </a>
        <button  onclick="Print()">
            Comanda
        </button>
    </div>
    <div id="imprimir">        
        <table style="margin-bottom:10mm">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th>
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
                        <td>
                            {{$orderdetail->quantity}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
    <script>
        var imprimir = document.getElementById('imprimir');
        function Print()
            {
                var mywindow = window.open('', 'PRINT', 'height=1,width=1');

                mywindow.document.write('<html><head><title>Comanda</title>');
                mywindow.document.write('<style>*{font-family:Arial, sans-serif;}</style>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h3>ORDEN: {{$order->id}}</h3>');
                mywindow.document.write('<h3>{{$order->table->name}}</h3>');
                mywindow.document.write(imprimir.innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/
                mywindow.onafterprint = function(event) {mywindow.close()};

                mywindow.print();

                return true;
            }
    </script>
@stop