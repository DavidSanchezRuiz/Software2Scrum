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
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');
        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.area_id','actividads.title','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->where('actividads.tipo',$request['search_tipo_avanced'])
            ->where('actividads.area_id',$request['search_area_avanced'])
            ->where('institutes.id',$request['search_univer_avanced'])
            ->orderby('actividads.id', 'desc')
            ->paginate(20);
        return view('search_especific',compact('areas','institutes', 'actividads'));
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
