<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Event::query();

     

        // Check if date input is filled and apply filter if so
        if ($request->filled('date')) {
            $query->whereDate('start_date', $request->input('date'));
        }

        // Check if location input is filled and apply filter if so
        if ($request->filled('location')) {
            // Make the location search forgiving by using LIKE with a wildcard
            $location = '%' . $request->input('location') . '%';
            $query->where('location', 'LIKE', $location);
        }

        // Retrieve events based on the applied filters
        $events = $query->get();

        /*dd($events);*/
        return Inertia::render('Events/index', [
            'events' => $events,
            'formData' => $request->all(), // Pass form data to preserve filter values
        ]);


     
    }
}


