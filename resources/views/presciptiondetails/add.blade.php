@extends('templates.maincontainer')

@section('content')
    <h2 class="pt-5 pl-5 page-header">
        <i class="fa fa-pencil"></i> Agregar Insumos a Receta
    </h2>
    <form method="post" class="pt-5 pl-5 col-7" action="{{url('prescriptions/.'$prescription->id'./prescriptiondetails/.'prescriptiondetails->id'./add/process')}}" id="form">
        {{csrf_field()}}
        <label for="item_id">Insumo:</label>
        
            @forelse($items as $item)
            <input type="checkbox" id="item" name="item" value="{{ $item->id }}">
            <label for="item">{{ $item->name }}</label><br>
            <div class="form-group has-feedback ">
            <input required type="decimal" class="form-control" placeholder="Cantidad" name="quantity" value="">
            <span class="fa fa-tag form-control-feedback"></span>
        </div>
            @empty
            <li>Aun no hay Empresas</li>
            @endforelse
        
      
        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>Guardar</button>
        
    </form>
@stop