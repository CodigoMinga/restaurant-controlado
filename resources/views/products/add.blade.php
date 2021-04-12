@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">add_box</i>Agregar Producto
        </h1>
        <form method="post" action="{{ url('products/add/process') }}" id="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="producttype_id">Categoria:</label>
                <select name="producttype_id" id="producttype_id" class="form-control">
                    @forelse($producttypes as $producttype)
                        <option value="{{ $producttype->id }}">{{ $producttype->name }}</option>
                    @empty
                        <li>Aun no hay Categorias</li>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput" class="form-label">Producto</label>
                <input type="text" class="form-control" placeholder="Nombre producto" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput" class="form-label">Descripción</label>
                <input type="text" class="form-control" placeholder="Descripción" name="description" id="description">
            </div>

<<<<<<< HEAD
    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Precio</label>
      <input type="text" class="form-control"  placeholder="Precio" name="price" id="price" required>
    </div>
    
    <div class="form-group">
      <label for="product">Estado:</label>
      <select name="product" id="enabled" class="form-control" >
            <option value="1">Habilitado</option>
            <option value="0">Desabilitado</option>
      </select>
=======
            <div class="form-group">
                <label for="formGroupExampleInput2" class="form-label">Precio</label>
                <input type="text" class="form-control" placeholder="Precio" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label for="product">Estado:</label>
                <select name="product" id="enabled" class="form-control">
                    <option value="1">Habilitado</option>
                    <option value="0">Desabilitado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">
                <i class="material-icons">done</i>
                Guardar
            </button>
        </form>
>>>>>>> roberto
    </div>
@stop
