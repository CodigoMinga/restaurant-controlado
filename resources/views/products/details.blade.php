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

    <div class="container pt-3">
        <h1>
            <i class="material-icons pt-5">library_books</i>Receta de <span>{{$product->name}}</span>
        </h1>
        
            <a  href="{{ url('/') }}/app/products/{{$product->id}}/prescriptions/add" class="btn btn-success">
                <i class="material-icons">clear</i>
                Agregar Receta
            </a>
          
    <ul>
        @foreach($prescriptions as $prescription)
            
        <li class="list-group-item"><a href="#">{{ $prescription->description}}</a></li>
               

        @endforeach

        {{$prescriptions->links() }}
    </ul>
    </div>
@stop