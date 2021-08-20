<?php

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;  //НОВЫЙ СИНТАКСИС 8 ЛАРАВЕЛ
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

//Route::get('/', 'MainController@home');   //СТАРЫЙ СИНТАКСИС

//Route::get('/about', 'MainController@about');  //СТАРЫЙ СИНТАКСИС

Route::get('/', [MainController::class, 'home']);  //НОВЫЙ СИНТАКСИС 8 ЛАРАВЕЛ

Route::get('/about', [MainController::class, 'about']);  //НОВЫЙ СИНТАКСИС 8 ЛАРАВЕЛ

Route::get('/review', [MainController::class, 'review'])->name('review');

Route::post('/review/check', [MainController::class, 'review_check']);

/*Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' Name '.$name;
}); */

