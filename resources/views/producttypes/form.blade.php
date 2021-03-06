@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            @if ($producttype->id)
                <i class="material-icons">edit</i>Editar Categoria
            @else
                <i class="material-icons">add_box</i>Agregar Categoria
            @endif
        </h1>
        <form method="post" action="{{url('producttypes/process')}}" id="form">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $producttype->id }}">
            @if (!$producttype->id)
                @if(count($companys)>1)
                <div class="form-group">
                    <label for="company_id">Restoran:</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companys as $company)
                        <option value="{{ $company->id }}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                @else
                <input type="hidden" name="company_id" value="{{$companys[0]->id}}">
                @endif
            @endif
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{$producttype->name}}"  required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" placeholder="Descripción" name="description" value="{{$producttype->description}}">
            </div>
            <br>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                @if ($producttype->id)
                <a href="{{ url('/producttypes') }}/{{ $producttype->id }}/delete" class="btn btn-danger">
                    <i class="material-icons">close</i>
                    Eliminar
                </a>
                @endif
            </div>
        </form>
    </div>
 @stop