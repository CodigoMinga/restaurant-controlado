<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Restaurant Controlado</title>
    <script src="{{url('/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <style>
        html,body{
            height: 100vh;
            width:  100vw;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="d-flex h-100 w-100 justify-content-center align-items-center">
        <div class="card text-center" style="max-width:350px;">
            <form method="POST" action="{{url('set/company')}}">
                {{ csrf_field() }}
                <div class="card-header">
                    <h3>Seleccione Compañia</h3>
                </div>
                <div class="card-body">
                    <select name="company_id" class="form-control form-control-lg">
                        @foreach ($companys as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-block btn-primary">
                        Continuar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>