<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\Administracion;
use App\Http\Controllers\Scrum\Team;
use App\Http\Controllers\Scrum\Project;
use App\Http\Controllers\Scrum\Sprint;
use App\Http\Controllers\Scrum\Member;
use App\Http\Controllers\Scrum\Capacity;
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

Route::get('/home', [Administracion::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/teams', [Team::class, 'index'])->name('teams')->middleware('auth');

Route::get('/projects', [Project::class, 'index'])->name('projects')->middleware('auth');

Route::get('/sprints', [Sprint::class, 'index'])->name('sprints')->middleware('auth');

Route::get('/definitionDone', [Sprint::class, 'DoD'])->name('DoD')->middleware('auth');

Route::get('/members', [Member::class, 'index'])->name('members')->middleware('auth');

Route::get('/capacity', [Capacity::class, 'index'])->name('capacity')->middleware('auth');

