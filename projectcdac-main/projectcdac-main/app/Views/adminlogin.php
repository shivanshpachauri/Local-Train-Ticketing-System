<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 100px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-btn {
            background-color: #DC4930;
            color: #ffffff;
            width: 100%;
        }

        .forgot-password {
            color: #007bff;
            text-align: right;
            display: block;
            margin-top: 10px;
        }

        .login-heading {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .login-container::before {
            content: '';
            display: block;
            height: 2px;
            width: 380px;
            background-color: #D39C95;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 20px;
        }

        .admin-panel-text {
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="login-form">
        <h2 class="login-heading">Online Ticket Management System</h2>
        <p class="admin-panel-text">Admin Login Panel</p>
        <form method="POST" action = "http://localhost:8080/adminlogin">
            <span style='color:red;font-size:15px;'><?php echo session('msg');?></span>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="username" class="form-control" id="inputEmail" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password">
            </div>
           <!--  <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberCheck">
                <label class="form-check-label" for="rememberCheck">Remember me</label>
            </div> -->
            <button type="submit" class="btn login-btn">Login</button>
            <!-- <a href="#" class="forgot-password">Forgot password?</a> -->
        </form>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
