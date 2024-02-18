<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {

        $similarEvents = Event::similar($id, 5);
        $closeEvents = Event::close($id, 5);
        
        

        $event = Event::findOrFail($id);

        $reviews = $event->reviews()->paginate(1);

        $meanOfRatings = $event->reviews()->avg('rating');
        $userId = $request->user()->id;
        $isRegistered = $event->users()->where('user_id', $request->user()->id)->exists();
        return Inertia::render('Events/[id]', ['fullEvent' => $event, 'reviews' => $reviews, 'meanOfRatings' => $meanOfRatings, 'similarEvents' => $similarEvents,'closeEvents' => $closeEvents, 'category' => $event->category, 'isRegistered' => $isRegistered, 'userId' => $userId]);
    }
}
