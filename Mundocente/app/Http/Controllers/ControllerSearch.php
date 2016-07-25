<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;
use DB;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Institute;
use Mundocente\Areas;
use Mundocente\Preferencias;
use Mundocente\Actividad;


class ControllerSearch extends Controller
{

     public function __construct(){
        $this->middleware('auth', ['only' => ['mostrarConvocatorias','mostrarRevistas', 'mostrarEvento','store']]);
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


    public function mostrarTodo(){
       
        
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);
        return view('search_all',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Todas']);
    }

    public function mostrarConvocatorias(){
       
        
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo','convocatoria')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);
        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Convocatorias']);
    }






      public function mostrarRevistas(){
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
              $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo','revista')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);
        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Revistas']);
    }






      public function mostrarEvento(){
                $areas = Areas::lists('name_a','id');
                $institutes = Institute::lists('name_i','id');         
                $actividads = DB::table('users')
                ->join('actividads', 'users.id', '=', 'actividads.users_id')
                ->join('institutes', 'users.institute_id', '=', 'institutes.id')
                ->select('actividads.id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace','actividads.categoria','actividads.indexada', 'users.name', 'users.last_name','institutes.name_i')
                ->where('actividads.tipo','evento')
                ->orderby('actividads.id', 'desc')
                ->paginate(41);
                return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Eventos']);
    }



     public function mostrarUniversidad($id_universidad){
       
        

         if (Auth::check()) {
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('institutes.name_i',$id_universidad)
            ->orderby('actividads.id', 'desc')
            ->paginate(41);
        return view('search_univer',compact('areas','institutes', 'actividads'), ['universidad_search'=>$id_universidad]);
        }else{
            $institutes = Institute::lists('name_i','id');
        $areas = Areas::all();
        return view('singup',compact('institutes','areas'));   
        }

        


        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $areas = Areas::lists('name_a','id');
                $institutes = Institute::lists('name_i','id');         
                

            $porciones = explode(" ",  $request['palabra-clave']);
            $tamano = count($porciones);

            if($tamano==1){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==2){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==3){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==4){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==5){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==6){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==7){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orWhere('title', 'like', '%'.$porciones[6].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==8){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orWhere('title', 'like', '%'.$porciones[6].'%')
            ->orWhere('title', 'like', '%'.$porciones[7].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==9){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orWhere('title', 'like', '%'.$porciones[6].'%')
            ->orWhere('title', 'like', '%'.$porciones[7].'%')
            ->orWhere('title', 'like', '%'.$porciones[8].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==10){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orWhere('title', 'like', '%'.$porciones[6].'%')
            ->orWhere('title', 'like', '%'.$porciones[7].'%')
            ->orWhere('title', 'like', '%'.$porciones[8].'%')
            ->orWhere('title', 'like', '%'.$porciones[9].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }else if($tamano==11){
                $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$porciones[0].'%')
            ->orWhere('title', 'like', '%'.$porciones[1].'%')
            ->orWhere('title', 'like', '%'.$porciones[2].'%')
            ->orWhere('title', 'like', '%'.$porciones[3].'%')
            ->orWhere('title', 'like', '%'.$porciones[4].'%')
            ->orWhere('title', 'like', '%'.$porciones[5].'%')
            ->orWhere('title', 'like', '%'.$porciones[6].'%')
            ->orWhere('title', 'like', '%'.$porciones[7].'%')
            ->orWhere('title', 'like', '%'.$porciones[8].'%')
            ->orWhere('title', 'like', '%'.$porciones[9].'%')
            ->orWhere('title', 'like', '%'.$porciones[10].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(21);
            }




             

                return view('search_all',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Palabra clave: '.$request['palabra-clave'].', Todas ']);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
