<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para ver usuarios');            
        }

        $users = User::where('rol','!=','Director')->get();
        return view('dashboard.contenido.usuarios.lista',compact('users'));  
    }

    public function nuevo(){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para agregar usuarios');            
        }

        return view('dashboard.contenido.usuarios.nuevo');        
    }

    public function guardar(Request $request){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para agregar usuarios');            
        }


        if($request->pwd1!=$request->pwd2){return back()->with('error','Las contraseñas no coinciden');}
        $foto = 'images/profile-empty.png';
        $user = User::where('email',$request->email)->first();
        if(isset($user)){return back()->with('error','El correo '.$request->email.' ya existe');}

        if( isset($request->imagen) ){
            $file = $request->imagen;
            $filename = time().$request->imagen->getClientOriginalName();
            $file->move(public_path().'/images/profiles',$filename);
            $foto = 'images/profiles/'.$filename;
        }
        $user = new User();
        $user->name=$request->name;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->pwd1);
        $user->imagen=$foto;
        $user->rol=$request->rol;
        $user->user_created=auth()->user()->id;
        $user->company=$request->company;
        $user->rfc=$request->rfc;
        $user->patronal=$request->patronal;

        if($request->rol!='Subcontratista'){
        switch(auth()->user()->rol){
            case'Director':
                $user->superior=auth()->user()->id;                
            break;
            default:
            return back()->with('error','No tiene permisos para esta sección.');
                break;                
        }
        }


        if($user->save()){
            return back()->with('success','Usuario Creado');
        }else{
            return back()->with('error','Hubo un error al crear usuario');
        }



    }

    public function editar($id){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para editar usuarios');            
        }

        $usuario = User::findOrFail($id);

        return view('dashboard.contenido.usuarios.editar',compact('usuario'));  
    }

    public function update(Request $request){
        $user= User::findOrFail($request->id);
        $user->name=$request->name;
        $user->lname=$request->lname;
        if(isset($request->pwd1)){
            if($request->pwd1!=$request->pwd2){return back()->with('error','Las contraseñas no coinciden');}
            $user->password=Hash::make($request->pwd1);
        }

        if( isset($request->imagen) ){
            $file = $request->imagen;
            $filename = time().$request->imagen->getClientOriginalName();
            $file->move(public_path().'/images/profiles',$filename);
            $foto = 'images/profiles/'.$filename;
            $user->imagen=$foto;
        }

        if($user->save()){
            return back()->with('success','Usuario Modificado');
        }else{
            return back()->with('error','Hubo un error al modificar usuario');
        }
    }

}
