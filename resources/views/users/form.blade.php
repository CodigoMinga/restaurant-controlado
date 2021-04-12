@extends('templates.maincontainer')

@section('content')
<div class="container pt-3">
    <h1>
        @if ($user->id)
            <i class="material-icons">description</i>Detalles de Usuario
        @else
            <i class="material-icons">add_box</i>Agregar Usuario
        @endif
    </h1>
    <form method="post" action="{{url('/users/process')}}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group">
            <label>Nombre Usuario</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email"  value="{{$user->email}}" required>
        </div>
        @if ($user->id)
          <div class="form-group">
              <div class="form-group form-check mb-1">
                <input type="checkbox" class="form-check-input" name="newpassword" id="renovar" value="1">
                <label class="form-check-label" for="renovar">Renovar Password</label>
              </div>      
              <input type="text" class="form-control" name="password" id="password" length="6" disabled>
          </div>
        @else
          <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" name="password" length="6" required>
          </div>
        @endif
        @if(COUNT($companies)>1)
          <br>
          <h6>Restaurantes</h6>
          @foreach ($companies as $company)
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="company_id[]" value="{{$company->id}}" id="companyCheck{{ $loop->iteration }}" {{$user->companies->contains('id', $company->id) ? 'checked':''}}>
              <label class="form-check-label" for="companyCheck{{ $loop->iteration }}">{{$company->name}}</label>
            </div>      
          @endforeach
        @else
          <input type="hidden" name="company_id[]" value="{{$companies[0]->id}}">
        @endif
        <br>
        <h6>Roles</h6>
        @foreach ($roles as $role)
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="role_id[]" value="{{$role->id}}" id="roleCheck{{ $loop->iteration }}" {{$user->hasRole($role->name) ? 'checked':''}}>
            <label class="form-check-label" for="roleCheck{{ $loop->iteration }}">{{$role->description}}</label>
          </div>      
        @endforeach
        <br>
        <div class="d-flex  justify-content-between">
          <button type="submit" class="btn btn-success ">
              <i class="material-icons">done</i>
              Guardar
          </button>
          @if ($user->id)
            <a  href="{{ url('/') }}/users/{{$user->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar
            </a>
          @endif
        </div>
    </form>
    <script>
      var renovar = document.getElementById('renovar');
      var password = document.getElementById('password');

      renovar.onchange = function(){
        if(this.checked){
          password.disabled=false;
          password.required=true;
        }else{
          password.disabled=true;
          password.required=false;
          password.value='';
        }
      };

    </script>
</div>
@stop