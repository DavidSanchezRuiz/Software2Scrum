<div class="col s12 m8" style="float: right;">
                
                <ul class="row" >


                    <?php

    for ($i=0; $i < 20; $i++) { 
        echo ' <li class="col s12 m12" id="publication_all_hidden'.$i.'" style="display:none">
                            <div class="card-panel" style="min-height: 200px;padding-bottom: 0.1em;padding-top: 0.5em">
                                <ul class="row">
                                    <li class="col s12 m12" style="padding-bottom: -10px;">
                                        <span style="font-size: 1.7em" id="id_title_new_hidden'.$i.'">Titulo </span> 
                                        <div class="divider"></div>
                                    </li>
                                    <li class="col s12 m12" style="margin-top: -10px;">
                                        <p class="light" id="id_description_new_hidden'.$i.'">Descripción</p>
                                        

                                    </li>

                                    

                                    <div class="col s12 m12" style="margin-bottom: -15px;">

                                    <li class="col s6 m6" style="float: left;margin-top: 15px;margin-left: -20px;">
                                        <span style="font-size: 15px;color: #7d7d7d;">Publicado por mí</span>
                                    </li>

                                         <li class="col s6 m6" style="float: right;">

                                        
                                            <a href="#" id="id_enlace_new_hidden'.$i.'" class="btn waves-effect"
                                               style="float: right;"
                                               title="Ir a enlace">Ver Publicación <i class="material-icons right">description</i></a>
                                        

                                      


                                    </li>

                                    </div>

                                   
                                </ul>
                            </div>
                        </li>';
    }
    


?>




                    @foreach($actividads as $actividad)
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token{{$actividad->id}}">
                    <input type="hidden" id="id">
                        <li class="col s12 m12" id="div_all_edit{{$actividad->id}}">
                            <div class="card-panel" style="min-height: 200px;padding-bottom: 0.1em;padding-top: 0.5em">
                                <ul class="row">
                                    <li class="col s12 m12" style="padding-bottom: -10px;"><strong style="font-size: 19px;">Editar Título</strong>
                                        <input name="edit_activity_title" id="select_title_edit{{$actividad->id}}"  value="{{$actividad->title}}" title="Click Editar el título" placeholder="Edita el título"> 
                                        
                                    </li>

                                    <?php
                                        $areas = Mundocente\Areas::all();
                                    ?>

                                     <strong>Editar Área </strong>
                                        <select name="edit_activity_area" id="select_area_edit{{$actividad->id}}"> 
                                        @foreach($areas as $area)
                                            @if($actividad->name_a==$area->name_a)
                                            <option value="{{$area->id}}" selected="true">{{$area->name_a}}</option>
                                            @endif
                                                
                                            @if($actividad->name_a!=$area->name_a)
                                            <option value="{{$area->id}}">{{$area->name_a}}</option>
                                            @endif

                                        @endforeach
                                            
                                        </select>

                                    @if($actividad->tipo=='convocatoria')
                                        <li class="col s12 m12" style="padding-bottom: -10px;" ><strong>Editar Cargo</strong>
                                        <input name="edit_activity_cargo" id="select_cargo_edit{{$actividad->id}}" value="{{$actividad->cargo}}" title="Click para editar cargo" placeholder="Edita el Cargo"> 
                                        
                                    </li>
                                    @endif
                                    <li class="col s12 m12" style="margin-top: -10px;"><strong>Editar Descripción</strong>
                                    <textarea  name="edit_activity_desc" id="select_desc_edit{{$actividad->id}}" style="margin-top: 15px;outline: none;width: 100%;height: 100px;max-width: 1000px;" placeholder="Edita la descripción">{{$actividad->description}}</textarea>
                                        
                                        

                                    </li>

                                    

                                    <div class="col s12 m12" style="margin-bottom: -15px;">

                                    

                                         <li class="col s12 m12" style="float: right;"><strong>Editar enlace</strong>

                                        
                                            <input  name="edit_activity_enlace" id="select_enlace_edit{{$actividad->id}}" value="{{$actividad->enlace}}" title="Click para editar enlace" placeholder="Editar enlace">
                                        
                                        <strong>Editar Tipo</strong>
                                        <select name="edit_activity_tipo" id="select_tipo_edit{{$actividad->id}}"> 
                                            @if($actividad->tipo=='convocatoria')
                                                <option value="convocatoria" selected="true">convocatoria</option>
                                                <option value="revista">revista</option>
                                                <option value="evento">evento</option>
                                            @endif
                                            @if($actividad->tipo=='revista')
                                                 <option value="convocatoria">convocatoria</option>
                                                <option value="revista" selected="true">revista</option>
                                                <option value="evento">evento</option>
                                            @endif
                                            @if($actividad->tipo=='evento')
                                                 <option value="convocatoria">convocatoria</option>
                                                <option value="revista">revista</option>
                                                <option value="evento" selected="true">evento</option>
                                            @endif
                                        </select>

                                    </li>


                                     <div class="col s6 m6" >
                                            <div style="float: left;">
                                                <label>Fecha Inicio:</label>
                                                <input  name="edit_activity_inicio" id="select_inicio_edit{{$actividad->id}}" type="date" value="{{$actividad->fecha_inicio}}" class="datepicker" >
                                            </div>
                                        </div>

                                    
                                         <div class="col s6 m6" >
                                            <div style="float: left;">
                                                <label>Fecha fin:</label>
                                                <input  name="edit_activity_fin" id="select_fin_edit{{$actividad->id}}" type="date" value="{{$actividad->fecha_fin}}" class="datepicker">
                                            </div>
                                        </div>

                                       
                                        <p style="color: #7d7d7d;font-size: 14px;">Asegúrate de guardar los cambios para completar la acción.</p>


                                    

                                     <button class="btn waves-effect red darken-1" style="float: right;" onclick="delete_publication({{$actividad->id}})" type="submit" name="action">Eliminar
                                        <i class="material-icons right">delete</i>
                                      </button>



                                     <button class="btn waves-effect teal darken-1" onclick="edit_publication({{$actividad->id}})" style="float: right;margin-right: 5px;" type="submit" name="action">Guardar
                                        <i class="material-icons right">save</i>
                                      </button>
                                     




                                    <li class="col s12 m12" style="margin-top: 15px;margin-left: 0px;">
                                        <span style="font-size: 13px;color: #7d7d7d;float: right;">Fecha de publicación: {{$actividad->created_at}}</span>
                                    </li>


                                    </div>

                                   
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