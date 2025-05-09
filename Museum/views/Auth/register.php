<?php
require_once '../../controllers/controle.php';
$museumController = new museum_controller();


$name = $email = $password = $confirmPassword = $gender = "";
$nameError = $emailError = $passwordError = $confirmPasswordError = $genderError = "";
$registrationSuccess = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $gender = $_POST['gender'] ?? '';

    $isValid = true;

    if (empty($name)) {
        $nameError = "Username is required.";
        $isValid = false;
    }
    if (empty($email)) {
        $emailError = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = "Password is required.";
        $isValid = false;
    }
    if (empty($confirmPassword)) {
        $confirmPasswordError = "Confirm password is required.";
        $isValid = false;
    } elseif ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match.";
        $isValid = false;
    }
    if (empty($gender)) {
        $genderError = "Gender is required.";
        $isValid = false;
    }

    if ($isValid) {
        if ($museumController->openconnection()) {
            $escaped_name = $museumController->escape_string($name);
            $escaped_email = $museumController->escape_string($email);
            $escaped_password = $museumController->escape_string($password);
            $escaped_gender = $museumController->escape_string($gender);

            $checkQuery = "SELECT * FROM user WHERE name = ?";
            $checkStmt = $museumController->connection->prepare($checkQuery);
            $checkStmt->bind_param('s', $escaped_name);
            $checkStmt->execute();
            $result = $checkStmt->get_result();

            if ($result->num_rows > 0) {
                $nameError = "Username already exists. Please choose a different one.";
            } else {
                $insertQuery = "INSERT INTO user (name, email, password, gender) VALUES (?, ?, ?, ?)";
                $insertStmt = $museumController->connection->prepare($insertQuery);
                $insertStmt->bind_param('ssss', $escaped_name, $escaped_email, $escaped_password, $escaped_gender);

                if ($insertStmt->execute()) {
                    $registrationSuccess = "<span style='color: green;'>Registration successful! <a href='login.php'>Login here</a></span>";
                    $name = $email = $password = $confirmPassword = $gender = "";
                } else {
                    $registrationSuccess = "<span style='color: red;'>Error during registration: " . $insertStmt->error . "</span>";
                }
                $insertStmt->close();
            }
            $checkStmt->close();
            $museumController->closeconnection();
        } else {
            die("Failed to connect to the database.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/ar2.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            color: white;
        }
        .error-message {
            color: red;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">✨ Register ✨</h3>
                        <form id="registerForm" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                                <?php if ($nameError): ?>
                                    <span class="error-message"><?php echo htmlspecialchars($nameError); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($gender === 'male') echo 'checked'; ?> required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if ($gender === 'female') echo 'checked'; ?> required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <?php if ($genderError): ?>
                                    <span class="error-message"><?php echo htmlspecialchars($genderError); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                                <?php if ($emailError): ?>
                                    <span class="error-message"><?php echo htmlspecialchars($emailError); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <?php if ($passwordError): ?>
                                    <span class="error-message"><?php echo htmlspecialchars($passwordError); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                <?php if ($confirmPasswordError): ?>
                                    <span class="error-message"><?php echo htmlspecialchars($confirmPasswordError); ?></span>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" style='background-color: #d4af37; border:none;'>Register</button>
                        </form>
                        <div id="message" class="mt-3 text-center">
                            <?php echo $registrationSuccess; ?>
                        </div>
                        <div class="text-center mt-3">
                            <a href="login.php">Already have an account? Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>