<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Mostrar la pagina principal de un sistema 
Route::get('/', [homeController::class, 'index'])->name('home.index'); 

//Ruta para obtener datos para crear cuenta
Route::get('/Crear-cuenta',[registerController::class, 'index'])->name('register');
//Ruta para enviar la informacion al servidor para crear cuenta 
Route::post('/Crear-cuenta',[registerController::class, 'store']);

//Ruta para obtener datos para el inicio de sesion 
Route::get('/Iniciar-sesion',[LoginController::class,'index'])->name('login');
//Ruta para enviar datos al servidor para el inicio de sesion
Route::post('/Iniciar-sesion',[LoginController::class,'store']);

//Ruta para redireccionar al usuario una vez autenticado o creado el usuario
Route::get('/{user:username}',[principalController::class, 'index'])->name('principal.welcome');

//Ruta para cerrar sesion una vez logueado 
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');