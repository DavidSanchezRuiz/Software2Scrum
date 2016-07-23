<?php
$areas = Mundocente\Areas::all();
?>

 <div class="col s12 m4">
                <h4 class="light" style="margin: 8px auto; font-size: 1.95em;">Filtros</h4>
                <ul>
                    <li>
                        <div class="card">
                            <span class="card-title"><i
                                        class="material-icons card-title-center">filter_list</i>Tipo</span>
                            <div class="divider"></div>
                            <div class="card-content center" style="min-height:0px">
                                
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type orange"
                                            href="resultados-convocatorias">Convocatorias docentes</a>
                                </div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type red"
                                                              href="resultados-revistas">Revistas científicas</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type blue"
                                                              href="resultados-eventos">Eventos académicos</a></div>
                                <div class="filter-button"><a class="btn waves-effect blue lighten-5 btn-type" style="color: #000" 
                                                              href="todas-las-publicaciones">Mostrar todas las publicaciones</a></div>
                                <div class="filter-button"><a
                                            class="btn waves-effect blue lighten-5 btn-type " style="color: #000" href="home">Mostrar temas de mi interés</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">description</i>Búsqueda avanzada</span>
                            <div class="divider"></div>
                            <div class="card-content" style="min-height: 0px">

                            <?php
                                $citys= Mundocente\Lugar::where('tipo','m')->get();
                            ?>



                            {!!Form::open(['route'=>'search-avanced.store'])!!}

                                <div style="padding-top: 10px">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">
                                    <input type="checkbox"  id="test1" name="busqueda_u" value="si" >
                                    <label for="test1" class="black-text">Por
                                         Universidad </label> </label>
                                    {!!Form::select('search_univer_avanced', $institutes, null ,['class'=>'browser-default'])!!}
                                    <p>
                            
                            
                        </p>
                                </div>
                                <div style="padding-top: 10px;">
                                    <input type="checkbox"  id="test2" name="busqueda_a" value="si" >
                                    <label for="test2" class="black-text">Por Área</label>
                                    <!--area para agregar -->
                                    <select class="js-example-basic-multiple" name="search_area_avanced[]"  multiple="multiple"  id="nueva_revista" title="Seleccionar tema de preferencia">
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}">{{$area->name_a}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div style="padding-top: 10px;">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">
                                    <input type="checkbox"  id="test3" name="busqueda_t" value="si" >
                                    <label for="test3" class="black-text">Por Tipo</label> </label>
                                    <select class="browser-default" name="search_tipo_avanced">
                                        <option value="convocatoria">Convocatoria</option>
                                        <option value="revista">Revista</option>
                                        <option value="evento">Eventos</option>
                                    </select>
                                </div>

                                 <div style="padding-top: 10px;">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">
                                    <input type="checkbox"  id="test4" name="busqueda_c" value="si" >
                                    <label for="test4" class="black-text">Por Ciudad</label> </label>
                                    <select class="browser-default" name="search_city_avanced">
                                    @foreach($citys as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                        
                                    </select>
                                </div>
                                <br>

                                {!!Form::submit('Buscar',['class'=>'btn  waves-green cyan darken-3', 'title'=>'Buscar con los filtros seleccionados'])!!}

                                {!!Form::close()!!}



                            </div>
                        </div>
                    </li>
                </ul>
            </div>