@extends('templates.maincontainer')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>

<style>
    #tabla_filter,#tabla_paginate{
        text-align: right;
    }
</style>

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Ventas</h1>
        </div>
        <table id="tabla" class="table table-striped table-dark table-sm" style="width:100%" >
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Encargado</th>
                    <th>Mesa</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Venta</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                responsive: true,
                "data": {!! json_encode($orders->toArray()) !!},
                "columns": [
                    { "data": "internal_id"     ,"width":"10%"},
                    { "data": "user.name"       ,"width":"20%"},
                    { "data": "table.name"      ,"width":"20%"},
                    { "data": "ordertype.name"  ,"width":"40%"},
                    { "data": "created_at"      , render : function ( data, type, row, meta ){
                        var returnString='';
                        if(data){
                            var fecha = new Date(data);
                            returnString = fecha.toLocaleString();
                        }
                        return type === 'display' ? returnString : data;
                    },"width":"1%"},
                    { "data": "total"           , render : function ( data, type, row, meta ){
                        return '$'+(parseInt(row.total)+parseInt(row.discount)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    },"width":"1%"},
                    { data: "id", render : function ( data, type, row, meta ){
                        return '<a class="btn btn-light material-icons" href="{{ url("orders")}}/'+data+'" >description</a>';
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
    </script>
 @stop