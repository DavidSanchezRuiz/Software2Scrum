<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="../images/LogMundocente-01.png" href="../images/LogMundocente-01.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registro</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}

    {!!Html::script('js/select2.min.js')!!} 
</head>
<body style="background-color: white" onload="nobackbutton();">

<div class="row signup-main">
    <div class="col s12 m7 white signup-part1">
        <div class="container">
            <ul class="row ">

                <li class="col s12 m12" style="padding: 0px"><a href="/">
                        <img src="images/logoNav.png" style="width: 230px;height: 60px">
                    </a>

                </li>
                <li class="col s12 m12">
                    <h4 class="light">Registro</h4>
                </li>

                <li class="col s12 m12">

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
                        {!!Form::select('universidad', $institutes,null,['class'=>'browser-default'])!!}
                    </div>

                    <div style="padding-top: 10px">
                        <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>
                        
                        <!--area para agregar -->
 
                            <select class="js-example-basic-multiple" name="areas[]"  multiple="multiple" style="width: 100%" id="areas_select" title="Seleccionar tema de preferencia">

                            @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->name_a}}</option>
                            @endforeach

                            </select>
                    </div>

                    <div>
                        <p>
                            <input type="checkbox"  id="test5" name="permiso_signup" value="si" >
                            <label for="test5" class="black-text">Solicitar permisos de publicador.</label>
                            <a class="waves-effect waves-light modal-trigger tooltipped" data-tooltip="Más información"
                               href="#modal1"><img style="height: 25px; width: 25px" src="/images/info.png"></a>
                        </p>
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4>Solicitar permisos de publicador</h4>
                                <p>Al seleccionar esta opción enviarás una solicitud al equipo de Mundocente para la verificación de tu solicitud y así tener acceso al alformulario de publicardor.</p>
                                <p>Al no seleccionar esta opción, tendrá acceso únicamente al buscador de mundocente, podrá filtrar según las áreas de preferencia.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#"
                                   class="modal-action modal-close waves-effect waves-green btn-flat">Entendido</a>
                            </div>
                        </div>
                    </div>

                    

                    <div class="input-field">
                        {!!Form::password('password',['class'=>'validate'])!!}
                        <label for="password">Contraseña</label>
                    </div>

                    <div class="input-field">
                        {!!Form::password('confirm-password',['class'=>'validate'])!!}
                        <label for="confirm-password">Confirmar Contraseña</label>
                    </div>
                    <div>
                        <p>
                            <input type="checkbox"  id="test6" name="permiso_notifi_signup" value="si" >
                            <label for="test6" class="black-text">¿Le gustaría recibir notificaciones de Mundocente a en correo?</label>
                            <a class="waves-effect waves-light modal-trigger tooltipped" data-tooltip="Más información"
                               href="#modal2"><img style="height: 25px; width: 25px" src="/images/info.png"></a>
                        </p>
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4>Notificaciones de Mundocente</h4>
                                <p>Al seleccionar esta opción dará permiso a la aplicación para enviar a su correo notificaciones acerca de sus temas de interés</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#"
                                   class="modal-action modal-close waves-effect waves-green btn-flat">Entendido</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 center" style="padding-top: 30px">
                        {!!Form::submit('Registrar',['class'=>'btn waves-green cyan darken-3'])!!}
                    </div>
                    {!!Form::close()!!}

                </li>
            </ul>
            <div id="login-failed-panel" class="red-text center-align" style="display: none;">
                Login failed, please try again.
            </div>
        </div>
    </div>
    <div class="col s12 m5 cyan darken-4 signup-part2">
        <h5 class="lato white-text">¿Sabías que...</h5>
        <h6 class="light white-text half-line">Al utilizar la plataforma de búsqueda de mundocente, puedes
            filtrar los resultados según tus preferencias?</h6>
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">¿Ya se encuentra registrado?</h5>
                <p></p>
                <a href="login" class="btn waves-effect waves-light orange">Iniciar sesión</a>
            </div>
        </div>
        <h6 class="light white-text half-line">Al crear tu cuenta y usar mundocente, tu estás de acuerdo con
            nuestros Términos de Servicio y Política de Privacidad. Si no estás de acuerdo.</h6>
    </div>

</div>

<!--Scripts -->
{!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}

</body>
</html>