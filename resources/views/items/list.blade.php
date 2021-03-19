@extends('templates.maincontainer')

@section('content')
<div class="box pt-5 pl-5">


        <div class="box-body">
            <h2 class="page-header">
              <i class="fa fa-star"></i> Lista de Insumos
         </h2>
                <div>
                 <a  href="{{ url('/') }}/app/items/add" class="btn btn-danger"><i class="fa fa-plus"></i>Crear Nuevo Insumo</a>
              </div>       
      </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col-12 text-center ">
            <h1>Lista de Insumos</h1>

            <ul class="list-group">
                @forelse($items as $item)
                <li class="list-group-item"><a href="{{ route('items.details', $item) }}">{{ $item->name }}</a></li>
             
                @empty
                <li>No hay Insumos para mostrar</li>
                @endforelse
                {{ $item->links() }}
            </ul>
        </div>
    </div>
</div>

  
 @stop