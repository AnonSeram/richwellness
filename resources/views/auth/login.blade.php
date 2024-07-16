<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Rich Wellness</title>
    <!-- Logo -->
    <link href="assets/homepage/img/favicon.png" rel="icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/login-register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/login-register/css/style.css">
</head>
<body>

    <header>
        <img src="assets/homepage/img/logo.png" alt="Rich Wellness Logo">
    </header>

    <div class="main">

        <!-- Sign in Form -->
        <section class="sign-in">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Log In</h2>
                    @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert" style="color: red;">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="role"><i class="zmdi zmdi-account-box"></i></label>
                        <select name="role" id="role" class="input100" onchange="showLoginForm()">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="receptionist">Receptionist</option>
                        </select>
                    </div>
                    <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}" style="display: none;">
                        @csrf
                        <input type="hidden" name="role" id="form_role">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Your Password" required />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="{{ __('Login') }}"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Image Section -->
        <section class="image-section">
            <div class="bg-image"></div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/login-register/vendor/jquery/jquery.min.js"></script>
    <script src="assets/login-register/js/main.js"></script>
    <script>
        function showLoginForm() {
            var role = document.getElementById('role').value;
            document.getElementById('form_role').value = role;
            if (role) {
                document.getElementById('login-form').style.display = 'block';
            } else {
                document.getElementById('login-form').style.display = 'none';
            }
        }
    </script>
</body>
</html>
