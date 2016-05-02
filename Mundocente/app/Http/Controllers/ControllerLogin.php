<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use User;
use DB;

use Mundocente\Http\Requests;
use Mundocente\Http\Requests\LoginRequets;
use Mundocente\Http\Requests\UpdateRequest;
use Mundocente\Http\Controllers\Controller;
use Mundocente\Institute;
use Mundocente\Areas;
use Mundocente\Preferencias;
use Mundocente\Actividad;
use Mundocente\Creation;


class ControllerLogin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $areas = Areas::lists('name','id');
        $institutes = Institute::lists('name','id');
        $actividads = Actividad::paginate(5);
        return view('search',compact('areas','institutes', 'actividads'));   
    }
    public function ingreso(){
        
    }

    public function configurar(){

        $areas = Areas::lists('name','id');
        $institutes = Institute::lists('name','id');

        
       
       $preferencias = DB::table('areas')
            ->join('preferencias', 'areas.id', '=', 'preferencias.areas_id')
            ->select('areas.*', 'preferencias.users_email', 'preferencias.id')
            ->get();

        return view('account',compact('institutes','areas','preferencias'));
    }
    public function salir(){
        Auth::logout();
        return Redirect::to('/');
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
    public function store(LoginRequets $request)
    {
     if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
        return Redirect::to('home');
     }
     Session::flash('message-error', 'Datos incorrectos');
     return Redirect::to('login');
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
    public function update(UpdateRequest $request, $id)
    {
        
        


        if(Auth::attempt(['password'=>$request['password']])){
            DB::table('users')
            ->where('id', $id)
            ->update(['name' => $request['name']]);
            DB::table('users')
            ->where('id', $id)
            ->update(['last_name' => $request['last_name']]);
            DB::table('users')
            ->where('id', $id)
            ->update(['email' => $request['email']]);

            DB::table('users')
            ->where('id', $id)
            ->update(['institute_id' => $request['universidad']]);

            if(!empty($request['passwordNew'])){
                DB::table('users')
                ->where('id', $id)
                ->update(['password' => bcrypt($request['passwordNew'])]);
            }
            Session::flash('message-change-data',"Usuario editado correctamente");
        }else{
            Session::flash('message-change-data-pass',"Contraseña no es válida");
        }
        

        
        return Redirect::to('settings');
    }


   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Creation::where('users_id', Auth::user()->id)->delete();
    Preferencias::where('users_email', Auth::user()->email)->delete();
     \Mundocente\User::destroy($id);  

      return Redirect::to('singup');
    }
}
