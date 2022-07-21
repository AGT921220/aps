<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Subcategorias;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function home(){
        $categorias = Categorias::where('status','Visible')->get();

        foreach($categorias as  $item){
            $item->subcategorias  = Subcategorias::where('status','Visible')->where('category',$item->id)->get();          
        }
        // $subcategorias = Subcategorias::where('status','Visible')
        // ->whereIn('category',$categorias)
        // ->get();

        return view('home',compact('categorias'));
        // foreach($categorias as $item){

        // }

    }
}
