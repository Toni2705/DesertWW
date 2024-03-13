<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales personalizados */
        .wrapper {
            background: url('/images/backgroundLogin.png') no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background-color: transparent;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 350px;
            width: 100%;
        }
        .form-control {
            background: transparent;
            border-color: black;
            color: black;
        }
        .form-control:focus {
            background-color: transparent;
            border-color: black;
            box-shadow: none;
        }
        .btn-login {
            background-color: black;
            color: white;
            width: 100%;
            margin-top: 2vh;
            border-radius: 20px;
        }
        .input-group-text {
            background-color: transparent;
            border-color: black;
            color: black;
        }
        .btn-login:hover {
            color: white;
            background-color: black;
        }
        .register-link{
            text-align: center;
            margin-top: 4vh;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="login-box">
            <h2 class="text-center mb-4">Login</h2>
            <form action="{{ route('login') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">DNI</label>
                    <div class="input-group">
                        <span class="input-group-text"><ion-icon name="card"></ion-icon></span>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="#">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
