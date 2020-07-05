<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $user = \request('user');

        if($user){
            $user = User::where('name', $user)->first();
            return view('user', [
                'user' => $user
            ]);
        }
        else{
            $users = User::get();
            return view('index', [
                'users' => $users
            ]);
        }

    }
}
