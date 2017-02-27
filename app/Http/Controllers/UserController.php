<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function listUser()
    {
		$users = User::all();
		return response()->json(['users'=>$users]);    	
    }
    public function register2(Request $request)
    {
        dd($request->name);
    }
}
