<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CourseController;
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

Route::get('/', [EventController::class, 'index']);



////////
//meth add to database
Route::post('/events', [EventController::class, 'store']);
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//show the create event form
Route::get('/events/create', [EventController::class, 'create']);
//show the edit event form
Route::get('/events/manage', [EventController::class, 'manage'])->middleware('auth');
Route::get('/events/{event}', [EventController::class, 'show']);
Route::put('/events/{event}', [EventController::class, 'update']);
Route::delete('/events/{event}', [EventController::class, 'delete']);

Route::get('/reclamations/manage', [ReclamationController::class, 'manage']);
//Route::post('/reclamations', [ReclamationController::class, 'store']);
Route::get('/reclamations/create', [ReclamationController::class, 'create']);
Route::delete('/reclamations/{reclamation}', [ReclamationController::class, 'delete']);
Route::post('/reclamations/manage', [ReclamationController::class, 'store']);
Route::get('/reclamations/{reclamation}/edit', [ReclamationController::class, 'edit']);
Route::put('/reclamations/{reclamation}', [ReclamationController::class, 'update']);
Route::get('/reclamations/{reclamation}', [ReclamationController::class, 'show']);
Route::get('/events/{event}/edit', [EventController::class, 'edit']);
//club
Route::get('/clubs/manage', [clubController::class, 'manage']);
Route::get('/clubs/create', [clubController::class, 'create']);
Route::delete('/clubs/{club}', [clubController::class, 'delete']);
Route::post('/clubs/manage', [clubController::class, 'store']);
Route::get('/clubs/{club}/edit', [clubController::class, 'edit']);
Route::put('/clubs/{club}', [clubController::class, 'update']);
Route::get('/clubs/{club}', [clubController::class, 'show']);
//course
Route::get('/courses/manage', [courseController::class, 'manage']);
Route::get('/courses/create', [courseController::class, 'create']);
Route::delete('/courses/{course}', [courseController::class, 'delete']);
Route::post('/courses/manage', [courseController::class, 'store']);
Route::get('/courses/{course}/edit', [courseController::class, 'edit']);
Route::put('/courses/{course}', [courseController::class, 'update']);
Route::get('/courses/{course}', [courseController::class, 'show']);
// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
