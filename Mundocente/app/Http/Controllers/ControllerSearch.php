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

    public function mostrarConvocatorias(){
       
        
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo','convocatoria')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);
        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Convocatorias']);
    }






      public function mostrarRevistas(){
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
              $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo','revista')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);
        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Revistas']);
    }






      public function mostrarEvento(){
                $areas = Areas::lists('name_a','id');
                $institutes = Institute::lists('name_i','id');         
                $actividads = DB::table('users')
                ->join('actividads', 'users.id', '=', 'actividads.users_id')
                ->join('institutes', 'users.institute_id', '=', 'institutes.id')
                ->select('actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
                ->where('actividads.tipo','evento')
                ->orderby('actividads.id', 'desc')
                ->paginate(20);
                return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Eventos']);
    }



     public function mostrarUniversidad($id_universidad){
       
        
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('institutes.name_i',$id_universidad)
            ->orderby('actividads.id', 'desc')
            ->paginate(20);
        return view('search_univer',compact('areas','institutes', 'actividads'), ['universidad_search'=>$id_universidad]);
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
                

                    $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('institutes.id','actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('title', 'like', '%'.$request['palabra-clave'].'%')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);

                return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>$request['palabra-clave']]);
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
