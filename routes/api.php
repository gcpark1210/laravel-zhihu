<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/topics', 'TopicsController@index');
Route::middleware('auth:api')->post('/question/follower', 'QuestionFollowController@follower');
Route::middleware('auth:api')->post('/question/follow', 'QuestionFollowController@followThisQuestion');
Route::middleware('auth:api')->get('/user/followers/{id}', 'FollowersController@index');
Route::middleware('auth:api')->post('/user/follow', 'FollowersController@follow');
Route::middleware('auth:api')->get('/answer/{id}/votes/users', 'VotesController@users');
Route::middleware('auth:api')->post('/answer/vote', 'VotesController@vote');
Route::middleware('auth:api')->post('/message/store', 'MessageController@store');
Route::middleware('auth:api')->get('/answer/{id}/comments', 'CommentsController@answer');
Route::middleware('auth:api')->get('/question/{id}/comments', 'CommentsController@question');
Route::middleware('auth:api')->post('/comment', 'CommentsController@store');


Route::middleware('auth:api')->get('/test', 'TestController@test');
Route::middleware('auth:api')->get('/rebasetest', 'RebaseTestController@test');
