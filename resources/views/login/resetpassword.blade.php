<div class="login-box-body" style="border-radius: 10px">
    <p class="login-box-msg">Introdusca su nueva clave</p>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @else
        <form method="post" action="{{url('/app/resetpassword/'.$user->id.'/token/'.$token.'/process')}}">
            {{csrf_field()}}


            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    @endif




    <!-- /.social-auth-links -->


</div>
<!-- /.login-box-body -->
</div>