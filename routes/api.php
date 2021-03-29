<?php

use App\Exceptions\APIException;
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
Route::get('/profile/info', function () {
    return ['time' => Carbon\Carbon::now()];
});

Route::middleware(['apiToken'])->prefix('courses')->group(function () {
    Route::get('/', 'CourseController@index');
    Route::post('/', 'CourseController@store');
    Route::get('/{courseId}', 'CourseController@show');
    Route::put('/{courseId}', 'CourseController@update');
    Route::delete('/{courseId}', 'CourseController@destroy');
});
