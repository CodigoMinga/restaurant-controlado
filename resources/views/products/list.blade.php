@extends('templates.maincontainer')

@section('content')

<div class="container ">
<div class="row">
    <div class="col-12 text-center ">
        <h1>Lista de Productos</h1>
        <div style="text-align: left">
            <a  href="{{ url('/') }}/app/products/add" class="btn btn-danger" ><i class="fa fa-plus"></i>Agregar Nuevo Producto</a>
            <a  href="{{ url('/') }}/app/products/details" class="btn btn-danger" ><i class="fa fa-plus"></i>Editar</a>

         </div>     
        <ul class="list-group">
            @forelse($products as $product)
            <li class="list-group-item"><a href="{{ url('/') }}/app/products/details">{{ $product->name }}</a></li>
         
            @empty
            <li>No hay ordenes para mostrar</li>
            @endforelse
            
            {{ $products->links() }}
            
        </ul>
    </div>
</div>
</div>
@stop