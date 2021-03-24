@extends('templates.maincontainer')

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
            </tfoot>
        </table>
        <a href="{{url('/productselection/'.$order->id)}}" class="btn btn-success btn-lg">
            Agregar
        </a>
    </div>
@stop