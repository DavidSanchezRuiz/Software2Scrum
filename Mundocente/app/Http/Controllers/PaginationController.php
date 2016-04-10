<?php namespace Mundocente\Http\Controllers;

use Illuminate\Http\Request;

use Mundocente\Http\Requests;
use Mundocente\Http\Controllers\Controller;

class PaginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividads = \Mundocente\Actividad::All();
        return view('index',compact('actividads'));
    }

    public function search(){
        return view('search');   
    }
}
