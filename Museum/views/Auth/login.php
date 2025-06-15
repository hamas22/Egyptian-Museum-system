<?php
session_start();

require_once '../../controllers/controle.php'; 
require_once '../../models/User.php';
require_once '../../models/Admin.php';
require_once '../../models/Member.php';

$museumController = new museum_controller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    if ($museumController->openconnection()) {
        $escaped_email = $museumController->connection->real_escape_string($email);
        $escaped_password = $museumController->connection->real_escape_string($password);

        $adminSql = "SELECT * FROM admin WHERE email='$escaped_email' AND password='$escaped_password'";
        $adminResult = $museumController->select($adminSql);

        if ($adminResult && count($adminResult) > 0) {
            $admin = Admin::fromArray($adminResult[0]);
            $_SESSION['admin_id'] = $admin->id;
            $_SESSION['admin_name'] = $admin->name;
            $_SESSION['role'] = 'admin';

            header("Location: ../User/index.php");
            $museumController->connection->close();
            exit();
        }

        $userSql = "SELECT * FROM user WHERE email='$escaped_email' AND password='$escaped_password'";
        $userResult = $museumController->select($userSql);

        if ($userResult && count($userResult) > 0) {
            $member = Member::fromArray($userResult[0]);
            $_SESSION['user_id'] = $member->id;
            $_SESSION['user_name'] = $member->name;
            $_SESSION['role'] = 'user';

            header("Location: ../User/index.php");
            $museumController->connection->close();
            exit();
        }

        $_SESSION['login_error'] = "Invalid email or password!";
        header("Location: login.php");
        $museumController->connection->close();
        exit();
    } else {
        die("Failed to connect to the database.");
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
   body {
  background: linear-gradient(to right, #f9f5ec, #fff);
  font-family: 'Segoe UI', sans-serif;
}

.card {
  background: #fff8e1;
  border: none;
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.15);
  animation: slideFadeIn 0.7s ease;
}

.card-body {
  padding: 40px;
}

h3 {
  font-weight: bold;
  color: #5d4037;
  letter-spacing: 1px;
  text-shadow: 1px 1px #d4af37;
}

input.form-control {
  border-radius: 10px;
  border: 1px solid #c8b88a;
  transition: all 0.3s ease;
}

input.form-control:focus {
  border-color: #d4af37;
  box-shadow: 0 0 8px rgba(212, 175, 55, 0.5);
}

.btn-success {
  background-color: #d4af37 !important;
  color: #000;
  font-weight: bold;
  border-radius: 50px;
  padding: 10px;
  transition: transform 0.3s ease;
}

.btn-success:hover {
  transform: scale(1.05);
  background-color: #caa635 !important;
}

a {
  color: #5d4037;
  text-decoration: none;
  font-weight: 500;
}

a:hover {
  color: #000;
  text-decoration: underline;
}

#loginMessage {
  font-weight: bold;
  font-size: 15px;
}

@keyframes slideFadeIn {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">🔐 Login</h3>

                        <form id="loginForm" action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100" style='background-color: #d4af37; border:none;'>Login</button>
                        </form>

                        <?php if (isset($_SESSION['login_error'])): ?>
                            <div id="loginMessage" class="mt-3 text-center text-danger">
                                <?php echo $_SESSION['login_error']; ?>
                                <?php unset($_SESSION['login_error']); ?>
                            </div>
                        <?php else: ?>
                            <div id="loginMessage" class="mt-3 text-center"></div>
                        <?php endif; ?>

                        <div class="text-center mt-3">
                            <a href="register.php">Don't have an account? Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>