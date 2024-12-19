@extends('layouts.adminlayout')

@section('title', 'Manage Events')

@section('header', 'Event List')

@section('content')
    <table id="MEEventTable">
        
        <tbody>
            @foreach ($events as $event)
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <tr class="MEEventRow">
                <td>{{ $event->id }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->category }}</td>
                <td>
                    <a href="{{ route('admin.editing', $event->id) }}" class="MEEditLink">Edit Event</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection