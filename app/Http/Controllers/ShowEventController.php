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

        $event = Event::findOrFail($id);
        $userId = $request->user()->id;
        $isRegistered = $event->users()->where('user_id', $request->user()->id)->exists();
        return Inertia::render('Events/[id]', ['event' => $event, 'category' => $event->category, 'isRegistered' => $isRegistered, 'userId' => $userId]);
    }
}
