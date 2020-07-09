<?php

use Illuminate\Support\Facades\Route;
use App\Forge;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data = App\Forge::all();
    return view('tasks')->with('tasks',$data);
});

Route::post('/saveTask','TaskController@store');

Route::get('/markscompleted/{id}','TaskController@UpdateTaskAsCompleted');

Route::get('/marksnotcompleted/{id}','TaskController@UpdateNotTaskAsCompleted');

Route::get('/delete/{id}','TaskController@Delete');

Route::get('/update/{id}','TaskController@Update');

Route::post('/newupdatetask','TaskController@updatetask');