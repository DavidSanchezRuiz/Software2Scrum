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
<body>

<!-- Navegador -->
<section class="navbar">
    <nav class="grey darken-4">
        <div class="nav-wrapper container list">
            <a href="search.html" class="brand-logo"><img src="images/logoNav.png" style="width: 230px; height: 60px;"></a>
            <ul class="right hide-on-med-and-down">
               <li class="input-field">
                    <input id="search" type="search" autocomplete="off" placeholder="Ingresa palabra clave" required class="grey" style="width: 300px">
                    <label for="search"></label><i class="material-icons"><a href="/">search</a></i>
                    
                </li>
                 <li><a href="home" class="waves-effect waves-teal"><i class="material-icons right"></i>Actividades</a></li>
                <li><a href="settings" class="waves-effect waves-teal"><i class="material-icons right">settings</i>Configuración</a></li>
                <li><a href="logout" class="waves-effect waves-teal"><i class="material-icons right">system_update_alt</i>Salir</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
            <li><a href="home">Actividades</a></li>
                <li><a href="settings">Configuración</a></li>
                <li><a href="logout">Salir</a></li>
            </ul>
            <a href="#nav-mobile" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</section>




<div>
    <div class="container-account">
        <div class="card">
        @include('alerts.change')
                        @include('alerts.changepass')
                        @include('alerts.errors')
            <div style="padding: 10px 10px 10px">
                <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Agregar Áreas de interés</span>
                
            </div>

            <h5 style="text-align: center;">Áreas de preferencia</h5>
            

           

            
                
            <!--Lee solo las áreas de gusto-->

            
                @foreach($preferencias as $pref)
                
                    @if($pref->users_email==Auth::user()->email)

                         <div class="chip">
                            {{$pref->name}}
                            <i class="material-icons"><a type="submit">close</a></i>
                        </div>
                                                     
                        
                    
                    @endif
                
                @endforeach
            


            <br></br>
            <div class="divider"></div>
            <br></br>

            <h5 style="text-align: center;">Agregue un área a la lista de preferencia</h5>

          
            

            <div class="card-content ">
               
                {!!Form::open(['route'=>'preferencias.store'])!!}

                
                        <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Seleccione el área de interés</label>

                                {!!Form::select('select_option', $areas)!!}

                            </div>
                            <br></br>

            {!!Form::submit('Agregar a preferidos',['class'=>'btn waves-effect waves-green cyan darken-3'])!!}
                
               {!!Form::close()!!}

               <br></br>
              


              {!!Form::open(['route'=>['user.destroy', Auth::user()->id], 'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar cuenta', ['class'=>'btn waves-effect red'])!!}

              {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>

<div style="padding-top: 10px">
    <div class="container-account">
        <div class="card">
            <div style="padding: 10px 10px 10px">
                <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Datos Personales</span>
            </div>
            <div class="divider"></div>
            <div class="card-content">
                <ul class="row">
                    <li class="col s12 m12">
                        
                        {!!Form::open(['route'=>['user.update', Auth::user()->id], 'method'=>'PUT', 'class'=>'container-account'])!!}
                        
                            <div class="input-field">
                                <input id="first-name" name="name" type="text" required class="validate" value="{!!Auth::user()->name!!}">
                                
                                <label for="first-name">Nombres</label>
                            </div>
                           
                            <div class="input-field">
                                <input id="first-name" name="last_name" type="text" class="validate" value="{!!Auth::user()->last_name!!}">
                                
                                <label for="first-name">Apellidos</label>
                            </div>

                            <div class="input-field">
                                <input id="email" name="email" type="email" required class="validate" value="{!!Auth::user()->email!!}">
                                
                                <label for="email">Correo</label>
                            </div>
                            
                            
                           <div style="padding-top: 10px">
                                <label class="left grey-text text-darken-3">Universidad</label>

                                {!!Form::select('universidad', $institutes, Auth::user()->institute_id )!!}

                            </div>
                            <div class="input-field">
                                <input name="password" id="old-password" type="password" required="required" class="validate">
                                
                                <label for="old-password">Debe ingresar la contraseña para realizar cambios</label>
                            </div>
                            <br></br>
                            <h5>Actualizar contraseña</h5>

                             
                            <div class="input-field">
                                <input name="passwordNew" id="new-password" type="password" class="validate">
                                
                                <label for="new-password">Nueva contraseña</label>
                            </div>

                            <div style="padding-top: 15px">
                                {!!Form::submit('Guardar cambios',['class'=>'btn waves-effect waves-green cyan darken-3'])!!}
                                
                            </div>
                        {!!Form::close()!!}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>










<footer class="page-footer blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text" style="font-size: 1.7em">Mundocente</h5>
                <p class="grey-text text-lighten-4">Encuentre información referente a revistas académicas, convocatorias
                    para docentes y eventos académicos organizados por las universidades del país.</p>
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