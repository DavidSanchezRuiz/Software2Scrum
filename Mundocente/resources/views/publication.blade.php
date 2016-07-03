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
<body class="body-publication">

<!-- Navegador -->
<section class="navbar">
    <nav class="grey darken-4" style="z-index: 10">
        <div class="nav-wrapper container list">
            <a href="home" class="brand-logo"><img src="images/logoNav.png" style="height: 60px;"></a>
            <ul class="right hide-on-med-and-down nav-size">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off" placeholder="Ingrese título de publicación o Universidad" required="required" class="grey" style="min-width: 400px; height:65px;">
                    <label for="search"></label><i class="material-icons">
                        {!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>
                <li><a href="home">Inicio</a></li>
                <li><a class="dropdown-button white-text" href="#!" data-activates="dropdown-publish">Publicar<i class="material-icons right">arrow_drop_down</i></a></li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1">{!!Auth::user()->name!!} <i class="material-icons right">person_pin</i></a>
                </li>
            </ul>

            <ul id="nav-mobile" class="side-nav grey darken-3">
                <li class="input-field">
                    {!!Form::open(['route'=>'search.store'])!!}
                    <input id="search" type="search" name="palabra-clave" autocomplete="off" placeholder="Palabra clave" required="required" class="grey" style="width: 160px; height:65px;">
                    <label for="search"></label><i class="material-icons">{!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    {!!Form::close()!!}
                </li>

                <li><a class="white-text" href="home">Inicio</a></li>

                <li><a class="dropdown-button white-text" href="#!" data-activates="dropdown-publish2">Publicar<i class="material-icons right">arrow_drop_down</i></a></li>

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
        <li><a href="publication">Publicaciones</a></li>
        <li class="divider"></li>
        <li><a href="logout">Salir</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="settings">Configuración</a></li>
        <li class="divider"></li>
        <li><a href="publication">Publicaciones</a></li>
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

<!-- Modal Convocatoria -->
<div id="convocatoria" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Publicar Convocatoria</h3>
            <p class="light">Para realizar publicaciones de las diferentes actividades de la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="col s12 m12">
                    <label>Ciudad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Universidad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="cargo" type="text" class="validate">
                    <label class="active" for="cargo">Cargo</label>
                </div>

                <div class="col s12 m12">
                    <label>Fecha inicio</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="col s12 m12">
                    <label>Fecha fin</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Publicar</a>
    </div>
</div>

<!-- Modal Revista -->
<div id="revista" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Publicar Revista Científica</h3>
            <p class="light">Para realizar publicaciones de las diferentes actividades de la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="input-field col s12 m12">
                    <input id="instituto" type="text" class="validate">
                    <label class="active" for="instituto">Univiersidad o instituto</label>
                </div>

                <div class="input-field col s12 m12">
                    <input id="titulo" type="text" class="validate">
                    <label class="active" for="titulo">Titulo</label>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="index" type="text" class="validate">
                    <label class="active" for="index">Indexada en</label>
                </div>

                <div class="col s12 m12">
                    <label>Fecha limite</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Publicar</a>
    </div>
</div>

<!-- Moda Editar l Evento -->
<div id="evento" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Publicar Evento Académico</h3>
            <p class="light">Para realizar publicaciones de los diferetes enventos en la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="input-field col s12 m12">
                    <input id="nombre-evento" type="text" class="validate">
                    <label class="active" for="nombre-evento">Nombre evento</label>
                </div>

                <div class="col s12 m12">
                    <label>Ciudad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Fecha inicio</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="col s12 m12">
                    <label>Fecha fin</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Publicar</a>
    </div>
</div>

<div class="container-account">
    <div class="card">
        <div style="padding:10px">
            <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Publicaciones realizadas</span>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <ul class="row" style="margin: auto">
                <li class="col s12 m12">
                    <table>
                        <thead>
                        <tr>
                            <th data-field="id">Tipo</th>
                            <th data-field="institute">Universidad o Instituto</th>
                            <th data-field="name">Nombre o Cargo</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Convocatoria</td>
                            <td>UPTC</td>
                            <td>Profesor matematicas</td>
                            <td><a class="btn waves-effect waves-light green modal-trigger" href="#editar-convocatoria">Editar</a></td>
                            <td><a class="btn waves-effect waves-light red">Borrar</a></td>
                        </tr>
                        <tr>
                            <td>Revista</td>
                            <td>UPTC</td>
                            <td>Profesor matematicas</td>
                            <td><a class="btn waves-effect waves-light green modal-trigger" href="#editar-revista">Editar</a></td>
                            <td><a class="btn waves-effect waves-light red">Borrar</a></td>
                        </tr>
                        <tr>
                            <td>Evento Academico</td>
                            <td>UPTC</td>
                            <td>Profesor matematicas</td>
                            <td><a class="btn waves-effect waves-light green modal-trigger" href="#editar-evento">Editar</a></td>
                            <td><a class="btn waves-effect waves-light red">Borrar</a></td>
                        </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- +==============================================================================================================- -->

<!-- Modal Editar Convocatoria -->
<div id="editar-convocatoria" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Editar Convocatoria</h3>
            <p class="light">Para realizar publicaciones de las diferentes actividades de la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="col s12 m12">
                    <label>Ciudad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Universidad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="cargo" type="text" class="validate">
                    <label class="active" for="cargo">Cargo</label>
                </div>

                <div class="col s12 m12">
                    <label>Fecha inicio</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="col s12 m12">
                    <label>Fecha fin</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Editar</a>
    </div>
</div>

<!-- Modal Editar Revista -->
<div id="editar-revista" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Editar Revista Científica</h3>
            <p class="light">Para realizar publicaciones de las diferentes actividades de la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="input-field col s12 m12">
                    <input id="instituto" type="text" class="validate">
                    <label class="active" for="instituto">Univiersidad o instituto</label>
                </div>

                <div class="input-field col s12 m12">
                    <input id="titulo" type="text" class="validate">
                    <label class="active" for="titulo">Titulo</label>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="index" type="text" class="validate">
                    <label class="active" for="index">Indexada en</label>
                </div>

                <div class="col s12 m12">
                    <label>Fecha limite</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Editar</a>
    </div>
</div>

<!-- Modal Evento -->
<div id="editar-evento" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container">
            <h3 class="light">Editar Evento Académico</h3>
            <p class="light">Para realizar publicaciones de los diferetes enventos en la pagina, el siguiente formulario debe ser diligenciado en su totalidad.</p>
            <form class="row form-publish">

                <div class="input-field col s12 m12">
                    <input id="nombre-evento" type="text" class="validate">
                    <label class="active" for="nombre-evento">Nombre evento</label>
                </div>

                <div class="col s12 m12">
                    <label>Ciudad</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Area</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Seleccione una opcion.</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="col s12 m12">
                    <label>Fecha inicio</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="col s12 m12">
                    <label>Fecha fin</label>
                    <input type="date" class="datepicker">
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace" type="text" class="validate">
                    <label class="active" for="enlace">Enlace</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Editar</a>
    </div>
</div>

<footer id="footer" class="page-footer grey lighten-3">
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