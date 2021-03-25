<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{url('/css/restorant.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>Restaurant Controlado</title>
    <script src="{{url('/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
    <nav>

    </nav>
    <div id="sidebar" align="center">
        <div id="sidebar-content">
            <img src="{{url('/img/logo.jpg')}}" class="logo-circle">
            <div class="info-bar mb-3">
                <p>DELIXIUS RESTOBAR</p>
                <p>RUT: 77.012.555-3</p>
                <p>DARUICHRODRIGUEZ SPA</p>
            </div>
            <div>
                <a class="sidebar-button {{(request()->is('tables')) ? 'active' : '' }}" href="{{ url('/tables') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">layers</i>Sectores
                </a>
                
                @yield('info')

                <a class="sidebar-button {{(request()->is('products/add')) ? 'active' : '' }}" href="{{ url('/app/products/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Producto
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/producttypes/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Categoria
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/measureunits/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Medida
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/items/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Insumos
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/prescriptions/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Recetas
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/companys/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Compañias
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('app/users/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">add</i>Usuarios
                </a>
            </div>
        </div>
        <div id="sidebar-toggle">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="height: 9rem;"
            viewBox="0 0 85 299.8" style="enable-background:new 0 0 85 299.8;" xml:space="preserve">
            <style type="text/css">
                .st0{fill:#F4123D;}
            </style>
            <path class="st0" d="M85,149.8c-0.1-18.9-6.7-31.7-27.8-52.8C4.9,44.7,0,0,0,0v149.8v0.3v149.8c0,0,4.9-44.7,57.2-97  c21.1-21,27.7-33.9,27.8-52.8V149.8z"/>
            </svg>
        </div>
    </div>
    <div id="main">
        @yield('content')
    </div>
    <div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 200px;top:0px;right:0px;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id='toast-agregar'>
            <div class="toast-header ">
            <i class="rounded mr-2 material-icons bg-success text-white">done</i>
            <strong class="mr-auto">Agregado</strong>
            <small class="text-muted">cerrar</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                ...
            </div>
        </div>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="rounded mr-2 material-icons">alert</i>
            <strong class="mr-auto">Alerta</strong>
            <small class="text-muted">cerrar</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                See? Just like this.
            </div>
        </div>
    </div>


    <script>
        var sidebar         = document.getElementById('sidebar');
        var sidebarToggle   = document.getElementById('sidebar-toggle');

        sidebarToggle.addEventListener('click', function (event) {
            sidebar.classList.toggle('active');
            this.classList.toggle('active')
        }, false);

        //$('.toast').toast({delay:1000});
    </script>
</body>
</html>