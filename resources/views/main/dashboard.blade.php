@extends('templates.maincontainer')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    #tabla_filter,#tabla_paginate{
        text-align: right;
    }
    .alert-icon{
        vertical-align: -6px;
    }
    .bg-darker{
        background-color: rgba(100,100,100,0.2)!important;
    }
    .card-header .material-icons{
        vertical-align:-5px;
    }
    .ind{
        display:block;
        width:22px;
        height: 22px;
        border-width: 1px;
        border-style: solid;
        border-radius: 50%;
    }
</style>

@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-12 col-sm-6"> 
                <div  class="card bg-darker">
                    <div class="card-header pb-0">
                        <h5>
                            <span class="material-icons">
                            leaderboard
                            </span>
                            Ventas por Semana
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="ventassemanales" width="200" height="200"></canvas>
                    </div>
                </div>                     
            </div>
            <div class="col-12 col-sm-6"> 
                <div  class="card bg-darker h-100">
                    <div class="card-header pb-0">
                        <h5>
                            <span class="material-icons">
                                trending_up
                            </span>
                            Top Productos Vendidos
                        </h5>
                    </div>
                    <div class="card-body" align="center">
                        <table class="text-light w-100" id="topventas_table"> 
                            <tr>
                                <th>
                                </th>
                                <th style="width:70%">
                                    Producto
                                </th>
                                <th>
                                    Ventas
                                </th>
                            </tr>
                        </table>

                        <div style="max-height:16rem;max-width:16rem;padding-top:2rem">
                            <canvas id="topventas" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>                     
            </div>
            <div class="col-12 col-sm-6"> 
                <div  class="card bg-darker h-100 mt-4">
                    <div class="card-header pb-0">
                        <h5>
                            <span class="material-icons">
                                report_problem
                            </span>
                            Insumos Bajos en Stock
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="text-light w-100"> 
                            <tr>
                                <th style="width:50%">
                                    Insumo
                                </th>
                                <th>
                                    Stock
                                </th>
                                <th>
                                    Minimo
                                </th>
                            </tr>
                            @foreach ($lowstock as $item)   
                                <tr>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->stock}} {{$item->measureunit->name}}
                                    </td>
                                    <td>
                                        {{$item->warning}} {{$item->measureunit->name}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>                     
            </div>
            <div class="col-12 col-sm-6"> 
                <div  class="card bg-darker h-100 mt-4">
                    <div class="card-header pb-0">
                        <h5>
                            <span class="material-icons">
                                query_stats
                            </span>
                            Desglose Ganancias
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="text-light w-100">
                            <tr>
                                <td>
                                    Consumo
                                </td>
                                <td>
                                    ${{number_format($order_totals,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Descuentos
                                </td>
                                <td>
                                    ${{number_format($profit[0]->discount,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ganancias
                                </td>
                                <td>
                                    ${{number_format($order_totals + $profit[0]->discount,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Propinas
                                </td>
                                <td>
                                    ${{number_format($profit[0]->tip,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Repartos
                                </td>
                                <td>
                                    ${{number_format($profit[0]->delivery,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ganancias 
                                </td>
                                <td>
                                    ${{number_format($profit[0]->delivery,0,",",".")}}
                                </td>
                            </tr>
                        </table>
                        <br>
                        <h5>Formas de Pago</h5>
                        <table class="text-light w-100">
                            <tr>
                                <td>
                                    Transferencias
                                </td>
                                <td>
                                    ${{number_format($profit[0]->transfer,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tarjeta de Debito
                                </td>
                                <td>
                                    ${{number_format($profit[0]->debit_card,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tarjeta de Credito
                                </td>
                                <td>
                                    ${{number_format($profit[0]->credit_card,0,",",".")}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Efectivo
                                </td>
                                <td>
                                    ${{number_format($profit[0]->efective,0,",",".")}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var opcionesBar =  {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            size: 16,
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 16,
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                },
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 20
                    }
                }
            }
        };

        var opcionesPie =  {
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        // This more specific font property overrides the global property
                        font: {
                            size: 16
                        }
                    }
                },
            }
        };
        var salesweek=@json($salesweek);
        var datos = [0, 0, 0, 0, 0, 0, 0];
        salesweek.forEach((el,index) => {
            var i = el.dayweek - 2;
            if(el.dayweek==1){
                i=6;
            }
            datos[i]=el.sales;
        });

        var ctx = document.getElementById('ventassemanales');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                    label: 'Ventas Semana',
                    data: datos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(136, 14, 79, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(136, 14, 79, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:opcionesBar,
        });

        
        var salesbest=@json($salesbest);
        var salesbest_labels=[];
        var salesbest_data=[];
        var colors = [
            "255, 99, 132",
            "54, 162, 235",
            "255, 206, 86",
            "75, 192, 192",
            "153, 102, 255",
            "255, 159, 64",
            "136, 14, 79"
        ];

        
        var topventasCanvas = document.getElementById('topventas');
        var topventasTabla = document.getElementById('topventas_table');

        salesbest.forEach((el,index) => {
            salesbest_labels.push(el.name);
            salesbest_data.push(el.cant);
            topventasTabla.insertAdjacentHTML('beforeend', "<tr><td><div class='ind' style='background:rgba("+colors[index]+",0.2);border-color:rgba("+colors[index]+",1)'></div></td><td>"+el.name+"</td><td>"+el.cant+"</td></tr>");           
        });
        
        var topventasGrafico = new Chart(topventasCanvas, {
            type: 'pie',
            data: {
                labels: salesbest_labels,
                datasets: [{
                    label: 'Ventas Semana',
                    data: salesbest_data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(136, 14, 79, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(136, 14, 79, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options:opcionesPie,
        });
    </script>
 @stop