<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ShowEventsController;
use App\Http\Controllers\ShowCategoriesController;
use App\Http\Controllers\ShowEventController;
use App\Http\Controllers\ShowCategoryController;
use App\Http\Controllers\ShowIndexController;
use App\Http\Controllers\ShowSubscribedEventsController;
use App\Http\Controllers\AttachEventUserController;
use App\Http\Controllers\DetachEventUserController;
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

Route::get('/', ShowIndexController::class);
Route::get('/events', ShowEventsController::class)->name('events.index'); // Show all events
Route::get('/categories', ShowCategoriesController::class)->name('categories.index'); // Show all categories
Route::get('/events/{id}', ShowEventController::class)->name('event.[id]');// Show event details 
Route::get('/categories/{id}', ShowCategoryController::class)->name('categories.[id]'); // Show all events related to a certain cat



Route::get('/attach/event/{event_id}/user/{user_id}', AttachEventUserController::class)// Mettre en post
    ->middleware('registerEvent');
Route::get('/detach/event/{event_id}/user/{user_id}', DetachEventUserController::class)//Mettre en post
    ->middleware('registerEvent');

    Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/{user_id}/events', ShowSubscribedEventsController::class)->name('events.subscribed');
});
