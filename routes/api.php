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

//untuk dari user ke api 
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//untuk dari front end ke server
Route::group(['middleware'=>['cors','myauth'],'prefix' => 'v1'], function(){
    Route::post('/login','api\UserController@login');
    Route::get('/user','api\UserController@getUser');
    Route::get('/user/{email}','api\UserController@getUserByEmail');
    Route::post('/register','api\UserController@register');
});
