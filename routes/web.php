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
        'as' => 'home'
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
Route::group(['prefix' => 'admin'], function ($router) {
    /*登录*/
    Auth::routes();

    $router->group(['namespace' => 'Auth'], function($router) {
        $router->get('/logout', [
            'uses' => 'LoginController@logout',
            'as' => 'logout'
        ]);
    });

    $router->get('/', function () {
        return redirect()->route('admin.news.index');
    });

    $router->group(['as' => 'admin.'], function ($router) {
        $router->group(['namespace' => 'Backend', 'middleware' => ['web', 'auth']], function ($router) {
            $router->group(['prefix'=>'news', 'as'=>'news.'], function ($router) {
                $router->get('setindex/{id}', [
                    'uses' => 'NewsController@setIndex',
                    'as' => 'setindex',
                ]);
            });
            $router->resource('news', 'NewsController');
            $router->get('/reset', [
                'uses' => function(){
                    return view('backend.user.resetpassword');
                },
                'as' => 'reset'
            ]);
            $router->post('/reset',[
                'uses' => 'UserController@passwordChange',
                'as' => 'password'
            ]);
        });
    });
});
