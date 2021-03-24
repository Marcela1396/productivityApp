<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\Administracion;

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

Route::get('/', [Administracion::class, 'index'])->name('inicio');

Route::get('/home', [Administracion::class, 'dashboard'])->name('home');
