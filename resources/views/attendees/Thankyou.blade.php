<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Eventify</title>
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

        .thank-you-container {
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 90%;
            padding: 40px 30px;
            text-align: center;
        }

        .thank-you-container h1 {
            color: #007BFF;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .thank-you-container p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .thank-you-container a {
            font-size: 1rem;
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s;
        }

        .thank-you-container a:hover {
            color: #0056b3;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <p>Your RSVP has been successfully updated.</p>

        <!-- Redirect button or link -->
        <a href="{{ route('role') }}">Go back to your event</a>

    </div>
</body>

</html>
