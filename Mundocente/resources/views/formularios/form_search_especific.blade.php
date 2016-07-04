 <div class="col s12 m4">
                <h4 class="light" style="margin: 8px auto; font-size: 1.95em;">Filtros</h4>
                <ul>
                    <li>
                        <div class="card">
                            <span class="card-title"><i
                                        class="material-icons card-title-center">filter_list</i>Tipo</span>
                            <div class="divider"></div>
                            <div class="card-content center" style="min-height:0px">
                                <div class="filter-button"><a
                                            class="btn waves-effect waves-light btn-type green accent-4" href="home">Mostrar temas de mi interés</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type orange"
                                            href="resultados-convocatorias">Convocatorias docentes</a>
                                </div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type red"
                                                              href="resultados-revistas">Revistas científicas</a></div>
                                <div class="filter-button"><a class="btn waves-effect waves-light btn-type blue"
                                                              href="resultados-eventos">Eventos académicos</a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <span class="card-title"><i class="material-icons card-title-center">description</i>Búsqueda avanzada</span>
                            <div class="divider"></div>
                            <div class="card-content" style="min-height: 0px">



                            {!!Form::open(['route'=>'search-avanced.store'])!!}

                                <div style="padding-top: 10px">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">Por
                                        Universidad</label>
                                    {!!Form::select('search_univer_avanced', $institutes, Auth::user()->institute_id ,['class'=>'browser-default'])!!}

                                </div>
                                <br>
                                <div style="padding-top: 10px;">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">Por Área</label>
                                    {!!Form::select('search_area_avanced', $areas,null,['class'=>'browser-default'])!!}
                                </div>

                                <br>
                                <div style="padding-top: 10px;">
                                    <label style="font-size: 1em" class="left grey-text text-darken-3">Por Tipo</label>
                                    <select class="browser-default" name="search_tipo_avanced">
                                        <option value="convocatoria">Convocatoria</option>
                                        <option value="revista">Revista</option>
                                        <option value="evento">Eventos</option>
                                    </select>
                                </div>
                                <br>

                                {!!Form::submit('Buscar',['class'=>'btn waves-effect waves-green cyan darken-3', 'title'=>'Buscar con los filtros seleccionados'])!!}

                                {!!Form::close()!!}



                            </div>
                        </div>
                    </li>
                </ul>
            </div>