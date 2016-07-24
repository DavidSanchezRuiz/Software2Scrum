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

    public function __construct(){
        $this->middleware('auth', ['only' => ['index','admin','configurar','update','destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');

        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('actividads.id','actividads.categoria','actividads.indexada','actividads.title', 'actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace', 'users.name', 'users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);

        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Temas']);
    }






    public function ingreso(){
        
    }

    public function configurar(){

        $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');

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

     public function admin()
    {

        $users = DB::table('users')
        ->join('institutes', 'users.institute_id', '=', 'institutes.id')
        ->select('users.id','users.name', 'users.rol','users.cargo', 'users.email','users.last_name', 'institutes.name_i')
        ->orderby('users.id','desc')
        ->get();

        if(Auth::user()->rol=='administrador'){
            return view('admin',compact('users'));
        }else{
            $areas = Areas::lists('name_a','id');
        $institutes = Institute::lists('name_i','id');



        $actividads = DB::table('users')
            ->join('actividads', 'users.id', '=', 'actividads.users_id')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->select('institutes.id','actividads.title','actividads.cargo','actividads.description','actividads.tipo','actividads.fecha_inicio','actividads.fecha_fin','actividads.enlace','users.name','users.last_name','institutes.name_i')
            ->orderby('actividads.id', 'desc')
            ->paginate(41);

        return view('search',compact('areas','institutes', 'actividads'),['tipo_activity'=>'Temas']);
        }

        
    }



    public function activarUsuario(Request $request){
         if($request->ajax()){
            
             DB::table('users')
            ->where('id',$request['id_u'])
            ->update(['rol' => 'publicador']);

            if (isset($_REQUEST['email_u']))  {
                //Email information
                $admin_email = $request['email_u'];
                $name = ('Activación de servicio');
                $email = 'Mundocente';
                $message = 'Ha sido aceptado como publicador en Mundocente, gracias por utilizar nuestra plataforma.';

                //send email
                if (@mail($admin_email, $name, $message, "From: " . $email)) {
                    return 1;  
                }
                else {
                    return 0;  
                }
            }


              
        }
    }

    public function desactivarUsuario(Request $request){
         if($request->ajax()){
            
             DB::table('users')
            ->where('id',$request['id_u'])
            ->update(['rol' => 'buscador']);
             if (isset($_REQUEST['email_u']))  {
                //Email information
                $admin_email = $request['email_u'];
                $name = ('Desactivación de servicio');
                $email = 'Mundocente';
                $message = 'Ha sido deshabilitado como publicador en Mundocente por mal uso, gracias por utilizar nuestra plataforma.';

                //send email
                if (@mail($admin_email, $name, $message, "From: " . $email)) {
                    return 1;  
                }
                else {
                    return 0;  
                }
            }
        }
    }









    public function obtenerdatosusuarios($id_u){
        $users = DB::table('users')
            ->join('institutes', 'users.institute_id', '=', 'institutes.id')
            ->join('lugars', 'users.lugar_id', '=', 'lugars.id')
            ->select('users.id','users.name as name_u', 'users.rol', 'users.email','users.last_name', 'institutes.id as id_i', 'users.cargo','lugars.id as id_l', 'users.email_active')
            ->where('users.id',$id_u)
            ->get();
        return response()->json(
            $users
        );
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
        if($request['email']=="administrador@mundocente.com"){
            return Redirect::to('admin'); 
        }else{
            
            return Redirect::to('home');    
        }
        
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



    public function edit_user_admin(Request $request, $id_u){
           if($request->ajax()){

            

            

                DB::table('users')
            ->where('id', $id_u)
            ->update(['name' => $request['name_new']]);

            DB::table('users')
            ->where('id', $id_u)
            ->update(['last_name' => $request['last_name_new']]);




            

         

            

            DB::table('users')
            ->where('id', $id_u)
            ->update(['cargo' => $request['cargo_new']]);
           
            DB::table('users')
            ->where('id', $id_u)
            ->update(['lugar_id' => $request['ciudad_new']]);



             DB::table('users')
            ->where('id', $id_u)
            ->update(['email_active' => $request['active_new']]);

            
            DB::table('users')
            ->where('id', $id_u)
            ->update(['institute_id' => $request['univer_new']]);


                

        return 0;
           

            

               
    }
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
        
            
            DB::table('users')
            ->where('id', $id)
            ->update(['name' => $request['name']]);


            DB::table('users')
            ->where('id', $id)
            ->update(['last_name' => $request['last_name']]);


               if($request['email']!=Auth::user()->email){
                $countEma = DB::table('users')->where('email', $request['email'])->count();
                if($countEma==0){
                     Preferencias::where('users_email', Auth::user()->email)->delete();
                 DB::table('users')
                ->where('id', $id)
                ->update(['email' => $request['email']]);
                }
               
            }

           


            DB::table('users')
            ->where('id', $id)
            ->update(['cargo' => $request['cargo_edit']]);
            DB::table('users')
            ->where('id', $id)
            ->update(['lugar_id' => $request['recidencia_account']]);

             DB::table('users')
            ->where('id', $id)
            ->update(['email_active' => $request['new_email_active_edit_account']]);

            


            if($request['universidad']!=Auth::user()->institute_id){
                DB::table('users')
            ->where('id', $id)
            ->update(['institute_id' => $request['universidad']]);
             DB::table('users')
                ->where('id', $id)
                ->update(['rol' => 'buscador']);
            }

            



            if(!empty($request['passwordNew'])){
                DB::table('users')
                ->where('id', $id)
                ->update(['password' => bcrypt($request['passwordNew'])]);
            }
            Session::flash('message-change-data',"Usuario editado correctamente");
        
        

        
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
    Creation::where('users_id', $id)->delete();
    Preferencias::where('users_email', Auth::user()->email)->delete();
     User::destroy($id);  


        return Redirect::to('/');

      
    }
}
