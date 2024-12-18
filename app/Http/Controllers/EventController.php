<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Auth;
use App\Models\Attendee;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::where('user_id', auth()->id());

        // Check if there's a search query
        if ($request->has('search') && $request->get('search') != '') {
            $search = $request->get('search');

            // Filter events based on title, date, or location
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('event_date', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Retrieve filtered events
        $events = $query->get();

        // Pass events to the view
        return view('events.index', compact('events'));
    }



    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'category' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'category' => $request->category,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('events.index');
    }

    public function rsvp($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->attendees()->attach(auth()->id());
        return back();
    }

    public function addAttendeesForm()
    {
        // Get events created by the logged-in organizer
        $events = Event::where('user_id', auth()->id())->with('attendees')->get();
        return view('events.attendees', compact('events'));
    }

    public function storeAttendee(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'attendee_name' => 'required|string|max:255',
        ]);

        Attendee::create([
            'event_id' => $request->event_id,
            'name' => $request->attendee_name,
        ]);

        return back()->with('success', 'Attendee added successfully.');
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the event data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string',
            'category' => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.ManageEvents')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.ManageEvents')->with('success', 'Event deleted successfully');
    }
    public function show()
    {
       // Fetch only events created by the logged-in organizer
    $events = Event::where('user_id', auth()->id())->get();

    // Return the filtered events to the view
    return view('events.ManageEvents', compact('events'));
    }
    
}

