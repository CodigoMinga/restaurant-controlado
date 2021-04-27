@extends('templates.maincontainer')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css" />
<style>
    #imprimir {
        display: block;
        width: 80mm;
        background: white;
        position: fixed;
        top: 0;
        right: -100%;
        color: black;
    }

    input[type="checkbox"] {
        display: block;
        height: 23px;
        width: 23px;
    }

    input[type="number"] {
        display: block;
        width: 120px;
    }

    #modal-table .row {
        margin: 0px;
    }

    #modal-table .row:nth-child(2) .col-sm-12 {
        margin: 0px;
        padding: 0px;
    }

    .dataTables_filter,
    .dataTables_info {
        display: none;
    }

    .table-dark.table-hover tbody tr:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, .85);
    }

    .bg-select {
        background: #0d47a1;
    }

    .bg-select:hover {
        background-color: #0d47a1 !important;
    }

    .inputtable {
        height: 33px;
    }

    .number {
        width: 120px;
    }

</style>
@section('content')
    <div class="container p-3">
        <h1>Orden: {{ $order->internal_id }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-sm table-dark">
                    <tr>
                        <th>
                            Apertura
                        </th>
                        <td>
                            {{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Garzón
                        </th>
                        <td>
                            {{ $order->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Selector
                        </th>
                        <td>
                            {{ $order->table->tabletype->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Mesa
                        </th>
                        <td>
                            {{ $order->table->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tipo
                        </th>
                        <td style="padding:0px">
                            <select name="ordertype_id" class="inputtable w-100">
                                @foreach ($ordertypes as $ordertype)
                                    <option value="{{ $ordertype->id }}">{{ $ordertype->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-striped table-sm table-dark" style="">
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td id="client_name">
                            {{ $order->client ? $order->client->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Teléfono
                        </th>
                        <td id="client_phone">
                            {{ $order->client ? $order->client->phone : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Comuna
                        </th>
                        <td id="client_commune">
                            {{ $order->client ? $order->client->commune->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dirección
                        </th>
                        <td id="client_address">
                            {{ $order->client ? $order->client->address : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-0 m-0" colspan="2">
                            <button type="button" class="btn btn-block btn-primary btn-sm" id="clientButton">
                                <span class="material-icons">person</span>
                                Cliente
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <form id="productos">
            {{ csrf_field() }}
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
                        <th width=1>
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
                                {{ $orderdetail->product->name }}<br>
                                <small>{{ $orderdetail->description }}</small>
                                <input type="hidden" name="orderdetail_id[]" value="{{ $orderdetail->id }}">
                            </td>
                            <td align="center">
                                @if ($orderdetail->command)
                                    <span class="material-icons text-success">done</span>
                                @endif
                            </td>
                            <td align="center">
                                @if ($orderdetail->paid)
                                    <span class="material-icons text-success">done</span>
                                @endif
                            </td>
                            <td align="right">
                                {{ number_format($orderdetail->quantity, 0, '', '.') }}
                            </td>
                            <td align="right">
                                {{ number_format($orderdetail->unit_ammount, 0, '', '.') }}
                            </td>
                            <td align="right">
                                {{ number_format($orderdetail->total_ammount, 0, '', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <div class="d-flex flex-wrap justify-content-between">
            <div>
                <table class="table table-striped table-sm table-dark">
                    <tr>
                        <th colspan="2" style="text-align: center">
                            Forma de pagos
                        </th>
                    </tr>
                    <tr>
                        <th width=1>
                            Transferencia
                        </th>
                        <td class="p-0 m-0">
                            <input type="number" size="6" value="0" id="transfer" class="dinero inputtable">
                        </td>
                    </tr>
                    <tr>
                        <th width=1>
                            T.de Debito
                        </th>
                        <td class="p-0 m-0">
                            <input type="number" size="6" value="0" id="debit_card" class="dinero inputtable">
                        </td>
                    </tr>
                    <tr>
                        <th width=1>
                            T.de Credito
                        </th>
                        <td class="p-0 m-0">
                            <input type="number" size="6" value="0" id="credit_card" class="dinero inputtable">
                        </td>
                    </tr>
                    <tr>
                        <th width=1>
                            Efectivo
                        </th>
                        <td class="p-0 m-0">
                            <input type="number" size="6" value="0" id="efective" class="dinero inputtable">
                        </td>
                    </tr>
                    <tr>
                        <th width=1>
                            Vuelto
                        </th>
                        <td id="pay_back">
                        </td>
                    </tr>
                    <tr>
                        <th style="white-space: nowrap">
                            Pago restante
                        </th>
                        <td id="pay_left">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <table class="table table-striped table-sm table-dark">
                    <tr>
                        <th colspan="4" style="text-align: center">
                            Adicionales
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            Consumo total
                        </th>
                        <td>
                            ${{ number_format($order->Total, 0, '', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th width=1>
                            Descuento
                        </th>
                        <td class="p-0 m-0" width=1>
                            <select name="discount" id='discount' class="inputtable number dinero">
                                <option value="0">0</option>
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->ammount }}">
                                        {{ number_format($discount->ammount, 0, '', '.') }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-0 m-0">
                            <input type="text" name="discount_comment" class="inputtable number"
                                placeholder="Razón del descuento">
                        </td>
                        <td id='discount_total'>
                            0
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Propina
                        </th>
                        <td class="p-0 m-0" width=1>
                            <select name="tip_type" id='tip_type' class="inputtable number dinero">
                                <option value="0">0</option>
                                <option value="10">10%</option>
                                <option value="-1">Cantidad</option>
                            </select>
                        </td>
                        <td class="p-0 m-0" width=1>
                            <input type="number" size="6" value="0" id="tip" class="inputtable dinero" readonly>
                        </td>
                        <td id='tip_total'>
                            0
                        </td>
                    </tr>

                    <tr>
                        <th width=1 colspan="2">
                            Envio
                        </th>
                        <td class="p-0 m-0" width=1>
                            <select name="delivery" id="delivery" class="inputtable number dinero">
                                <option value="0">0</option>
                                @foreach ($deliveries as $delivery)
                                    <option value="{{ $delivery->ammount }}">
                                        {{ number_format($delivery->ammount, 0, '', '.') }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="delivery_total">
                            0
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3 style="white-space: nowrap">
                            Total a pagar
                        </th>
                        <td id="pay_total">
                            0
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-wrap justify-content-between">
            <a href="{{ url('/productselection/' . $order->id) }}" class="btn btn-success btn-lg">
                Agregar
            </a>
            <a href="{{ url('/changetable/' . $order->id) }}" class="btn btn-danger btn-lg">
                Cambiar Mesa
            </a>
            <button onclick="Cerrar()" class="btn btn-info btn-lg">
                Cerrar Venta
            </button>
            <button onclick="comanda()" class="btn btn-primary btn-lg">
                Comanda
            </button>
            <button onclick="PrintBoleta()" class="btn btn-warning btn-lg">
                Boleta
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="clientList" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                {{ csrf_field() }}
                                <input type="hidden" name="id">
                                <input type="hidden" name="company_id" value="{{ $order->company_id }}">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="form-row">
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="client-name"
                                            required>
                                    </div>
                                    <div class="form-group col-12 col-sm-6 mb-2">
                                        <label class="mb-1">Teléfono</label>
                                        <input type="text" class="form-control form-control-sm" name="phone"
                                            id="client-phone" required>
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
                                        <select class="custom-select custom-select-sm" name="commune_id"
                                            id="commune_select">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" name="address" required>
                                </div>
                            </form>
                            <div>
                                <button type="button" class="btn btn-success" onclick="clientStore()">
                                    <span class="material-icons">send</span>
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-primary" onclick="clientNew()">
                                    <span class="material-icons">person_add</span>
                                    Nuevo
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <span class="material-icons">close</span>
                                    Volver
                                </button>
                            </div>
                        </div>
                        <div style="display:block;width:100%;min-height:40vh" id='container'>
                            <table id="tabla" class="table table-dark table-sm mb-0 table-hover">
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
        <h3 style="margin-bottom:0px">ORDEN: {{ $order->id }}</h3>
        <h3 style="margin-top:0px">{{ $order->table->name }}</h3>
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
                            {{ $orderdetail->product->name }}<br>
                            <small>{{ $orderdetail->description }}</small>
                        </td>
                        <td align="right">
                            {{ $orderdetail->quantity }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>

    <script src="{{ url('/') }}/js/pdf.js"></script>
    <script src="{{ url('/') }}/js/pdf.worker.js"></script>
    <script type="text/javascript" src="https:////cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

    <!--SCRIPT DE COMANDA Y BOLETA-->
    <script>
        var imprimir = document.getElementById('imprimir');
        var productos = document.getElementById('productos');

        function PrintComanda() {
            var mywindow = window.open('', 'PRINT', 'height=1,width=1');

            mywindow.document.write('<html><head><title>Comanda</title>');
            mywindow.document.write(
                '<style>*{font-family:Arial, sans-serif;} @page{margin-left: 4mm;margin-right: 4mm;margin-top: 0px;margin-bottom: 0px;}</style>'
                );
            mywindow.document.write(imprimir.innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.onafterprint = function(event) {
                mywindow.close()
            };
            mywindow.print();

            return true;
        }

        function PrintBoleta() {
            $.get("{{ url('/') }}/ajax/generateInvoice/{{ $order->id }}", function(data) {
                var byteCharacters = window.atob(data.response.PDF);
                var byteNumbers = new Array(byteCharacters.length);
                for (var i = 0; i < byteCharacters.length; i++) {
                    byteNumbers[i] = byteCharacters.charCodeAt(i);
                }
                var byteArray = new Uint8Array(byteNumbers);
                var blob = new Blob([byteArray], {
                    type: 'application/pdf'
                });
                var fileURL = URL.createObjectURL(blob);
                //var mywindow = window.open(fileURL, 'PRINT', 'height=1,width=1');
                showPDF(fileURL);
                /*let pdfWindow = window.open("");
                pdfWindow.document.write("<html<head><title>Boleta.pdf</title><style>body{margin: 0px;}iframe{border-width: 0px;} @media print {body {transform: scale(.7);}table {page-break-inside: avoid;}}</style></head>");
                pdfWindow.document.write("<body><embed width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(data)+"#toolbar=0&navpanes=0&scrollbar=0'></embed></body></html>");*/
                return true;
            });
        }

        function comanda() {
            var formData = new FormData(productos);
            $.ajax({
                url: "{{ url('/orderdetails/command') }}",
                type: "POST",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false // tell jQuery not to set contentType
            }).done(function(data) {
                if (typeof(data) == 'object') {

                } else {
                    alert(data);
                }
            }).fail(function() {
                alert("error al recibir respuesta del servidor");
            });
        }

        var __PDF_DOC,
            __TOTAL_PAGES,
            __PAGE_RENDERING_IN_PROGRESS = 0;
        page_index = 0;

        var mywindow2;

        function showPDF(pdf_url) {
            $("#pdf-loader").show();

            PDFJS.getDocument({
                url: pdf_url
            }).then(function(pdf_doc) {
                __PDF_DOC = pdf_doc;
                __TOTAL_PAGES = __PDF_DOC.numPages;

                mywindow2 = window.open('', 'PRINT', 'height=1,width=1');
                mywindow2.document.write('<html><head><title>Comanda</title>');
                mywindow2.document.write(
                    '<style>@page{margin-left: 0px;margin-right: 0px;margin-top: 0px;margin-bottom: 0px;} canvas{width:100%}</style>'
                    );
                mywindow2.document.write('</body></html>');
                showPage();
                mywindow2.document.close();
                mywindow2.focus();
                mywindow2.onafterprint = function(event) {
                    mywindow2.close()
                };
                //mywindow.print();
            }).catch(function(error) {
                alert(error.message);
            });
        }

        function showPage() {
            __PAGE_RENDERING_IN_PROGRESS = 1;

            for (var page_no = 1; page_no <= __TOTAL_PAGES; page_no++) {

                __PDF_DOC.getPage(page_no).then(function(page) {
                    page_index++

                    var new_canvas = document.createElement("canvas");
                    new_canvas.width = 1080;
                    new_canvas.id = 'canvas' + page_index;

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

    <!--SCRIPT DE ADICIONALES Y PAGOS-->
    <script>        
        //TOTAL CONSUMO
        let TotalBase = parseFloat("{{ $order->Total }}");
        
        //Adicionales
        var discount = document.getElementById('discount');
        var discount_total = document.getElementById('discount_total');

        var tip_type = document.getElementById('tip_type');
        var tip      = document.getElementById('tip');
        var tip_total      = document.getElementById('tip_total');

        var delivery = document.getElementById('delivery');
        var delivery_total = document.getElementById('delivery_total');

        //FORMAS DE PAGOS
        var transfer    = document.getElementById('transfer');
        var debit_card  = document.getElementById('debit_card');
        var credit_card = document.getElementById('credit_card');
        var efective    = document.getElementById('efective');

        //PAGOS
        var pay_total   = document.getElementById('pay_total');
        var pay_back    = document.getElementById('pay_back');
        var pay_left    = document.getElementById('pay_left');
        
        //TODOS LOS CAMPOS RELACIONADOS CON DINERO AL CAMBIAR EJECUTAN LA FUNCION CALCULAR
        var dinero = document.querySelectorAll(".dinero");
        dinero.forEach(input =>input.onchange = calcular);


        function calcular(){
            //VALOR BASE
            var total_pay=TotalBase;

            //ADICIONALES------------------------------------------------

            //DESCUENTO
            var discount_ammount    = discount.value ? parseFloat(discount.value) : 0;
            total_pay = total_pay + discount_ammount
            discount_total.innerHTML = '$'+miles(total_pay);

            //PROPINA
            if(tip_type.value==-1){
                tip.readOnly=false;
            }else{
                tip.readOnly=true;
                tip.value = Math.round((tip_type.value/100) * total_pay);
            }
            var tip_ammount         = tip.value ? parseFloat(tip.value) : 0;
            total_pay = total_pay + tip_ammount
            tip_total.innerHTML = '$'+miles(total_pay);

            //DELIVERY
            var delivery_ammount    = delivery.value ? parseFloat(delivery.value) : 0;
            total_pay = total_pay + delivery_ammount
            delivery_total.innerHTML = '$'+miles(total_pay);

            //TOTAL A PAGAR
            pay_total.innerHTML = '$'+miles(total_pay);

            //FORMA DE PAGO----------------------------------------------------

            //TRANSFERENCIA
            var transfer_ammount = transfer.value ? parseFloat(transfer.value) : 0;
            total_pay = total_pay - transfer_ammount;

            //TRAJETA DE DEBITO
            var debit_card_ammount = debit_card.value ? parseFloat(debit_card.value) : 0;
            total_pay = total_pay - debit_card_ammount;

            //TRAJETA DE CREDITO
            var credit_card_ammount = credit_card.value ? parseFloat(credit_card.value) : 0;
            total_pay = total_pay - credit_card_ammount;

            //PAGO EFECTIVO
            var efective_ammount = efective.value ? parseFloat(efective.value) : 0;
            total_pay = total_pay - efective_ammount;

            if(total_pay<0){
                pay_back.innerHTML = '$'+miles(total_pay*-1);
            }else{
                pay_back.innerHTML = '$'+0;
            }
            
            if(total_pay>0){
                pay_left.innerHTML = '$'+miles(total_pay);
            }else{
                pay_left.innerHTML = '$'+0;
            }
        }

        function miles(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>


    <!--SCRIPT DE CLIENTES-->
    <script>
        var clients = [];
        var regions = [];
        var communes = [];

        var commune_select = document.getElementById('commune_select');
        var region_select = document.getElementById('region_select');
        var clientForm = document.getElementById('client-form');


        var client_name = document.getElementById('client_name');
        var client_phone = document.getElementById('client_phone');
        var client_commune = document.getElementById('client_commune');
        var client_address = document.getElementById('client_address');

        var rowselect = document.getElementsByClassName("bg-select");

        clientForm.onsubmit = function(e) {
            e.preventDefault();
            return false;
        }

        var clienttable;

        function rowStore(data) {
            var fila = clienttable.row("#" + data.id);
            if (fila.id()) {
                fila.data(data).draw(false);
            } else {
                clienttable.row.add(data).draw(false);
            }
            client_name.innerHTML = data.name;
            client_phone.innerHTML = data.phone;
            client_commune.innerHTML = data.commune.name;
            client_address.innerHTML = data.address;

            setSelectRow(clienttable.row("#" + data.id).node());

            $('#clientList').modal('hide');
        }

        function clientNew() {
            if (rowselect[0]) {
                rowselect[0].classList.remove('bg-select');
            }
            clientForm['region_id'].value = 7;
            comunaLoad();
            clientForm['name'].value = '';
            clientForm['phone'].value = '';
            clientForm['address'].value = '';
            clientForm['id'].value = '';
        }
        var loadclient = true;

        function clientStore() {
            if (
                clientForm['name'].value == '' ||
                clientForm['phone'].value == '' ||
                clientForm['address'].value == ''
            ) {
                alert("Falta Agregar Información");
            } else if (loadclient) {
                loadclient = false;
                var formData = new FormData(clientForm);
                $.ajax({
                    url: "{{ url('/clients/store') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false // tell jQuery not to set contentType
                }).done(function(data) {
                    if (typeof(data) == 'object') {
                        rowStore(data);
                    } else {
                        alert(data);
                    }
                }).fail(function() {
                    alert("error al recibir respuesta del servidor");
                }).always(function() {
                    loadclient = true;
                });
            }
        }

        function regionLoad() {
            regions.forEach(el => {
                var newoption = document.createElement('option');
                newoption.value = el.id;
                newoption.text = el.name;
                region_select.appendChild(newoption);
            });
        }

        region_select.onchange = comunaLoad;

        function comunaLoad() {
            var value = region_select.value;
            commune_select.innerHTML = '';
            communes.forEach(el => {
                if (el.region_id == value) {
                    var newoption = document.createElement('option');
                    newoption.value = el.id;
                    newoption.text = el.name;
                    commune_select.appendChild(newoption);
                }
            });
        }


        $('#clientButton').click(function() {
            $('#clientList').modal('show');
        });

        $(document).ready(function() {

            $.get("{{ url('clients/getdata') }}", function(data) {
                datos = JSON.parse(data);

                clients = datos.clients;
                regions = datos.regions;
                communes = datos.communes;
                regionLoad();
                region_select.value = 7;
                comunaLoad();

                clienttable = $('#tabla').DataTable({
                    scrollY: "35vh",
                    scrollCollapse: true,
                    paging: false,
                    fixedHeader: true,
                    info: false,
                    responsive: true,
                    data: clients,
                    rowId: 'id',
                    columns: [{
                            "data": "name",
                            "width": "30%"
                        },
                        {
                            "data": "commune.name",
                            "width": "20%"
                        },
                        {
                            "data": "address",
                            "width": "35%"
                        },
                        {
                            "data": "phone",
                            "width": "15%"
                        },
                    ],
                    language: {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
                        "zeroRecords": "No se encuentra ningun registro",
                        "info": "Pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros",
                        "infoFiltered": "(buscando entre _MAX_ registros)",
                        "search": "Filtrar Registros : &nbsp",
                        "processing": "Cargando...",
                        paginate: {
                            first: "Primera Pagina",
                            previous: "Anterior",
                            next: "Siguiente",
                            last: "Ultima"
                        },
                    },
                    order: [
                        [0, "desc"]
                    ],
                });

                @if ($order->client);
                    var fila = clienttable.row("#{{ $order->client->id }}");
                    if(fila.id()){
                    setSelectRow(fila.node());
                    }
                @endif
            });

            var primera = true;
            $('#clientList').on('shown.bs.modal', function() {
                if (primera) {
                    clienttable.columns.adjust().draw();
                    primera = false;
                }
                var rowpos = $('.bg-select').eq(0).position();
                if(rowpos){
                    $('.dataTables_scrollBody').eq(0).scrollTop(rowpos.top);
                }
            });


            $('#client-name').on('keyup', function() {
                if (clienttable.column(0).search() !== this.value) {
                    clienttable
                        .column(0)
                        .search(this.value)
                        .draw();
                }
            });

            $('#client-phone').on('keyup', function() {
                if (clienttable.column(3).search() !== this.value) {
                    clienttable
                        .column(3)
                        .search(this.value)
                        .draw();
                }
            });

            $('#tabla tbody').on('click', 'tr', function() {
                setSelectRow(this);
            });
        });

        function setSelectRow(rowElement) {
            if (rowselect[0]) {
                rowselect[0].classList.remove('bg-select');
            }
            rowElement.classList.add('bg-select');
            var client = clienttable.row(rowElement).data();
            clientForm['region_id'].value = client.commune.region_id;
            comunaLoad();
            clientForm['commune_id'].value = client.commune_id;
            clientForm['name'].value = client.name;
            clientForm['phone'].value = client.phone;
            clientForm['address'].value = client.address;
            clientForm['id'].value = client.id;
        }
    </script>
@stop
