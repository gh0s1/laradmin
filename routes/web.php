<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function() {
	
	//Auth::routes();
	
	// Authentication Routes...
    Route::get('login', 'Admin\LoginController@showLoginForm');
    Route::post('login', 'Admin\LoginController@login');

    Route::get('logout', 'Admin\LoginController@logout');
    Route::post('logout', 'Admin\LoginController@logout');
	
	Route::group(['middleware' => 'authadmin'], function() {
	    //
	    Route::any('/', function() {
	        return view("admin.index");
	    });
		Route::any('info/{item?}/{action?}',['uses'=>'Admin\InfoController@info']);
		//Route::any('admin/info/seo',['uses'=>'Admin\InfoController@seo']);
		Route::any('user/add',['uses'=>'Admin\UserController@add']);
		Route::any('user/lists',['uses'=>'Admin\UserController@lists']);
		Route::post('user/modify',['uses'=>'Admin\UserController@modify']);
		Route::get('user/deleteUser/{id?}',['uses'=>'Admin\UserController@deleteUser'])->where('id','[0-9]+');


		Route::any('content/cate',['uses'=>'Admin\ContentController@cate']);
		Route::any('content/cate/addcate',['uses'=>'Admin\ContentController@addcate']);
		Route::any('content/cate/modifycate',['uses'=>'Admin\ContentController@modifycate']);
		Route::any('content/cate/deletecate/{catid}',['uses'=>'Admin\ContentController@deletecate']);




		Route::any('content/add',['uses'=>'Admin\ContentController@add']);
		Route::any('content/modify',['uses'=>'Admin\ContentController@modify']);
		Route::any('content/deletecontent',['uses'=>'Admin\ContentController@deletecontent']);
		//@types contents comments 
		Route::any('content/lists/{types}',['uses'=>'Admin\ContentController@lists'])->where('types','[a-zA-Z]+');
	});

});

