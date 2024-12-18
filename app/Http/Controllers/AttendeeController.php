<?php
// app/Http/Controllers/AttendeeController.php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($id)
    {
        // Fetch the attendee by ID
        $attendee = Attendee::findOrFail($id);
        return view('events.editAttendees', compact('attendee'));
    }

    /**
     * Update the specified resource in storage.
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

        return redirect()->route('events.ManageEvents')->with('success', 'Attendee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the attendee by ID and delete
        $attendee = Attendee::findOrFail($id);
        $attendee->delete();

        return redirect()->route('events.ManageEvents')->with('success', 'Attendee deleted successfully');
    }

    public function checkName(Request $request)
    {
        // Fetch the attendee by name
        $attendee = Attendee::where('name', $request->input('name'))->first();

        if ($attendee) {
            // Return the view with the attendee and show the RSVP form
            return view('attendees.checkAttendee', compact('attendee'));
        }

        // If not found, return a message indicating no match
        return redirect()->back()->with('error', 'Attendee not found');
    }

    public function updateRsvp(Request $request, $id)
    {
        // Validate RSVP status input
        $request->validate([
            'rsvp_status' => 'required|in:Yes,No,Maybe,Undecided',
        ]);

        // Find the attendee and update the RSVP status
        $attendee = Attendee::findOrFail($id);
        $attendee->update([
            'rsvp_status' => $request->input('rsvp_status'),
        ]);

        return redirect()->route('thankyou')->with('success', 'RSVP status updated successfully');
    }
}
