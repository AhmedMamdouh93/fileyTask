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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['prefix' => 'backend'], function () {
    Route::get('/','\App\Filey\Jobs\Controllers\Admin\JobController@index')->name('get.jobs');
    Route::get('{job}','\App\Filey\Jobs\Controllers\Admin\JobController@view')->name('view.job');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
