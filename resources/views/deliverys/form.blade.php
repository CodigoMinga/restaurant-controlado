@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            @if ($delivery->id)
                <i class="material-icons">edit</i>Editar Delivery
            @else
                <i class="material-icons">add_box</i>Agregar Delivery
            @endif
        </h1>

        <form method="post" action="{{url('deliverys/process')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $delivery->id }}">
            @if (!$delivery->id)
            <input type="hidden" name="company_id" value="{{session('company')->id }}">
            @endif
            <div class="form-group">
                <label>Costo</label>
                <input type="number" class="form-control" name="ammount" value="{{$delivery->ammount}}" required>
            </div>
            <div class="form-group">
                <label>Comisión Conductor</label>
                <input type="number" class="form-control" name="delivery_commission" value="{{$delivery->delivery_commission}}" >
            </div>

            <br>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
                @if ($delivery->id)
                <a href="{{ url('/deliverys') }}/{{ $delivery->id }}/delete" class="btn btn-danger">
                    <i class="material-icons">close</i>
                    Eliminar
                </a>
                @endif
            </div>
        </form>
    </div>
@stop