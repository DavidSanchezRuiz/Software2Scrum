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
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="search.html" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul class="right hide-on-med-and-down">
                <li class="input-field">

                {!!Form::open(['route'=>'search.store'])!!}

                    <input id="search" type="search" name="palabra-clave" autocomplete="off" placeholder="Ingrese título de publicación" required="required" class="grey" style="width: 300px">
                    <label for="search"></label><i class="material-icons">{!!Form::submit('search',['class'=>'btn-flat buton-search', 'title'=>'Click para buscar'])!!}</i>
                    
                {!!Form::close()!!}
                </li>
                <li><a href="#" class="waves-effect waves-teal"><i class="material-icons right">person_pin</i>{!!Auth::user()->name!!}</a></li>
                <li><a href="settings" class="waves-effect waves-teal"><i class="material-icons right">settings</i>Configuración</a></li>
                <li><a href="logout" class="waves-effect waves-teal"><i class="material-icons right">system_update_alt</i>Salir</a></li>
                
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="home">Actividades</a></li>
                <li><a href="settings">Cuenta</a></li>
                <li><a href="logout">Salir</a></li>
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
                            <div class="card-content center" style="min-height:0px">
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type green accent-4" href="home">Mostrar todo</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type orange" href="convocatorias">Convocatorias docentes</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type red" href="revistas">Revistas científicas</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type blue" href="eventos">Eventos académicos</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">description</i>Búsqueda específica</span>
                            <div class="divider"></div>
                            <div class="card-content" style="min-height: 0px">

                            <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Por Universidad</label>

                                {!!Form::select('search_univer', $institutes, Auth::user()->institute_id )!!}

                            </div>
                                
                                <br>

                                <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Por Área</label>

                                {!!Form::select('search_area', $areas)!!}

                            </div>
                               
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m9">
                <h4 class="light">Resultados: </h4>
                <ul class="row">
                {!!$actividads->render()!!}


                @foreach($actividads as $actividad)

                 <li class="col s12 m12" >
                        <div class="card" style="height: 200px">
                            <div class="card-content">
                                <h5 style="float: right;">{{$actividad->tipo}}</h5>
                                <span class="card-title"> {{$actividad->title}}</span>
                                <p class="light">{{$actividad->description}}</p>
                                    <div class="card-action">
                              
                              <a href="{{$actividad->enlace}}">Leer más</a>

                            </div>
                            </div>
                           
                        </div>
                    </li>

                @endforeach

                   
                  
                 
                  
                   
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