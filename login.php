<?php
session_start();
include('action/User.php');
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form is submitted, perform login
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Validate login
    $result = $user->login($email, $password);
    if ($result) {
        // Login successful, redirect to home or dashboard
        $_SESSION['userLogin'] = $result;
        header("Location: admin/"); // Change this to the desired page
        exit();
    } else {
        // Login failed, set error message
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">IT Club | Login</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <?php
                        if (isset($_SESSION['failLogin'])) {
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                                echo $_SESSION['failLogin'];
                                unset($_SESSION['failLogin']); // Clear the error message after displaying
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        Don't have an account? <a href="register.php">Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
