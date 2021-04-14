@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Pedido
        </h1>
        <form method="post" action="{{url('app/users/'.$user->id.'/edit/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nombre Cliente</label>
                <input required type="text" class="form-control" name="name" value="{{$client->name}}">
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" name="address"  value="{{$client->address}}">
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="phone"  value="{{$client->phone}}">
            </div>
            <div class="form-group">
                <label for="commune_id">Comuna:</label>
                <select name="commune_id" id="commune_id" class="form-control" >
                    @forelse($communes as $commune)
                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                    @empty
                    <li>Aun no hay Comunas</li>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="region_id">:</label>
                <select name="region_id" id="region_id" class="form-control" >
                    @forelse($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @empty
                    <li>Aun no hay Regiones</li>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Pedido
            </button>
            <a  href="{{ url('/') }}/app/clients/{{$client->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Pedido
            </a>
        </form>

    </div>
@stop