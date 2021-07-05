@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3" align="center">
        <h1>
            <i class="material-icons">warning</i> Necesita Abrir caja para continuar <i class="material-icons">warning</i>
        </h1>
        <br>
        <a type="submit" class="btn btn-lg btn-info m-2" href="{{url('cashregister/form')}}">
            <i class="material-icons">point_of_sale</i>
            Abrir Caja
        </a>
    </div>
@stop
