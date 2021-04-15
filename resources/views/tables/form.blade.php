@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            @if ($table->id)
                <i class="material-icons">edit</i>Editar Mesa
            @else
                <i class="material-icons">add_box</i>Agregar Mesa
            @endif
        </h1>

        <form method="post" action="{{url('tables/process')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $table->id }}">
            @if (!$table->id)
                <div class="form-group">
                    <label for="tabletype_id">Tipo de Mesa:</label>
                    <select name="tabletype_id" id="tabletype_id" class="form-control">
                        @foreach($tabletypes as $tabletype)
                            <option value="{{ $tabletype->id }}" {{$table->tabletype_id==$tabletype->id ? 'selected' : ''}}>{{ $tabletype->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group">
                <label>Nombre Mesa</label>
                <input type="text" class="form-control" name="name" value="{{$table->name}}" required>
            </div>
            <div class="form-group">
                <label>URl de Imagen de Mesa</label>
                <input type="text" class="form-control" name="image" value="{{$table->image}}" >
            </div>

            <br>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                @if ($table->id)
                <a href="{{ url('/tabletypes') }}/{{ $table->id }}/delete" class="btn btn-danger">
                    <i class="material-icons">close</i>
                    Eliminar
                </a>
                @endif
            </div>
        </form>
    </div>
@stop