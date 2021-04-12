 @extends('templates.maincontainer')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    #tabla_filter,#tabla_paginate{
        text-align: right;
    }
    .alert-icon{
        vertical-align: -6px;
    }
</style>

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Insumos</h1>
            <a  href="{{url('/items/add')}}" class="btn btn-success">
                <i class="material-icons">add</i>
                Agregar Insumo
            </a>
        </div>
        <table id="tabla" class="table table-striped table-dark table-sm" style="width:100%" >
            <thead>
                <tr>
                    <th>Insumos</th>
                    <th>Stock</th>
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
                "data": {!! json_encode($items->toArray()) !!},
                "columns": [
<<<<<<< HEAD
                    { "data": "name","width":"90%"},
                    { "data": "stock","width":"1%"},
=======
                    { "data": "name","width":"60%"},
                    { "data": "stock", render : function ( data, type, row, meta ) {
                        var aux='';
                        if(parseFloat(data)<parseFloat(row.warning)){
                            aux=' <i class="material-icons alert-icon text-warning">report_problem</i>';
                        }
                        if(parseFloat(data)<parseFloat(row.alert)){
                            aux=' <i class="material-icons alert-icon text-danger">report</i>';
                        }
                        return data +" "+row.measureunit.name+aux;
                    },"width":"15%"},
>>>>>>> roberto
                    { "data": "id", render : function ( data, type, row, meta ) {
                        return '<a class="btn btn-light material-icons" href="{{ url("/items")}}/'+data+'" >description</a>';
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