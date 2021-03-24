@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">add_box</i>Agregar Categoria
        </h1>
        <form method="post" action="{{url('app/producttypes/add/process')}}" id="form">
            {{csrf_field()}}
            <div class="form-group">
            <label for="company_id">Empresa:</label>
                <select name="company_id" id="company_id" class="form-control">
                    @forelse($companys as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @empty
                    <li>Aun no hay locales</li>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input required type="text" class="form-control" placeholder="Nombre" name="name" value="">
            </div>
            
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" placeholder="Descripción" name="description" value="">
            </div>

            <div class="form-group">
                <label for="producctype">Estado:</label>
                <select name="producctype" id="enabled"  class="form-control">
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