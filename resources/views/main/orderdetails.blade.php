@extends('templates.maincontainer')
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
            input.onkeyup = function(){
                vuelto.value= - Total + parseFloat(descuento.value) + parseFloat(debito.value) + parseFloat(credito.value) + parseFloat(efectivo.value) + parseFloat(transferencia.value);
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
    </script>
@stop