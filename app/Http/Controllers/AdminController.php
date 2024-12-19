<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendee;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $events = Event::all();
        return view('admin.AdminManageEvent', compact('events'));

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.EventEdit', compact('event'));
    }
    public function editUser(Request $request, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        return redirect()->route('admin.ManageEvent')->with('success', 'Event updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.ManageEvent')->with('success', 'Event deleted successfully');

    }

    public function dashboard()
    {
        $events = Event::all(); // Fetch all events
        return view('admin.dashboard', compact('events'));
    }
}