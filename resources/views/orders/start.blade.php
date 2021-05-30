@extends('templates.maincontainer')

@section('content')
    <div class="container p-3" align="center">
        <div style="max-width: 500px;"> 
            <h1>Iniciar Orden</h1>
            <h5>¿Quiere iniciar una Orden en la mesa {{$table->name}}?</h5>
            <div class="d-flex  justify-content-between" >
                <a class="btn btn-success btn-lg" href="{{url('/orders/start/'.$table->id)}}">
                    <span class="material-icons">receipt_long</span>
                    Iniciar
                </a>
                <button class="btn btn-danger btn-lg" onclick="window.history.back();">
                    <span class="material-icons">close</span>
                    Cerrar
                </button>
            </div>
        </div>
    </div>
@stop