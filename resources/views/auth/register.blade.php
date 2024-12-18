<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Eventify</title>
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

        .image-section {
            flex: 1;
            background: url('path/to/your/image.jpg') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .image-section h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: black;
        }

        .image-section p {
            font-size: 1rem;
            line-height: 1.5;
            color: black;
        }

        .form-section {
            flex: 1;
            padding: 40px 30px;
            align-items: center;
            margin-top: 4rem;
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

            .image-section {
                height: 200px;
                text-align: center;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- Image and Intro Section -->
        <div class="image-section">
        <img src="{{ asset('images/eventify.png') }}" alt="Eventify Logo">
            <p>Your journey to unforgettable events starts here. Join us today and explore endless possibilities.</p>
        </div>

        <!-- Form Section -->
        <div class="form-section">
            <h1>Register</h1>
            <form action="{{ url('register') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name" class="form-control" required>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                <button type="submit">Register</button>
            </form>
            <div class="footer">
                Already have an account? <a href="{{ url('login') }}">Login here</a>
                <br>
                <a href="javascript:history.back()" class="back-button">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
