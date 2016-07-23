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
                            <td>{{$user->name}}</td>
                            <td>{{$user->name_i}}</td>
                            <td>{{$user->rol}}</td>
                            <td>{{$user->email}}</td>

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


<?php
$areas = Mundocente\Areas::all();
$institutes = Mundocente\Institute::where('id', Auth::user()->institute_id)->get();
?>

<div id="edit_user" class="modal">
    <div class="modal-content">
        <div class="container">
            <h4 class="light">Publicar Revista</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" id="id">

            <div class="input-field col s12 m12">
                <input id="name_edit_admin" type="text" class="validate">
                <label class="active" for="name_edit_admin">Nombre</label>
            </div>

            <div class="col s12 m12">
                <h6>Por:

                    @foreach($institutes as $institute)
                        <span style="color: #4d4d4d;">{{$institute->name_i}}</span>
                    @endforeach

                </h6>
            </div>
            <br>

            <div style="padding-top: 10px">
                <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>

                <!--area para agregar -->

                <select class="js-example-basic-multiple" name="r_search_area[]"  multiple="multiple"  id="nueva_revista" title="Seleccionar tema de preferencia">

                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name_a}}</option>
                    @endforeach

                </select>
            </div>

            <div class="input-field col s12 m12">
                <input id="r_enlace_new" type="text" class="validate">
                <label class="active" for="r_enlace_new">Enlace</label>
            </div>

            <div class="input-field col s12 m12">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">mode_edit</i>Añadir descripción</div>
                        <div class="collapsible-body"><textarea id="r_description_new"
                                                                style="border:none;outline: none;max-width: 100%;"
                                                                placeholder="Ingresa la descripción de la convocatoria"></textarea>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Switch -->
            <div class="switch">
                <p>
                    <label style="">Tipo de revista:</label>
                </p>
                <p>
                    <label>
                        No Indexada
                        <input type="checkbox">
                        <span class="lever"></span>
                        Indexada
                    </label>
                </p>
            </div>
            <label style="">Seleccionar categoría</label>
            <select class="browser-default">
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">B</option>
                <option value="4">C</option>
            </select>
            <div class="col s12 m12">
                <div style="">
                    <label>Fecha:</label>
                    <input type="date" id="r_date_inicio_new" class="datepicker">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action btn modal-close waves-effect red btn-flat "
           style="color: #fff;margin-left: 5px;">Cerrar</a>
        <a href="#!" class="modal-action btn waves-effect green btn-flat white-text" onclick="add_revista()">Publicar</a>
    </div>
</div>

@endsection