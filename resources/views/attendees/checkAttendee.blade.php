<!-- resources/views/events/checkAttendee.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Attendee | Eventify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #d7eaff, #a1c4fd);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            display: flex;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            width: 90%;
            overflow: hidden;
        }

        .form-section {
            flex: 1;
            padding: 40px 30px;
            align-items: center;
            margin-top: 8rem;
        }

        .form-section h1 {
            color: #007BFF;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-section .form-control {
            margin-bottom: 20px;
            height: 45px;
            font-size: 1rem;
        }

        .form-section button {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            color: white;
            background: #007BFF;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .form-section button:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #0056b3;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }

            .form-section {
                margin-top: 4rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- Form Section -->
        <div class="form-section">
            <h1>Check Your Attendance</h1>

            <!-- Display Attendee Name -->
            <div class="mb-3">
                <label for="attendee_name" class="form-label">Attendee Name</label>
                <input type="text" id="attendee_name" class="form-control" value="{{ $attendee->name }}" readonly>
            </div>

            <!-- RSVP Status Form -->
            <form action="{{ route('updateRsvp', $attendee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="rsvp_status" class="form-label">RSVP Status</label>
                    <select name="rsvp_status" id="rsvp_status" class="form-control" required>
                        <option value="Yes" {{ $attendee->rsvp_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ $attendee->rsvp_status == 'No' ? 'selected' : '' }}>No</option>
                        <option value="Maybe" {{ $attendee->rsvp_status == 'Maybe' ? 'selected' : '' }}>Maybe</option>
                        <option value="Undecided" {{ $attendee->rsvp_status == 'Undecided' ? 'selected' : '' }}>Undecided</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update RSVP</button>
            </form>
        </div>
    </div>
</body>

</html>
