<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cuenta</title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}


</head>
<body class="body-account">

<!-- Navegador -->
<section class="navbar">
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="search.html" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul class="right hide-on-med-and-down">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off"
                           placeholder="Ingrese título de publicación o Universidad" required="required" class="grey"
                           style="width: 400px; height:65px;">
                    <label for="search"></label><i
                            class="material-icons">{!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>
                <li><a href="home">Actividades</a></li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1">{!!Auth::user()->name!!}
                                    <i class="material-icons right">person_pin</i></a>
                </li>
            </ul>
            <ul id="nav-mobile" class="side-nav grey darken-3">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off"
                           placeholder="Palabra clave" required="required" class="grey"
                           style="width: 160px; height:65px;">
                    <label for="search"></label><i
                            class="material-icons">{!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>
                <li><a class="white-text" href="home">Actividades</a></li>
                <li>
                    <a class="dropdown-button white-text" href="#!" data-activates="dropdown2">{!!Auth::user()->name!!}
                        <i class="material-icons right">person_pin</i></a>
                </li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="settings">Configuración</a></li>
        <li class="divider"></li>
        <li><a href="logout">Salir</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="settings">Configuración</a></li>
        <li class="divider"></li>
        <li><a href="logout">Salir</a></li>
    </ul>
</section>

<div class="container-account">
    <div class="card">
        @include('alerts.change')
        @include('alerts.errors')
        <div style="padding: 10px 10px 10px">
                <span class="card-title"><i
                            class="material-icons card-title-center">filter_list</i>Areas de interes</span>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <ul class="row">
                <li class="col s12 m12">
                    <h5 class="left-align light">Agregue un área a la lista de preferencia</h5>
                    <ul class="row">
                        {!!Form::open(['route'=>'preferencias.store'])!!}
                        <li class="col s12 m8">
                            <label class="left grey-text text-darken-3 light" style="font-size: medium">Seleccione un
                                área de
                                interés</label>
                            {!!Form::select('select_option', $areas,null,['class'=>'browser-default'])!!}
                        </li>
                        <li class="col s12 m4" style="margin-top: 50px">
                            {!!Form::submit('Agregar a preferidos',['class'=>'btn waves-effect waves-green cyan darken-3 right'])!!}
                        </li>
                        {!!Form::close()!!}
                    </ul>
                </li>
                <li class="col s12 m12">
                    <h5 class="left-align light">Áreas de preferencia</h5>
                    <!--Lee solo las áreas de gusto-->
                    @foreach($preferencias as $pref)

                        @if($pref->users_email==Auth::user()->email)

                            <div class="chip" style="margin-bottom: 10px;margin-left: 10px">
                                {{$pref->name}}
                                <i class="material-icons"><a type="submit">close</a></i>
                            </div>
                        @endif

                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-account">
    <div class="card">
        <div style="padding: 10px 10px 10px">
                <span class="card-title"><i
                            class="material-icons card-title-center">filter_list</i>Datos Personales</span>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <ul class="row">
                {!!Form::open(['route'=>['user.update', Auth::user()->id], 'method'=>'PUT'])!!}
                <li class="col s12 m12">
                    <div class="input-field">
                        <input id="first-name" name="name" type="text" required class="validate"
                               value="{!!Auth::user()->name!!}">

                        <label for="first-name">Nombres</label>
                    </div>
                    <div class="input-field">
                        <input id="first-name" name="last_name" type="text" class="validate"
                               value="{!!Auth::user()->last_name!!}">

                        <label for="first-name">Apellidos</label>
                    </div>
                    <div class="input-field">
                        <input id="email" name="email" type="email" required class="validate"
                               value="{!!Auth::user()->email!!}">

                        <label for="email">Correo</label>
                    </div>
                    <div style="padding-top: 10px">
                        <label class="left grey-text text-darken-3">Universidad</label>

                        {!!Form::select('universidad', $institutes, Auth::user()->institute_id ,['class'=>'browser-default'])!!}
                    </div>
                </li>
                <li class="col s12 m12">
                    <div class="divider"></div>
                </li>
                <li class="col s12 m12">
                    <h5 class="light">Actualizar contraseña</h5>
                    <div class="input-field">
                        <input name="passwordNew" id="new-password" type="password" class="validate">

                        <label for="new-password">Nueva contraseña</label>
                    </div><br>
                    {!!Form::submit('Guardar cambios',['class'=>'btn waves-effect waves-green cyan darken-3 right'])!!}
                </li>
                {!!Form::close()!!}
            </ul>
        </div>
    </div>
</div>

<div class="container-account">
    <div class="card-panel">
        <div style="padding-bottom: 10px">
            <span style="font-size: 1.6em;" class="light"><i class="material-icons card-title-center">filter_list</i>Borrar cuenta</span>
        </div>
        <div class="divider"></div>
        <ul class="row">
            <li class="col s12 m8">
                <label class="grey-text text-darken-2" style="font-size: 1.2em">Borre su cuenta de mundocente</label>
            </li>
            <li class="col s12 m4">
                {!!Form::open(['route'=>['user.destroy', Auth::user()->id], 'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar cuenta', ['class'=>'btn waves-effect red right header-btn'])!!}
                {!!Form::close()!!}
            </li>
        </ul>
    </div>
</div>

<footer class="page-footer grey lighten-3">
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2016 Copyright
            <a class="grey-text text-lighten-4 right" href=""><i
                        class="material-icons">book</i></a>
        </div>
    </div>
</footer>


<!--Scripts -->
{!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}


</body>
</html>