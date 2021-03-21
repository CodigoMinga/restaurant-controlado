@extends('templates.maincontainer')

@section('content')
<div class="box pt-5 pl-5">


        <div class="box-body">
            <h2 class="page-header">
              <i class="fa fa-star"></i> Lista de Categorias
         </h2>
                <div>
                 <a  href="{{ url('/') }}/app/producttypes/add" class="btn btn-danger"><i class="fa fa-plus"></i>Crear Nueva Categoria</a>
              </div>       
      </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col-12 text-center ">
            <h1>Lista de Categorias</h1>

            <ul class="list-group">
                @forelse($producttypes as $producttype)
                <li class="list-group-item"><a href="{{ route('producttypes.details', $producttype) }}">{{ $producttype->name }}</a></li>
             
                @empty
                <li>No hay Categorias para mostrar</li>
                @endforelse
                {{ $producttypes->links() }}
            </ul>
        </div>
    </div>
</div>

  
 @stop