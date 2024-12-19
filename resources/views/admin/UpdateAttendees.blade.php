@extends('layouts.adminlayout')

@section('title', 'Edit Attendee')

@section('header', 'Edit Attendee')

@section('content')
<form action="{{ route('admin.attendees.update', $attendee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Attendee Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $attendee->name) }}" required>

    <label for="rsvp_status">RSVP Status:</label>
    <select name="rsvp_status" id="rsvp_status" required>
        <option value="Yes" {{ $attendee->rsvp_status == 'Yes' ? 'selected' : '' }}>Yes</option>
        <option value="No" {{ $attendee->rsvp_status == 'No' ? 'selected' : '' }}>No</option>
        <option value="Maybe" {{ $attendee->rsvp_status == 'Maybe' ? 'selected' : '' }}>Maybe</option>
        <option value="Undecided" {{ $attendee->rsvp_status == 'Undecided' ? 'selected' : '' }}>Undecided</option>
    </select>

    <button type="submit">Update Attendee</button>
</form>


    <form action="{{ route('admin.attendees.destroy', $attendee->id) }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this attendee?')" class="btn btn-danger">Delete Attendee</button>
    </form>
@endsection
