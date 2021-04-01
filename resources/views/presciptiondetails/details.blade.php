@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles de Receta
        </h1>
        <form method="post" action="{{url('app/prescriptiondetails/'.$prescriptiondetail->id.'/edit/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Catidad de Insumo</label>
                <input required type="decimal" class="form-control" name="name" value="{{$product->name}}">
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
            <i class="material-icons pt-5">library_books</i>Recetas de <span>{{$product->name}}</span>
        </h1>
          
    <ul>
        @foreach($prescriptions as $prescription)
            
        <li class="list-group-item "><a href="#">{{ $prescription->description}}</a></li>
               

        @endforeach

        {{$prescriptions->links() }}
    </ul>
    <a  href="{{ url('/') }}/app/products/{{$product->id}}/prescriptions/add" class="btn btn-success">
                <i class="material-icons">clear</i>
                Agregar Receta
            </a>
    </div>
    
@stop