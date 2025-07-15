<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Rich Wellness</title>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .main {
      display: flex;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .sign-in {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }

    .signin-content {
      max-width: 400px;
      width: 100%;
      text-align: left;
      margin: 0 auto;
    }

    .form-title {
      color: #333;
      font-size: 28px;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group label {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #00c0a6;
    }

    .input100 {
      width: 100%;
      padding: 15px 15px 15px 40px;
      font-size: 16px;
      border: 2px solid #ddd;
      border-radius: 25px;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .input100:focus {
      border-color: #00c0a6;
    }

    .form-submit {
      width: 100%;
      background-color: #00c0a6;
      color: white;
      border: none;
      padding: 15px 0;
      cursor: pointer;
      border-radius: 25px;
      font-size: 18px;
      transition: background-color 0.3s ease;
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

    .txt1 {
      font-size: 14px;
      color: #888;
    }

    .txt2:hover {
      color: #009e8d;
      text-decoration: underline;
    }

    .image-section {
      flex: 1;
      background-image: url('/assets/login-register/images/bg-login.jpg');
      background-size: cover;
      background-position: center;
    }

    .toggle-password {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #00c0a6;
      font-size: 20px;
    }

    header img {
      width: 150px;
    }
  </style>
</head>
<body>

  <div class="main">
    <div class="sign-in">
      <div class="signin-content">
        <div style="text-align: center; margin-bottom: 20px;">
          <img src="/assets/homepage/img/logo.png" alt="Rich Wellness Logo" style="width: 120px;">
        </div>

        <h2 class="form-title">Daftar</h2>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
            <label for="name"><i class="mdi mdi-account"></i></label>
            <input type="text" name="name" id="name" class="input100" placeholder="Your Name" value="{{ old('name') }}" required autofocus />
          </div>

          <div class="form-group">
            <label for="email"><i class="mdi mdi-email"></i></label>
            <input type="email" name="email" id="email" class="input100" placeholder="Your Email" value="{{ old('email') }}" required />
          </div>

          <div class="form-group">
            <label for="password"><i class="mdi mdi-lock"></i></label>
            <input type="password" name="password" id="password" class="input100" placeholder="Password" required />
            <span class="toggle-password" toggle="#password">
              <i class="mdi mdi-eye-outline"></i>
            </span>
          </div>

          <div class="form-group">
            <label for="password_confirmation"><i class="mdi mdi-lock-check"></i></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input100" placeholder="Confirm Password" required />
            <span class="toggle-password" toggle="#password_confirmation">
              <i class="mdi mdi-eye-outline"></i>
            </span>
          </div>

          <div class="text-center" style="margin-bottom: 15px;">
            <span class="txt1">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="txt2">Login di sini</a>
          </div>

          <div class="form-group form-button">
            <input type="submit" class="form-submit" value="Daftar" />
          </div>
        </form>
      </div>
    </div>

    <div class="image-section"></div>
  </div>

  <!-- Toggle Password Script -->
  <script>
    document.querySelectorAll('.toggle-password').forEach(function (el) {
      el.addEventListener('click', function () {
        const input = document.querySelector(this.getAttribute('toggle'));
        const icon = this.querySelector('i');

        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('mdi-eye-outline');
          icon.classList.add('mdi-eye-off-outline');
        } else {
          input.type = 'password';
          icon.classList.remove('mdi-eye-off-outline');
          icon.classList.add('mdi-eye-outline');
        }
      });
    });
  </script>
</body>
</html>
