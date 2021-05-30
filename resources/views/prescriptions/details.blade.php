@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Receta
        </h1>
        <form method="post" action="{{url('/prescriptions/store')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$prescription->id}}">
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$prescription->description}}">
            </div>
            
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success ">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                <a  href="{{url('/prescriptions/'.$prescription->id.'/delete')}}" class="btn btn-danger">
                    <i class="material-icons">clear</i>
                    Eliminar
                </a>
            </div>
        </form>

        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1>
                <i class="material-icons">list_alt</i>Lista de Ingredientes
            </h1>        
            <a class="btn btn-success" onclick="prescriptiondetailsNew({{$prescription->id}})">
                <i class="material-icons">add</i>
                Agregar Ingrediente
            </a>
        </div>
        <table class="table table-dark table-sm">
            <thead>
                <tr>
                    <th>
                        Ingregiente
                    </th>
                    <th>
                        Cant.
                    </th>
                    <th width="1">
                        Ver
                    </th>
                </tr>
            </thead>
            <tbody id="Ingredientes">
                @foreach ($prescription->prescriptiondetails as $prescriptiondetail)
                    <tr prescriptiondetail_id="{{$prescriptiondetail->id}}">
                        <td>
                            {{$prescriptiondetail->item->name}}
                        </td>
                        <td>
                            {{$prescriptiondetail->quantity}} {{$prescriptiondetail->item->measureunit->name}} 
                        </td>
                        <td>
                            <a onclick="prescriptiondetails({{$prescriptiondetail->id}})" class="btn btn-light material-icons">description</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="prescriptiondetail-modal" tabindex="-1" data-backdrop="static" aria-labelledby="ModalLabel" aria-hidden="true" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <form id="prescriptiondetailForm">
                    {{csrf_field()}}
                    <input type="hidden" name='prescription_id' value=''>
                    <input type="hidden" name='id' value='3' id="prescriptiondetail_id">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Agregar Ingrediente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body form-row">
                        <div class="form-group col-12 col-sm-6">
                            <label>Ingrediente</label>
                            <select name="item_id" id="itemsList" class="form-control" required>
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Cantidad</label>
                            <div class="input-group">                 
                                <input type="number" class="form-control" name="quantity" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="unidad"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between flex-row-reverse">
                        <button type="submit"           class="btn btn-success" >
                            <i class="material-icons">add</i>
                            Guardar
                        </button>
                        <a class="btn btn-danger"  id="eliminar" onclick="prescriptiondetailDelete()">
                            <i class="material-icons">close</i>
                            Eliminar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var Ingredientes = document.getElementById('Ingredientes');
        var itemsList = document.getElementById('itemsList');
        var prescriptiondetail_id = document.getElementById('prescriptiondetail_id');
        var unidad = document.getElementById('unidad');

        var eliminar = document.getElementById('eliminar');
        
        var items = {!! json_encode($items) !!};
        var measureunits = {!! json_encode($measureunits) !!};

        itemsList.onchange = function(){
            var item = items.find(e => e.id==this.value);
            var measureunit = measureunits.find(e => e.id == item.measureunit_id);
            unidad.innerHTML=measureunit.name;
        } 

        items.forEach(item => {
            newoption = document.createElement('option');
            newoption.value = item.id;
            newoption.text = item.name;
            itemsList.appendChild(newoption);
        });

        var prescriptiondetailForm = document.getElementById('prescriptiondetailForm');
        prescriptiondetailForm.onsubmit = function(e){
            var formData = new FormData(prescriptiondetailForm);
            $.ajax({
                url: "{{url('/prescriptiondetails/store')}}",
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                if(typeof(data)=='object'){
                    console.log(data);
                    if(data.id){
                        if(prescriptiondetail_id.value!=''){
                            prescriptiondetailUpdate(data);
                            toastSuccess('Ingrediente actualizado en la Receta');
                        }else{
                            prescriptiondetailAdd(data);
                            toastSuccess('Ingrediente agregado a la Receta');
                        }
                    }
                    $('#prescriptiondetail-modal').modal('hide');
                }else{
                    toastError("Error al agregar ingrediente");
                }
            }).fail(function() {
                toastError( "error al recibir respuesta del servidor" );
            });
            e.preventDefault();
            return false;
        };

        function prescriptiondetails(id){
            $.get( "{{url('prescriptiondetails')}}/"+id, function( data ) {

                prescriptiondetailForm.id.value=data.id;
                prescriptiondetailForm.prescription_id.value=data.prescription_id;
                prescriptiondetailForm.item_id.value=data.item_id;
                prescriptiondetailForm.quantity.value=data.quantity;
                eliminar.style.display='block';
                var item = items.find(e => e.id==data.item_id);
                var measureunit = measureunits.find(e => e.id == item.measureunit_id);
                unidad.innerHTML=measureunit.name;

                $('#prescriptiondetail-modal .modal-title').eq(0).html('Editar Ingrediente');
                $('#prescriptiondetail-modal').modal('show');
            });
        }
        
        function prescriptiondetailsNew(prescription_id){
            prescriptiondetailForm.prescription_id.value=prescription_id;
            prescriptiondetailForm.id.value='';
            prescriptiondetailForm.item_id.value='';
            prescriptiondetailForm.quantity.value='';
            eliminar.style.display='none';
            $('#prescriptiondetail-modal .modal-title').eq(0).html('Agregar Ingrediente');
            $('#prescriptiondetail-modal').modal('show');
        }

        function prescriptiondetailDelete(){
            var id = prescriptiondetail_id.value
            $.get( "{{url('prescriptiondetails')}}/"+id+"/delete", function( data ) {
                if(typeof(data)=='object'){
                    prescriptiondetailUpdate(data);                
                    toastSuccess('Ingrediente eliminado de la Receta');
                }else{
                    toastError("Error al eliminar ingrediente");
                }
                $('#prescriptiondetail-modal').modal('hide');
            });
        }

        function prescriptiondetailAdd(prescriptiondetail){
            var newtr = prescriptiondetailFila(prescriptiondetail);
            Ingredientes.appendChild(newtr);
        }

        
        function prescriptiondetailUpdate(prescriptiondetail){
            var filas = Array.from(Ingredientes.children);
            filas.forEach(fila => {
                if(fila.getAttribute('prescriptiondetail_id')==prescriptiondetail.id){
                    if(prescriptiondetail.enabled){
                        Ingredientes.replaceChild(prescriptiondetailFila(prescriptiondetail), fila);
                    }else{
                        Ingredientes.removeChild(fila);
                    }
                }
            });
        }

        function prescriptiondetailFila(prescriptiondetail){
            var newtr = document.createElement('tr');
            newtr.setAttribute('prescriptiondetail_id', prescriptiondetail.id);

            var newtd = document.createElement('td');
            newtd.innerText = prescriptiondetail.item.name;
            newtr.appendChild(newtd);
            
            newtd = document.createElement('td');
            newtd.innerText = parseFloat(prescriptiondetail.quantity).toFixed(2)+" "+prescriptiondetail.item.measureunit.name;
            newtr.appendChild(newtd);

            newtd = document.createElement('td');

            var newbutton = document.createElement('a');
            newbutton.classList.add('btn');
            newbutton.classList.add('btn-light');
            newbutton.classList.add('material-icons');
            newbutton.innerHTML='description';
            newbutton.onclick = prescriptiondetails(prescriptiondetail.id);
            newbutton.setAttribute('onclick','prescriptiondetails('+prescriptiondetail.id+')'); 
            newtd.appendChild(newbutton);

            newtr.appendChild(newtd);

            return newtr;
        }
    </script>

@stop