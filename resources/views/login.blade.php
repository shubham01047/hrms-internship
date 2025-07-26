<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->system_title ?? 'HRMS' }} - Login</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            margin: 0;
        }
        .login-wrapper {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-header {
            background: {{ $company->default_color ?? '#6e8efb' }};
            color: #fff;
            text-align: center;
            padding: 1.5rem;
        }
        .login-header img {
            width: 60px;
            margin-bottom: 8px;
        }
        .login-header h3 {
            margin: 0;
            font-weight: 600;
        }
        .login-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
        }
        .form-control:focus {
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.5);
            border-color: #6e8efb;
        }
        .toggle-password {
            cursor: pointer;
            font-size: 18px;
            color: #666;
            display: none;
            position: absolute;
            right: 15px;
            top: 55%;
            transform: translateY(-50%);
        }
        .btn-primary {
            background: {{ $company->default_color ?? '#6e8efb' }};
            border: none;
            font-weight: 500;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #5a75e5;
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
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
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
        .links a {
            color: {{ $company->default_color ?? '#6e8efb' }};
            font-weight: 500;
        }
        .links a:hover {
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

        @media (max-width: 450px) {
            .login-wrapper {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-header">
        <img src="{{ asset($company->company_logo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png') }}" alt="Company Logo">
        <h3>{{ $company->system_title ?? 'HRMS Portal' }}</h3>
        <p>{{ $company->company_description ?? 'Secure Employee Login' }}</p>
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
