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
                <th>
                    Resto
                </th>
            </tr>
            <tr>
                <td>
                    T. de Credito
                </td>
                <td id="credit_card">
                </td>
                <td id="credit_card_comision">
                </td>
                <td id="credit_card_iva">
                </td>
                <td id="credit_card_resto">
                </td>
            </tr>
            <tr>
                <td>
                    T. de Devito
                </td>
                <td id="debit_card">
                </td>
                <td id="debit_card_comision">
                </td>
                <td id="debit_card_iva">
                </td>
                <td id="debit_card_resto">
                </td>
            </tr>
            <tr>
                <td>
                    Transferencia
                </td>
                <td id="transfer">
                </td>
                <td id="transfer_comision">
                </td>
                <td id="transfer_iva">
                </td>
                <td id="transfer_resto">
                </td>
            </tr>
            <tr>
                <td>
                    Efectivo
                </td>
                <td id="efective">
                </td>
                <td id="efective_comision">
                </td>
                <td id="efective_iva">
                </td>
                <td id="efective_resto">
                </td>
            </tr>
            <tr>
                <td>
                    Total
                </td>
                <td id="Total">
                </td>
                <td id="Total_comision">
                </td>
                <td id="Total_iva">
                </td>
                <td id="Total_resto">
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

        
        $(document).ready(function() {
            $('#credit_card').html(pesos(breakdown.credit_card));
            $('#credit_card_comision').html(pesos(breakdown.credit_card_comision));
            $('#credit_card_iva').html(pesos(breakdown.credit_card_iva));
            $('#credit_card_resto').html(pesos(breakdown.credit_card - breakdown.credit_card_comision - breakdown.credit_card_iva));

            
            $('#debit_card').html(pesos(breakdown.debit_card));
            $('#debit_card_comision').html(pesos(breakdown.debit_card_comision));
            $('#debit_card_iva').html(pesos(breakdown.debit_card_iva));
            $('#debit_card_resto').html(pesos(breakdown.debit_card - breakdown.debit_card_comision - breakdown.debit_card_iva));

            $('#transfer').html(pesos(breakdown.transfer));
            $('#transfer_comision').html("-");
            $('#transfer_iva').html(pesos(breakdown.transfer_iva));
            $('#transfer_resto').html(pesos(breakdown.transfer  - breakdown.transfer_iva));
            
            $('#efective').html(pesos(breakdown.efective));
            $('#efective_comision').html("-");
            $('#efective_iva').html(pesos(breakdown.efective_iva));
            $('#efective_resto').html(pesos(breakdown.efective - breakdown.efective_iva));
        });
        
        function pesos(x) {
            if(x>=0){
                return "$"+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }else{
                return "$"+(-1*x).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        }
    </script>
@stop