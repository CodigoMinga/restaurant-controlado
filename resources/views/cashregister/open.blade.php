@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3" align="center">
        <h1>
            <i class="material-icons">point_of_sale</i> Abrir Caja
        </h1>
        <form method="post" action="{{ url('cashregister/open') }}" style="max-width:300px;">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Monto incial</label>
                <input required type="number" class="form-control form-control-lg" name="ammount_open">
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-block btn-lg">
                <i class="material-icons">send</i>
                Guardar
            </button>
        </form>
    </div>
@stop
