<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/','IndexController',[
									'only' =>['index'],
									'names' => [
										'index'=>'home'
									]
									]);								

Route::resource('skazki','ArticlesController',[												
												'parameters'=>[												
													'articles' => 'alias',									
												]														
												]);	
//Route::get('skazki/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'skazkiCat'])->where('cat_alias','[\w-]+');   

Route::get('skazki/{cat_alias}',['uses'=>'ArticlesController@index','as'=>'skazkiCat']);   
Route::resource('comment','CommentController',['only'=>['store']]);

Route::get('obratnaja-svjaz',['uses'=>'PagesController@index','as'=>'obratnajaSvjaz']);
Route::get('holders',['uses'=>'PagesController@index','as'=>'holders']);
Route::get('policy',['uses'=>'PagesController@index','as'=>'policy']);

// Route::get('greeting', function () {
//     return view('login');
// });
// Route::post('greetingp','VerificationController@log');
//Auth::routes();
//Route::get('login', 'Auth\LoginController@showLoginForm');
//php artisan make:auth
/*Route::get('login','Auth\AuthController@showLoginForm');

Route::post('login','Auth\AuthController@login');

Route::get('logout','Auth\AuthController@logout');*/


 Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 //Route::post('login', 'Auth\LoginController@authenticate');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout');

//admin
Route::group(['as' => 'admin.','prefix' => 'admin','middleware'=> ['auth']],function() {
	
	//admin
	Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);
	
	// articles
	Route::resource('/skazki','Admin\ArticlesController');

	Route::resource('/catskazki','Admin\CatSkazkiController');
	
	Route::resource('/permissions','Admin\PermissionsController');
	
	Route::resource('/users','Admin\UsersController');
	
	//menus
	Route::resource('/menus','Admin\MenusController');
	
});

// Route::get('admin',['uses' => 'Admin\IndexController@index','as' => 'adminIndex'])->middleware('auth');
// Route::resource('admin/skazki','Admin\ArticlesController')->middleware('auth');
																						
Route::get('sitemap.xml', 'IndexController@sitemap');