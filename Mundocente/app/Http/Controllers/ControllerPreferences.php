<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

use Mundocente\Areas;
use Mundocente\Preferencias;

class ControllerPreferences extends Controller
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

        $lista_areasPrefer = $request['select_option'];
        DB::table('preferencias')->where('users_email', Auth::user()->email)->delete();
        if($lista_areasPrefer!=null){
            foreach ($lista_areasPrefer as $area_prefe) {
                  $count = Preferencias::where('users_email',Auth::user()->email)
                                ->where('areas_id',$area_prefe)->count();

                    if($count==0){
                        Preferencias::create([
                            'users_email'=>Auth::user()->email,
                            'areas_id'=>$area_prefe,
                            ]);
                    }
            }
            
        }

      
            
            return Redirect::to('settings');

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
        DB::table('preferencias')->where('id', $request['id_destroy'])->delete();
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
        DB::table('preferencias')->where('id', $request['id_destroy'])->delete();
    }
}
