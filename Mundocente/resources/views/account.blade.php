@extends('layout.main')
@section('content')



<div class="container-account">
    <div class="card">
        @include('alerts.change')
        @include('alerts.errors')
        <div style="padding: 10px">
            <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Areas de interes</span>
        </div>
        <div class="divider"></div>
        <div class="card-content" style="margin: auto">
            <ul class="row">
                <li class="col s12 m12">
                    <span class="light">Agregue un área a la lista de preferencia</span>
                    <ul class="row">
                        {!!Form::open(['route'=>'preferencias.store'])!!}
                        <li class="col s12 m8">
                            <label class="left grey-text text-darken-3 light" style="font-size: medium">Seleccione un área de interés</label>
                            {!!Form::select('select_option', $areas,null,['class'=>'browser-default'])!!}
                        </li>
                        <li class="col s12 m4" style="margin-top: 50px; left: 0; float: left">
                            {!!Form::submit('Agregar',['class'=>'btn waves-effect waves-green cyan darken-3 right'])!!}
                        </li>
                        {!!Form::close()!!}
                    </ul>
                </li>
                <li class="col s12 m12">
                    <div>
                        <span class="light">Áreas de preferencia: </span>
                    </div>
                    <!--Lee solo las áreas de gusto-->
                    @foreach($preferencias as $pref)

                        @if($pref->users_email==Auth::user()->email)

                            <div class="chip" style="margin-bottom: 10px;margin-left: 10px">
                                {{$pref->name_a}}
                                <i class="material-icons"><a type="submit">close</a></i>
                            </div>
                        @endif

                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-account">
    <div class="card">
        <div style="padding: 10px 10px 10px">
                <span class="card-title"><i
                            class="material-icons card-title-center">filter_list</i>Datos Personales</span>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <div class="row form-account">
                {!!Form::open(['route'=>['user.update', Auth::user()->id], 'method'=>'PUT'])!!}
                <div class="input-field col s12 m12">
                    <input id="first-name" name="name" type="text" required class="validate"
                           value="{!!Auth::user()->name!!}">

                    <label for="first-name">Nombres</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="first-name" name="last_name" type="text" class="validate"
                           value="{!!Auth::user()->last_name!!}">

                    <label for="first-name">Apellidos</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="email" name="email" type="email" required class="validate"
                           value="{!!Auth::user()->email!!}">

                    <label for="email">Correo</label>
                </div>
                <div class="col s12 m12" style="padding-top: 10px">
                    <label class="left grey-text text-darken-3">Universidad</label>

                    {!!Form::select('universidad', $institutes, Auth::user()->institute_id ,['class'=>'browser-default'])!!}
                    <p style="font-size: 13px;color: #7d7d7d;">Al cambiar de Universidad, elimiarás la aceptación de publicar y  tendrás que mandar nuevamente la solicitud</p>
                </div>
                <div class="col s12 m12">

               

               
                    
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>Solicitar permisos de publicador</h4>
                            <p>Al seleccionar esta opción enviarás una solicitud al equipo de Mundocente para la verificación de tu solicitud y así tener acceso al alformulario de publicardor.</p>
                                <p>Al no seleccionar esta opción, tendrá acceso únicamente al buscador de mundocente, podrá filtrar según las áreas de preferencia.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#"
                               class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                        </div>
                    </div>
                </div>
                <div class="divider col 12 m12"></div>
                <span class="light">Actualizar contraseña</span>
                <div class="input-field  col s12 m12">
                    <input name="passwordNew" id="new-password" type="password" class="validate">
                    <label for="new-password">Nueva contraseña</label>
                </div>
                <br>
                {!!Form::submit('Guardar cambios',['class'=>'btn waves-effect waves-green cyan darken-3 right'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

<div class="container-account">
    <div class="card-panel">
        <div style="padding-bottom: 10px">
            <span style="font-size: 1.6em;" class="light"><i class="material-icons card-title-center">filter_list</i>Borrar cuenta</span>
        </div>
        <div class="divider"></div>
        <ul class="row">
            <li class="col s12 m8">
                <span class="light">Borre su cuenta de mundocente</span>
            </li>
            <li class="col s12 m4">
                {!!Form::open(['route'=>['user.destroy', Auth::user()->id], 'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar cuenta', ['class'=>'btn waves-effect red right header-btn'])!!}
                {!!Form::close()!!}
            </li>
        </ul>
    </div>
</div>

@endsection