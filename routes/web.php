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
Route::get('/', function () {
    return view('frontend.home.index');
});

Route::get('/news', function(){
    return view('frontend.news.list');
});

Route::get('/detail', function(){
    return view('frontend.news.detail');
});

// backend
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ($router) {

    /*登录*/
    Auth::routes();

    // Route::get('login', function(){
    //     return view('backend.auth.login');
    // });
    // Route::get('register', function(){
    //     return view('backend.auth.register');
    // });
    // Route::get('email', function(){
    //     return view('backend.auth.passwords.email');
    // });
    // Route::get('reset', function(){
    //     return view('backend.auth.passwords.reset');
    // });
    $router->group(['namespace' => 'Backend'], function ($router) {
        $router->group(['prefix'=>'news', 'as'=>'news.'], function ($router) {
            $router->get('setindex/{id}', [
                'uses' => 'NewsController@setIndex',
                'as' => 'setindex',
            ]);
        });
        $router->resource('news', 'NewsController');
    });
});
