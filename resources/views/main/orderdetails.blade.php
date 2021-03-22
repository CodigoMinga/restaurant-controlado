@extends('templates.maincontainer')

@section('content')
    <h1>Orden: {{$order->id}}</h1>
    <table class="table table-striped table-dark">
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
                    <th>
                        {{$orderdetail->product->name}}
                    </th>
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
                    suma
                </td>
            </tr>
        </tfoot>
    </table>
@stop