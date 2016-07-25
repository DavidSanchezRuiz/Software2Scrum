@extends('layout.main')
@section('content')

<div class="container col s12 m12" style="width: 100%";>
    <div class="card">
        <div style="padding:10px">
            <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Lista de publicadores</span>
            <p style="color: #5d5d5d;">Los usuarios activados podrán publicar convocatorias, enventos o revistas, los queno solamente podrán hacer búsquedas.</p>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <ul class="row" style="margin: auto">
                <li class="col s12 m12">
                    <table>
                        <thead>
                        <tr>
                            <th data-field="name">Nombre</th>
                            <th data-field="institute">Universidad o Instituto</th>
                            <th data-field="institute">Cargo</th>
                            <th data-field="area">Correo</th>
                            <th data-field="area">Estado</th>
                            <th data-field="area">Editar</th>
                        </tr>
                        </thead>

                        @foreach($users as $user)
                        @if($user->rol!='administrador')
                             <tbody>
                             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token{{$user->id}}">
                    <input type="hidden" id="id">
                        <tr>
                            <td id="name_actual_tabla{{$user->id}}">{{$user->name}}</td>
                            <td id="name_unoiver_tabla{{$user->id}}">{{$user->name_i}}</td>
                            <td id="cargo_user_tabla{{$user->id}}">{{$user->cargo}}</td>
                            <td id="email_user_tabla{{$user->id}}">{{$user->email}}</td>

                            <input type="hidden" value="{{$user->email}}" id="email_hidden{{$user->id}}">
                                
                             @if($user->rol=='pendiente')

<td id="activar{{$user->id}}"><a class="btn waves-effect waves-light green" onclick="activarUs({{$user->id}})">Activar</a></td>

                             
<td id="desactivar{{$user->id}}" style="display: none"><a class="btn waves-effect waves-light red" onclick="desactivarUs({{$user->id}})">Inactivar</a></td>

<td id="sin_sol{{$user->id}}" style="display: none"><a class="btn disabled">Sin solicitud</a></td>
                            

                            @endif

                            @if($user->rol=='buscador')
                            <td><a class="btn disabled">Sin solicitud</a></td>
                                
                            @endif


                            @if($user->rol=='publicador')

<td id="sin_sol{{$user->id}}" style="display: none"><a class="btn disabled">Sin solicitud</a></td>

                             
<td id="desactivar{{$user->id}}"><a class="btn waves-effect waves-light red" onclick="desactivarUs({{$user->id}})">Inactivar</a></td>


                            
                            @endif
                            <td><a onclick="admin_edit_user({{$user->id}})" href="#edit_user" class="btn waves-effect waves-light modal-trigger">Editar</a></td>
                        </tr>

                        </tbody>
                        @endif
                       
                        @endforeach




                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>




<div id="edit_user" class="modal">
    <div class="modal-content">
        <div class="container">
            <h4 class="light">Editar Usuario</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" id="id">

            <input type="hidden" id="id_user_edit">

            <div class="input-field col s12 m12">
                <input id="name_edit_admin" type="text" class="validate" placeholder="Nombres">
                
            </div>

                 <div class="input-field col s12 m12">
                    <input id="last_name_edit_admin" type="text" class="validate"
                            placeholder="Apellidos">

                </div>
                <div class="input-field col s12 m12">
                    <input id="email_edit_admin" type="email" required class="validate"
                             placeholder="Correo" disabled="true" style="color: #000;" title="No se puede editar el correo">
                             <label class="left grey-text text-darken-3">Correo</label>
                    
                </div>
                <input type="hidden" id="email_anitguo" value="{{Auth::user()->email}}">
                <div class="col s12 m12" style="padding-top: 10px">
                    <label class="left grey-text text-darken-3">Universidad</label>
                    <?php

                        $institutes = Mundocente\Institute::all();
                        ?>
                    <select class="browser-default" id="universidad_new_admin" title="Edita la universidad">
                        @foreach($institutes as $institu)
                        
                            <option value="{{$institu->id}}" >{{$institu->name_i}}</option>
                        
                            
                        @endforeach
                    </select>
                    <p style="font-size: 13px;color: #7d7d7d;">Si se cambia de universidad tendrá que volver a dar el permiso de publicador</p>
                </div>



                 <div class="input-field col s12 m12">
                    <input  id="cargo_edit_admin" type="text" required class="validate"
                            placeholder="Cargo">
                </div>


                <br>

                 <div class="col s12 m12" style="padding-top: 0px">
                    <label class="left grey-text text-darken-3">Ciudad de Recidencia actual:</label>
                    <?php
                        $lugares = Mundocente\Lugar::where('tipo','m')->orderBy('name')->get();
                    ?>

                    <select class="browser-default" id="ciudad_actual_chanfe_admin" title="Seleccione la ciudad de recidencia">
                    @foreach($lugares as $lugar)
                     
                            <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                        
                    @endforeach

                    </select>

                </div>

                        <p> 
                            <input type="checkbox" id="nofiti_admin_edit" onclick="change_email_admin()">
                            <label for="nofiti_admin_edit" class="black-text" style="font-size: 13px;">Recibir correos de nuevas publicaciones de mi interés.</label>
                        </p>

                        <input type="hidden" id="new_nofiti_admin_save">




            
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action btn modal-close waves-effect red btn-flat "
           style="color: #fff;margin-left: 5px;">Cerrar</a>
        <a class="modal-action btn waves-effect green btn-flat white-text modal-close" onclick="save_data_user_admin()">Editar</a>
    </div>
</div>

@endsection