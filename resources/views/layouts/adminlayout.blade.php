<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Management')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* General Body and Layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F8FAFC;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #D9EAFD;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo span {
            font-size: 1.5rem;
            color: black;
            font-weight: bold;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin: 20px;
        }

        .nav-item a {
            color: black;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: color 0.3s;
            margin: 10px;
        }

        .nav-item a:hover {
            color: #007BFF;
        }

        .dropdown {
            position: relative;
        }

        .user-profile {
            margin-right: 15px;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #0056b3;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            color: white;
            overflow: hidden;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #D9EAFD;
            color: black;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 80px 10px 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: black;
            font-size: 1.1rem;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #BCCCDC;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 80px 20px 20px;
            background-color: #ffffff;
            min-height: 100vh;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 210px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: none;
                padding-top: 20px;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Styling for event cards */
        .events-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .event-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .card-body {
            padding: 15px;
            font-size: 1rem;
            color: #555;
        }

        .card-footer {
            padding: 15px;
            text-align: center;
        }

        .rsvp-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .rsvp-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="logo">
            <span>Eventify</span>
        </a>
        <div class="navbar-nav">
            <div class="nav-item">
                <a>Welcome!</a>
            </div>

            @if(auth()->check())
                <div class="nav-item dropdown">
                    <span class="user-profile">
                        {{ auth()->user()->name }}
                    </span>
                    <div class="dropdown-content">
                        <a href="{{ route('role') }}">Logout</a>
                    </div>
                </div>
            @endif
            <div class="nav-item">
                <a></a>
            </div>
            <div class="nav-item">
                <a></a>
            </div>

        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Organizer</h2>
        <hr>
        <hr>
        <ul>
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('events.create') }}">Organizer Accounts</a></li>
            <li><a href="{{ route('attendees') }}">Events & Attendees</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</body>

</html>