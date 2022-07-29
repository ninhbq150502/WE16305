<?php

use App\Http\Controllers\Test1;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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
// Route::get('/update', 'TestController@update');
Route::get('/show_view', 'UserController@show_name');
Route::get('/phong', 'RoomController@index');
Route::get('/login', ['as'=>'login','uses'=>'Auth\LoginController@getLogin']);
Route::post('/login', ['as'=>'login','uses'=>'Auth\LoginController@postLogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);


Route::middleware(['auth'])->group(function(){
    Route::get('/test', 'TestController@index');

    Route::match(['get', 'post'], '/test/add', 'TestController@add')->name('route_BackEnd_Users_Add');
    
    Route::get('/test/detail/{id}', 'TestController@detail')->name('router_BackEnd_Users_Detail');
    
    Route::post('/test/update/{id}', 'TestController@update')->name('router_BackEnd_Users_Update');

});