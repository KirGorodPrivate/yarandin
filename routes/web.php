<?php

use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashboard
Route::get('/dashboard', 'ProjectController@index')->middleware('auth')->name('dashboard');


// Project routes
Route::get('/project/create', 'ProjectController@create')->middleware('auth')->name('project.create');
Route::get('/project/{project_id}', 'ProjectController@show')->middleware('auth')->name('project.show');
Route::get('/project/{project_id}/new', 'ProjectController@New')->middleware('auth')->name('project.new');
Route::get('/project/{project_id}/inprogress', 'ProjectController@showProgress')->middleware('auth')->name('project.progress');
Route::get('/project/{project_id}/done', 'ProjectController@showDone')->middleware('auth')->name('project.done');
Route::post('/project/save', 'ProjectController@save')->middleware('auth')->name('project.save');
Route::get('/project/{project_id}/delete', 'ProjectController@delete')->middleware('auth')->name('project.delete');
Route::get('/project/{project_id}/update', 'ProjectController@update')->middleware('auth')->name('project.update');
Route::post('/project/{project_id}/update/save', 'ProjectController@updateSave')->middleware('auth')->name('project.updateSave');

// Task routes
Route::get('/project/{project_id}/task/create', 'TaskController@create')->middleware('auth')->name('task.create');
Route::post('/project/{project_id}/task/save', 'TaskController@save')->middleware('auth')->name('task.save');
Route::get('/project/{project_id}/task/{task_id}', 'TaskController@show')->name('task.show');
Route::post('/project/{project_id}/task/{task_id}/save', 'TaskController@updateSave')->middleware('auth')->name('task.updateSave');
Route::get('/project/{project_id}/task/{task_id}/update', 'TaskController@update')->middleware('auth')->name('task.update');
Route::get('/project/{project_id}/task/{task_id}/delete', 'TaskController@delete')->middleware('auth')->name('task.delete');
Route::get('/download/{file}', 'TaskController@download')->name('task.download');

// User routes
Route::get('/user/{id}', 'UserController@show')->name('user.show');

