@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Producto
        </h1>
        <form method="post" action="{{url('app/products/'.$product->id.'/edit/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nombre Producto</label>
                <input required type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$product->description}}">
            </div>
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Producto
            </button>
            <a  href="{{ url('/') }}/app/products/{{$product->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Producto
            </a>
        </form>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>
                <i class="material-icons">list_alt</i>Receta
            </h1>            
            <a data-toggle="modal" data-target="#prescription-modal" class="btn btn-success">
                <i class="material-icons">add</i>
                Agregar Receta
            </a>
        </div>
        <ul>
            @foreach($prescriptions as $prescription)
            <li><a href="{{ route('prescriptions.details', $prescription) }}">{{$prescription->description}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="prescription-modal" tabindex="-1" data-backdrop="static" aria-labelledby="ModalLabel" aria-hidden="true" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <form id="prescriptionForm">
                    {{csrf_field()}}
                    <input type="hidden" name='product_id' value={{$product->id}}>
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Agregar Receta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre Receta</label>
                            <input required type="text" class="form-control" name="description">
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
        var prescriptionForm = document.getElementById('prescriptionForm');
        prescriptionForm.onsubmit = function(e){
            var formData = new FormData(prescriptionForm);
            $.ajax({
                url: "{{url('/prescriptions/create')}}",
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                if(typeof(data)=='object'){
                    if(data.id){
                        window.location.href = "{{url('/app/products/'.$product->id)}}";
                    }
                    $('#protuct-modal').modal('hide');
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