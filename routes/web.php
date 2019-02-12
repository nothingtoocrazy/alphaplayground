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
Route::group(['middleware' => 'cors'], function () {
Route::get('/league', 'LeagueController@league');
Route::get('/team', 'TeamController@team');
Route::get('/user', 'UserController@user');
Route::post('/match', 'MatchController@match');

Route::get('/v1/api/games/sync', 'SyncController@syncLeaguesToDatabase');
Route::get('/v1/api/games/syncLeague', 'SyncController@syncLeaguesToDatabase');
Route::get('/v1/api/games/syncTeam', 'SyncController@syncTeamsToDatabase');
Route::get('/v1/api/games/syncMatch', 'SyncController@syncMatchesToDatabase');

});