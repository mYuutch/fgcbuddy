<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ShowSubscribedEventsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $events = $user->events()->where('user_id', $user->id)->get();

        return Inertia::render('Events/subscribed', ['events' => $events]);
    }
}
