@extends('templates.maincontainer')

@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">library_books</i>Detalles de la  Categoria
    </h1>
    <form method="post" action="{{url('app/producttypes/'.$producttype->id.'/edit/process')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nombre </label>
            <input type="text" class="form-control" name="name"         value="{{$producttype->name}}"  required >
        </div>
        <div class="form-group">
            <label>Descripión</label>
            <input type="text" class="form-control" name="description"  value="{{$producttype->description}}">
        </div>
        <button type="submit" class="btn btn-danger">
            <i class="material-icons">done</i>
            Editar Categoria
        </button>
        <a href="{{ url('/') }}/app/producttypes/{{$producttype->id}}/delete" class="btn btn-warning">
            <i class="material-icons">clear</i>
            Eliminar Categoria
        </a>
    </form>
</div>
@stop