@extends('templates.maincontainer')
@section('content')
  <div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Cambiar Contraseña
    </h1>
    <form method="post" action="{{url('/app/password/'.$user->id.'/passwordchange/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Clave Antigua</label>
      <input type="text" class="form-control" placeholder="*****" name="oldpassword" id="oldpassword" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Clave Nueva</label>
      <input type="text" class="form-control" placeholder="*******" name="newpassword" id="newpassword" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Clave Nueva (Repetir)</label>
      <input type="text" class="form-control"  placeholder="*******" name="password" id="password" required>
    </div>

    
    <button type="submit" class="btn btn-success btn-lg btn-block">
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
            password.style.borderColor='red';
            guardar.disabled=true;
            form.disabled=true;
            guardar.style.color='grey';
        }else{
            password.style.borderColor='#F7CE26';
            guardar.disabled=false;
            form.disabled=false;
            guardar.style.color='#00e676';
        }
    }
</script>
@stop