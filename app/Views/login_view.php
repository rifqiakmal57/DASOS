<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 tanpa atribut integrity -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling the body and the background */
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        /* Container for the login form */
        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        
        /* Logo styling */
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
            color: #4e73df;
        }
        
        /* Styling input fields */
        .form-control {
            border-radius: 25px;
            padding: 15px;
            margin-bottom: 20px;
        }

        /* Button styling */
        .btn-login {
            width: 100%;
            background-color: #4e73df;
            border-color: #4e73df;
            padding: 15px;
            border-radius: 25px;
        }
        
        /* Change button color on hover */
        .btn-login:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }

        /* Message section styling */
        #message {
            margin-top: 20px;
            text-align: center;
        }

        /* Responsive design for mobile devices */
        @media (max-width: 576px) {
            .login-container {
                padding: 30px 20px;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Welcome Back!</h2>

    <form id="loginForm">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-login">Login</button>
    </form>

    <div id="message"></div>
</div>

<!-- Bootstrap 5 JS tanpa atribut integrity -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Memuat jQuery sebelum script lainnya -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({
                url: '<?php echo site_url('login/authenticate'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        setTimeout(function() {
                            window.location.href = '<?php echo site_url('dashboard'); ?>'; // Ganti dengan halaman setelah login sukses
                        }, 2000);
                    } else {
                        $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#message').html('<div class="alert alert-danger">Error processing request</div>');
                }
            });
        });
    });
</script>

</body>
</html>
