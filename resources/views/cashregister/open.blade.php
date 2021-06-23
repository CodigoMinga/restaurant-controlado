@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">point_of_sale</i> Abrir Caja
        </h1>
        <form method="post" action="{{ url('cashregister/open') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Monto incial</label>
                <input required type="number" class="form-control" name="ammount_open">
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
