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

Route::get('/league', 'LeagueController@league');

Route::get('/teams', 'TeamController@team');

Route::get('/users', 'UserController@users');

Route::get('/matches', 'MatchesController@matches');

Route::get('/v1/api/games/sync', 'SyncController@syncLeaguesToDatabase');
Route::get('/v1/api/games/syncLeagues', 'SyncController@syncLeaguesToDatabase');
Route::get('/v1/api/games/syncTeams', 'SyncController@syncTeamsToDatabase');
