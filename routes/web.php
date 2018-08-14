<?php

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
//frontend
$router->group(['namespace' => "Frontend"], function ($router) {
    $router->get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    require(__DIR__ . '/frontend/index.php');
});

// backend
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ($router) {
    /*登录*/
    Auth::routes();

    $router->group(['namespace' => 'Auth'], function($router) {
        $router->get('/logout', [
            'uses' => 'LoginController@logout',
            'as' => 'logout'
        ]);
    });

    $router->get('/', function () {
        return redirect()->route('admin.login');
    });

    require(__DIR__ . '/backend/index.php');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
