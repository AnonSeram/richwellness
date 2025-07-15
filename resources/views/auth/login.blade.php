<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Rich Wellness</title>
    <link href="{{ asset('assets/homepage/img/favicon.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('assets/login-register/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login-register/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
</head>
<body>

<header>
    <img src="{{ asset('assets/homepage/img/logo.png') }}" alt="Rich Wellness Logo">
</header>

<style>
    .form-submit {
        background-color: #00c0a6;
        color: white;
        border: none;
        cursor: pointer;
    }

    .form-submit:hover {
        background-color: #009e8d;
    }

    .text-center {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .text-center a {
        color: #00c0a6;
        text-decoration: none;
        font-weight: 500;
    }

    .form-group label i {
        color: #00c0a6;
        font-size: 20px;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #00c0a6;
        font-size: 18px;
    }

    .form-group {
        position: relative;
    }
</style>

<div class="main">
    <section class="sign-in">
        <div class="signin-content">
            <div class="signin-form">
                <h2 class="form-title">Log In</h2>

                @if(session()->has('error'))
                    <div class="alert alert-danger" style="color: red;">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Your Password" required />
                        <span toggle="#password" class="toggle-password zmdi zmdi-eye"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div style="margin-top: 20px; text-align: left; margin-bottom:10px;">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" class="agree-term" />
                        <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" class="form-submit" value="Login"/>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="image-section">
        <div class="bg-image"></div>
    </section>
</div>

<script src="{{ asset('assets/login-register/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/login-register/js/main.js') }}"></script>

<!-- Toggle password script -->
<script>
    document.querySelectorAll(".toggle-password").forEach(function(el) {
        el.addEventListener("click", function() {
            const input = document.querySelector(this.getAttribute("toggle"));
            const icon = this;
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("zmdi-eye");
                icon.classList.add("zmdi-eye-off");
            } else {
                input.type = "password";
                icon.classList.remove("zmdi-eye-off");
                icon.classList.add("zmdi-eye");
            }
        });
    });
</script>

<!-- SweetAlert success flash message -->
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#00c0a6'
        });
    @endif
</script>

</body>
</html>
