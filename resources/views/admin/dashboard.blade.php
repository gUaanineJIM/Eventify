<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Event Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #D9EAFD;
            color: black;
        }

        .sidebar {
            background-color: #D9EAFD;
            width: 250px;
            height: 100vh;
            position: fixed;
            padding: 20px 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #BCCCDC;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
            min-height: 100vh;
            background-color: #ffffff;
            box-shadow: -1px 0 5px rgba(0, 0, 0, 0.1);
        }

        .main-content h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .main-content .card {
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .logout-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 25rem;
        }

        .logout-btn:hover {
            background-color: #a71d2a;
            
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 210px;
                width: calc(100% - 210px);
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
                box-shadow: none;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="">Dashboard</a></li>
            <hr>
            <li><a href="">Create Event</a></li>
            <hr>
            <li><a href="">Manage Events</a></li>
            <hr>
            <li><a href="">Users</a></li>
            <hr>
            <li><a href="">Settings</a></li>
            <hr>
        </ul>
        <a href="{{ route('index') }}" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <h1>Welcome, Admin!</h1>
        <div class="card">
            <h3>Recent Events</h3>
            <ul>
                <li>Event 1: [Date] - [Status]</li>
                <li>Event 2: [Date] - [Status]</li>
                <li>Event 3: [Date] - [Status]</li>
                <li><a href="">View All Events</a></li>
            </ul>
        </div>
        <div class="card">
            <h3>Quick Actions</h3>
            <ul>
                <li><a href="">Create New Event</a></li>
                <li><a href="">Manage Users</a></li>
                <li><a href="">Update Settings</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
