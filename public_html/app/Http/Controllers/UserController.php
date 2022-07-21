<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users(){
        $users = DB::table('users')
        ->join('user_domicilio', 'users.id', '=', 'user_domicilio.user_id')
        ->select('users.name','users.email','users.fecha_nacimiento','user_domicilio.*')
        ->get()
        ->toArray();

        calculateDate($users);
        
        return response()->json(["data" =>$users],200);


    }
}
