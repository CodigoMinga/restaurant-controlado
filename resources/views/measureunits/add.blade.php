@extends('templates.maincontainer')

@section('content')
    <h2 class="pt-5 pl-5 page-header">
        <i class="fa fa-pencil"></i> Agregar Unidad de Medida
    </h2>
    
    <form method="post" class="pt-5 pl-5 col-7" action="{{url('measureunits/add/process')}}" id="form">
        {{csrf_field()}}
       
        <label for="company_id">Empresa:</label>
        <select name="company_id" id="company_id">
            @forelse($companys as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @empty
            <li>Aun no hay Empresas</li>
            @endforelse
        </select>
        
        <div class="form-group has-feedback ">
            <input required type="text" class="form-control" placeholder="Nombre" name="name" value="">
            <span class="fa fa-tag form-control-feedback"></span>
        </div>
        
        <div class="form-group has-feedback ">
            <input type="text" class="form-control" placeholder="Descripción" name="description" value="">
            <span class="fa fa-tag form-control-feedback"></span>
        </div>
        
        
        <button type="submit" class="btn btn-danger ml-2"><i class="fa fa-check"></i>Guardar</button>
        
    </form>
 @stop