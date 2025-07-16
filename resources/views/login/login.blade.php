<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS - Login</title>
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
        .login-wrapper {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            width: 380px;
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .login-header {
            background: #b31217;
            color: #fff;
            text-align: center;
            padding: 1.5rem;
        }
        .login-header img {
            width: 60px;
            margin-bottom: 10px;
        }
        .login-body {
            padding: 2rem;
        }
        .form-control:focus {
            box-shadow: 0 0 5px #b31217;
            border-color: #e52d27;
        }
        .toggle-password {
            cursor: pointer;
            font-size: 18px;
            color: #888;
            display: none;
            position: absolute;
            right: 15px;
            top: 52%;
            transform: translateY(5%);
        }
        .btn-primary {
            background: #b31217;
            border: none;
        }
        .btn-primary:hover {
            background: #8f0d12;
        }
        .btn-google {
            background: #fff;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 500;
            color: #444;
        }
        .btn-google img {
            width: 20px;
        }
        .btn-google:hover {
            background: #f2f2f2;
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
        
        
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none !important;
        }
        input[type="password"]::-webkit-credentials-auto-fill-button {
            display: none !important;
            visibility: hidden;
            pointer-events: none;
            position: absolute;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="HRMS Logo">
        <h3>HRMS Portal</h3>
        <p>Secure Employee Login</p>
    </div>
    <div class="login-body">
        <form method="POST" action="#">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control pe-5" name="password" placeholder="Enter password" required>
                <span class="toggle-password" id="togglePassword">
                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                </span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember"> Remember me</label>
                </div>
                <a href="#" class="text-decoration-none">Forgot Password?</a>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="d-grid mb-3">
                <button type="button" class="btn btn-google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo">
                    Sign in with Google
                </button>
            </div>
            <div class="links">
                Don’t have an account? <a href="{{ route('login.register') }}">Register</a>
            </div>
        </form>
    </div>
</div>

<script>
    const passwordInput = document.querySelector('#password');
    const togglePassword = document.querySelector('#togglePassword');
    const toggleIcon = document.querySelector('#toggleIcon');

    passwordInput.addEventListener('input', function () {
        togglePassword.style.display = passwordInput.value.length > 0 ? 'block' : 'none';
    });

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('bi-eye');
        toggleIcon.classList.toggle('bi-eye-slash');
    });
</script>

</body>
</html>
