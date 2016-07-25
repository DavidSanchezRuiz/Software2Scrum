<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mundocente\Areas;
use Mundocente\Institute;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;


class ControllerHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


    public function inicio()
    {

         if (Auth::check()) {
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');



        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);

        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Temas']);
        }else{
            return view('index');  
        }
        
        
    }

     public function ingresar()
    {
         if (Auth::check()) {
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');



        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);

        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Temas']);
        }else{
            return view('login');    
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
        //
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
