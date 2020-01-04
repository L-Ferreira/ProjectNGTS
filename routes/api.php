<?php

use Illuminate\Http\Request;

//? Authentication API
Route::post('login', 'LoginControllerAPI@login');
Route::middleware('auth:api')->post('logout', 'LoginControllerAPI@logout');
Route::middleware('auth:api')->get('users/me', 'UserControllerAPI@myProfile');

//? Users API
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/user/blockByEmail', 'UserControllerAPI@blockByEmail');
Route::put('/user/getUserBlock', 'UserControllerAPI@getUserBlock');

//? Helpers API
Route::post('/generateLog', 'Helpers@generateLog');

Route::post('/', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Storage::append("arduino-log.txt",
        "Time: " . now()->format("Y-m-d H:i:s") . ', ' .
        "Humidity: " . $request->get("teste", "n/a")
    );
});

Route::post('/trashcan/register', 'TrashCanController@register');
Route::get('/trashcan/get/{id}', 'TrashCanController@getTrashCan');


//? Statistics
Route::get('/statistics', 'StatisticController@index');
