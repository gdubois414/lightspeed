<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $user = \request('user');

        //Since I created a home page that lists all the users, we check for the user parameter and then load a view accordingly.
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
