<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Auth;
use DB;

use Mundocente\Areas;
use Mundocente\Institute;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

class ControllerSearchEspecific extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(($request['busqueda_u']=='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('lugars', 'actividads.lugar_id', '=', 'lugars.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            ->where('institutes.id',$request['search_univer_avanced'])
            ->where('creacions.area_id',$request['search_area_avanced'])
            ->Where('actividads.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']=='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            ->where('institutes.id',$request['search_univer_avanced'])
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']!='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            ->where('creacions.area_id',$request['search_area_avanced'])
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']!='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            
            
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']!='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            
            
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']=='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            ->where('creacions.area_id',$request['search_area_avanced'])
            ->where('institutes.id',$request['search_univer_avanced'])
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']=='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            
            ->where('institutes.id',$request['search_univer_avanced'])
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']=='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            
            ->where('institutes.id',$request['search_univer_avanced'])
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']!='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            ->where('creacions.area_id',$request['search_area_avanced'])
            
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']!='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            ->where('creacions.area_id',$request['search_area_avanced'])
            
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else  if(($request['busqueda_u']!='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            
            
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']=='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            ->where('creacions.area_id',$request['search_area_avanced'])
            ->where('institutes.id',$request['search_univer_avanced'])
            
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']=='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            
            ->where('institutes.id',$request['search_univer_avanced'])
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']!='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']=='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            ->where('creacions.area_id',$request['search_area_avanced'])
            
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']=='si')&&($request['busqueda_a']=='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']=='si')){
            $areas = Areas::lists('name_a','id');
            $institutes = Institute::lists('name_i','id');
            $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('creacions', 'actividads.id', '=', 'creacions.activity_id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            
            ->where('creacions.area_id',$request['search_area_avanced'])
            ->where('institutes.id',$request['search_univer_avanced'])
            ->Where('institutes.lugar_id',$request['search_city_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(9);
        return view('search_especific',compact('areas','institutes', 'actividads'));
        }else if(($request['busqueda_u']!='si')&&($request['busqueda_a']!='si')&&($request['busqueda_t']!='si')&&($request['busqueda_c']!='si')){
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);
        return view('search_all',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Todas']);
        
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
