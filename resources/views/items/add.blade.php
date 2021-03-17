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
</head>
<body>
    <nav>

    </nav>
    <div id="sidebar">
        <img src="{{url('/img/logo.jpg')}}" class="logo-circle">
        <div class="info-bar p-2 mb-3">
            <p>DELIXIUS RESTOBAR</p>
            <p>RUT: 77.012.555-3</p>
            <p>DARUICHRODRIGUEZ SPA</p>
        </div>
        <div>
            <a class="sidebar-button">
                <i class="material-icons" style="font-size:2rem;vertical-align:-0.5rem">layers</i> Sectores
            </a>
        </div>
    </div>
    <div id="main">
        <h2 class="pt-5 pl-5 page-header">
            <i class="fa fa-pencil"></i> Agregar Producto
        </h2>
        <form method="post" class="pt-5 pl-5 col-7" action="{{url('app/items/add/process')}}" id="form">
            {{csrf_field()}}
            <div class="form-group has-feedback ">
                <input required type="text" class="form-control" placeholder="Nombre" name="name" value="">
                <span class="fa fa-tag form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input required type="text" class="form-control" placeholder="Descripcion" name="description" value="">
                <span class="fa fa-tags form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input required type="text" class="form-control" placeholder="Stock" name="stock" value="">
                <span class="fa fa-id-card form-control-feedback"></span>
            </div>
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>Guardar</button>
            
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>