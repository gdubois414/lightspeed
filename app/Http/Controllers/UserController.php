<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        return response(User::with('projects')->get()->toJSON(), Response::HTTP_OK);
    }

    public function show($name)
    {
        $data = new UserResource(User::where('name', $name)->first());
        return response($data, Response::HTTP_OK);
//        return response(User::where('id', $user->id)->with('projects')->first()->toJSON(), Response::HTTP_OK);
    }
}
