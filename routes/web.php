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

// Projects
Route::get('/projects', [Project::class, 'index'])->name('projects')->middleware('auth');

Route::get('/allocate_team', [Project::class, 'allocate_team'])->name('allocate_team')->middleware('auth');
//Route::get('projects/assign_team', [Project::class, 'assign_team'])->name('assign_team')->middleware('auth');
Route::post('/projects/save_team', [Project::class, 'save_team'])->name('save_team')->middleware('auth');
Route::get('start_project', [Project::class, 'start_project'])->name('start_project')->middleware('auth');


// Sprints
Route::get('/sprints', [Sprint::class, 'index'])->name('sprints')->middleware('auth');


Route::get('/definitionDone', [Sprint::class, 'DoD'])->name('DoD')->middleware('auth');

Route::get('/members', [Member::class, 'index'])->name('members')->middleware('auth');

Route::get('/capacity', [Capacity::class, 'index'])->name('capacity')->middleware('auth');

