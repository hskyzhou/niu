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
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', function(){
        return view('backend.auth.login');
    });
    Route::get('register', function(){
        return view('backend.auth.register');
    });
    Route::get('email', function(){
        return view('backend.auth.passwords.email');
    });
    Route::get('reset', function(){
        return view('backend.auth.passwords.reset');
    });

    //相关页面
    //新闻
    Route::group(['prefix' => 'news'], function(){
        Route::get('list', function(){
            return view('backend.news.list');
        });
        Route::get('create', function(){
            return view('backend.news.create');
        });
    });
    //新闻分类
    Route::group(['prefix' => 'category'], function(){
        Route::get('list', function(){
            return view('backend.category.list');
        });
        Route::get('create', function(){
            return view('backend.category.create');
        });
    });
});

