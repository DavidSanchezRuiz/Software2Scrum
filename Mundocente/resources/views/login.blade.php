<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inicio de sesión</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen, projection"/>
</head>
<body class="body-login">

<div class="row login-main" style="">
    <div class="col s12 m7 white login-part1">
        <div class="container">
            <ul class="row ">
                <li class="col s12 m12" style="padding: 0px">
                    <img src="images/logoNav.png" style="width: 230px;height: 60px">
                </li>
                <li class="col s12 m12">
                    <h4 class="light">Iniciar sesión</h4>
                </li>
                <li class="col s12 m12">
                    <div class="center row">
                        <div class="col s12 m12">
                            <a href="#" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Facebook"><img src="images/facebook-login.png" alt=""></a>
                            <a href="#" class="tooltipped" data-position="bottom    " data-delay="50" data-tooltip="Google"><img src="images/google-plus.png" alt=""></a>
                        </div>
                        <div class="col s12 m12 light" style="padding-top: 15px;">
                            <span style="font-size: 1.5em">-----------------  o  -----------------</span>
                        </div>
                    </div>
                    {!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
                    <form>
                        <div class="input-field ">
                            <!--<input id="email-login" type="email" class="validate">-->
                            {!!Form::email('email-login',null,['class'=>'validate'])!!}
                            <label for="email-login">Correo</label>
                        </div>
                        <div class="input-field">
                            <!--<input id="password" type="password" class="validate">-->
                            {!!Form::password('password',null,['class'=>'validate'])!!}
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="col s12 center" style="padding-top: 30px">
                            {!!Form::submit('Registrar',['class'=>'btn waves-effect waves-green cyan darken-3'])!!}
                        </div>
                    </form>
                    {!!Form::close()!!}
                </li>
            </ul>
            <div id="login-failed-panel" class="red-text center-align" style="display: none;">
                Login failed, please try again.
            </div>
            <div class="section center">
                <a class="modal-trigger" href="#">¿Olvido su contraseña?</a>
            </div>
        </div>
    </div>
    <div class="col s12 m5 teal darken-3 login-part2">
        <h5 class="lato white-text">¿Sabía que...?</h5>
        <h6 class="light white-text half-line">Al realizar búsquedas en la plataforma de búsqueda de mundocente, puedes
            filtrar los resultados según tus preferencias.</h6>
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">¿No está registrado?</h5>
                <a class="btn waves-effect waves-light orange">Registrarse</a>
            </div>
        </div>
        <h6 class="light white-text half-line">Al crear su cuenta y usar mundocente, usted está de acuerdo con
            nuestros Términos de Servicio y Política de Privacidad. Si no está de acuerdo, no se puede utilizar
            mundocente.</h6>
    </div>

</div>
<!--Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
</body>
</html>