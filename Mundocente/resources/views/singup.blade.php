<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registro</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}
</head>
<body style="background-color: white">

<div class="row signup-main" >
    <div class="col s12 m7 white signup-part1">
        <div class="container">
            <ul class="row ">

                <li class="col s12 m12" style="padding: 0px"><a href="home">
                    <img src="images/logoNav.png" style="width: 230px;height: 60px">
                </a>
                    
                </li>
                <li class="col s12 m12">
                    <h4 class="light">Registrarse</h4>
                </li>
                
                <li class="col s12 m12">
                    <div class="center row">
                        <div class="col s12 m12">
                            <a href="#" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Facebook"><img src="images/facebook-login.png" alt=""></a>
                            <a href="#" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Google"><img src="images/google-plus.png" alt=""></a>
                        </div>
                        <div class="col s12 m12 light" style="padding-top: 15px;">
                            <span style="font-size: 1.5em">-----------------  o  -----------------</span>
                        </div>
                    </div>

                    {!!Form::open(['route'=>'singup.store', 'method'=>'POST'])!!}
                    @include('alerts.errors')

                        <div class="input-field">
                            {!!Form::text('nombre',null,['class'=>'validate'])!!}
                            <label for="email-login">Nombre</label>
                        </div>
                        <div class="input-field">
                            
                            {!!Form::email('email',null,['class'=>'validate'])!!}
                            <label for="email-login">Correo</label>
                        </div>
                        

                         <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Universidad</label>

                                {!!Form::select('universidad', $institutes)!!}

                            </div>

                            <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>

                               

                                {!!Form::select('areasSelect', $areas)!!}

                            </div>
                      

                        <div class="input-field">
                            
                            {!!Form::password('password',['class'=>'validate'])!!}
                            <label for="password">Contraseña</label>

                        </div>
                        <div class="col s12 center" style="padding-top: 30px">
                            
                            {!!Form::submit('Registrar',['class'=>'btn waves-effect waves-green cyan darken-3'])!!}
                        </div>
                    
                    {!!Form::close()!!}

                </li>
            </ul>
            <div id="login-failed-panel" class="red-text center-align" style="display: none;">
                Login failed, please try again.
            </div>
        </div>
    </div>
    <div class="col s12 m5 green darken-1 signup-part2">
        <h5 class="lato white-text">¿Sabía que...?</h5>
        <h6 class="light white-text half-line">Al realizar búsquedas en la plataforma de búsqueda de mundocente, puedes
            filtrar los resultados según tus preferencias.</h6>
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">¿Ya se encuentra registrado?</h5>
                <a href="login" class="btn waves-effect waves-light orange">Iniciar sesión</a>
            </div>
        </div>
        <h6 class="light white-text half-line">Al crear su cuenta y usar mundocente, usted está de acuerdo con
            nuestros Términos de Servicio y Política de Privacidad. Si no está de acuerdo, no se puede utilizar
            mundocente.</h6>
    </div>

</div>

<!--Scripts -->
{!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}
</body>
</html>