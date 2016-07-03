<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mundocente</title>

    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}

</head>
<body>
<!-- Navegador -->
<section class="navbar-fixed">
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="/" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#banner" class="waves-effect waves-teal">Inicio</a></li>
                <li><a href="#Services" class="waves-effect waves-teal">Servicios</a></li>
                <li><a href="#News" class="waves-effect waves-teal">Reciente</a></li>
                <li><a href="#Team" class="waves-effect waves-teal">Equipo</a></li>
                <li><a href="#Contact" class="waves-effect waves-teal">Contacto</a></li>
                <li><a class="waves-effect waves-light btn" href="login">Iniciar Sesión</a></li>
                <li><a class="waves-effect  waves-light orange btn" href="singup">Registro</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav grey darken-3">
                <li><a href="#banner" class="white-text">Inicio</a></li>
                <li><a href="#Services" class="white-text">Servicios</a></li>
                <li><a href="#News" class="white-text">Reciente</a></li>
                <li><a href="#Team" class="white-text">Equipo</a></li>
                <li><a href="#Contact" class="white-text">Contacto</a></li>
                <li><a class="waves-effect waves-light btn" href="login">Iniciar Sesión</a></li>
                <li><a class="waves-effect  waves-light orange btn" href="singup">Registro</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</section>

<!-- Banner -->
<section class="section banner scrollspy" id="banner">
    <div class="container">
        <div class="center grey-text text-darken-3  " style="margin-top: 130px; margin-bottom: 130px">
            <h1 class="light">Mundocente</h1>
            <p>La web dedicada a docentes investigadores</p>
            <a class="waves-effect  waves-light orange btn" href="singup">Registro</a>
        </div>
    </div>
    <svg id="bottomShape2" width="100%" height="50px" fill="#f5f5f5" viewBox="0 0 1366 70" preserveAspectRatio="none"
         style="margin-bottom: -40px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Servicios -->
<section class="section services scrollspy" id="Services">
    <div class="container">
        <h2 class="center-align grey-text text-darken-3 thin">Servicios</h2>
        <p class="center container light">En Mundocente ofrecemos la información que necesita un docente universitario
            para tener las mejores oportunidades de crecimiento laboral y personal de acuerdo con sus intereses
            profesionales.</p>
        <div class="line-separator"></div>
        <ul class="row">
            <li class="col s12 m4 center">
                <div class="container-image">
                    <img src="images/Convocatoria.png" class="image-services">
                </div>
                <h5>Convocatorias de docentes</h5>
                <p class="light">Entérese a tiempo de las oportunidades laborales ofrecidas en
                    diferentes universidades del país.</p>
            </li>
            <li class="col s12 m4 center">
                <div class="container-image">
                    <img src="images/Revistas.png" class="image-services">
                </div>
                <h5>Revistas científicas</h5>
                <p class="light">Consulte con facilidad revistas científicas publicadas por los
                    docentes registrados en Mundocente y encuentre información especializada en sus áreas de
                    interés. </p>
            </li>
            <li class="col s12 m4 center">
                <div class="container-image">
                    <img src="images/Eventos.png" class="image-services">
                </div>
                <h5>Eventos académicos</h5>
                <p class="light">Entérese de congresos, seminarios, conferencias y de más eventos
                    académicos ofrecidos por las universidades registradas en Mundocente. </p>
            </li>
        </ul>
    </div>
</section>

<!-- Reciente -->

<?php

$listRecient = Mundocente\Actividad::limit(6)->get();

?>
<section class="section news scrollspy grey darken-4" id="News">
    <svg id="topShape1" width="100%" height="30px" fill="#f5f5f5" viewBox="0 0 1366 80" preserveAspectRatio="none"
         style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container">
        <h2 class="center-align grey-text text-lighten-2 thin">Reciente</h2>
        <div class="line-separator grey lighten-2"></div>
        <ul class="row">
            @foreach($listRecient as $actividad)
                <li class="col s12 m4">
                    <div class="card-panel card-index">
                        <ul class="row">
                            <li class="col s12 m12">
                                <span style=""> {{$actividad->title}}</span>
                                <div class="divider"></div>
                            </li>
                            <li class="col s12 m12">
                                <p class="light">{{$actividad->description}}</p>
                            </li>
                            <li class="col s12 m12">
                                <div class="content-button-card">


                                    @if($actividad->tipo=='convocatoria')
                                        <a href="{{$actividad->enlace}}" class="btn waves-effect orange"
                                           style="float: right;"
                                           title="Ir a convocatoria">{{$actividad->tipo}}</a>
                                    @endif

                                    @if($actividad->tipo=='revista')
                                        <a href="{{$actividad->enlace}}" class="btn waves-effect red"
                                           style="float: right;"
                                           title="Ir a revista">{{$actividad->tipo}}</a>
                                    @endif

                                    @if($actividad->tipo=='evento')
                                        <a href="{{$actividad->enlace}}" class="btn waves-effect blue"
                                           style="float: right;"
                                           title="Ir a evento">{{$actividad->tipo}}</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <svg id="bottomShape2" width="100%" height="50px" fill="#f5f5f5" viewBox="0 0 1366 70" preserveAspectRatio="none"
         style="margin-bottom: -40px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Equipo -->
<section class="section scrollspy team" id="Team">
    <svg id="topShape3" width="100%" height="30px" fill="#f5f5f5" viewBox="0 0 1366 80" preserveAspectRatio="none"
         style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container">
        <h2 class="center-align grey-text text-darken-3 thin">Equipo</h2>
        <div class="line-separator"></div>
        <ul class="row center">
            <li class="col s12 m4">
                <div class="effect">
                    <img class="team-photo" src="/images/DiegoSosa.jpg">
                    <figcaption>
                        <div class="info-photo-team white-text">
                            <span class="light">Diego Alexander Sosa Suarez</span>
                            <p class="thin">Desarrollador frontend</p>
                        </div>
                    </figcaption>
                </div>
                <div class="info-developers">
                    <div>
                        <span class="center">Correo: diego.sosa@uptc.edu.co</span>
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
                <div class="effect">
                    <img class="team-photo" src="/images/DavidSanchez.jpg">
                    <figcaption>
                        <div class="info-photo-team white-text">
                            <span class="light">David Felipe Sanchez Torres</span>
                            <p class="thin">Desarrollador backend</p>
                        </div>
                    </figcaption>
                </div>
                <div class="info-developers">
                    <div>
                        <span class="center">Correo: david.sancheztorres@uptc.edu.co</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3212323654</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="effect">
                    <img class="team-photo" src="/images/EdisonSolano.jpg">
                    <figcaption>
                        <div class="info-photo-team white-text">
                            <span class="light">Jose Edison Solano Correa</span>
                            <p class="thin">Desarrollador - Gestión de proyecto</p>
                        </div>
                    </figcaption>
                </div>
                <div class="info-developers">
                    <div>
                        <span class="center">Correo: edison.solano@uptc.edu.co</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3144134406</span>
                    </div>
                    <div>
                        <a href=""><img src="images/Facebook.png"></a>
                        <a href=""><img src="images/Twitter.png"></a>
                        <a href=""><img src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="effect">
                    <img class="team-photo" src="/images/IgnacioSanchez.jpg">
                    <figcaption>
                        <div class="info-photo-team white-text">
                            <span class="light">David Igancio Sánchez Ruíz</span>
                            <p class="thin">Usabilidad - Calidad</p>
                        </div>
                    </figcaption>
                </div>
                <div class="info-developers">
                    <div>
                        <span class="center">Correo: david.sanchezruiz@uptc.edu.co</span>
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
                <img class="responsive-img img" src="images/LogMundocente-01.png" style="width: 250px; height: 250px;">
            </li>
            <li class="col s12 m4">
                <div class="effect">
                    <img class="team-photo" src="/images/AngelaVega.png">
                    <figcaption>
                        <div class="info-photo-team white-text">
                            <span class="light">Ángela Patricia Vega Vega</span>
                            <p class="thin">Usabilidad - Calidad</p>
                        </div>
                    </figcaption>
                </div>
                <div class="info-developers">
                    <div>
                        <span class="center">Correo: angela.vega@uptc.edu.co</span>
                    </div>
                    <div>
                        <span class="center">Tel: 3133616690</span>
                    </div>
                    <div>
                        <a href=""><img style="width: 30px" src="images/Facebook.png"></a>
                        <a href=""><img style="width: 30px" src="images/Twitter.png"></a>
                        <a href=""><img style="width: 30px" src="images/GooglePlus.png"></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Contacto -->
<section class="section scrollspy grey darken-4" id="Contact">
    <svg id="topShape4" width="100%" height="30px" fill="#f5f5f5" viewBox="0 0 1366 80" preserveAspectRatio="none"
         style="margin-top: -1px">
        <path d="M 0.41421356,0.19566509 1366,0.05152333 1366,64.30153 550,26.30153 -0.03033009,73.726403"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
    <div class="container contact-container">
        <h2 class="center-align grey-text text-lighten-2 thin">Contacto</h2>
        <div class="line-separator grey lighten-2"></div>
        <ul class="row">
            <li class="col s12 m6">
                <form class="row contact-form">
                    <div class="col s6 style-form">
                        <input id="first_name" type="text" class="validate grey-text">
                        <label for="first_name">Nombres</label>
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
                        <li class="col s12 m12 grey-text light">
                            <span>Dirección: Tunja (Boyaca - Colombia) </span>
                        </li>
                        <li class="col s12 m12 grey-text light">
                            <span>Telefono: +57 3133616690</span>
                        </li>
                        <li class="col s12 m12 grey-text light">
                            <span>Email: email@fake.com </span>
                        </li>
                        <li class="col s12 m12 grey-text light">
                            <span>Website: http://mundocente.com/</span>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <svg id="bottomShape5" width="100%" height="50px" fill="#37474f" viewBox="0 0 1366 70" preserveAspectRatio="none"
         style="margin-bottom: -41px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z"
              stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Footer -->
<footer class="page-footer blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text" style="font-size: 1.7em">Mundocente</h5>
                <p class="grey-text text-lighten-4">Encuentre información referente a revistas académicas, convocatorias
                    para docentes y eventos académicos organizados por las universidades del país.</p>
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
{!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}
</body>
</html>