<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* All Users */
Route::resource('users', 'UserController')->only(['index']);

/* Single User */
Route::resource('user', 'UserController')->only(['show']);

/* Single Project */
Route::resource('project', 'ProjectController')->only(['show']);
