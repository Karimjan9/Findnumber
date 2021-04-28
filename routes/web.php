<?php
// namespace  App\Http\Controllers;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');


Auth::routes();

Route::get('/homegame', [App\Http\Controllers\GameController::class, 'index'])->name('home');

Route::get('/findnumber', [App\Http\Controllers\GameController::class ,'index']);
 
Route::get('/startgame', [App\Http\Controllers\GameController::class ,'startgame']);

Route::post('/checkNumber', [App\Http\Controllers\GameController::class ,'checkNumber']);


