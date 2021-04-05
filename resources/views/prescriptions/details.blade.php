@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Receta
        </h1>
        <form method="post" action="{{url('/prescriptions/'.$prescription->id.'/update')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$prescription->description}}">
            </div>
            <button type="submit" class="btn btn-warning ">
                <i class="material-icons">done</i>
                Editar Receta
            </button>
            <a  href="{{url('/prescription/'.$prescription->id.'/delete')}}" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Receta
            </a>
            <a class="btn btn-success" data-toggle="modal" data-target="#prescriptiondetail-modal">
                <i class="material-icons">clear</i>
                Agregar Receta
            </a>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="prescriptiondetail-modal" tabindex="-1" data-backdrop="static" aria-labelledby="ModalLabel" aria-hidden="true" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <form id="prescriptiondetailForm">
                    {{csrf_field()}}
                    <input type="hidden" name='prescription_id' value={{$prescription->id}}>
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
                    <div class="modal-footer d-flex justify-content-between">
                        <button data-dismiss="modal"    class="btn btn-danger"  >
                            <i class="material-icons">close</i>
                            Cancelar
                        </button>
                        <button type="submit"           class="btn btn-success" >
                            <i class="material-icons">add</i>
                            Agregar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var itemsList = document.getElementById('itemsList');
        var prescriptiondetail_id = document.getElementById('prescriptiondetail_id');
        var unidad = document.getElementById('unidad');
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
            var urlaux = '/create';
            if(prescriptiondetail_id.value!=''){
                urlaux = '/update';
            }
            $.ajax({
                url: "{{url('/prescriptiondetails')}}"+urlaux,
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                if(typeof(data)=='object'){
                    console.log(data);
                    if(data.id){
                        //window.location.href = "{{url('/app/prescriptions/'.$prescription->id)}}";
                    }
                    $('#prescriptiondetail-modal').modal('hide');
                }else{
                    alert(data);
                }
            }).fail(function() {
                alert( "error al recibir respuesta del servidor" );
            });
            e.preventDefault();
            return false;
        };
    </script>

@stop