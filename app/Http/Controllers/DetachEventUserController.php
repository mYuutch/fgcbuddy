<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DetachEventUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $event_id, $user_id)
    {
              

        $user = User::find($user_id); // Récup l'user
        $event = Event::find($event_id); // Récup l'event

        $user->events()->detach($event->id); //Attacher l'user à l'event


        return redirect()->route('event.[id]', ['id' => $event->id]);
        /*return Inertia::render('Events/[id]', ['event' => $event, 'category' => $event->category]);*/
    }
}
