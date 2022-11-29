@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles de la Compañia
        </h1>
        <form method="post" action="{{url('app/companys/'.$company->id.'/edit/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nombre Compañia</label>
                <input required type="text" class="form-control" name="name" value="{{$company->name}}">
            </div>
            <div class="form-group">
                <label>Rut</label>
                <input type="text" class="form-control" name="rut"  value="{{$company->rut}}">
            </div>
            <div class="form-group">
                <label>Razon Social</label>
                <input type="text" class="form-control" name="razon_social"  value="{{$company->razon_social}}">
            </div>
            <div class="form-group">
                <label>Giro</label>
                <input type="text" class="form-control" name="giro"  value="{{$company->giro}}">
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-sm-6 mb-2">
                    <label class="mb-1">Región</label>
                    <select class="custom-select custom-select-sm" name="region_id" id="region_select">
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6 mb-2">
                    <label class="mb-1">Comuna</label>
                    <select class="custom-select custom-select-sm" name="commune_id" id="commune_select">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion"  value="{{$company->direccion}}">
            </div>
            <div class="form-group">
                <label>Factura</label>
                <input type="text" class="form-control" name="api_key_openfactura"  value="{{$company->api_key_openfactura}}">
            </div>
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Compañia
            </button>
            <a  href="{{ url('/') }}/app/companys/{{$company->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Compañia
            </a>
        </form>

    </div>
@stop