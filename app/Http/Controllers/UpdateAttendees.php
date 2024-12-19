<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendee;

class UpdateAttendees extends Controller
{
    /**
     * Display the list of events with attendees.
     */
    public function index()
    {
        // Fetch all events with attendees
        $events = Event::with('attendees')->get();

        // Pass data to the view
        return view('admin.ManageAttendeesAdmin', compact('events'));
    }

    /**
     * Show the form for editing the specified attendee.
     */
    public function edit($id)
    {
        // Fetch the attendee by ID
        $attendee = Attendee::findOrFail($id);

        // Pass data to the edit form
        return view('admin.UpdateAttendees', compact('attendee'));
    }

    /**
     * Update the specified attendee in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'rsvp_status' => 'required|string',
        ]);

        // Find the attendee by ID and update
        $attendee = Attendee::findOrFail($id);
        $attendee->update([
            'name' => $request->input('name'),
            'rsvp_status' => $request->input('rsvp_status'),
        ]);

        return redirect()->route('admin.ManageAttendeesAdmin')->with('success', 'Attendee updated successfully.');
    }

    /**
     * Remove the specified attendee from storage.
     */
    public function destroy($id)
    {
        // Find the attendee by ID and delete
        $attendee = Attendee::findOrFail($id);
        $attendee->delete();

        return redirect()->route('admin.ManageAttendeesAdmin')->with('success', 'Attendee deleted successfully.');
    }
}
