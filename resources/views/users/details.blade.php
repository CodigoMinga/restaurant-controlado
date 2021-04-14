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
                <label for="role_id">Roles:</label>
                <select name="role_id" id="role_id" class="form-control" >
                    @forelse($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @empty
                    <li>Aun no hay Roles</li>
                    @endforelse
                </select>
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