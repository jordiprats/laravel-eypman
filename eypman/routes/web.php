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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculadora', function () {
  return view('calculadora');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::prefix('/controllers')->group(function () {
  Route::resource('/orgs', 'OrganizationController');
  Route::resource('/repos', 'RepoController');
  Route::resource('/platforms', 'PlatformController');
  Route::resource('/environments', 'EnvironmentController');
  Route::resource('/puppet-settings', 'PuppetSettingController');
  Route::resource('/reporeleases', 'RepoReleaseController');
});

Route::prefix('/{user}')->group(function () {
  Route::prefix('/platform-{platform}')->group(function () {
    Route::get('/', 'PlatformController@getUserPlatform')->name('show.eyp.user.platform');
  });
  Route::get('/', 'UserController@getUserInfo')->name('show.eyp.user');
});
