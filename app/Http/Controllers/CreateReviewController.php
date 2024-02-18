<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Review;

class CreateReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {



        
 


       
        // Retrieve the eventId from the validated data
        $eventId = $request->eventId;
        // Find the event
        $event = Event::findOrFail($eventId);

        
        if ($event->hasFinished()) {
            
            if ($event->hasReviewFromUser(auth()->id())) {
              
                return response()->json(['error' => 'You have already left a review for this event.'], 422);
            }

            
            $review = new Review([
                'user_id' => auth()->id(),
                'event_id' => $eventId,
                'rating' => $request->rating,
                'review' => $request->review,
            ]);
            
        
            $review->save();


            return redirect()->route('event.[id]', ['id' => $event->id]);

        } else {
           
            return response()->json(['error' => 'You cannot leave a review for this event before it has finished.'], 422);
          
        }

    }
}
