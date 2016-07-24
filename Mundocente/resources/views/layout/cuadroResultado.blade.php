 <li class="col s12 m12" >
                            <div class="card-panel" style="min-height: 200px;padding-bottom: 0.1em;padding-top: 0.5em">
                                <ul class="row">
                                    <li class="col s12 m12" style="padding-bottom: -10px;">

                                  


                                        <span style="font-size: 1.7em"> {{$actividad->title}} </span> 
                                        - <a href="/{{$actividad->name_i}}" title="Ver todas las publicaciones de {{$actividad->name_i}}" style="font-size: 15px;margin-top: -10px;"> {{$actividad->name_i}}</a>
                                        <div class="divider"></div>
                                    </li>
                                    <li class="col s12 m12" style="margin-top: -10px;">
                                        <p class="light">{{$actividad->description}}</p>
                                        

                                    </li>

                                    

                                    <div class="col s12 m12" style="margin-bottom: -15px;">

                                    <li class="col s8 m8" style="float: left;margin-top: 5px;margin-left: -10px;">
                                        


                                        <?php
                                            $area_activity = DB::table('creacions')
                                            ->join('areas', 'creacions.area_id', '=', 'areas.id')
                                            ->where('creacions.activity_id', $actividad->id)
                                            ->get();
                                        ?>
                                         <p><span  style="font-size: 14px;">Tema:</span> 
                                            @foreach($area_activity as $tema)
                                                <span  style="font-size: 13px;color: #6d6d6d;">{{$tema->name_a}}, </span>
                                            @endforeach
                                        </p>
                                        @if($actividad->tipo=='convocatoria')
                                            <span style="font-size: 13px;color: #7d7d7d;">Inicio de convocatoria: {{$actividad->fecha_inicio}} - Fin de convocatoria: {{$actividad->fecha_fin}}<p style="font-size: 13px;color: #7d7d7d;"> publicado por: {{$actividad->name}} {{$actividad->last_name}}</p></span>
                                        @endif

                                         @if($actividad->tipo=='revista')
                                                 @if($actividad->indexada=='si')
                                                <span style="font-size: 13px;color: #7d7d7d;">Fecha {{$actividad->fecha_inicio}} - Categoría {{$actividad->categoria}}<p> publicado por: {{$actividad->name}} {{$actividad->last_name}}</p></span>
                                                @endif
                                                @if($actividad->indexada=='no')
                                                 <span style="font-size: 13px;color: #7d7d7d;">Fecha: {{$actividad->fecha_inicio}} - No indexada<p style="font-size: 13px;color: #7d7d7d;"> publicado por {{$actividad->name}} {{$actividad->last_name}}</p></span>
                                                @endif
                                           
                                        @endif

                                        @if($actividad->tipo=='evento')
                                            <span style="font-size: 13px;color: #7d7d7d;">Inicio del evento: {{$actividad->fecha_inicio}} - Fin del evento : {{$actividad->fecha_fin}}<p style="font-size: 13px;color: #7d7d7d;"> publicado por: {{$actividad->name}} {{$actividad->last_name}}</p></span>
                                        @endif
                                        

                                           @if(Auth::user()->rol=='administrador')
                                        
                                    <a class="btn waves-effect waves-teal lighten-3" href="publication_edit_admin/{{$actividad->id}}" title="Editar">Editar </a>


                                        
                                        
                                        @endif

                                    </li>

                                         <li class="col s4 m4" style="float: right;padding-top: 110px;padding-bottom: 0px;">

                                        @if($actividad->tipo=='convocatoria')
                                            <a onclick="self.location='{{$actividad->enlace}}'" class="btn waves-effect orange"
                                               style="float: right;"
                                               title="Ir a convocatoria">Ver Convocatoria <i class="material-icons right">description</i></a>
                                        @endif

                                        @if($actividad->tipo=='revista')
                                            <a onclick="self.location='{{$actividad->enlace}}'" class="btn waves-effect red"
                                               style="float: right;"
                                               title="Ir a revista">Ver Revista<i class="material-icons right">description</i></a>
                                        @endif

                                        @if($actividad->tipo=='evento')
                                            <a onclick="self.location='{{$actividad->enlace}}'" class="btn waves-effect blue"
                                               style="float: right;"
                                               title="Ir a evento">Ver Evento <i class="material-icons right">description</i></a>
                                        @endif

                                       


                                    </li>

                                    </div>

                                   
                                </ul>
                            </div>
                        </li>