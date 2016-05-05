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

<section class="section" id="#Content">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <h4 class="light" style="padding-bottom: 8px; font-size: 1.9em">Filtros</h4>
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
                <h4 style="font-size: 1.9em" class="light">Resultados</h4>
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