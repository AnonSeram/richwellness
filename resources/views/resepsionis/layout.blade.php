<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/dashboard/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/dashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/dashboard/assets/images/favicon.png" />
    <style>
        .content-wrapper {
            background-image: url('/nyoba/images/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .badge,
        .badge:hover,
        a {
            text-decoration: none;
            /* Fixed text-decoration value */
            color: #ffffff;
            /* Changed to white */
        }

        /* Styling for modal */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            /* Ensure modal is on top of other content */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
        }

        .modal-content {
            margin: 10% auto;
            /* Reduced margin from 15% to 10% */
            padding: 20px;
            width: 60%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            animation-name: modalopen;
            animation-duration: 0.4s;
            background-color: #ffffff;
            /* Optional: Set background color for modal */
        }

        @keyframes modalopen {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000000;
            /* Changed hover color to black */
            text-decoration: none;
            cursor: pointer;
        }

        /* Add this to your existing CSS or in a separate file */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle" src="/assets/dashboard/assets/images/faces/face.jpg"
                                    alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                <span>Administrator</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Dashboard</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/resepsionis">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Data Reservasi</span>
                    </a>
                    <li class="nav-item menu-home">
                    <a class="nav-link" href="/">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle"
                                        src="/assets/dashboard/assets/images/faces/face.jpg" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item change-password-link" href="#">
                                    <i class="mdi mdi-lock-reset text-primary"></i>
                                    Change Password
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div id="changePasswordModal" class="custom-modal">
                    <div class="modal-content">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Change Password</div>
                                        <div class="card-body">
                                            <!-- Display success message if session status is success -->
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <!-- Update Password Form -->
                                            <form method="POST" action="{{ route('password.update') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="current_password">Current Password</label>
                                                    <input id="current_password" type="password"
                                                        class="form-control @error('current_password') is-invalid @enderror"
                                                        name="current_password" required
                                                        autocomplete="current-password">

                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input id="new_password" type="password"
                                                        class="form-control @error('new_password') is-invalid @enderror"
                                                        name="new_password" required autocomplete="new-password">

                                                    @error('new_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="new_password_confirmation">Confirm New Password</label>
                                                    <input id="new_password_confirmation" type="password"
                                                        class="form-control" name="new_password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary">
                                                        Change Password
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/dashboard/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/dashboard/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/assets/dashboard/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/assets/dashboard/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/dashboard/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/dashboard/assets/js/off-canvas.js"></script>
    <script src="/assets/dashboard/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/dashboard/assets/js/misc.js"></script>
    <script src="/assets/dashboard/assets/js/settings.js"></script>
    <script src="/assets/dashboard/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/dashboard/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
        // Function to open Change Password modal
        function openChangePasswordModal() {
            document.getElementById('changePasswordModal').style.display = 'block';
        }

        // Function to close Change Password modal
        function closeChangePasswordModal() {
            document.getElementById('changePasswordModal').style.display = 'none';
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            var modal = document.getElementById('changePasswordModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle click on Change Password link in dropdown
        document.querySelector('.change-password-link').addEventListener('click', function (event) {
            event.preventDefault();
            openChangePasswordModal();
        });
        // Function to display notification as alert
        function displayNotification(message, type) {
            // Remove existing alerts
            document.querySelectorAll('.alert').forEach(function (alert) {
                alert.remove();
            });

            // Create new alert element
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-' + type);
            alertDiv.textContent = message;

            // Append alert to body or any suitable container
            document.body.appendChild(alertDiv);

            // Automatically close alert after 5 seconds (optional)
            setTimeout(function () {
                alertDiv.remove();
            }, 5000);
        }
        
        // Check if there's a status message and display it
        @if(session('status'))
            displayNotification('{{ session('status') }}', 'success');
        @endif
    </script>
</body>

</html>