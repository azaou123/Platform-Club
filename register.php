<?php
session_start();
include('action/User.php');

// Initialize User class
$user = new User();

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Collect user input
    $nomComplet = $_POST["nomComplet"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telephone = $_POST["telephone"];

    // Perform registration
    $registrationResult = $user->register($nomComplet, $email, $password, $telephone);

    // Check registration result
    if ($registrationResult === true) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed, set error message
        $registrationError = $registrationResult;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">IT Club | Registration</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <?php
                        if (isset($registrationError)) {
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                                echo $registrationError;
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="mb-3">
                            <label for="nomComplet" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="nomComplet" name="nomComplet" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        Already have an account? <a href="login.php">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
