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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login')->name('users.login');
    Route::post('register', 'AuthController@register')->name('users.register');
    Route::get('users', 'AuthController@getAllUsers')->name('users.info');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('me', 'AuthController@me')->name('users.me');
        Route::post('logout', 'AuthController@logout')->name('users.logout');
    });
});

Route::resource('companies','CompanyController');
Route::resource('events','EventController');
Route::resource('friends','FriendController');
