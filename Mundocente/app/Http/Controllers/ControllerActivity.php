<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use DB;
use Redirect;


use Creation;

use Mundocente\Actividad;
use Mundocente\User;
use Mundocente\Institute;
use Mundocente\Creacion;
use Mundocente\Preferencias;
use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

class ControllerActivity extends Controller
{

     public function __construct(){
        $this->middleware('auth', ['only' => ['store', 'configurarPublicaciones']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

public function configurarPublicaciones()
    {

        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace','actividads.created_at', 'users.name', 'users.last_name','institutes.name_i')
            ->where('users.id',Auth::user()->id)
            ->orderby('actividads.id', 'desc')
            ->paginate(5);


        return view('publication',compact('actividads'));
    }



public function configurarPublicacionesUnic($id_activi)
    {

        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace','actividads.created_at', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.id',$id_activi)
            ->get();


        return view('edit_publication_admin',compact('actividads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
              
            $institutes = Institute::where('id',Auth::user()->institute_id)->get();

            
                if($request['tipo']=='convocatoria'){
                         Actividad::create([
                        'title'=>$request['tipo'].' de '.$request['cargo'],
                        'tipo'=>$request['tipo'],
                        'cargo'=>$request['cargo'],
                        'enlace'=>$request['enlace'],
                        'description'=>$request['desc'],
                        'fecha_inicio'=>$request['inicio'],
                        'fecha_fin'=>$request['fin'],
                        'users_id'=>Auth::user()->id,
                        'lugar_id'=>$request['lugar_id'],
                        ]);

                        $id_last_actividad= Actividad::all();
                        $id_last = $id_last_actividad->last()->id;
                        $lista_areas = $request['area'];
                        if($lista_areas!=null){
                             foreach ($lista_areas as $area) {
                                Creacion::create([
                                'activity_id'=>$id_last,
                                'area_id'=>$area,
                                ]); 
                            }
                        }

                        $tamanio = count($request['area']);
                        
                        for ($i=0; $i < $tamanio; $i++) { 
                        $listaPrefer = DB::table('preferencias')
                            ->join('users', 'preferencias.users_email', '=', 'users.email')
                            ->where('areas_id', $lista_areas[$i])
                            ->where('email_active', 'si')
                            ->get();    
                            
                                     //Email information
                        foreach ($listaPrefer as $pre) {
                             $admin_email = $pre->users_email;
                            $name = 'Nueva convocatoria';
                            $email = 'Mundocente';
                            $message = 'Hay una nueva convocatoria de "'.$request['cargo'].'", visítanos en grupo6.virtualtic.co.  Link a la convocatoria: "'.$request['enlace'].'".';

                            //send email
                            @mail($admin_email, $name, $message, "From: " . $email);
                        }

                           
                        }


                            
                       
                         
                    return 1;
                }else if($request['tipo']=='revista'){
                         if($request['indexa']=='si'){
                            Actividad::create([
                        'title'=>$request['titulo'],
                        'tipo'=>$request['tipo'],
                        
                        'enlace'=>$request['enlace'],
                        'description'=>$request['desc'],
                        'indexada'=>'si',
                        'categoria'=>$request['cate'],
                        'fecha_inicio'=>$request['inicio'],
                        
                        'users_id'=>Auth::user()->id,
                        'lugar_id'=>$request['lugar_id'],
                        ]);

                        $id_last_actividad= Actividad::all();
                        $id_last = $id_last_actividad->last()->id;
                        $lista_areas = $request['area'];
                        if($lista_areas!=null){
                             foreach ($lista_areas as $area) {
                            Creacion::create([
                            'activity_id'=>$id_last,
                            'area_id'=>$area,
                            ]); 
                        }
                        
                        }
                    return 1;
                         }else{
                            Actividad::create([
                        'title'=>$request['titulo'],
                        'tipo'=>$request['tipo'],
                        
                        'enlace'=>$request['enlace'],
                        'description'=>$request['desc'],
                        'indexada'=>'no',
                        'fecha_inicio'=>$request['inicio'],
                        
                        'users_id'=>Auth::user()->id,
                        'lugar_id'=>$request['lugar_id'],
                        ]);

                        $id_last_actividad= Actividad::all();
                        $id_last = $id_last_actividad->last()->id;
                        $lista_areas = $request['area'];
                        if($lista_areas!=null){
                             foreach ($lista_areas as $area) {
                            Creacion::create([
                            'activity_id'=>$id_last,
                            'area_id'=>$area,
                            ]); 
                        }
                        
                        }



                             $tamanio = count($request['area']);
                        
                        for ($i=0; $i < $tamanio; $i++) { 
                        $listaPrefer = DB::table('preferencias')
                            ->join('users', 'preferencias.users_email', '=', 'users.email')
                            ->where('areas_id', $lista_areas[$i])
                            ->where('email_active', 'si')
                            ->get();  
                            
                                     //Email information
                        foreach ($listaPrefer as $pre) {
                             $admin_email = $pre->users_email;
                            $name = 'Nueva Revista';
                            $email = 'Mundocente';
                            $message = 'Hay una nueva Revista, visítanos en grupo6.virtualtic.co.  Link a la Revista: "'.$request['enlace'].'". Título de la revista "'.$request['titulo'].'"';

                            //send email
                            @mail($admin_email, $name, $message, "From: " . $email);
                        }

                           
                        }


                    return 1;
                         }
                }else{
                    Actividad::create([
                        'title'=>$request['titulo'],
                        'tipo'=>$request['tipo'],
                        'enlace'=>$request['enlace'],
                        'description'=>$request['desc'],
                        'fecha_inicio'=>$request['inicio'],
                        'fecha_fin'=>$request['fin'],
                        'users_id'=>Auth::user()->id,
                        'lugar_id'=>$request['lugar_id'],
                        ]);

                        $id_last_actividad= Actividad::all();
                        $id_last = $id_last_actividad->last()->id;
                        $lista_areas = $request['area'];
                        if($lista_areas!=null){
                             foreach ($lista_areas as $area) {
                            Creacion::create([
                            'activity_id'=>$id_last,
                            'area_id'=>$area,
                            ]); 
                        }
                        
                        
                        }

                            $tamanio = count($request['area']);
                        
                        for ($i=0; $i < $tamanio; $i++) { 
                        $listaPrefer = DB::table('preferencias')
                            ->join('users', 'preferencias.users_email', '=', 'users.email')
                            ->where('areas_id', $lista_areas[$i])
                            ->where('email_active', 'si')
                            ->get();   
                            
                                     //Email information
                        foreach ($listaPrefer as $pre) {
                             $admin_email = $pre->users_email;
                            $name = 'Nuevo Evento';
                            $email = 'Mundocente';
                            $message = 'Hay un nuevo Evento, visítanos en grupo6.virtualtic.co.  Link al evento: "'.$request['enlace'].'". Evento: "'.$request['titulo'].'"';

                            //send email
                            @mail($admin_email, $name, $message, "From: " . $email);
                        }

                           
                        }
                    return 0;
                }
            

          

            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    if($request->ajax()){
             DB::table('actividads')
            ->where('id',$id)
            ->update(['title'=>$request['titulo'],
                    'tipo'=>$request['tipo'],
                    'cargo'=>$request['cargo'],
                    'enlace'=>$request['enlace'],
                    'description'=>$request['desc'],
                    'indexada'=>$request['indexa'],
                    'categoria'=>$request['cat'],
                    'fecha_inicio'=>$request['inicio'],
                    'fecha_fin'=>$request['fin']]);


                DB::select('delete from creacions where activity_id='.$id.'');


                $lista_areas = $request['area'];
                 if($lista_areas!=null){
                             foreach ($lista_areas as $area_l) {
                                Creacion::create([
                                'activity_id'=>$id,
                                'area_id'=>$area_l,
                                ]); 
                        }

                return 0;
        }
    }
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creacions = DB::select('delete from creacions where activity_id='.$id.'');
        $activity = DB::select('delete from actividads where id='.$id.'');
        return 0;
    }
}
