<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'UserController@show');

//Route::get('/', function(){
//    $user = request('user');
//
//    if(!$user){
//        abort(404);
//    }
//
//});

Route::get('/project/{project}', 'ProjectController@show');
