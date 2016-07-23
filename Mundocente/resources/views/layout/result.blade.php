<div class="col s12 m8" style="float: right;">
                <h4 style="padding-top: 8px; margin: 0 auto; font-size: 1.95em" class="light">{{$tipo_activity}} de mi interés</h4>
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
                                        <span style="font-size: 15px;color: #7d7d7d;">Publicado por '.Auth::user()->name.' '.Auth::user()->last_name.'</span>
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
    
$countResult=0;

?>




                    @foreach($actividads as $actividad)


                    <?php
                        $listPrefer=0;
                        $listPrefer = Mundocente\Preferencias::where('users_email',Auth::user()->email)
                                                ->where('areas_id',$actividad->area_id)
                                                ->count();

                        $countResult++;


                    ?>

                    @if($listPrefer>0)
                        
                        @include('layout.cuadroResultado')

                    @endif

                       
                    @endforeach

                    @if($countResult==0)
                        <h3>No hay resultados de tu interés</h3>
                    @endif

                    <li class="col s12 m12">
                        <div class="center">
                            {!!$actividads->render()!!}
                        </div>
                    </li>
                </ul>
            </div>