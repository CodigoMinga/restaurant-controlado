@extends('templates.maincontainer')

@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Agregar Cliente
    </h1>
    <form method="post" action="{{url('app/clients/add/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
        <label for="formGroupExampleInput" class="form-label">Teléfono</label>
        <input type="text" class="form-control" placeholder="Telefono" name="phone" id="phone" required>
      </div>
    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Direccion</label>
      <input type="text" class="form-control" placeholder="direccion" name="address" id="address" required>
    </div>


    <div class="form-group">
      <label for="region_id">Region:</label>
      <select name="region_id" id="region_id" class="form-control" >
          @forelse($regions as $region)
          <option value="{{ $region->id }}">{{ $region->name }}</option>
          @empty
          <li>Aun no hay Regiones</li>
          @endforelse
      </select>
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
  


    <button type="submit" class="btn btn-success btn-lg btn-block">
        <i class="material-icons">done</i>
        Guardar
    </button>
    </form>
  </div>
  @stop