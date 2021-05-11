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
                    <div class="card-body">
                        <canvas id="topventas" width="200" height="200"></canvas>
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
                        <ol>
                            <li>
                                California Salumado (california) 
                            </li>
                        </ol>
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
                        <ol>
                            <li>
                                Ventas $256.250
                            </li>
                            <li>
                                Repartos $35.500
                            </li>
                            <li>
                                Propinas $23.750
                            </li>
                            <li>
                                Descuentos $25.000
                            </li>
                        </ol>
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
                    display: true,
                    labels: {
                        // This more specific font property overrides the global property
                        font: {
                            size: 16
                        }
                    }
                },
            }
        };

        var ctx = document.getElementById('ventassemanales');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                    label: 'Ventas Semana',
                    data: [12, 19, 3, 5, 2, 3,6],
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

        
        var topventasCanvas = document.getElementById('topventas');
        var topventasGrafico = new Chart(topventasCanvas, {
            type: 'pie',
            data: {
                labels: ['Rolls Sin Arroz Envuelto en Queso Crema', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                    label: 'Ventas Semana',
                    data: [12, 19, 3, 5, 2, 3,6],
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