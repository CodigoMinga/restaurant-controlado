@extends('templates.maincontainer')

@section('content')
    <div class="container p-3">
        <h1>Iniciar Orden</h1>
        <h5>¿Quiere iniciar una Orden en la mesa {{$table->name}}?</h5>
        <a href="{{url('/orderstart/'.$table->id)}}">Iniciar</a>
    </div>
@stop