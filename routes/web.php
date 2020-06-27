<?php
use Illuminate\Support\Facades\Auth;
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


Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');
Route::get('duenio/search', 'DueniosController@search')->name('duenios.search');
Route::resource('duenios', 'DueniosController')->names('duenios')->parameters(['duenios' => 'project']);

Route::get('animales/search', 'AnimalesController@search')->name('animales.search');
Route::resource('animales', 'AnimalesController')->names('animales')->parameters(['animales' => 'project']);


Route::resource('productos', 'ProductosController')->names('productos')->parameters(['productos' => 'project']);
Route::resource('ventas', 'VentasController')->names('ventas')->parameters(['ventas' => 'project']);
Route::resource('portafolio', 'ProjectController')->names('projects')->parameters(['portafolio' => 'project']);
Route::get('reservas/search', 'ReservasController@search')->name('reservas.search');
Route::resource('reservas', 'ReservasController')->names('reservas')->parameters(['reservas' => 'project']);


Route::view('/contacto', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

Auth::routes(['register'=>true]);

//Route::get('/home', 'HomeController@index')->name('home');
