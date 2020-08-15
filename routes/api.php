<?php

use App\Forum;
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


Route::group(['middleware'=>['cors','myauth'],'prefix' => 'v1'], function(){
Route::post('/login','api\UserController@login');
Route::post('/register','api\UserController@register');
Route::get('course/top/{offset}','api\CourseController@getCoursePopular');
Route::get('course/category', 'api\CategoryController@getCategories');
});

Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'v1'], function(){
    Route::get('/user', 'api\UserController@getCurrentUser');
    Route::get('/alluser','api\UserController@getUser');
    Route::get('/user/{email}','api\UserController@getUserByEmail');

    Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'course'], function(){
        Route::post('/','api\CourseController@register');
        Route::post('/material','api\CourseController@registerMaterial');
        Route::get('/','api\CourseController@getCourse');
        Route::get('/{course_id}','api\CourseController@getCourseById');
        Route::get('/detail/{material_id}','api\CourseController@getCourseDetailbyId');
        Route::get('/detail','api\CourseController@getCourseDetail');
    });
    
    Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'forum'], function(){
        Route::post('/','api\ForumController@register');
        Route::get('/','api\ForumController@getAllForum');
        Route::get('/{forum_id}','api\ForumController@getForumById');
        Route::get('/course/{course_id}','api\ForumController@getForumByCourse');
        });
    
    Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'thread'], function(){
        Route::post('/','api\ThreadController@register');
        Route::get('/','api\ThreadController@getAllThread');
        Route::get('/{thread_id}','api\ThreadController@getAllThreadById');
        });
    
    Route::group(['middleware'=>['cors','myauth','auth:api'],'prefix' => 'comment'], function(){
        Route::post('/','api\CommentController@register');
        Route::get('/','api\CommentController@getAllComment');
        Route::get('/{thread_id}','api\CommentController@getAllCommentByThreadId');
        });
});    
