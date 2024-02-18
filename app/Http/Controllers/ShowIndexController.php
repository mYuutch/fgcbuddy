<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Models\Event;
use App\Models\Category;

class ShowIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


    $upcomingEvents = Event::upcoming(5);
      $popularEvents = Event::popular(5);

      $popularCategories = Category::popular(5);

 

     return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'upcomingEvents' => $upcomingEvents,
        'popularEvents' => $popularEvents,
        'popularCategories' => $popularCategories,
     ]);
}};
