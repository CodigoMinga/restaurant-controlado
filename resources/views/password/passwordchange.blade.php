@extends('templates.maincontainer')
@section('content')
  <div class="container pt-3">
    <h1>
        <i class="material-icons pr-2">vpn_key</i>Cambiar Contraseña
    </h1>
    <form method="post" action="{{url('/app/password/'.$user->id.'/passwordchange/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Clave Antigua</label>
      <input type="password" class="form-control" placeholder="*****" name="oldpassword" id="oldpassword" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Clave Nueva</label>
      <input type="password" class="form-control" placeholder="*******" name="newpassword" id="newpassword" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Clave Nueva (Repetir)</label>
      <input type="password" class="form-control"  placeholder="*******" name="password" id="password" required>
      <div class="invalid-feedback">
        Las claves no coinciden
      </div>
    </div>

    
    <button type="submit" class="btn btn-success btn-lg btn-block" id="guardar">
        <i class="material-icons">done</i>
        Guardar
    </button>
</form>
<script>
    var newpassword =document.getElementById('newpassword');
    var password =document.getElementById('password');
    var guardar =document.getElementById('guardar');
    var form =document.getElementById('form');

    password.onkeyup = function(){
        if(newpassword.value!=password.value){
            password.classList.add('is-invalid');
            guardar.disabled=true;
            form.disabled=true;
        }else{
            password.classList.remove('is-invalid');
            guardar.disabled=false;
            form.disabled=false;
        }
    }
</script>
@stop