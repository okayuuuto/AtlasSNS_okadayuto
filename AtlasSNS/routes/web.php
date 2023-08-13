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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::post('/profileup','UsersController@profileUpdate');

Route::get('/follows_profile/{id}','UsersController@followsProfile')->name('followsProfile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::post('/create', 'PostsController@create');

Route::post('/update', 'PostsController@update');

Route::get('/post/{id}/delete', 'PostsController@delete');

Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');

Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

});
