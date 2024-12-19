@extends('layouts.adminlayout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-dashboard">
    
    <div class="dashboard-widgets">
        <br>
        @if($events->isEmpty())
            <p>No events found.</p>
        @else
            <div class="ADMI-table-container">
                <h1>Upcomming Events</h1>
                <table class="ADMI-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->created_at }}</td>
                                <td>{{ $event->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
