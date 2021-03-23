@extends('templates.maincontainer')

@section('content')
    <h2 class="pt-5 pl-5 page-header">
        <i class="fa fa-pencil"></i> Agregar Receta 
    </h2>
    
    <form method="post" class="pt-5 pl-5 col-7" action="{{url('app/prescriptions/add/process')}}" id="form">
        {{csrf_field()}}

        <label for="product_id">Producto:</label>
        <select name="product_id" id="product_id">
            @forelse($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @empty
            <li>Aun no hay Productos</li>
            @endforelse
        </select>
             
        <div class="form-group has-feedback ">
            <input type="text" class="form-control" placeholder="Descripción" name="description" value="">
            <span class="fa fa-tag form-control-feedback"></span>
        </div>
              
        <button type="submit" class="btn btn-danger ml-2"><i class="fa fa-check"></i>Guardar</button>
        
    </form>
 @stop