<?php
    $areas = Mundocente\Areas::all();
    $institutesList = DB::table('institutes')
    ->join('lugars', 'institutes.lugar_id', '=', 'lugars.id')
    ->where('institutes.id',Auth::user()->institute_id)
    ->select('institutes.name_i','lugars.id', 'lugars.name')
    ->get();
?>

<!-- Modal Convocatoria -->
<div id="convocatoria" class="modal">
    <div class="modal-content">
        <div class="container">
            <h4 class="light">Publicar Convocatoria</h4>

             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id">

                <div class="col s12 m12">
                    <h6>En : 
                    
                        @foreach($institutesList as $institute)
                        <span style="color: #4d4d4d;" >{{$institute->name_i}} de {{$institute->name}}</span>
                        <input type="hidden" id="id_lugar_convo_hidden" value="{{$institute->id}}">
                        @endforeach
                        
                    </h6>

                </div>

                 

                <br>

                <div style="padding-top: 10px">
                    <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>

                    <!--area para agregar -->

                <select class="js-example-basic-multiple" multiple="multiple"  id="nueva_convocatoria" title="Seleccionar tema de preferencia">

                        @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name_a}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="cargo_new" type="text" class="validate">
                    <label class="active" for="cargo_new">Cargo</label>
                </div>

                <div class="input-field col s12 m12">
                    <input id="enlace_new" type="text" class="validate">
                    <label class="active" for="enlace_new">Enlace</label>
                </div>

                <div class="input-field col s12 m12">
                     <ul class="collapsible" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header"><i class="material-icons">mode_edit</i>Añadir descripción</div>
                      <div class="collapsible-body"><textarea id="description_new" style="border:none;outline: none;max-width: 100%;" placeholder="Ingresa la descripción de la convocatoria"></textarea></div>
                    </li>
                  </ul>
                </div>

                <div class="col s12 m12" style="background: red">
                    <div style="float: left;">
                        <label>Fecha Inicio:</label>
                        <input type="date" id="date_inicio_new" class="datepicker" >
                    </div>
                    <div style="float: right;">
                        <label>Fecha fin:</label>
                        <input type="date" id="date_fin_new" class="datepicker">
                    </div>
                    
                </div>

        </div>


    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action btn modal-close waves-effect red btn-flat " style="color: #fff;margin-left: 5px;">Cerrar</a>
        <a href="#!" class="modal-action btn waves-effect green btn-flat" style="color: #fff" onclick="add_convocatoria()">Publicar</a>
    </div>
</div>

















<!-- Modal Revista -->
<div id="revista" class="modal">
    <div class="modal-content">
        <div class="container">
            <h4 class="light">Publicar Revista</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" id="id">


            <div class="col s12 m12">
                <h6>Por :

                    @foreach($institutesList as $institute)
                        <span style="color: #4d4d4d;">{{$institute->name_i}}</span>
                        <input type="hidden" id="id_lugar_convo_hidden_revista" value="{{$institute->id}}">
                    @endforeach

                </h6>
            </div>
            <br>

            <div style="padding-top: 10px">
                <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>

                <!--area para agregar -->

                <select class="js-example-basic-multiple"   multiple="multiple"  id="nueva_revista" title="Seleccionar tema de preferencia">

                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name_a}}</option>
                    @endforeach

                </select>
            </div>

            <div class="input-field col s12 m12">
                <input id="title_revista_new" type="text" class="validate">
                <label class="active" for="title_revista_new">Título</label>
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
            <br>
            <!-- Switch -->
            <div class="switch">
                <p>
                    <label style="">Tipo de revista:</label>
                </p>
                <p>
                    <label>
                        No Indexada
                        <input type="checkbox" id="indexada_revista_dato" value="no" onclick="changeIndexada()">
                        <span class="lever"></span>
                        Indexada
                    </label>
                </p>
            </div>
            <br>
            <label id="select_categori_label" style="display: none;">Seleccionar categoría</label>
            <select class="browser-default" style="display: none;"  id="categori_select_opcion">
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">B</option>
                <option value="4">C</option>
            </select>
            <br>
            
        </div>
        <div class="col s12 m12">
                <div style="">
                    <label>Fecha:</label>
                    <input type="date" id="r_date_inicio_new" class="datepicker">
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action btn modal-close waves-effect red btn-flat "
           style="color: #fff;margin-left: 5px;">Cerrar</a>
        <a href="#!" class="modal-action btn waves-effect green btn-flat white-text" onclick="add_revista()">Publicar</a>
    </div>
</div>



























<!-- Modal Evento -->
<div id="evento" class="modal ">
    <div class="modal-content">
        <div class="container">
            <h4 class="light">Publicar Evento</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id">



                <div class="col s12 m12">
                    <h6>Ofrecido por : 
                    
                        @foreach($institutesList as $institute)
                        <span style="color: #4d4d4d;" >{{$institute->name_i}} - {{$institute->name}}</span>
                        @endforeach
                        
                    </h6>
                </div>
                <br>
               

                <?php
                    $lista_lugares =  Mundocente\Lugar::where('tipo','m')->get();
                ?>

                 <div style="padding-top: 10px">
                        <label class="left grey-text text-darken-3">Se realizará en:</label>
                        <select id="lugar_evento_id" class="browser-default">
                            @foreach($lista_lugares as $lugar)
                            @if($lugar->id==$institute->id)
                                <option value="{{$lugar->id}}" selected="true">{{$lugar->name}}</option>
                            @endif
                                <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                            @endforeach
                            
                        </select>
                        
                    </div>

                <br>

                <div style="padding-top: 10px">
                    <label class="left grey-text text-darken-3">Seleccione el área de preferencia</label>

                    <!--area para agregar -->

                    <select class="js-example-basic-multiple"  multiple="multiple"  id="nueva_evento" title="Seleccionar tema de preferencia">

                        @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name_a}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input-field col s12 m12">
                    <input id="title_evento_new" type="text" class="validate">
                    <label class="active" for="title_evento_new">Título del evento</label>
                </div>

                <div class="input-field col s12 m12">
                    <input id="e_enlace_new" type="text" class="validate">
                    <label class="active" for="e_enlace_new">Enlace</label>
                </div>

                <div class="input-field col s12 m12">
                     <ul class="collapsible" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header"><i class="material-icons">mode_edit</i>Añadir descripción</div>
                      <div class="collapsible-body"><textarea id="e_description_new" style="border:none;outline: none;max-width: 100%;" placeholder="Ingresa la descripción de la convocatoria"></textarea></div>
                    </li>
                  </ul>
                </div>


                

                <div class="col s12 m12" style="background: red">
                    <div style="float: left;">
                        <label>Inicio evento:</label>
                        <input type="date" id="e_date_inicio_new" class="datepicker" >
                    </div>
                    <div style="float: right;">
                        <label>Fin evento:</label>
                        <input type="date" id="e_date_fin_new" class="datepicker">
                    </div>
                    
                </div>
           
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action btn modal-close waves-effect red btn-flat " style="color: #fff;margin-left: 5px;">Cerrar</a>
        <a href="#!" class="modal-action btn waves-effect green btn-flat" style="color: #fff" onclick="add_evento()">Publicar</a>
    </div>
</div>























<!-- ..........................................Solicitar permiso para publicador-->



<div id="permiso-model" class="modal">
    <div class="modal-content">
        <div class="container">
            <h3 class="light" id="message-premission-temp">No tienes permiso para publicaciones</h3>
            <p class="light">¿Deseas enviar una solicitud al equipo de Mundocente para poder ser un publicador?</p>
          
        </div>
    </div>
    <div class="modal-footer">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <input type="hidden" id="id">

          <a href="#!" class="modal-action modal-close btn waves-effect red " id="delete-temp-premissions" onclick="cancelarSerPublicador()" style="margin-left: 10px;display: none;">Cancelar solicitud</a>
        
        <a href="#!" class="modal-action modal-close btn waves-effect red" id="cancel-temp-premissions" style="margin-left: 10px;">Cancelar</a>
        <a href="#!" class="modal-action modal-close btn waves-effect waves-light" id="boton-add-permissions" onclick="pedirSerPublicador()">Enviar Solicitud para publicador</a>

    </div>
</div>



























<!-- ......................................  Solicitar pendiente-->

<div id="pendiente-model" class="modal">
    <div class="modal-content">
        <div class="container">
            <h3 class="light" id="reenviar-message">Solicitud enviada</h3>
            <p class="light">Has enviado la solicitud a mundocente para poder agregar publicaciones pero no ha sido aceptada, debes esperar un poco para que el equipo de trabajo verifique tu solicitud.</p>
          
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn waves-effect red " style="margin-left: 10px;" onclick="cancelarSerPublicador()">Cancelar solicitud</a>
        <a href="#!" class="modal-action modal-close btn waves-effect waves-light " id="rren-boton-add-permissions" onclick="pedirSerPublicador()">Aceptar</a>
    </div>
</div>