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
            ->join('areas', 'actividads.area_id', '=', 'areas.id')
            ->select('actividads.id','actividads.title','areas.name_a','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace','actividads.created_at', 'users.name', 'users.last_name','institutes.name_i')
            ->where('users.id',Auth::user()->id)
            ->orderby('actividads.id', 'desc')
            ->paginate(20);


        return view('publication',compact('actividads'));
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

            foreach ($institutes as $institut) {
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
                        'area_id'=>$request['area'],
                        ]);
                    return 0;
                }else{
                    Actividad::create([
                        'title'=>$request['titulo'],
                        'tipo'=>$request['tipo'],
                        'enlace'=>$request['enlace'],
                        'description'=>$request['desc'],
                        'fecha_inicio'=>$request['inicio'],
                        'fecha_fin'=>$request['fin'],
                        'users_id'=>Auth::user()->id,
                        'area_id'=>$request['area'],
                        ]);
                    return 0;
                }
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
    public function update(Request $request, $id)
    {
        if($request->ajax()){
             DB::table('actividads')
            ->where('id',$id)
            ->update(['title'=>$request['titulo'],
                    'tipo'=>$request['tipo'],
                    'cargo'=>$request['cargo'],
                    'enlace'=>$request['enlace'],
                    'description'=>$request['desc'],
                    'fecha_inicio'=>$request['inicio'],
                    'fecha_fin'=>$request['fin'],
                    'area_id'=>$request['area']]);
                return 0;
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
        $activity = DB::select('delete from actividads where id='.$id.'');
        return 0;
    }
}
