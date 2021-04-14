<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\Administracion;
use App\Http\Controllers\Scrum\Team;
use App\Http\Controllers\Scrum\Project;
use App\Http\Controllers\Scrum\Sprint;
use App\Http\Controllers\Scrum\UserStory;
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

// Projects
Route::get('/project', [Project::class, 'index'])->name('projects')->middleware('auth');
Route::get('/project/definitionDone', [Project::class, 'DoD'])->name('DoD')->middleware('auth');

Route::get('/project/update', [Project::class, 'index'])->name('update_project')->middleware('auth');
Route::get('/project/view', [Project::class, 'index'])->name('view_project')->middleware('auth');

// Sprints

Route::get('/sprint/start', [Sprint::class, 'index'])->name('start_sprint')->middleware('auth');
Route::get('/sprint/create', [Sprint::class, 'create_sprint'])->name('create_sprint')->middleware('auth');
Route::get('/sprint/update', [Sprint::class, 'update_sprint'])->name('update_sprint')->middleware('auth');
Route::get('/project/{id}', [Sprint::class, 'index'])->name('sprints')->middleware('auth');

// User Story
Route::post('/stories/register', [UserStory::class, 'register_story'])->name('register_story')->middleware('auth');
Route::get('/stories/create/{team}/{project}/{sprint}', [UserStory::class, 'form_create_story'])->name('form_create_story')->middleware('auth');
Route::get('/sprint/{id}', [UserStory::class, 'index'])->name('stories')->middleware('auth');

Route::get('/stories/update', [UserStory::class, 'update_story'])->name('update_story')->middleware('auth');
Route::get('/stories/start', [UserStory::class, 'start_story'])->name('start_story')->middleware('auth');

// Teams
Route::get('/teams', [Team::class, 'index'])->name('teams')->middleware('auth');

// Members
Route::get('/members', [Member::class, 'index'])->name('members')->middleware('auth');

// Capacity
Route::get('/capacity', [Capacity::class, 'index'])->name('capacity')->middleware('auth');

