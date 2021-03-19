@extends('templates.maincontainer')

@section('content')
<div class="box pt-5 pl-5">


        <div class="box-body">
            <h2 class="page-header">
              <i class="fa fa-star"></i> Lista de Unidades de Medida
         </h2>
                <div>
                 <a  href="{{ url('/') }}/app/measureunits/add" class="btn btn-danger"><i class="fa fa-plus"></i>Crear Nueva Unidad de Medida</a>
              </div>       
      </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col-12 text-center ">
            <h1>Lista de Unidades de Medida</h1>

            <ul class="list-group">
                @forelse($measureunits as $measureunit)
                <li class="list-group-item"><a href="{{ route('measureunits.details', $measureunit) }}">{{ $measureunit->name }}</a></li>
             
                @empty
                <li>No hay Unidades de Medida para mostrar</li>
                @endforelse
                {{ $measureunits->links() }}
            </ul>
        </div>
    </div>
</div>

  
 @stop