@extends('templates.maincontainer')

@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Agregar Pedido
    </h1>
    <form method="post" action="{{url('app/users/add/process')}}" id="form">
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
      <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Comuna</label>
      <input type="text" class="form-control"  placeholder="Comuna" name="commune" id="commune" required>
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