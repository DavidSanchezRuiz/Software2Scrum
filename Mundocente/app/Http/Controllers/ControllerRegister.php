<?php

namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;


use Mundocente\Preferencias;
use Mundocente\User;
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

         if (Auth::check()) {
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');



         $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('institutes.id','actividads.title','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(20);

        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Temas']);
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request){


       if($request['permiso_signup']=='si'){

                if($request['permiso_notifi_signup']=='si'){
                     User::create([
                    'name'=> $request['nombre'],
                    'email'=>  $request['email'],
                    'rol'=> 'pendiente',
                    'email_active'=> 'si',
                    'cargo'=>  $request['cargo_docente'],
                    'institute_id' => $request['universidad'],
                    'password'=> bcrypt($request['password']),
                    ]);
                      //Email information
                        $admin_email = $request['email'];
                        $name = ('Recibirás correos de interés');
                        $email = 'Mundocente';
                        $message = 'Has aceptado recibir notificaciones en este correo acerca de nuevas publicaciones de tu interés, desde la plataforma Mndocente';

                        //send email
                        @mail($admin_email, $name, $message, "From: " . $email);
                        
                       
                }else{
                      User::create([
                    'name'=> $request['nombre'],
                    'email'=>  $request['email'],
                    'rol'=> 'pendiente',
                    'email_active'=> 'no',
                    'cargo'=>  $request['cargo_docente'],
                    'institute_id' => $request['universidad'],
                    'password'=> bcrypt($request['password']),
                    ]);
                }
           
        }else{
                if($request['permiso_notifi_signup']=='si'){
                    User::create([
                    'name'=> $request['nombre'],
                    'email'=> $request['email'],
                    'rol'=> 'buscador',
                    'email_active'=> 'si',
                    'cargo'=>  $request['cargo_docente'],
                    'institute_id' => $request['universidad'],
                    'password'=> bcrypt($request['password']),
                    ]);
                    //Email information
                    $admin_email = $request['email'];
                    $name = ('Recibirás correos de interés');
                    $email = 'Mundocente';
                    $message = 'Has aceptado recibir notificaciones en este correo acerca de nuevas publicaciones de tu interés, desde la plataforma Mndocente';

                    //send email
                    @mail($admin_email, $name, $message, "From: " . $email);
                }else{
                     User::create([
                    'name'=> $request['nombre'],
                    'email'=> $request['email'],
                    'rol'=> 'buscador',
                    'email_active'=> 'no',
                    'cargo'=>  $request['cargo_docente'],
                    'institute_id' => $request['universidad'],
                    'password'=> bcrypt($request['password']),
                    ]);
                }
           
        }

         $areasList = $request['areas'];

                        if($areasList!=null){
                              foreach ($areasList as $area) {
                                     Preferencias::create([
                                    'users_email'=> $request['email'],
                                    'areas_id'=> $area,
                                    ]);
                                }
                        }

          //Email information
                $admin_email = $request['email'];
                $name = ('Bienvenido');
                $email = 'Mundocente';
                $message = 'Te damos la bienvenida a nuestra plataforma de Mundcente.';

                //send email
                @mail($admin_email, $name, $message, "From: " . $email);
                    
                              
                       if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
                            Session::flash('message-change-data', 'Bienvenido a Mundocente');
                            return Redirect::to('home');
                        }


                              
                       
         
        
    }








    public function permisoPublicador(Request  $request){
        if($request->ajax()){
        DB::table('users')->where('id',Auth::user()->id)->update(['rol' => 'pendiente']);
        $exit = 0;
        return $exit;
        }   
    }

     public function permisoPublicadorCancelar(Request  $request){
        if($request->ajax()){
        DB::table('users')->where('id',Auth::user()->id)->update(['rol' => 'buscador']);
        $exit = 0;
        return $exit;
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
