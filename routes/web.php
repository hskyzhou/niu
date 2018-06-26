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
$router->group(['namespace' => "Frontend", 'middleware' => 'languagepackage'], function ($router) {
    $router->group(['prefix' => "lang", 'as' => 'lang.'], function ($router) {
        $router->get('change/{lang}', [
            'uses' => "LangController@change",
            'as' => 'change',
        ]);
    });

    $router->get('/', [
        'uses' => 'HomeController@index',
    ]);
    
    $router->group(['prefix' => 'news', 'as' => 'news.'], function ($router) {
        $router->get('/', [
            'uses' => 'NewsController@index',
            'as' => "index",
        ]);
    });
    $router->resource('news', 'NewsController');
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
