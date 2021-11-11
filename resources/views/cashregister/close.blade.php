@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3 pb-3">
        <h1>
            <i class="material-icons">point_of_sale</i> Caja
        </h1>
        <div class="card bg-dark mb-4">
            <div class="card-header">
                <h3>
                    Detalle Caja
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-dark mb-0">
                    <tr>
                        <th width=1>
                            Apertura:
                        </th>
                        <td>
                            {{$cashregister->user_open->name}}
                        </td>
                        <th width=1>
                            Fecha:
                        </th>
                        <td width=280>
                            {{$cashregister->created_at}}
                        </td>
                    </tr>
                    @if($cashregister->closed!=null)
                    <tr>
                        <th width=1>
                            Cierre:
                        </th>
                        <td>
                            {{$cashregister->user_close->name}}
                        </td>
                        <th width=1>
                            Fecha:
                        </th>
                        <td width=280>
                            {{$cashregister->closed}}
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h3>
                            Detalle por Pago
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-dark mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ingreso
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Deposito inicial
                                    </td>
                                    <td>
                                        ${{number_format($cashregister->ammount_open, 0, '', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        T. de Credito
                                    </td>
                                    <td id="credit_card">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        T. de Debito
                                    </td>
                                    <td id="debit_card">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Transferencia
                                    </td>
                                    <td id="transfer">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Efectivo
                                    </td>
                                    <td id="efective">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td id="Total">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h3>
                            Detalle por Item
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-dark mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ingreso
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Deposito inicial
                                    </td>
                                    <td>
                                        ${{number_format($cashregister->ammount_open, 0, '', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Consumo
                                    </td>
                                    <td id="consume">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Propinas
                                    </td>
                                    <td id="tip">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Descuentos
                                    </td>
                                    <td id="discount">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Delivery
                                    </td>
                                    <td id="delivery">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td id="item_total">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-dark mb-4">
            <div class="card-header">
                <h3>
                    Desglose productos vendidos
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-dark mb-0">
                    <tr>
                        <th>
                            Producto
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Precio unitario
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    @foreach ($orderdetails_data as $orderdetail_data)
                        <tr>
                            <td>
                                {{$orderdetail_data->name}}
                            </td>
                            <td>
                                {{$orderdetail_data->quantity}}
                            </td>
                            <td>
                                ${{number_format($orderdetail_data->unit_ammount, 0, '', '.') }}
                            </td>
                            <td>
                                ${{number_format(($orderdetail_data->quantity * $orderdetail_data->unit_ammount), 0, '', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col mb-4">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h3>
                            Detalle Delivery
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-dark mb-0">
                            <tr>
                                <th>
                                    Monto
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Comisión
                                </th>
                            </tr>
                            @foreach ($deliveries_data as $delivery_data)
                                <tr>
                                    <td>
                                        {{$delivery_data->delivery}}
                                    </td>
                                    <td>
                                        {{$delivery_data->delivery_count}}
                                    </td>
                                    <td>
                                        ${{number_format(($delivery_data->delivery_count * $delivery_data->delivery), 0, '', '.') }}
                                    </td>
                                    <td>
                                        ${{number_format($delivery_data->delivery_commission, 0, '', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col mb-4">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h3>
                            Tipos de Ordenes
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-dark mb-0">
                            <tr>
                                <th>
                                    Local
                                </th>
                                <th>
                                    Retiro en Local
                                </th>
                                <th>
                                    Delivery
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    {{$cashregister->Breakdown->ordertype_1}}
                                </td>
                                <td>
                                    {{$cashregister->Breakdown->ordertype_2}}
                                </td>
                                <td>
                                    {{$cashregister->Breakdown->ordertype_3}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($cashregister->closed==null)
        <form method="post" action="{{ url('cashregister/close') }}">
            {{ csrf_field() }}
            <input type="hidden" value="{{$cashregister->id}}" name="id">
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-lg btn-block btn-success">
                    <i class="material-icons">send</i>
                    Cerrar
                </button>
            </div>
        </form>
        @endif
    </div>
    <script>
        var orders ={!! json_encode($cashregister->orders) !!};
        var breakdown ={!! json_encode($cashregister->Breakdown) !!};

        $(document).ready(function() {
            $('#credit_card').html(pesos(breakdown.credit_card));
            $('#credit_card_comision').html(pesos(breakdown.credit_card_comision));
            $('#credit_card_iva').html(pesos(breakdown.credit_card_iva));
            var credit_card_resto = breakdown.credit_card - breakdown.credit_card_comision - breakdown.credit_card_iva;
            $('#credit_card_resto').html(pesos(credit_card_resto));

            
            $('#debit_card').html(pesos(breakdown.debit_card));
            $('#debit_card_comision').html(pesos(breakdown.debit_card_comision));
            $('#debit_card_iva').html(pesos(breakdown.debit_card_iva));
            var debit_card_resto = breakdown.debit_card - breakdown.debit_card_comision - breakdown.debit_card_iva;
            $('#debit_card_resto').html(pesos(debit_card_resto));

            $('#transfer').html(pesos(breakdown.transfer));
            $('#transfer_comision').html("-");
            $('#transfer_iva').html(pesos(breakdown.transfer_iva));
            var transfer_resto = breakdown.transfer - breakdown.transfer_iva;
            $('#transfer_resto').html(pesos(transfer_resto));
            
            $('#efective').html(pesos(breakdown.efective));
            $('#efective_comision').html("-");
            $('#efective_iva').html(pesos(breakdown.efective_iva));
            var efective_resto = breakdown.efective - breakdown.efective_iva;
            $('#efective_resto').html(pesos(efective_resto));

            
            $('#Total').html(pesos(breakdown.credit_card + breakdown.debit_card + breakdown.transfer + breakdown.efective + parseInt(breakdown.ammount_open)));
            $('#Total_comision').html(pesos(breakdown.debit_card_comision + breakdown.credit_card_comision));
            $('#Total_iva').html(pesos(breakdown.efective_iva + breakdown.transfer_iva + breakdown.debit_card_iva + breakdown.credit_card_iva));
            $('#Total_resto').html(pesos(efective_resto + transfer_resto + debit_card_resto + credit_card_resto ));

            
            $('#discount').html(pesos(breakdown.discount));
            $('#tip').html(pesos(breakdown.tip));
            $('#delivery').html(pesos(breakdown.delivery));
            $('#consume').html(pesos(breakdown.consume));
            $('#item_total').html(pesos(breakdown.consume + breakdown.delivery + breakdown.tip + breakdown.discount + parseInt(breakdown.ammount_open)));
        });
        
        function pesos(x) {
            if(x>=0){
                return "$"+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }else{
                return "-$"+(-1*x).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        }
    </script>
@stop