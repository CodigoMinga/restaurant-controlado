<div class="login-box">
    <div class="login-logo">
    <!--   <img src="{{url("/")}}/images/logo_2021.png" width="100%"> -->

    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border-radius: 10px">
        <p class="login-box-msg"><b>Ingrese su Email para recuperar su clave.</b></p>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<<<<<<< HEAD
        <form method="post" action="{{url('/app/login/passwordlost/process')}}">
=======
        <form method="post" action="{{url('passwordlost/process')}}">
>>>>>>> roberto
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->


    </div>
    <!-- /.login-box-body -->
</div>