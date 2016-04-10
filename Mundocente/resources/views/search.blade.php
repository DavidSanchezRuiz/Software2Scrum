<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Busqueda</title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen, projection"/>
</head>
<body>

<!-- Navegador -->
<section class="navbar">
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="search.html" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul class="right hide-on-med-and-down">
                <li class="input-field">
                    <input id="search" type="search" autocomplete="off" required class="grey" style="width: 300px">
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </li>
                <li><a href="#" class="waves-effect waves-teal"><i class="material-icons right">person_pin</i>

            Cuenta</span>
                        
</a></li>
                <li><a href="#" class="waves-effect waves-teal"><i class="material-icons right">power_settings_new</i>Salir</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Cuenta</a></li>
                <li><a href="#">Salir</a></li>
            </ul>
            <a href="#nav-mobile" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</section>

<section class="section" id="#Content">
    <div class="container">
        <div class="row">
            <div class="col s12 m3 ">
                <h4 class="light" style="padding-bottom: 8px">Filtros</h4>
                <ul>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Tipo</span>
                            <div class="divider"></div>
                            <div class="card-content center">
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type orange" href="#">Convocatorias docentes</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type red" href="#">Revistas científicas</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type blue" href="#">Eventos académicos</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">description</i>Interes</span>
                            <div class="divider"></div>
                            <div class="card-content">
                                <select>
                                    <option value="" disabled selected>Area</option>
                                    <option value="1">Area 1</option>
                                    <option value="2">Area 2</option>
                                    <option value="3">Area 3</option>
                                </select>
                                <br>
                                <select>
                                    <option value="" disabled selected>Universidad</option>
                                    <option value="1">Universidad 1</option>
                                    <option value="2">Universidad 2</option>
                                    <option value="3">Universidad 3</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m9">
                <h4 class="light">Resultados</h4>
                <ul class="row">
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    uspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <li class="col s12 m6">
                        <div class="card white">
                            <div class="card-content">
                                <span class="card-title">Titulo</span>
                                <p class="light">Cras pharetra efficitur purus id condimentum. Fusce nec tempor velit, quis tincidunt elit.
                                    Suspendisse suscipit leo ipsum, a gravida nunc consectetur non. Nulla vel sodales leo.</p>
                            </div>
                            <div class="card-action blue-grey darken-4 right-align">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </li>
                    <ul class="pagination center">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="waves-effect active grey darken-2"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="page-footer blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text" style="font-size: 1.7em">Mundocente</h5>
                <p class="grey-text text-lighten-4">Encuentre información referente a revistas académicas, convocatorias para docentes y eventos académicos organizados por las universidades del país.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Cuenta</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href="http://materializecss.com/sass.html"><i class="material-icons">book</i></a>
        </div>
    </div>
</footer>

<!--Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
</body>
</html>