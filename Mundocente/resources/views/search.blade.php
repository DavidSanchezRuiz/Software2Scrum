<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Busqueda</title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!!Html::style('css/materialize.min.css')!!}
    {!!Html::style('css/style.css')!!}
</head>
<body>

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

<!-- Modal Evento -->
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

<section class="section" id="#Content">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <h4 class="light" style="margin: 8px auto; font-size: 1.95em;">Filtros</h4>
                <ul>
                    <li>
                        <div class="card">
                            <span class="card-title"><i
                                        class="material-icons card-title-center">filter_list</i>Tipo</span>
                            <div class="divider"></div>
                            <div class="card-content center" style="min-height:0px">
                                <div class="filter-button"><a
                                            class="btn waves-effect waves-light btn-type green accent-4" href="home">Mostrar
                                        todo</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type orange"
                                                              href="resultados-convocatorias">Convocatorias docentes</a>
                                </div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type red"
                                                              href="resultados-revistas">Revistas científicas</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type blue"
                                                              href="resultados-eventos">Eventos académicos</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">description</i>Búsqueda específica</span>
                            <div class="divider"></div>
                            <div class="card-content" style="min-height: 0px">

                                <div style="padding-top: 10px">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">Por
                                        Universidad</label>
                                    {!!Form::select('search_univer', $institutes, Auth::user()->institute_id ,['class'=>'browser-default'])!!}

                                </div>
                                <br>
                                <div style="padding-top: 10px;">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">Por Área</label>
                                    {!!Form::select('search_area', $areas,null,['class'=>'browser-default'])!!}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m8" style="float: right;">
                <h4 style="padding-top: 8px; margin: 0 auto; font-size: 1.95em" class="light">Resultados</h4>
                <ul class="row">
                    @foreach($actividads as $actividad)
                        <li class="col s12 m12">
                            <div class="card-panel" style="min-height: 200px">
                                <ul class="row">
                                    <li class="col s12 m12">
                                        <span style="font-size: 1.4em"> {{$actividad->title}}</span>
                                        <div class="divider"></div>
                                    </li>
                                    <li class="col s12 m12">
                                        <p class="light">{{$actividad->description}}</p>
                                    </li>
                                    <li class="col s12 m12">
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
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                    <li class="col s12 m12">
                        <div class="center">
                            {!!$actividads->render()!!}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="page-footer grey lighten-3">
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href=""><i class="material-icons">book</i></a>
        </div>
    </div>
</footer>

<!--Scripts -->
{!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
{!!Html::script('js/materialize.min.js')!!}
{!!Html::script('js/init.js')!!}
</body>
</html>