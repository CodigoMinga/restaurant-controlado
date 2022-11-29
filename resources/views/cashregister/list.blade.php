@extends('templates.maincontainer')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    #tabla_filter,#tabla_paginate{
        text-align: right;
    }
</style>

@section('content')
    <div class="pl-3 pr-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1><i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">point_of_sale</i>Cajas Registradas</h1>
            </div>
            <table id="tabla" class="table table-striped table-dark table-sm" style="width:100%" >
                <thead>
                    <tr>
                        <th>Fecha de Inicio</th>
                        <th>Dinero Incio</th>
                        <th>Fecha Termino</th>
                        <th>Dinero Termino</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                responsive: true,
                "processing" : true,
                "serverSide" : true,
                "ajax": "{{ url('/cashregister/getlist') }}",
                "columns": [
                    { "data": "created_at", render : function (data, type, row, meta ){
                        var fecha = new Date(data);
						return type === 'display' ? fecha.toLocaleString() : data;
                    },"width":"20%"},
                    { "data": "ammount_open", render : function (data) {
                        var dinero = "$"+miles(data);
                        return dinero;
                    },"width":"20%"},
                    { "data": "closed", render : function (data, type, row, meta ) {
                        var fecha = new Date(data);
                        var salida = data ? fecha.toLocaleString() : 'Sin terminar';
						return type === 'display' ? salida : data;
                    },"width":"20%"},
                    { "data": "Breakdown", render : function (data) {
                        var dinero = "$"+miles(data);
                        return dinero;
                    },"width":"20%"},
                    { data: "id", render : function ( data, type, row, meta ) {
                        return '<a class="btn btn-success material-icons" href="{{ url("/")}}/cashregister/'+data+'" >description</a>';
                    },"width":"1%"},
                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
                    "zeroRecords": "No se encuentra ningun registro",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(buscando entre _MAX_ registros)",
                    "search":         "Filtrar Registros : &nbsp",
                    "processing" : "Cargando...",
                    paginate: {
                        first:      "Primera Pagina",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultima"
                    },
                },
                "order": [[ 0, "desc" ]]
            });
        });

        function miles(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
 @stop
