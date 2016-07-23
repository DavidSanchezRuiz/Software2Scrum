<!DOCTYPE html>
<html lang="es"  id="navVarPrincipal">
<head>
<link rel="icon" type="../images/LogMundocente-01.png" href="../images/LogMundocente-01.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mundocente</title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}
</head>
<body onload="nobackbutton();">

<!-- Navegador -->
<section class="navbar navbar-fixed">
    <nav class="grey darken-4" style="z-index: 10">
        <div class="nav-wrapper container list ">
            <a href="home" class="brand-logo"><img src="../images/logoNav.png" style="height: 60px;"></a>
            <ul class="right hide-on-med-and-down nav-size">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off" placeholder="Ingrese título de publicación" required="required" class="grey" style="min-width: 400px; height:65px;">
                    <label for="search"></label><i class="material-icons">
                    {!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>
                <li><a href="home">Inicio</a></li>
                
                    @if(Auth::user()->rol=='publicador')
                         <li><a class="dropdown-button white-text " href="#!" data-activates="dropdown-publish">Publicar<i class="material-icons right">arrow_drop_down</i></a></li>
                   
                    @endif

                    @if(Auth::user()->rol=='buscador')
                         <li><a class="modal-trigger white-text" href="#permiso-model">Publicar</a></li>
                   
                    @endif

                     @if(Auth::user()->rol=='pendiente')
                         <li><a class="modal-trigger white-text" href="#pendiente-model">Publicar</a></li>
                   
                    @endif


                @if(Auth::user()->rol!='administrador')
                          <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1">{!!Auth::user()->name!!} <i class="material-icons right">person_pin</i></a>
                        </li>
                   
                    @endif

                      @if(Auth::user()->rol=='administrador')


                        <?php
                            $usersPend = Mundocente\User::where('rol','pendiente')->count();
                        ?>

                      <li>
                            <a  href="admin">Pendientes ({{$usersPend}}) <i class="material-icons right">add_alert</i></a>
                        </li>


                          <li><a href="logout">Salir <i class="material-icons right">power_settings_new</i></a></li>
                   
                    @endif

               



            </ul>

            <ul id="nav-mobile" class="side-nav grey darken-3">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off" placeholder="Palabra clave" required="required" class="grey" style="width: 160px; height:65px;">
                    <label for="search"></label><i class="material-icons">{!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>

                <li><a class="white-text" href="home">Inicio</a></li>

                 @if(Auth::user()->rol=='publicador')
                         <li><a class="dropdown-button white-text" href="#!" data-activates="dropdown-publish2">Publicar<i class="material-icons right">arrow_drop_down</i></a></li>

                    @endif

                    @if(Auth::user()->rol=='buscador')
                         <li><a class="modal-trigger white-text" href="#permiso-model">Publicar</a></li>
                   
                    @endif

                     @if(Auth::user()->rol=='pendiente')
                         <li><a class="modal-trigger white-text" href="#pendiente-model">Publicar</a></li>
                   
                    @endif

                 @if(Auth::user()->rol!='administrador')
                        <li>
                            <a class="dropdown-button white-text" href="#!" data-activates="dropdown2">{!!Auth::user()->name!!}
                                <i class="material-icons right">person_pin</i></a>
                        </li>
                   
                    @endif

                     @if(Auth::user()->rol=='administrador')

                     <?php
                            $usersPend = Mundocente\User::where('rol','pendiente')->count();
                        ?>

                     <li>
                            <a  href="admin">Pendientes ({{$usersPend}}) <i class="material-icons right">add_alert</i></a>
                        </li>
                          <li><a href="logout">Salir <i class="material-icons right">power_settings_new</i></a></li>
                   
                    @endif

               




            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="settings">Configuración</a></li>
        <li class="divider"></li>
        <li><a href="publication">Mis Publicaciones</a></li>
        <li class="divider"></li>
        <li><a href="logout">Salir</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="settings">Configuración</a></li>
        <li class="divider"></li>
        <li><a href="publication">Mis Publicaciones</a></li>
        <li class="divider"></li>
        <li><a href="logout">Salir</a></li>
    </ul>




    
         <ul id="dropdown-publish" class="dropdown-content">
        <li><a class="modal-trigger" href="#convocatoria">Convocatoria</a></li>
        <li class="divider"></li>
        <li><a class="modal-trigger" href="#revista">Revista</a></li>
        <li class="divider"></li>
        <li><a class="modal-trigger" href="#evento">Evento</a></li>
    </ul>
    <ul id="dropdown-publish2" class="dropdown-content">
        <li><a class="modal-trigger" href="#convocatoria">Convocatoria</a></li>
        <li class="divider"></li>
        <li><a class="modal-trigger" href="#revista">Revista</a></li>
        <li class="divider"></li>
        <li><a class="modal-trigger" href="#evento">Evento</a></li>
    </ul>



    



   
</section>






<!-- _____________________________________________Incluye los formularios de publicacion-->


    @include('formularios.formulariosPublicaciones')


@yield('content')




<footer class="page-footer grey lighten-3">
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href=""><i class="material-icons">book</i></a>
        </div>
    </div>
</footer>

<!--Scripts -->
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}
{!!Html::script('js/manager_user_admin.js')!!}
{!!Html::script('js/manejaPermisos.js')!!}
{!!Html::script('js/add_activity.js')!!}
{!!Html::script('js/edit_publication.js')!!}
{!!Html::script('js/admin.js')!!}


</body>
</html>