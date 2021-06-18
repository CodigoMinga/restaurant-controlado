@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">point_of_sale</i> Abrir Caja
        </h1>
        <form method="post" action="{{ url('cashregister/openprocess') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Monto incial</label>
                <input required type="text" class="form-control" name="number">
            </div>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="material-icons">send</i>
                    Guardar
                </button>
            </div>
        </form>
    </div>
@stop
