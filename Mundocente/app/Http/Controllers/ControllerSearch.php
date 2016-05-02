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
       
        
        $areas = Areas::lists('name','id');
        $institutes = Institute::lists('name','id');
        $actividads = DB::table('actividads')
            ->where('tipo', 'convocatoria')
            ->select('actividads.*')
            ->paginate(5);
        return view('search',compact('areas','institutes', 'actividads'));
    }






      public function mostrarRevistas(){
        $areas = Areas::lists('name','id');
        $institutes = Institute::lists('name','id');
              $actividads = DB::table('actividads')
            ->where('tipo', 'revista')
            ->select('actividads.*')
            ->paginate(5);
        return view('search',compact('areas','institutes', 'actividads'));
    }






      public function mostrarEvento(){
                $areas = Areas::lists('name','id');
                $institutes = Institute::lists('name','id');         
                $actividads = DB::table('actividads')
                    ->where('tipo', 'evento')
                    ->select('actividads.*')
                    ->paginate(5);
                return view('search',compact('areas','institutes', 'actividads'));
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
         $areas = Areas::lists('name','id');
                $institutes = Institute::lists('name','id');         
                $actividads = DB::table('actividads')
                    ->where('title', 'like', '%'.$request['palabra-clave'].'%')
                    ->select('actividads.*')
                    ->paginate(20);

                return view('search',compact('areas','institutes', 'actividads'));
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
