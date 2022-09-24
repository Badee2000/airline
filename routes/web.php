<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/booking/{from}/{to}/{id}/{price}/{date}/{num_of_passengers}',[App\Http\Controllers\HomeController::class, 'booking'])->name('home');
Route::get('insert', [App\Http\Controllers\FlightController::class, 'insertform']);
Route::post('add', [App\Http\Controllers\FlightController::class, 'insert'])->name('welcome.create');
Route::get('booki/{from}/{to}/{id}/{price}/{date}/{userid}/{num_of_passengers}', [App\Http\Controllers\HomeController::class, 'booki'])->name('welcome.create');
Route::post('bookii', [App\Http\Controllers\HomeController::class, 'bookii'])->name('welcome.create');
Route::delete('/delete/{flight}','App\Http\Controllers\FlightController@deleteflight')->name('flight.delete');
Route::delete('/edit','App\Http\Controllers\FlightController@deleteflight')->name('flight.delete');
Route::delete('/deletebook/{book}','App\Http\Controllers\HomeController@deletebook')->name('book.delete');
Route::delete('/deletebook','App\Http\Controllers\HomeController@deletebook')->name('book.delete');
Route::get('showflights', [App\Http\Controllers\FlightViewController::class, 'showFlights']);
Route::get('/showflightsadmin', [App\Http\Controllers\FlightViewController::class, 'showFlightsAdmin'])->name('showflightsadmin');
/*Route::get('insert','StudInsertController@insertform');
Route::post('add','FlightController@insertform');*/
