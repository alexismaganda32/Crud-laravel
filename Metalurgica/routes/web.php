<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BolsaController;
use Illuminate\Routing\RouteGroup;

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

//Route::get('/', function () {
   // return view('welcome');
//});
//Route::get('/bolsa', function () {
  //  return view('bolsa.index');
//});

//Route::get('/bolsa/create',[BolsaController::class,'create']);
Route::resource('bolsa','BolsaController')->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]); //es para quitar el registro o no

Route::get('/home', 'BolsaController@index')->name('home');
Route::group(['middleware'=>'auth'],function(){
  Route::get('/', 'BolsaController@index')->name('home');
});
