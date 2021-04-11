@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            @if ($item->id)
                <i class="material-icons">description</i>Modificar de Insumos
            @else
                <i class="material-icons">add_box</i>Agregar de Insumos
            @endif
        </h1>
        <form method="post" action="{{ url('items/process') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->id }}">
            @if (count($companys) > 1)
                <div class="form-group">
                    <label for="company_id">Empresa:</label>
                    <select name="company_id" id="company_id">
                        @foreach ($companys as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <input type="hidden" name="company_id" value="{{ $companys[0]->id }}">
            @endif
            <div class="form-group">
                <label>Nombre </label>
                <input required type="text" class="form-control" name="name" value="{{ $item->name }}">
            </div>

            <div class="form-group">
                <label>Descripión</label>
                <input required type="text" class="form-control" name="description" value="{{ $item->description }}">
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-sm-6">
                    <label>Stock</label>
                    <input required type="decimal" class="form-control" name="stock" value="{{ $item->stock }}">
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="measureunit_id">Unidad de Media:</label>
                    <select name="measureunit_id" id="measureunit_id" class="form-control">
                        @foreach ($measureunits as $measureunit)
                            <option value="{{ $measureunit->id }}" {{$measureunit->id==$item->measureunit_id ? 'selected' : ''}}>{{ $measureunit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-sm-6">
                    <label>Cuidado</label>
                    <input required type="decimal" class="form-control" name="warning" value="{{ $item->warning }}">
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label>Alerta</label>
                    <input required type="text" class="form-control" name="alert" value="{{ $item->alert }}">
                </div>
            </div>
            <br>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                @if ($item->id)
                <a href="{{ url('/items') }}/{{ $item->id }}/delete" class="btn btn-danger">
                    <i class="material-icons">close</i>
                    Eliminar
                </a>
                @endif
            </div>
        </form>
    </div>
@stop
