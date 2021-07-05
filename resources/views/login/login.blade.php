<!DOCTYPE html>
<html>
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
  <meta name="description" content="Restorant Controlado: Controla los pedidos, almacen, despachos y muchas cosas más de tu local" />
  <meta property="og:image" content="{{url('/img/logo.svg')}}">
  <link rel="shortcut icon" href="{{url('/img/favicon.png')}}">
  <style>
    html,body{
      height: 100vh;
      width:  100vw;
    }

    body{
      background-image: url("{{url('/img/fondo.png')}}");
      background-attachment: fixed;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .glass-card{
      max-width: 50rem;
      box-shadow: 0 0 1rem 0 rgba(0,0,0,0.2);
      position: relative;
      background: inherit;
      overflow: hidden;
      z-index: 1;
      border-radius: 5px;
      color:white;
    }

    
    .glass-card::before{
      content: "";
      position: absolute;
      background: inherit;
      top:0;
      left:0;
      right:0;
      bottom:0;
      box-shadow: inset 0 0 2000px rgba(255,255,255,0.4);
      filter: blur(5px);
      margin: -20px;
      z-index: -1;
    }

    
    .glass-card.glass-red::before{
      content: "";
      position: absolute;
      background: inherit;
      top:0;
      left:0;
      right:0;
      bottom:0;
      box-shadow: inset 0 0 2000px rgba(255,0,0,0.4);
      filter: blur(5px);
      margin: -20px;
      z-index: -1;
    }

    .glass-btn{
      box-shadow: 0 0 1rem 0 rgba(0,0,0,0.2);
      position: relative;
      background: inherit;
      overflow: hidden;
      z-index: 1;
      border-radius: 5px;
      color:white;
    }

    
    .glass-btn:hover::before{
      box-shadow: inset 0 0 2000px rgba(255,255,255,0.6);
    }

    .glass-btn::before{
      content: "";
      position: absolute;
      background: inherit;
      top:0;
      left:0;
      right:0;
      bottom:0;
      box-shadow: inset 0 0 2000px rgba(255,255,255,0.4);
      filter: blur(5px);
      margin: -20px;
      z-index: -1;
    }

    #passwordHelp a{
      color:white;
    }

    footer{
      background: black;
      position: absolute;
      bottom: 0px;
      left: 0px;
      right: 0px;
      color:white;
      text-align: center;
      padding: 5px;
    }

    
    footer a{
      color:orange;
    }

    footer a:hover{
      color:crimson;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="glass-card mb-5">
    <div class="row p-sm-5 p-2">
      <div class="logo col-12 col-sm-6" align="center">
        <div style="background: rgba(255,255,255,0.0);border-radius:50%;padding:15px;" class="pb-sm-0 pb-3">
          <img  src="{{url('/img/logo.svg')}}" class="logo" width="210">
        </div>
      </div>
      <div id="login"  class="col-12 col-sm-6">
        <h3 style="color:white; text-align:center" class="mb-4">Iniciar Sesión</h3>
        <form action="{{url('/app/checklogin')}}" method="post">
          {{csrf_field()}}
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text material-icons" id="basic-addon1">email</span>
              </div>
              <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" required>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text material-icons" id="basic-addon1">password</span>
                </div>
                <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="password" required>
              </div>
              <small id="passwordHelp" class="form-text"><a href="{{url('/app/login/passwordlost')}}">Recuperar Contraseña</a></small>
            </div>
            <div style="text-align: center">
              <button type="submit" class="btn btn-block glass-btn btn-lg">
                <span class="material-icons">
                  send
                </span>
                Ingresar
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @if ($message = Session::get('error'))
  <div class="glass-card glass-red w-100">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if (count($errors) > 0)
    <div class="glass-card glass-red  w-100">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <footer>
    Desarrollado por: <a href="https://www.codigominga.cl"><img src="{{url('/img/logo-cm.png')}}" width="25" > Código Minga</a>
  </footer>
</body>
</html>