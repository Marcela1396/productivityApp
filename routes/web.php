<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\Administracion;
use App\Http\Controllers\Scrum\Team;
use App\Http\Controllers\Scrum\Project;
use App\Http\Controllers\Scrum\Sprint;
use App\Http\Controllers\Scrum\UserStory;
use App\Http\Controllers\Scrum\Member;
use App\Http\Controllers\Scrum\Role;
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
//Route::post('/project/getMembers/{team}', [Project::class, 'getMembers'])->name('getMembers')->middleware('auth');

Route::get('/project/create', [Project::class, 'form_create_project'])->name('form_create_project')->middleware('auth');
Route::post('/project/create', [Project::class, 'form_create_project2'])->name('form_create_project2')->middleware('auth');
Route::post('/project/register', [Project::class, 'register_project'])->name('register_project')->middleware('auth');


Route::get('/project/update', [Project::class, 'index'])->name('update_project')->middleware('auth');
Route::get('/project/view', [Project::class, 'index'])->name('view_project')->middleware('auth');


// Sprints

Route::get('/sprint/start', [Sprint::class, 'index'])->name('start_sprint')->middleware('auth');
Route::post('/sprint/register', [Sprint::class, 'register_sprint'])->name('register_sprint')->middleware('auth');

Route::get('/sprint/create/{project}', [Sprint::class, 'form_create_sprint'])->name('form_create_sprint')->middleware('auth');
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
Route::get('/teams/create', [Team::class, 'form_create_team'])->name('form_create_team')->middleware('auth');
Route::post('/teams/create', [Team::class, 'register_team'])->name('register_team')->middleware('auth');
Route::get('/teams/update/{id}', [Team::class, 'form_update_team'])->name('form_update_team')->middleware('auth');
Route::post('/teams/update/{id}', [Team::class, 'update_team'])->name('update_team')->middleware('auth');
Route::get('/teams/delete/{id}', [Team::class, 'delete_team'])->name('delete_team')->middleware('auth');

// Members
Route::get('/members', [Member::class, 'index'])->name('members')->middleware('auth');
Route::get('/members/create', [Member::class, 'form_create_member'])->name('form_create_member')->middleware('auth');
Route::post('/members/create', [Member::class, 'register_member'])->name('register_member')->middleware('auth');
Route::get('/members/update/{id}', [Member::class, 'form_update_member'])->name('form_update_member')->middleware('auth');
Route::post('/members/update/{id}', [Member::class, 'update_member'])->name('update_member')->middleware('auth');
Route::get('/members/delete/{id}', [Member::class, 'delete_member'])->name('delete_member')->middleware('auth');

//Roles
Route::get('/roles', [Role::class, 'index'])->name('roles')->middleware('auth');
Route::get('/roles/create', [Role::class, 'form_create_role'])->name('form_create_role')->middleware('auth');
Route::post('/roles/create', [Role::class, 'register_role'])->name('register_role')->middleware('auth');
Route::get('/roles/update/{id}', [Role::class, 'form_update_role'])->name('form_update_roles')->middleware('auth');
Route::post('/roles/update/{id}', [Role::class, 'update_role'])->name('update_role')->middleware('auth');
Route::get('/roles/delete/{id}', [Role::class, 'delete_role'])->name('delete_role')->middleware('auth');

// Capacity
Route::get('/capacity', [Capacity::class, 'index'])->name('capacity')->middleware('auth');

