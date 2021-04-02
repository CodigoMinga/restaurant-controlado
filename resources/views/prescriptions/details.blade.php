@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Receta
        </h1>
        <form method="post" action="{{url('/app/products/'.$product->id.'/prescriptions/edit/process')}}">
            {{csrf_field()}}
            
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$prescription->description}}">
            </div>
            <button type="submit" class="btn btn-warning ">
                <i class="material-icons">done</i>
                Editar Receta
            </button>
            <a  href="{{ url('/') }}/app/products/'.$product->id.'/prescriptions/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Receta
            </a>
            <a  href="{{ url('/') }}/app/products/'.$product->id.'/prescriptions/add" class="btn btn-success">
                <i class="material-icons">clear</i>
                Agregar Receta
            </a>
        </form>

    </div>
@stop