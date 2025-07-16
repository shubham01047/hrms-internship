<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fdf6f0; /* Cream */
            font-family: 'Segoe UI', sans-serif;
        }
        .register-wrapper {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            width: 90%;
            max-width: 420px;
            padding: 2rem;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .register-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .register-header h3 {
            color: #b31217;
            font-weight: bold;
        }
        .form-control:focus {
            box-shadow: 0 0 5px #b31217;
            border-color: #e52d27;
        }
        .btn-primary {
            background: #b31217;
            border: none;
        }
        .btn-primary:hover {
            background: #8f0d12;
        }
        .links {
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
        a {
            color: #b31217;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-wrapper">
    <div class="register-header">
        <h3>Create Your HRMS Account</h3>
        <p>Fill in your details to register</p>
    </div>
    <form method="POST" action="#">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter full name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
        </div>
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <div class="links">
            Already have an account? <a href="{{ route('login.login') }}">Login here</a>
        </div>
    </form>
</div>

</body>
</html>
