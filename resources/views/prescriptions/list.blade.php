@extends('templates.maincontainer')

@section('content')
<div class="pt-5 pl-5">
        <div>
            <h2>
               Lista de Recetas
            </h2>
                 
      </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col-12 text-center ">
            <h1>Lista de Recetas</h1>

            <ul class="list-group">
                @forelse($prescriptions as $prescription)
                <li class="list-group-item"><a href="{{ route('prescriptions.details', $prescriptions, $product) }}">{{ $product->name }}{{$prescription->description}}</a></li>
             
                @empty
                <li>No hay Recetas para mostrar</li>
                @endforelse
                {{ $prescriptions->links() }}
            </ul>
        </div>
    </div>
</div>

  
 @stop