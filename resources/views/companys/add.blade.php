@extends('templates.maincontainer')

@section('content')

<form method="post" class="pt-5 pl-5 col-7" action="{{url('app/companys/add/process')}}" id="form">
  {{csrf_field()}}
 
      

<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Compañia</label>
    <input type="text" class="form-control" placeholder="Nombre Compañia" name="name" id="name" required>
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Rut</label>
    <input type="text" class="form-control" placeholder="Rut" name="rut" id="rut" required>
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Razon Social</label>
    <input type="text" class="form-control"  placeholder="Razon Social" name="razon_social" id="razon_social" required>
    
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Giro</label>
    <input type="text" class="form-control"  placeholder="Giro" name="giro" id="giro" required>
    
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Dirección</label>
    <input type="text" class="form-control"  placeholder="Dirección" name="direccion" id="direccion" required>
    
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Comuna</label>
    <input type="text" class="form-control"  placeholder="COmuna" name="comuna" id="comuna" required>
    
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Factura</label>
    <input type="text" class="form-control"  placeholder="Factura" name="api_key_openfactura" id="api_key_openfactura" required>
    
  </div>
  <label for="company">Estado:</label>
                
  <select name="company" id="enabled">
        <option value="1">Habilitado</option>
        <option value="0">Desabilitado</option>
   </select>

<button type="submit" class="btn btn-danger ml-2"><i class="fa fa-check"></i>Guardar</button>

</form>
@stop