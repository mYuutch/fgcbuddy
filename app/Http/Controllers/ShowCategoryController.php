<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
class ShowCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $events = Event::where('category_id', $category['id'])->get();

      

        return Inertia::render('Categories/[id]', ['events' => $events, 'category' => $category]);
    }
}
