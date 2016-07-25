<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="../images/LogMundocente-01.png" href="../images/LogMundocente-01.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inicio de sesión</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}
</head>
<body class="body-login" onload="nobackbutton();">

<div class="row login-main" style="">
    <div class="col s12 m7 white login-part1">
        <div class="container">
            <ul class="row ">
                <li class="col s12 m12" style="padding: 0px"><a href="/">
                        <img src="images/logoNav.png" style="width: 230px;height: 60px">
                    </a>

                </li>
                <br>
                <br>
                <br>

                <br>
                <br>

                <br>
                <br>
                
                <br>
                <br>
                <li class="col s12 m12">
                    <h4 class="light">Iniciar sesión</h4>
                </li>

                <li class="col s12 m12">
                    {!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
                    @include('alerts.errors')
                    @include('alerts.confirm')
                    <div class="input-field ">

                        {!!Form::email('email',null,['class'=>'validate'])!!}
                        <label for="email-login">Correo</label>
                    </div>
                    <div class="input-field">

                        {!!Form::password('password',['class'=>'validate'])!!}
                        <label for="password">Contraseña</label>
                    </div>


                    <div class="col s12 center" style="padding-top: 30px">

                        {!!Form::submit('Ingresar',['class'=>'btn  waves-green cyan darken-3'])!!}
                    </div>
                    {!!Form::close()!!}

                </li>
            </ul>
            <div id="login-failed-panel" class="red-text center-align" style="display: none;">
                Login failed, please try again.
            </div>
            <!--
            <div class="section center">
                <a href="#">¿Olvido su contraseña?</a>
            </div>
            -->
        </div>
    </div>
    <div class="col s12 m5 teal darken-3 login-part2">
        <h5 class="lato white-text">¿Sabía que...?</h5>
        <h6 class="light white-text half-line">Al realizar búsquedas en la plataforma de Mundocente, puedes
            filtrar los resultados según tus preferencias.</h6>
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">¿No estás registrado?</h5>
                <a href="singup" class="btn waves-light orange">Regístrate</a>
            </div>
        </div>
        <h6 class="light white-text half-line">Al crear tu cuenta y usar Mundocente, estarás de acuerdo con
            nuestros Términos de Servicio y Política de Privacidad.</h6>
    </div>

</div>
<!--Scripts -->
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}
</body>
</html>