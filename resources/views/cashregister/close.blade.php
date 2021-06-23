@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">point_of_sale</i> Cerrar Caja
        </h1>
        <table class="table table-dark">
            <tr>
                <th>
                    Tipo
                </th>
                <th>
                    Ingreso
                </th>
                <th>
                    Comision
                </th>
                <th>
                    IVA
                </th>
            </tr>
            <tr>
                <td>
                    T. de Credito
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    T. de Devito
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    Efectivo
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    Efectivo
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
        </table>
        <form method="post" action="{{ url('cashregister/close') }}">
            {{ csrf_field() }}
            <input type="hidden" value="{{$cashregister->id}}" name="id">
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Cerrar
                </button>
            </div>
        </form>
    </div>
    <script>
        var orders ={!! json_encode($cashregister->orders) !!};
        var breakdown ={!! json_encode($cashregister->Breakdown) !!};
        
    </script>
@stop