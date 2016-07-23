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
                                            $area_activity = DB::table('areas')
                                            ->where('areas.id', $actividad->area_id)
                                            ->get();
                                        ?>
                                        
                                        @foreach($area_activity as $tema)
                                        <p><span style="font-size: 16px;color: #6d6d6d;">Tema:</span> {{$tema->name_a}}</p>
                                        @endforeach

                                        <span style="font-size: 13px;color: #7d7d7d;">Fecha de inicio {{$actividad->fecha_inicio}} - por {{$actividad->name}} {{$actividad->last_name}}</span>
                                        
                                    </li>

                                         <li class="col s4 m4" style="float: right;padding-top: 50px;padding-bottom: 0px;">

                                        @if($actividad->tipo=='convocatoria')
                                            <a href="{{$actividad->enlace}}" class="btn waves-effect orange"
                                               style="float: right;"
                                               title="Ir a convocatoria">Ver {{$actividad->tipo}} <i class="material-icons right">description</i></a>
                                        @endif

                                        @if($actividad->tipo=='revista')
                                            <a href="{{$actividad->enlace}}" class="btn waves-effect red"
                                               style="float: right;"
                                               title="Ir a revista">Ver {{$actividad->tipo}}<i class="material-icons right">description</i></a>
                                        @endif

                                        @if($actividad->tipo=='evento')
                                            <a href="{{$actividad->enlace}}" class="btn waves-effect blue"
                                               style="float: right;"
                                               title="Ir a evento">Ver {{$actividad->tipo}} <i class="material-icons right">description</i></a>
                                        @endif


                                    </li>

                                    </div>

                                   
                                </ul>
                            </div>
                        </li>