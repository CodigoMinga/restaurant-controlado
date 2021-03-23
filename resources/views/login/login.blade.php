<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style>
    div.main{
    background: #F4123D; /* Old browsers */


filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#F4123D', endColorstr='#1c2b5a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
height:calc(100vh);
width:100%;
}

[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* ---------- GENERAL ---------- */

* {
  box-sizing: border-box;
    margin:0px auto;

  &:before,
  &:after {
    box-sizing: border-box;
  }

}

body {
   
    color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
}

a {
	color: #eee;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

input {
	border: none;
	font-family: 'Open Sans', Arial, sans-serif;
	font-size: 14px;
	line-height: 1.5em;
	padding: 0;
	-webkit-appearance: none;
}

p {
	line-height: 1.5em;
}

.clearfix {
  *zoom: 1;

  &:before,
  &:after {
    content: ' ';
    display: table;
  }

  &:after {
    clear: both;
  }

}

.container {
  left: 50%;
  position: fixed;
  top: 50%;
  transform: translate(-50%, -50%);
}

/* ---------- LOGIN ---------- */

#login form{
	width: 250px;
}
#login, .logo{
    display:inline-block;
    width:40%;
}
#login{
border-right:1px solid #fff;
  padding: 0px 22px;
  width: 59%;
}
.logo{
color:#fff;
font-size:50px;
border-radius: 60%;
width: 80%;
padding: 0.7rem;
line-height: 120px;

}

#login form span.fa {
	background-color: #fff;
	border-radius: 3px 0px 0px 3px;
	color: #000;
	display: block;
	float: left;
	height: 50px;
    font-size:24px;
	line-height: 50px;
	text-align: center;
	width: 50px;
}

#login form input {
	height: 50px;
}
fieldset{
    padding:0;
    border:0;
    margin: 0;

}
#login form input[type="text"], input[type="password"] {
	background-color: #fff;
	border-radius: 0px 3px 3px 0px;
	color: #000;
	margin-bottom: 1em;
	padding: 0 16px;
	width: 200px;
}

#login form input[type="submit"] {
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #000000;
  color: #eee;
  font-weight: bold;
  /* margin-bottom: 2em; */
  text-transform: uppercase;
  padding: 5px 10px;
  height: 30px;
}

#login form input[type="submit"]:hover {
	background-color: #F4123D;
}

#login > p {
	text-align: center;
}

#login > p span {
	padding-left: 5px;
}
.middle {
  display: flex;
  width: 600px;
}
</style>
</head>
<body>
<div class="main">
    
    
<div class="container">


<div class="middle">
  
  
      <div id="login">
        <h3 style="color:white; text-align:center">Inicie Sesion</h3>
        <br>
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
        <form action="{{url('/app/checklogin')}}" method="post">
          {{csrf_field()}}
          <fieldset class="clearfix">

            <p ><span class="fa fa-envelope"></span><input type="text"  Placeholder="Email" name="email" required></p> 
            <p><span class="fa fa-lock"></span><input type="password"  Placeholder="Password" name="password" required></p> 
            
             <div style="text-align: center">
             <span style="width:50%; text-align:center; display: inline-block;"><input type="submit" value="Ingresar"></span>
            </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">
            <img  src="{{url('/img/logo.jpg')}}" class="logo" width="200" height="150">
          <div class="clearfix"></div>
      </div>
      
      </div>
      <br>
      <h6 style="text-align: center">Restaurant-controlado.cl<br/>
        <b> <a href="https://www.codigominga.cl">Desarrollo: www.codigominga.cl</a></b>

        <br/><br/>
        <b> <a href="{{url('/app/login/passwordlost')}}">Recuperar Contraseña</a></b>
      </h6>
    </div>

</div>
</body>
</html>