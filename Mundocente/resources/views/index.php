<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mundocente.co</title>

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
            <a href="index.html" class="brand-logo">Mundocente</a>
            <ul id="Register" class="dropdown-content">
                <li><a href="#Login" class="modal-trigger">Login</a></li>
                <li class="divider"></li>
                <li><a href="#Sign-up" class="modal-trigger">Sign up</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="#banner" class="waves-effect waves-teal">Home</a></li>
                <li><a href="#Services" class="waves-effect waves-teal">Servicios</a></li>
                <li><a href="#News" class="waves-effect waves-teal">Reciente</a></li>
                <li><a href="#Team" class="waves-effect waves-teal">Equipo</a></li>
                <li><a href="#Contact" class="waves-effect waves-teal">Contacto</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="Register">Registro<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="#banner">Home</a></li>
                <li><a href="#Services">Servicios</a></li>
                <li><a href="#News">Reciente</a></li>
                <li><a href="#Team">Equipo</a></li>
                <li><a href="#Contact">Contacto</a></li>
                <li><a href="#">Registro</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</section>

<div id="Login" class="modal">
    <div class="modal-content">
        <h5>Iniciar Sesion</h5>
        <form class="row contact-form">
            <div class="col s12">
                <input id="email-login" type="email" class="validate">
                <label for="email-login">Email</label>
            </div>
            <div class="col s12">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="col s12 center-align">
                <button class="btn waves-effect waves-green cyan darken-3" style="font-size: 0.7em" type="submit" name="action">
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

<div id="Sign-up" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>Registro</h5>
        <form class="row contact-form">
            <div class="col s12">
                <input id="Username" type="text" class="validate">
                <label for="Username">Nombre de usuario</label>
            </div>
            <div class="col s12">
                <input id="email-sign-up" type="email" class="validate">
                <label for="email-sign-up">Email</label>
            </div>
            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Seleccion una univerisdad</option>
                    <option value="1">Opción 1</option>
                    <option value="2">Opción 2</option>
                    <option value="3">Opción 3</option>
                </select>
                <label>Universidad</label>
            </div>
            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Seleccione un area</option>
                    <option value="1">Opción 1</option>
                    <option value="2">Opción 2</option>
                    <option value="3">Opción 3</option>
                </select>
                <label>Area</label>
            </div>
            <div class="col s12">
                <input id="password-sign-up" type="password" class="validate">
                <label for="password-sign-up">Contraseña</label>
            </div>
            <div class="col s12">
                <input id="Confirm-password-sign-up" type="password" class="validate">
                <label for="Confirm-password-sign-up">Confirmar Contraseña</label>
            </div>
            <div class="col s12 center-align">
                <button class="btn waves-effect waves-green cyan darken-3" style="font-size: 0.7em" type="submit" name="action">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Banner -->
<section class="section banner scrollspy" id="banner">
    <div class="container banner-container">
        <div class="row center">
            <img class="center" src="images/LogMundocente-01.png" style="width: 300px; height: 300px;">
            <h5 class="header col s12 light">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
        </div>
        <div class="row center">
            <a href="#" id="download-button" class="btn-large waves-effect waves-green cyan darken-3">Registrarse</a>
        </div>
    </div>
    <svg id="bottomShape" width="100%" height="50px" fill="#eeeeee" viewBox="0 0 1366 60" preserveAspectRatio="none" style="margin-bottom: -40px ;">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Servicios -->
<section class="section grey lighten-3 services scrollspy" id="Services">
    <div class="container">
        <h4 class="center-align grey-text text-darken-3 light">Servicios</h4>
        <ul class="row">
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Convocatoria.png" class="image-services"></h2>
                    <h5 class="center">Convocatorias Docentes</h5>

                    <p class="light center-align">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.
                        Additionally, we refined animations and transitions.</p>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Revistas.png" class="image-services"></h2>
                    <h5 class="center">Revistas Cientificas</h5>

                    <p class="light center-align">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center"><img src="images/Eventos.png" class="image-services"></h2>
                    <h5 class="center">Eventos Academicos</h5>

                    <p class="light center-align">We did most of the heavy lifting for you to provide a default stylings.</p>
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
        <h4 class="center-align grey-text text-darken-3 light">Reciente</h4>
        <ul class="row">
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action grey darken-3 right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action red darken-1 right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action white right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            uspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action white right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action grey darken-3 right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">Titulo</span>
                        <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                            Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                    </div>
                    <div class="card-action red darken-1 right-align">
                        <a href="#">Ver más</a>
                    </div>
                </div>
            </li>
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
        <h4 class="center-align grey-text text-darken-3 light">Equipo</h4>
        <ul class="row center">
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto.jpg">
                <div class="info-developers">
                    <h5 class="light">Diego Alexander Sosa Suarez</h5>
                    <div>
                        <span class="center">Desarrollador - Frontend</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake1@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: </span>
                    </div>
                    <div>
                        <a href="">Facebook</a>
                        <a href="">Twitter</a>
                        <a href="">Google+</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto2.jpg">
                <div class="info-developers">
                    <h5 class="light">David Felipe Sanchez Torres</h5>
                    <div>
                        <span class="center">Desarrollador - Backend</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake2@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: </span>
                    </div>
                    <div>
                        <a href="">Facebook</a>
                        <a href="">Twitter</a>
                        <a href="">Google+</a>
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
                        <span class="center">Mail: examplefake3@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: </span>
                    </div>
                    <div>
                        <a href="">Facebook</a>
                        <a href="">Twitter</a>
                        <a href="">Google+</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto4.jpg">
                <div class="info-developers">
                    <h5 class="light">David Ignacio Sanchez Ruiz</h5>
                    <div>
                        <span class="center">Desarrollador</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake4@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: </span>
                    </div>
                    <div>
                        <a href="">Facebook</a>
                        <a href="">Twitter</a>
                        <a href="">Google+</a>
                    </div>
                </div>
            </li>
            <li class="col s12 m4">
                <img src="images/LogMundocente-01.png" style="width: 250px; height: 250px;">
            </li>
            <li class="col s12 m4">
                <img class="responsive-img team-photo z-depth-2" src="images/foto5.jpg">
                <div class="info-developers">
                    <h5 class="light">Angela Patricia Vega Vega </h5>
                    <div>
                        <span class="center">Desarrollador</span>
                    </div>
                    <div>
                        <span class="center">Mail: examplefake5@gmail.com</span>
                    </div>
                    <div>
                        <span class="center">Tel: </span>
                    </div>
                    <div>
                        <a href="">Facebook</a>
                        <a href="">Twitter</a>
                        <a href="">Google+</a>
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
        <h4 class="center-align grey-text light">Contacto</h4>
        <ul class="row">
            <li class="col s12 m6">
                <form class="row contact-form">
                    <div class="col s6">
                        <input id="first_name" type="text" class="validate grey-text">
                        <label for="first_name" >Nombres</label>
                    </div>
                    <div class="col s6">
                        <input id="last_name" type="text" class="validate grey-text">
                        <label for="last_name">Apellidos</label>
                    </div>
                    <div class="col s12">
                        <input id="email" type="email" class="validate grey-text">
                        <label for="email">Email</label>
                    </div>
                    <div class="col s12">
                        <textarea id="textarea" class="materialize-textarea grey-text"></textarea>
                        <label for="textarea">Mensaje</label>
                    </div>
                    <div class="col s12 center-align">
                        <br>
                        <button class="btn waves-effect waves-green cyan darken-3" style="font-size: 0.7em" type="submit" name="action">
                            Enviar
                        </button>
                    </div>
                </form>
            </li>
            <li class="col s12 m6">
                <div class="inf-contact">
                    <ul class="row">
                        <li class="col s12 m12 grey-text">
                            <span>Direccion: Tunja (Boyaca - Colombia) </span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Telefono: +57 3133616690 </span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Email: email@fake.ev </span>
                        </li>
                        <li class="col s12 m12 grey-text">
                            <span>Direccion: Tunja (Boyaca - Colombia) </span>
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
    <svg id="bottomShape" width="100%" height="50px" fill="#263238" viewBox="0 0 1366 70" preserveAspectRatio="none" style="margin-bottom: -41px">
        <path d="m 0.274329,73.862183 1366,0 L 1366,9.3475355 900.35901,39.96681 -0.00563127,0.20494098 z" stroke-width="0" stroke-dasharray="none" stroke-miterlimit="4"></path>
    </svg>
</section>

<!-- Footer -->
<footer class="page-footer blue-grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Pie de pagina</h5>
                <p class="grey-text text-lighten-4">Contenido de pie de pagina.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
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