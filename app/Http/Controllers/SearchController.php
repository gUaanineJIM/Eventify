<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SearchController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $query = Event::query();

        // Check if there's a search query
        if ($request->has('search')) {
            $search = $request->get('search');

            // Filter events based on title, date, or location
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('event_date', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Retrieve filtered events
        $events = $query->get();

        // Pass events to the view
        return view('search.index', compact('events'));
    }
}
