@extends('templates.maincontainer')

@section('content')

<form method="post" class="pt-5 pl-5 col-7" action="{{url('app/products/add/process')}}" id="form">
  {{csrf_field()}}
 
        <label for="producttype_id">Categoria:</label>
        <select name="producttype_id" id="producttype_id">
            @forelse($producttypes as $producttype)
            <option value="{{ $producttype->id }}">{{ $producttype->name }}</option>
            @empty
            <li>Aun no hay Categorias</li>
            @endforelse
        </select>
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Producto</label>
    <input type="text" class="form-control" placeholder="Nombre producto" name="name" id="name" required>
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Descripción</label>
    <input type="text" class="form-control" placeholder="Descripción" name="description" id="description">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Precio</label>
    <input type="text" class="form-control"  placeholder="Precio" name="price" id="price" required>
    
  </div>
  <label for="product">Estado:</label>
                
  <select name="product" id="enabled">
        <option value="1">Habilitado</option>
        <option value="0">Desabilitado</option>
   </select>

<button type="submit" class="btn btn-danger ml-2"><i class="fa fa-check"></i>Guardar</button>

</form>
@stop