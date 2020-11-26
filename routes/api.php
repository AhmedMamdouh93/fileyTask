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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace'=>'\App\Filey\Users\Controllers\Api',
    
],function($router){
    Route::post('register','AuthenticationController@register');
    Route::post('login',[ 'as' => 'login', 'uses' => 'AuthenticationController@login']);
});

Route::group(['prefix'=>'jobs', 'as'=>'jobs.',
    'namespace' => '\App\Filey\Jobs\Controllers\Api',
    'middleware' => ['auth:api']
], function () {
    Route::post('create','JobController@createJob');
    Route::get('list','JobController@listAvailableJobs');
    Route::put('update/{job}','JobController@updateJob');
    Route::delete('{job}','JobController@deleteJob');
});


Route::group(['prefix'=>'job-applications', 'as'=>'jobs.',
    'namespace' => '\App\Filey\JobApplications\Controllers\Api',
    'middleware' => ['auth:api']
], function () {
    Route::post('create','JobApplicationController@applyJob');
    Route::get('list','JobApplicationController@listAllJobApplications');
});
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


    

});
