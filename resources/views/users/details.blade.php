@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles de Usuario
        </h1>
        <form method="post" action="{{url('app/users/'.$user->id.'/edit/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nombre Usuario</label>
                <input required type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email"  value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password"  value="{{$user->password}}">
            </div>
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Usuario
            </button>
            <a  href="{{ url('/') }}/app/users/{{$user->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Usuario
            </a>
        </form>

    </div>
@stop