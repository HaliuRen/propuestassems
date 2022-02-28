<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');


Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
// Route::get('/usuarios/{perfil}', 'UserController@show')->name('usuarios.show');
// Route::get('/usuarios/{perfil}/edit', 'UserController@edit')->name('usuarios.edit');
// Route::put('/usuarios/{perfil}', 'UserController@update')->name('usuarios.update');
// Ruta datatable usuarios
Route::get('/usuarios/users', 'UserController@user')->name('usuarios.user');
// Ruta formulario tipo wizard
Route::get('wizard', function () {
    return view('welcome');
});

// Route::get('/perfiles/{perfil}', 'PerfilController@show')->name('perfiles.show');
// Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit')->name('perfiles.edit');
// Route::put('perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');

Auth::routes();


