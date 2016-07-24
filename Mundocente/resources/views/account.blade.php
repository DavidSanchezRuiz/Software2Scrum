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
                        

                        <?php
                         $areas=Mundocente\Areas::all();
                            $areas_prefe = DB::table('preferencias')
                                    ->join('areas', 'preferencias.areas_id', '=', 'areas.id')
                                        ->where('users_email', Auth::user()->email)
                                        ->select('areas.name_a','areas.id')
                                        ->get();
                        ?>

                          <select class="js-example-basic-multiple"   multiple="multiple" name="select_option[]"> 

                                        @foreach($areas_prefe as $area_prefer)
                                        <option value="{{$area_prefer->id}}" selected="true">{{$area_prefer->name_a}}</option>
                                        @endforeach

                                        @foreach($areas as $area)
                                            
                                                    <option value="{{$area->id}}">{{$area->name_a}}</option>
                                            
                                        @endforeach
                                            
                        </select>

                        <li class="col s12 m4" style="margin-top: 50px; left: 0; float: left">
                            {!!Form::submit('Guardar temas de inter&eacute;s',['class'=>'btn waves-green cyan darken-3 '])!!}
                        </li>
                        {!!Form::close()!!}
                    </ul>
                </li>
                <li class="col s12 m12">
                    <div>
                        <span class="light">Áreas de preferencia: </span>
                    </div>
                    <br>
                    <!--Lee solo las áreas de gusto-->
                    @foreach($preferencias as $pref)

                        @if($pref->users_email==Auth::user()->email)

                            <div class="chip" style="margin-bottom: 10px;margin-left: 10px">
                                {{$pref->name_a}}
                                <i class="material-icons"></i>
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
                           value="{!!Auth::user()->email!!}"  style="color: #000;" >

                    <label for="email">Correo</label>
                </div>
                <div class="col s12 m12" style="padding-top: 10px">
                    <label class="left grey-text text-darken-3">Universidad</label>

                    {!!Form::select('universidad', $institutes, Auth::user()->institute_id ,['class'=>'browser-default'])!!}
                    <p style="font-size: 13px;color: #7d7d7d;">Al cambiar de Universidad, elimiarás la aceptación de publicar y  tendrás que mandar nuevamente la solicitud</p>
                </div>

                 <div class="input-field col s12 m12">
                    <input id="first-cargo" name="cargo_edit" type="text" required class="validate"
                           value="{!!Auth::user()->cargo!!}">

                    <label for="first-cargo">Cargo</label>
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

                 <div class="col s12 m12" style="padding-top: 0px">
                    <label class="left grey-text text-darken-3">Ciudad de Recidencia</label>
                    <?php
                        $lugares = Mundocente\Lugar::where('tipo','m')->orderBy('name')->get();
                    ?>

                    <select class="js-example-diacritics" name="recidencia_account">
                    @foreach($lugares as $lugar)
                      @if(Auth::user()->lugar_id==NULL)
                            <option value="NULL">Ninguna Seleccionada</option>
                        @endif

                        @if($lugar->id==Auth::user()->lugar_id)
                            <option value="{{$lugar->id}}" selected="true">{{$lugar->name}}</option>
                        @endif
                      
                        @if($lugar->id!=Auth::user()->lugar_id)
                            <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                        @endif
                        
                    @endforeach

                    
                </select>
                </div>


                        @if(Auth::user()->email_active=='si')
                        
                        <p> 
                            <input type="checkbox" checked="true" id="edit_envia_correo1" onclick="change_email_active()">
                            <label for="edit_envia_correo1" class="black-text" style="font-size: 13px;">Recibir correos de nuevas publicaciones de mi interés.</label>
                        </p>
                        @endif

                        @if(Auth::user()->email_active=='no')
                        
                        <p> 
                            <input type="checkbox"  id="edit_envia_correo2" onclick="change_email_active()">
                            <label for="edit_envia_correo2" class="black-text" style="font-size: 13px;">Recibir correos de nuevas publicaciones de mi interés.</label>
                        </p>
                        @endif

                        <input type="hidden" value="{{Auth::user()->email_active}}" name="new_email_active_edit_account" id="hidden_email_active_edit">
               


                
                <span class="light" style="display: none;">Actualizar contraseña</span>
                <div class="input-field  col s12 m12"  style="display: none;">
                    <input name="passwordNew" id="new-password" type="password" class="validate">
                    <label for="new-password">Nueva contraseña</label>
                </div>
                <br>
                {!!Form::submit('Guardar cambios',['class'=>'btn waves-green cyan darken-3 right'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

<div class="container-account" style="display: none;">
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