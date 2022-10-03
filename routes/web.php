<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

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
Route::get('/events', [EventController::class, 'index']);

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


Route::get('/events/{event}/edit', [EventController::class, 'edit']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
