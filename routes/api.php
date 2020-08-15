<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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



//untuk dari front end ke server

Route::group(['middleware'=>['cors','myauth'],'prefix' => 'v1'], function(){
Route::post('/login','api\UserController@login');
Route::post('/register','api\UserController@register');
});


Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'v1'], function(){
    Route::get('/user', 'api\UserController@getCurrentUser');
    Route::get('/alluser','api\UserController@getUser');
    Route::get('/user/{email}','api\UserController@getUserByEmail');

    Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'course'], function(){
        Route::post('/register','api\CourseController@register');
        Route::post('/registermaterial','api\CourseController@registerMaterial');
        Route::get('/getcourse','api\CourseController@getCourse');      
        Route::get('/getcourse/{course_id}','api\CourseController@getCourseById');
        Route::get('/getdetailcourse/{material_id}','api\CourseController@getCourseDetailbyId');
        Route::get('/getdetailcourse','api\CourseController@getCourseDetail');
    });
});