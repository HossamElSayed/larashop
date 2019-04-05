<?php


Auth::routes();

//user middleware(for user Auth)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::view('dashboard','home');
    Route::view('myaccount','myaccount.index');
    Route::get('myaccount/{link}',function ($link){
        return view('myaccount.index',['link'=>$link]);
    });
    Route::view('inbox','myaccount.inbox',
        ['data'=>\App\Inbox::all()]);

});