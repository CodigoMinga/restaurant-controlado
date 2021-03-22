@extends('templates.maincontainer')

@section('content')

<form method="post" class="pt-5 pl-5 col-7" action="{{url('app/products/add/process')}}" id="form">
  {{csrf_field()}}
  <label for="company_id">Empresa:</label>
          <select name="company_id" id="company_id">
              @forelse($companys as $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
              @empty
              <li>Aun no hay locales</li>
              @endforelse
          </select>
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Producto</label>
    <input type="text" class="form-control" id="name" placeholder="Nombre producto">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="description" placeholder="Descripción">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Precio</label>
    <input type="text" class="form-control" id="price" placeholder="Precio">
    
  </div>
  <label for="product">Estado:</label>
                
  <select name="product" id="enabled">
        <option value="1">Habilitado</option>
        <option value="0">Desabilitado</option>
   </select>

<button type="submit" class="btn btn-danger ml-2"><i class="fa fa-check"></i>Guardar</button>

</form>
@stop