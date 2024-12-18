<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Auth;
use App\Models\Attendee;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', auth()->id())->get();
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

}
