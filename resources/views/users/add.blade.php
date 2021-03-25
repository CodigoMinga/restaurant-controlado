@extends('templates.maincontainer')

@section('content')
  <div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Agregar Usuario
    </h1>
    <form method="post" action="{{url('app/users/add/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Usuario</label>
      <input type="text" class="form-control" placeholder="Nombre Usuario" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Email</label>
      <input type="text" class="form-control" placeholder="Email" name="email" id="email" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Password</label>
      <input type="text" class="form-control"  placeholder="Password" name="password" id="password" required>
    </div>

    <div class="form-group">
      <label for="user">Estado:</label>
      <select name="user" id="enabled" class="form-control" >
            <option value="1">Habilitado</option>
            <option value="0">Desabilitado</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success btn-lg btn-block">
        <i class="material-icons">done</i>
        Guardar
    </button>
    </form>
  </div>
@stop