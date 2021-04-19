@extends('templates.maincontainer')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    #imprimir{
        display: block;
        width: 80mm;
        background: white;
        position: fixed;
        top:0;
        right:-100%;
        color:black;
    }
    input[type="checkbox"]{
        display: block;
        height: 23px;
        width:23px;
    }
    input[type="number"]{
        display: block;
        width:120px;
    }
    #modal-table .row{
        margin:0px;
    }
    #modal-table .row:nth-child(2) .col-sm-12{
        margin:0px;
        padding: 0px;
    }
    .dataTables_filter, .dataTables_info { display: none; }
</style>
@section('content')
    <div class="container p-3">
        <h1>Orden: {{$order->internal_id}}</h1>
        <div class="d-flex justify-content-between">            
            <table class="table table-striped table-sm table-dark" style="max-width: 300px">
                <tr>
                    <th>
                        Apertura
                    </th>
                    <td>
                        {{date("d/m/Y H:i:s", strtotime($order->created_at))}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Garzón
                    </th>
                    <td>
                        {{$order->user->name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Selector
                    </th>
                    <td>
                        {{$order->table->tabletype->name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mesa
                    </th>
                    <td>
                        {{$order->table->name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tipo
                    </th>
                    <td style="padding:0px">
                        <select name="ordertype_id" style="width:100%;height:33px;">
                            @foreach ($ordertypes as $ordertype)
                                <option value="{{$ordertype->id}}">{{$ordertype->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>

            <table class="table table-striped table-sm table-dark" style="max-width: 300px">
                <tr>
                    <th>
                        Teléfono
                    </th>
                    <td>
                    </td>
                </tr>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <th>
                        Comuna
                    </th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>
                        Dirección
                    </th>
                    <td>

                    </td>
                </tr>
            </table>
        </div>
        <form id="productos">
            {{csrf_field()}}
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <tr>
                        <th>
                            Producto
                        </th>
                        <th width=1>
                            Comanda
                        </th>
                        <th width=1>
                            Pagado
                        </th>
                        <th width=1>
                            Cant.
                        </th>
                        <th width=1 >
                            P.Unit.
                        </th>
                        <th width=1 style="text-align: right">
                            P.Total.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderdetails as $orderdetail)
                        <tr>
                            <td>
                                {{$orderdetail->product->name}}<br>
                                <small>{{$orderdetail->description}}</small>
                                <input type="hidden" name="orderdetail_id[]" value="{{$orderdetail->id}}">
                            </td>
                            <td align="center">
                                @if($orderdetail->command)
                                    <span class="material-icons text-success">done</span>
                                @endif
                            </td>
                            <td align="center">
                                @if($orderdetail->paid)
                                    <span class="material-icons text-success">done</span>
                                @endif
                            </td>
                            <td align="right">
                                {{number_format($orderdetail->quantity, 0, '', '.')}}
                            </td>
                            <td align="right">
                                {{number_format($orderdetail->unit_ammount, 0, '', '.')}}
                            </td>
                            <td align="right">
                                {{number_format($orderdetail->total_ammount, 0, '', '.')}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot align="right">
                    <tr>
                        <th colspan="5" >
                            <p class="m-0" align="right">Total</p>
                        </th>
                        <td>
                            {{number_format($order->Total, 0, '', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <table style="color:white">
            <tr>
                <th>
                    Descuento
                </th>
                <td width=1>
                    <input type="number"    size="6" value="0" id="descuento" class="dinero">
                </td>
                <td>
                    <input type="text"      placeholder="Razón del descuento">
                </td>
            </tr>
            <tr>
                <th>
                    Transferencia
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="transferencia" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    T.de Debito
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="debito" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    T.de Credito
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="credito" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    Efectivo
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="efectivo" class="dinero">
                </td>
            </tr>
            <tr>
                <th>
                    Vuelto
                </th>
                <td>
                    <input type="number"    size="6" value="0" id="vuelto" readonly>
                </td>
            </tr>
        </table>
        <hr>
        <a href="{{url('/productselection/'.$order->id)}}" class="btn btn-success btn-lg">
            Agregar
        </a>
        <a href="{{url('/changetable/'.$order->id)}}" class="btn btn-danger btn-lg">
            Cambiar Mesa
        </a>
        <button  onclick="comanda()" class="btn btn-primary btn-lg">
            Comanda
        </button>
        <button  onclick="PrintBoleta()" class="btn btn-warning btn-lg">
            Boleta
        </button>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content  bg-dark">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body p-0" id="modal-table">
                        <div class="p-2">
                            <form id="client-form" class="was-validated">
                                {{csrf_field()}}
                                <input type="hidden" name="id">
                                <input type="hidden" name="company_id" value="{{$order->company_id}}">
                                <div class="form-row">
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="client-name" required>
                                    </div>
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Teléfono</label>
                                        <input type="text" class="form-control form-control-sm" name="phone" id="client-phone" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Región</label>
                                        <select class="custom-select custom-select-sm" name="region_id" id="region_select"> 
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Comuna</label>
                                        <select class="custom-select custom-select-sm" name="commune_id" id="commune_select"> 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" name="address" required>
                                </div>
                            </form>
                            <div>
                                <button type="button" class="btn btn-success"   onclick="clientStore()">Guardar</button>
                                <button type="button" class="btn btn-primary"   onclick="clientNew()">Nuevo</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            </div>
                        </div>                       
                        <div style="display:block;width:100%;min-height:40vh">
                            <table id="tabla" class="table table-striped table-dark table-sm mb-0" style="width:100%" >
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Comuna</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="imprimir">
        <h3 style="margin-bottom:0px">ORDEN: {{$order->id}}</h3>
        <h3 style="margin-top:0px">{{$order->table->name}}</h3>
        <table style="margin-bottom:10mm;font-size:14px;width:100%">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th width="1">
                        Cant.
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderdetails as $orderdetail)
                    <tr>
                        <td>
                            {{$orderdetail->product->name}}<br>
                            <small>{{$orderdetail->description}}</small>
                        </td>
                        <td align="right">
                            {{$orderdetail->quantity}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>

    <script src="{{ url('/') }}/js/pdf.js"></script>
    <script src="{{ url('/') }}/js/pdf.worker.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <script>

        let Total=parseFloat("{{$order->Total}}");

        var imprimir = document.getElementById('imprimir');
        var productos = document.getElementById('productos');

        var transferencia = document.getElementById('transferencia');
        var descuento = document.getElementById('descuento');
        var debito = document.getElementById('debito');
        var credito = document.getElementById('credito');
        var efectivo = document.getElementById('efectivo');
        var vuelto = document.getElementById('vuelto');

        var dinero = document.querySelectorAll(".dinero");

        function PrintComanda()
        {
            var mywindow = window.open('', 'PRINT', 'height=1,width=1');

            mywindow.document.write('<html><head><title>Comanda</title>');
            mywindow.document.write('<style>*{font-family:Arial, sans-serif;} @page{margin-left: 4mm;margin-right: 4mm;margin-top: 0px;margin-bottom: 0px;}</style>');
            mywindow.document.write(imprimir.innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.onafterprint = function(event) {mywindow.close()};
            mywindow.print();

            return true;
        }
        
        function PrintBoleta(){
            $.get( "{{url('/')}}/ajax/generateInvoice/{{$order->id}}", function( data ) {
                var byteCharacters = window.atob(data.response.PDF);
                var byteNumbers = new Array(byteCharacters.length);
                for (var i = 0; i < byteCharacters.length; i++) {
                    byteNumbers[i] = byteCharacters.charCodeAt(i);
                }
                var byteArray = new Uint8Array(byteNumbers);
                var blob = new Blob([byteArray], {type: 'application/pdf'});
                var fileURL = URL.createObjectURL(blob);
                //var mywindow = window.open(fileURL, 'PRINT', 'height=1,width=1');
                showPDF(fileURL);
                /*let pdfWindow = window.open("");
                pdfWindow.document.write("<html<head><title>Boleta.pdf</title><style>body{margin: 0px;}iframe{border-width: 0px;} @media print {body {transform: scale(.7);}table {page-break-inside: avoid;}}</style></head>");
                pdfWindow.document.write("<body><embed width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(data)+"#toolbar=0&navpanes=0&scrollbar=0'></embed></body></html>");*/
                return true;
            });
        }

        function comanda(){
            var formData = new FormData(productos);
            $.ajax({
                url: "{{url('/orderdetails/command')}}",
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log(data);
                if(typeof(data)=='object'){

                }else{
                    alert(data);
                }
            }).fail(function() {
                alert( "error al recibir respuesta del servidor" );
            });
        }

        dinero.forEach(input => 
            input.onchange = function(){
                var db = debito.value ? parseFloat(debito.value) : 0;
                var cd = debito.value ? parseFloat(credito.value) : 0;
                var ef = debito.value ? parseFloat(efectivo.value) : 0;
                var tf = debito.value ? parseFloat(transferencia.value) : 0;

                var exeso= - Total + db + cd + ef + tf;
                var falta= + Total - db - cd - ef - tf;
                
                vuelto.value= exeso > 0 ? exeso : 0;
            }
        )

        var __PDF_DOC,
            __TOTAL_PAGES,
            __PAGE_RENDERING_IN_PROGRESS = 0;
            page_index = 0;

        var mywindow2;

        function showPDF(pdf_url) {
            $("#pdf-loader").show();
            
            PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
                __PDF_DOC = pdf_doc;
                __TOTAL_PAGES = __PDF_DOC.numPages;

                mywindow2 = window.open('', 'PRINT', 'height=1,width=1');
                mywindow2.document.write('<html><head><title>Comanda</title>');
                mywindow2.document.write('<style>@page{margin-left: 0px;margin-right: 0px;margin-top: 0px;margin-bottom: 0px;} canvas{width:100%}</style>');
                mywindow2.document.write('</body></html>');
                showPage();
                mywindow2.document.close();
                mywindow2.focus();
                mywindow2.onafterprint = function(event) {mywindow2.close()};
                //mywindow.print();
            }).catch(function(error) {                
                alert(error.message);
            });
        }

        function showPage() {
            __PAGE_RENDERING_IN_PROGRESS = 1;
                        
            for(var page_no=1; page_no <= __TOTAL_PAGES; page_no++){
                    
                __PDF_DOC.getPage(page_no).then(function(page) {
                    page_index++
                    
                    var new_canvas = document.createElement("canvas");
                    new_canvas.width=1080;
                    new_canvas.id = 'canvas'+ page_index;

                    mywindow2.document.body.appendChild(new_canvas);

                    // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
                    var scale_required = new_canvas.width / page.getViewport(1).width;

                    // Get viewport of the page at required scale
                    var viewport = page.getViewport(scale_required);

                    // Set canvas height
                    new_canvas.height = viewport.height;
                    
                    var renderContext = {
                        canvasContext: new_canvas.getContext('2d'),
                        viewport: viewport
                    };

                    
                    // Render the page contents in the canvas
                    page.render(renderContext).then(function() {
                        __PAGE_RENDERING_IN_PROGRESS = 0;
                        mywindow2.print();
                    });
                });	
                
            }
        }

        var clients=[];
        var regions=[];
        var communes=[];
        
        var commune_select = document.getElementById('commune_select');
        var region_select = document.getElementById('region_select');
        
        var clientForm = document.getElementById('client-form');

        clientForm.onsubmit = function(e){
            e.preventDefault();
            return false;
        }

        var clienttable;

        function rowStore(data){
            var fila = clienttable.row("#"+data.id);
            if(fila.id()){
				fila.data(data).draw(false);
            }else{
                clienttable.row.add(data).draw(false);
            }
        }

        function clientNew(){
            var client = clienttable.row( this ).data();
            clientForm['region_id'].value=7;
            comunaLoad();
            clientForm['name'].value='';
            clientForm['phone'].value='';
            clientForm['address'].value='';
            clientForm['id'].value='';
        }

        function clientStore(){
            var formData = new FormData(clientForm);
            $.ajax({
                url: "{{url('/clients/store')}}",
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log(data);
                if(typeof(data)=='object'){
                    rowStore(data);
                }else{
                    alert(data);
                }
            }).fail(function() {
                alert( "error al recibir respuesta del servidor" );
            });
        }


        
        //FINCION REGIONLOAD
        function regionLoad() {
            //POR CADA REGION
            regions.forEach(el => {
                //CREO UNA OPCION
                var newoption = document.createElement('option');
                //ASIGNO UN VALOR A LA OPCION
                newoption.value = el.id;
                //ASIGNO UN TEXTO A LA OPCION
                newoption.text = el.name;
                //AGREGO LA OPCION AL SELECTOR REGION
                region_select.appendChild(newoption);
            });
        }

        //AL SELECTOR REGION CUANDO CAMBIE (ONCHANGE) USO LA FUNCION COMUNALOAD
        region_select.onchange = comunaLoad;

        //FUNCION COMUNALOAD
        function comunaLoad() {
            //TOMO EL VALOR (region->id) DEL SELECTOR DE REGIONES 
            var value = region_select.value;
            //ELIMINO TODAS LAS OPCIONES EN CASO DE CAMBIAR
            commune_select.innerHTML = '';
            //POR CADA COMUNA(TODAS) EJECUTO LA SIGUENTE FUNCION
            communes.forEach(el => {
                //SI EL region_id ES IGUAL AL VALOR DEL SELECTOR DE COMUNA AGREGO LA COMUNA AL SLECTOR DE COMUNA
                if (el.region_id == value) {
                    //CREO UNA OPCION
                    var newoption = document.createElement('option');
                    //A LA OPCION LE DOI UN VALOR (commune->id)
                    newoption.value = el.id;
                    //A LA OPCION LE DOI UN TEXTO (commune->name)
                    newoption.text = el.name;
                    //AGREGO LA OPCION AL SELECTOR DE COMUNAS
                    commune_select.appendChild(newoption);
                }
            });
        }



        $(document).ready(function() {    
            $.get( "{{url('clients/getdata')}}", function(data) {
                datos=JSON.parse(data);

                clients=datos.clients;
                regions=datos.regions;
                communes=datos.communes;

                //LLAMO FUNCION REGIONLOAD()
                regionLoad();
                //ASINGNO UN VALOR BASE AL SELECTOR DE REGION
                region_select.value = 7;
                //UNA VEZ SELECCIONADO EL VALOR BASE DE REGION CARGO LAS COMUNAS
                comunaLoad();

                clienttable = $('#tabla').DataTable({
                    "order": [[ 0, "desc" ]],
                    "scrollY":        "35vh",
                    "scrollCollapse": true,
                    "paging":         false,
                    info: false,
                    responsive: true,					
                    "data": clients,
                    rowId: 'id',
                    columns: [
                        { "data": "name","width":"30%"},
                        { "data": "commune.name","width":"20%"},
                        { "data": "address","width":"40%"},
                        { "data": "phone","width":"10%"},
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
                });

                

                $('#client-name').on('keyup', function () {
                    if ( clienttable.column(0).search() !== this.value ) {
                        console.log(this.value);
                        clienttable
                        .column(0)
                        .search( this.value )
                        .draw();
                    }
                });

                $('#client-phone').on('keyup', function () {
                    if ( clienttable.column(3).search() !== this.value ) {
                        clienttable
                        .column(3)
                        .search( this.value )
                        .draw();
                    }
                });

                $('#tabla tbody').on( 'click', 'tr', function () {
                    var client = clienttable.row( this ).data();
                    clientForm['region_id'].value=client.commune.region_id;
                    comunaLoad();
                    clientForm['commune_id'].value=client.commune_id;
                    clientForm['name'].value=client.name;
                    clientForm['phone'].value=client.phone;
                    clientForm['address'].value=client.address;
                    clientForm['id'].value=client.id;
                });


            });
        });
    </script>
@stop