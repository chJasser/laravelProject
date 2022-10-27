<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\forumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConventionController;
use App\Http\Controllers\DisLikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\SubscriberController;
use App\Models\DisLike;
use App\Models\Like;

Route::get('/forums', [forumController::class, 'index'])->name("indexForum");
Route::get('/forums/manage', [forumController::class, 'manage'])->middleware('auth');
Route::get('/forums/create', [forumController::class, 'create']);
Route::post('/forums', [forumController::class, 'store']);

Route::get('/forums/{forum}/edit', [forumController::class, 'edit']);
Route::put('/forums/{forum}', [forumController::class, 'update']);
Route::delete('/forums/{forum}', [forumController::class, 'delete']);
Route::get('/forums/{forum}', [forumController::class, 'show'])->name("forum");
//posts
Route::post('/posts/{forum}', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
Route::put('/posts/{post}', [PostController::class, 'update']);
//likes
Route::POST('/likes/{post}', [LikeController::class, 'store']);
Route::delete('/likes/{post}', [LikeController::class, 'destroy']);

Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

//dislikes
Route::POST('/dislikes/{post}', [DisLikeController::class, 'store']);
Route::delete('/dislikes/{post}', [DisLikeController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/events', [EventController::class, 'index']);


//meth add to database
Route::post('/events', [EventController::class, 'store']);
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/events', [EventController::class, 'index']);
//meth add to database
Route::post('/backoffice/events', [EventController::class, 'store']);
//show the create event form
Route::get('/backoffice/events/create', [EventController::class, 'create']);
//show the edit event form
Route::get('/backoffice/events/manage', [EventController::class, 'manage'])->middleware('auth');
Route::get('/events/{event}', [EventController::class, 'show']);
Route::put('/backoffice/events/{event}', [EventController::class, 'update']);
Route::delete('/backoffice/events/{event}', [EventController::class, 'delete']);
Route::post('/events/{event}/comments/', [EventController::class, 'addComment']);
Route::get('/backoffice/events/{event}/edit', [EventController::class, 'edit']);
Route::delete('/delete/{comment}', [EventController::class, 'deleteComment']);
Route::post('/participate/{event}', [EventController::class, 'participate']);
/////////////////////////////////////////////////////////////////////////////////////////////



//convention
Route::get('/conventions', [ConventionController::class, 'index']);
Route::get('/conventions/manage', [ConventionController::class, 'manage'])->middleware('auth');
Route::get('/conventions/create', [ConventionController::class, 'create']);
Route::post('/conventions', [ConventionController::class, 'store']);
Route::get('/conventions/{convention}', [ConventionController::class, 'show']);
Route::get('/conventions/{convention}/edit', [ConventionController::class, 'edit']);
Route::put('/conventions/{convention}', [ConventionController::class, 'update']);
Route::delete('/conventions/{convention}', [ConventionController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});
/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/reclamations/manage', [ReclamationController::class, 'manage']);
//Route::post('/reclamations', [ReclamationController::class, 'store']);
Route::get('/reclamations/create', [ReclamationController::class, 'create']);
Route::delete('/reclamations/{reclamation}', [ReclamationController::class, 'delete']);
Route::post('/reclamations/manage', [ReclamationController::class, 'store']);
Route::get('/reclamations/{reclamation}/edit', [ReclamationController::class, 'edit']);
Route::put('/reclamations/{reclamation}', [ReclamationController::class, 'update']);
Route::get('/reclamations/{reclamation}', [ReclamationController::class, 'show']);


/////////////////////////////////////////////////////////////////////////////////////////////
