<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{url('/css/restorant.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>Restaurant Controlado</title>
    <script src="{{url('/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>
    <nav>

    </nav>
    <div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 200px;top:0px;right:0px;">
        <div class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true" id='toast-agregar'>
            <div class="toast-header ">
            <i class="rounded mr-2 material-icons text-success text-white">receipt</i>
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
        <div class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true" id='toast-error'>
            <div class="toast-header">
            <i class="rounded mr-2 material-icons text-danger text-white">report</i>
            <strong class="mr-auto">Error</strong>
            <small class="text-muted">cerrar</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                Mensaje de error
            </div>
        </div>
        <div class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true" id='toast-warning'>
            <div class="toast-header">
            <i class="rounded mr-2 material-icons text-warning text-white">report_problem</i>
            <strong class="mr-auto">Cuidado</strong>
            <small class="text-muted">cerrar</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                Mensaje de Cuidado
            </div>
        </div>
        <div class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true" id='toast-check'>
            <div class="toast-header">
            <i class="rounded mr-2 material-icons text-success text-white">verified</i>
            <strong class="mr-auto">Realizado</strong>
            <small class="text-muted">cerrar</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
                Mensaje de realizado
            </div>
        </div>
    </div>
    <script>
        $('.toast').toast({delay:2000});
        function toastError(mensaje){
            $('#toast-error .toast-body').eq(0).html(mensaje);
            $('#toast-error').toast('show');
        }
        function toastSuccess(mensaje){
            $('#toast-check .toast-body').eq(0).html(mensaje);
            $('#toast-check').toast('show');
        }
        function toastwarning(mensaje){
            $('#toast-warning .toast-body').eq(0).html(mensaje);
            $('#toast-warning').toast('show');
        }
    </script>

    @if ($message = Session::get('error'))
    <script>
        $('#toast-error .toast-body').eq(0).html('{!! $message !!}');
        $('#toast-error').toast('show');
    </script>
    @endif
    
    @if ($message = Session::get('success'))
    <script>
        $('#toast-check .toast-body').eq(0).html('{!! $message !!}');
        $('#toast-check').toast('show');
    </script>
    @endif
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

                <a class="sidebar-button {{(request()->is('products/add')) ? 'active' : '' }}" href="{{ url('products/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">fastfood</i>Producto
                </a>
                <a class="sidebar-button {{(request()->is('items/add')) ? 'active' : '' }}" href="{{ url('producttypes/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">layers</i>Categoria
                </a>
                <a class="sidebar-button {{(request()->is('items/list')) ? 'active' : '' }}" href="{{ url('items/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">shopping_cart</i>Insumos
                </a>
                <a class="sidebar-button {{(request()->is('companys/list')) ? 'active' : '' }}" href="{{ url('companys/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">apartment</i>Compañias
                </a>
                <a class="sidebar-button {{(request()->is('tables/list')) ? 'active' : '' }}" href="{{ url('tables/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">deck</i>Mesas
                </a>
                <a class="sidebar-button {{(request()->is('users/list')) ? 'active' : '' }}" href="{{ url('users/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">groups</i>Usuarios
                </a>
                <a class="sidebar-button {{(request()->is('clients/list')) ? 'active' : '' }}" href="{{ url('app/clients/list') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">people</i>Clientes
                </a>
                <a class="sidebar-button {{(request()->is('users/passwordchange')) ? 'active' : '' }}" href="{{ url('users/passwordchange') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">password</i>Contraseña
                </a>
                <a class="sidebar-button {{(request()->is('app/logout')) ? 'active' : '' }}" href="{{ url('app/logout') }}">
                    <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">logout</i>Logout
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
    <script>
        var sidebar         = document.getElementById('sidebar');
        var sidebarToggle   = document.getElementById('sidebar-toggle');

        sidebarToggle.addEventListener('click', function (event) {
            sidebar.classList.toggle('active');
            this.classList.toggle('active')
        }, false);
    </script>
</body>
</html>