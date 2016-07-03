<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use Mundocente\Http\Requests;
use Mundocente\Http\Requests\CreateUserRequest;
use Redirect;   
use Mundocente\Http\Controllers\Controller;
use Mundocente\Institute;
use Mundocente\Areas;

class ControllerRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutes = Institute::lists('name','id');
        $areas = Areas::lists('name','id');
        return view('singup',compact('institutes','areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        \Mundocente\User::create([
            'name'=> $request['nombre'],
            'email'=> $request['email'],
            'rol'=> 'publicador',
            'institute_id' => $request['universidad'],
            'password'=> bcrypt($request['password']),
            ]);

        \Mundocente\Preferencias::create([
            'users_email'=> $request['email'],
            'areas_id'=> $request['areasSelect'],
            ]);
        return view('login');
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
