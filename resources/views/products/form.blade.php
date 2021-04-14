@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            @if ($product->id)
                <i class="material-icons">edit</i>Editar Producto
            @else
                <i class="material-icons">add_box</i>Agregar Producto
            @endif
        </h1>

        <form method="post" action="{{url('products/process')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $product->id }}">
            @if (!$product->id)
                <div class="form-group">
                    <label for="producttype_id">Categoria:</label>
                    <select name="producttype_id" id="producttype_id" class="form-control">
                        @foreach($producttypes as $producttype)
                            <option value="{{ $producttype->id }}" {{$product->producttype_id==$producttype->id ? 'selected' : ''}}>{{ $producttype->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group">
                <label>Nombre Producto</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$product->description}}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2" class="form-label">Precio</label>
                <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
            </div>
            <br>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                @if ($product->id)
                <a href="{{ url('/producttypes') }}/{{ $product->id }}/delete" class="btn btn-danger">
                    <i class="material-icons">close</i>
                    Eliminar
                </a>
                @endif
            </div>
        </form>
    </div>

    @if ($product->id)
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
            @foreach($product->prescriptions as $prescription)
                @if($prescription->enabled==1)
                    <li><a href="{{url('prescriptions')}}/{{$prescription->id}}">{{$prescription->description}}</a></li>
                @endif
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
                url: "{{url('/prescriptions/store')}}",
                type: "POST",
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                if(typeof(data)=='object'){
                    if(data.id){
                        window.location.href = "{{url('products/'.$product->id)}}";
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
    @endif
@stop