@extends('templates.maincontainer')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    .config-button{
        color:white;
        padding: 1rem;
        margin: 0.5rem;
        border: 3px solid white;
        width: 250px;
        font-size: 1.5rem;
        border-radius: 2rem;
        cursor:pointer;
    }

    
    .config-button:hover{
        color:#03a9f4 ;
        border-color:#03a9f4 ;
        text-decoration: none;
    }

    
    .config-button .material-icons{
        margin-right: 0.8rem;
    }


</style>

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons pr-2">settings</i>Configuración
        </h1>
        <div class="d-flex flex-row justify-content-between p-4 flex-wrap">                
            <a class="config-button" href="{{ url('products/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">fastfood</i>Productos
            </a>
            <a class="config-button" href="{{ url('producttypes/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">layers</i>Categorias
            </a>
            <a class="config-button" href="{{ url('tables/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">deck</i>Mesas
            </a>
            <a class="config-button" href="{{ url('users/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">groups</i>Usuarios
            </a>
            <a class="config-button" href="{{ url('clients/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">people</i>Clientes
            </a>
            <a class="config-button" href="{{ url('items/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">shopping_cart</i>Insumos
            </a>
            <a class="config-button" href="{{ url('deliverys/list') }}">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">delivery_dining</i>Deliverys
            </a>
        </div>
    </div>
 @stop