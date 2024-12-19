<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify | Login or Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('{{ asset("images/bg1.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            color: black;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
            flex-wrap: wrap;
            max-width: 900px;
            width: 90%;
        }

        .logo-container img {
            height: 400px;
            max-width: 100%;
            margin-right: 30px;
            border-radius: 35px;
        }

        .form-section {
            text-align: left;
            max-width: 400px;
        }

        .form-section h1 {
            font-size: 2em;
            color: #007BFF;
            margin-bottom: 10px;
        }

        .form-section p {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #555;
        }

        .form-section a {
            display: inline-block;
            margin: 15px 30px;
            /* Increased the vertical margin to add more space between buttons */
            padding: 12px 30px;
            font-size: 1em;
            text-align: center;
            color: #fff;
            background-color: #007BFF;
            /* Same blue color for both buttons */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
            text-decoration: none;
            /* Ensures the link looks like a button */
        }


        .form-section a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .intro {
            margin-top: 20px;
            text-align: center;
            font-size: 1em;
            color: #444;
            max-width: 700px;
            padding: 0 20px;
        }

        .footer {
            position: relative;
            bottom: 20px;
            text-align: center;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.6);
            margin-top: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 20px;
            }

            .logo-container {
                margin-bottom: 20px;
            }

            .logo-container img {
                height: auto;
                max-width: 100%;
            }

            .form-section {
                text-align: center;
            }

            .form-section a {
                width: 100%;
                margin: 10px 0;
            }

            .form-section h1 {
                font-size: 1.8em;
            }

            .form-section p {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            .form-section h1 {
                font-size: 1.5em;
            }

            .form-section p {
                font-size: 0.9em;
            }

            .footer {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/eventify.png') }}" alt="Eventify Logo">
        </div>
        <div class="form-section">
            <h1>Welcome to Eventify</h1>
            <p>Your ultimate event management system</p>
            <p>Proceed with?</p>
            <a href="{{ route('admin.register') }}">Admin</a>
            <a href="{{ route('register') }}">Organizer</a>
            <a href="{{ route('checkname') }}">RSVP</a>
        </div>
    </div>

    <div class="intro">
        Eventify is designed to simplify and enhance your event planning process. Whether you're an organizer or an
        admin, our platform ensures a seamless experience in managing your events with ease and professionalism.
    </div>

    <div class="footer">
        &copy; 2024 Eventify. All rights reserved.
    </div>
</body>

</html>