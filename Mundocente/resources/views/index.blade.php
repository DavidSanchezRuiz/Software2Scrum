<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mundocente</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen, projection"/>
</head>
<body>
<!-- Navegador -->
<section class="navbar-fixed">
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="#!" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul id="Register-nav" class="dropdown-content">
                <li><a href="#Login" class="modal-trigger">Iniciar sesión</a></li>
                <li class="divider"></li>
                <li><a href="#Sign-up" class="modal-trigger">Registrarse</a></li>
            </ul>
            <ul id="Register-side-nav" class="dropdown-content">
                <li><a href="#Login" class="modal-trigger">Iniciar sesión</a></li>
                <li class="divider"></li>
                <li><a href="#Sign-up" class="modal-trigger">Registrarse</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="#banner" class="waves-effect waves-teal">Inicio</a></li>
                <li><a href="#Services" class="waves-effect waves-teal">Servicios</a></li>
                <li><a href="#News" class="waves-effect waves-teal">Reciente</a></li>
                <li><a href="#Team" class="waves-effect waves-teal">Equipo</a></li>
                <li><a href="#Contact" class="waves-effect waves-teal">Contacto</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="Register-nav">Cuenta<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav grey darken-3">
                <li><a href="#banner" class="white-text">Inicio</a></li>
                <li><a href="#Services" class="white-text">Servicios</a></li>
                <li><a href="#News" class="white-text">Reciente</a></li>
                <li><a href="#Team" class="white-text">Equipo</a></li>
                <li><a href="#Contact" class="white-text">Contacto</a></li>
                <li><a class="dropdown-button white-text" href="#!" data-activates="Register-side-nav">Cuenta<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</section>

<!-- Formulario de ingreso -->

<div id="Login" class="modal">
    <div class="modal-content">
        <h5>Iniciar Sesion</h5>

        <form class="row">
            <div class="col s12 style-form">
                <input id="email-login" type="email" class="validate">
                <label for="email-login">Email</label>
            </div>
            <div class="col s12 style-form">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="col s12 center-align">
                <button class="btn waves-effect waves-green cyan darken-3" type="submit" name="action">
                    Enviar
                </button>
            </div>
        </form>
        <div id="login-failed-panel" class="red-text center-align" style="display: none;">
            Login failed, please try again.
        </div>
        <div class="section center">
            <a class="modal-trigger" href="#!">¿Olvido su contraseña?</a>
        </div>
    </div>
</div>

<div id="Sign-up" class="modal">
    <div class="modal-content">
        <h5>Registro</h5>




<!-- Formulario de registro -->


{!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}


            <div class="col s12 style-form">
                
                {!!Form::text('name',null,['class'=>'validate','placeholder'=>'Ingrese su nombre'])!!}
                
            </div>
            <div class="col s12 style-form">
                
                {!!Form::text('lastName',null,['class'=>'validate','placeholder'=>'Ingrese su apellido'])!!}
                
            </div>
            <div class="col s12 style-form">
                
                {!!Form::text('email',null,['class'=>'validate','placeholder'=>'Ingrese su correo'])!!}
                
            </div>
            <div class="col s12 style-form">
                <select>
                    <option value="" disabled selected>Seleccion una univerisdad</option>
                    <option value="1">UPTC - Sede Tunja</option>
                    <option value="2">Uniboyaca</option>
                    <option value="3">Juan de Castellano</option>
                    <option value="3">Los Andes</option>
                    <option value="3">Javeriana</option>
                    <option value="3">Universidad nacional de Colombia</option>
                </select>
                <label>Universidad</label>
            </div>
            <div class="col s12 style-form">
                {!!Form::password('password',['class'=>'validate','placeholder'=>'Contraseña'])!!}
            </div>
            <div class="col s12 style-form">
                {!!Form::password('passwordConfim',['class'=>'validate','placeholder'=>'Confirmar contraseña'])!!}
            </div>
            <div class="col s12 center-align">
                {!!Form::submit('Registrar',['class'=>'btn waves-effect waves-green cyan darken-3'])!!}
            </div>



{!!Form::close()!!}

        
    </div>
</div>




<!-- Banner -->
<section class="section banner scrollspy" id="banner">
    <div class="container banner-container">
        <div class="row center">
            <img class="center" src="images/LogMundocente-01.png" style="width: 300px; height: 300px;">
            <h5 class="header col s12 light grey-text text-lighten-2">Bienvenido a Mundocente, el sitio web pensado para las necesidades de los docentes.</h5>
        </div>
        <div class="row center">
            <a href="#Sign-up" class="btn-large waves-effect waves-green cyan darken-3">REGISTRARSE</a>
        </div>
    </div>
    <svg id="bottomShape" width="100%" height="50px" fill="#eeeeee" viewBox="0 0 1366 60" preserveAspectRatio="none" style="margin-bottom: -40px ;">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Servicios -->
<section class="section grey lighten-3 services scrollspy" id="Services">
    <div class="container">
        <h4 class="center-align grey-text text-darken-3 light sub-title" >Servicios</h4>
        <ul class="row">
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Convocatoria.png" class="image-services"></h2>
                    <h5 class="center">Convocatorias de docentes</h5>

                    <p class="light center-align">Entérese a tiempo de las oportunidades laborales ofrecidas en diferentes universidades del país.</p>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Revistas.png" class="image-services"></h2>
                    <h5 class="center">Revistas científicas</h5>

                    <p class="light center-align">Consulte con facilidad revistas científicas publicadas por los docentes registrados en Mundocente y encuentre información especializada en sus áreas de interés. </p>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Eventos.png" class="image-services"></h2>
                    <h5 class="center">Eventos académicos</h5>

                    <p class="light center-align">Entérese de congresos, 	seminarios, conferencias y de más eventos académicos ofrecidos por las universidades registradas en Mundocente. </p>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Reciente -->
<section class="section news scrollspy" id="News">
    <svg id="topShape" width="100%" height="30px" fill="#eeeeee" viewBox="0 0 1366 80" preserveAspectRatio="none" style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container">
        <h4 class="center-align grey-text light sub-title">Reciente</h4>
        <ul class="row">


        @foreach($actividads as $actividad)


        <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">{{$actividad->tipo_actividad}} - {{$actividad->titulo}}</span>
                        <p class="light">{{$actividad->descripcion}}.</p>
                    </div>
                    <div class="card-action grey darken-3 right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>

            @endforeach

        </ul>
    </div>
    <svg id="bottomShape" width="100%" height="50px" fill="#eeeeee" viewBox="0 0 1366 70" preserveAspectRatio="none" style="margin-bottom: -40px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Equipo -->
<section class="section scrollspy team" id="Team">
    <svg id="topShape" width="100%" height="30px" fill="#eeeeee" viewBox="0 0 1366 80" preserveAspectRatio="none" style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container">
        <h4 class="center-align grey-text text-darken-3 light sub-title">Equipo</h4>
        <ul class="row center">
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto.jpg">
                <div class="info-developers">
                    <h5 class="light">Diego Alexander Sosa Suarez</h5>
                    <div>
                        <span class="center">Desarrollador - Frontend</span>
                    </div>
                    <div>
                        <span class="center">Mail: diego.sosa0704@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto2.jpg">
                <div class="info-developers">
                    <h5 class="light">David Felipe Sánchez Torres</h5>
                    <div>
                        <span class="center">Desarrollador - Backend</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake1@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto3.jpg">
                <div class="info-developers">
                    <h5 class="light">Jose Edison Solano Correa</h5>
                    <div>
                        <span class="center">Desarrollador - Software</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake1@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto4.jpg">
                <div class="info-developers">
                    <h5 class="light">David Sanchez</h5>
                    <div>
                        <span class="center">Desarrollador</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake1@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img src="images/LogMundocente-01.png" style="width: 250px; height: 250px;">
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto5.jpg">
                <div class="info-developers">
                    <h5 class="light">Angela Paola</h5>
                    <div>
                        <span class="center">Desarrollador</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake1@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Contacto -->
<section class="section grey lighten-3 scrollspy" id="Contact">
    <svg id="topShape" width="100%" height="30px" fill="#eeeeee" viewBox="0 0 1366 80" preserveAspectRatio="none" style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container contact-container">
        <h4 class="center-align grey-text light sub-title">Contacto</h4>
        <ul class="row">
            <li class="col s12 m6">
                <form class="row contact-form">
                    <div class="col s6 style-form">
                        <input id="first_name" type="text" class="validate grey-text">
                        <label for="first_name" >Nombres</label>
                    </div>
                    <div class="col s6 style-form">
                        <input id="last_name" type="text" class="validate grey-text">
                        <label for="last_name">Apellidos</label>
                    </div>
                    <div class="col s12 style-form">
                        <input id="email" type="email" class="validate grey-text" autocomplete="off">
                        <label for="email">Email</label>
                    </div>
                    <div class="col s12 style-form">
                        <textarea id="textarea" class="materialize-textarea grey-text"></textarea>
                        <label for="textarea">Mensaje</label>
                    </div>
                    <div class="col s12 center-align form-contact">
                        <br>
                        <button class="btn waves-effect waves-green cyan darken-3" type="submit" name="action">
                            Enviar
                        </button>
                    </div>
                </form>
            </li>
            <li class="col s12 m6">
                <div class="inf-contact">
                    <ul class="row">
                        <li class="col s12 m12 grey-text">
                            <span>Dirección: Tunja (Boyaca - Colombia) </span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Telefono: +57 3133616690</span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Email: email@fake.com </span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Website: http://mundocente.com/</span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="col s12 m12">
                <div class="cont-map">
                    <iframe class="map" data-wow-duration="1000ms" data-wow-delay="400ms" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.101396505628!2d-73.35884268580895!3d5.551984335235101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a7c3d644e3cd9%3A0x3c1e6f4e767244da!2sUPTC%2C+Universidad+Pedag%C3%B3gica+y+Tecnol%C3%B3gica+de+Colombia!5e0!3m2!1ses!2sco!4v1459276357203"  style=" width: 100%; height: 100%;" allowfullscreen></iframe>
                </div>
            </li>
        </ul>
    </div>
    <svg id="bottomShape" width="100%" height="50px" fill="#37474f" viewBox="0 0 1366 70" preserveAspectRatio="none" style="margin-bottom: -41px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Footer -->
<footer class="page-footer blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text" style="font-size: 1.7em">Mundocente</h5>
                <p class="grey-text text-lighten-4">Encuentre información referente a revistas académicas, convocatorias para docentes y eventos académicos organizados por las universidades del país.</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#">Mas Links</a>
        </div>
    </div>
</footer>
<!--Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
</body>
</html>