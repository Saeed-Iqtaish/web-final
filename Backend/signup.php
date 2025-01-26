<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Frontend/Styles/shared.css">
    <link rel="stylesheet" href="../Frontend/Styles/login-signup.css">
</head>

<body>
    <div class="signup-container">
        <div class="card">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <div class="input-field">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Enter Your Full Name" required>
                </div>
                <div class="input-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="input-field">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Re-enter Your Password" required>
                </div>
                <button class="signup-btn" type="submit" name="signup">Sign Up</button>
            </form>

            <?php
            if (isset($_POST['signup'])) {
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

                if ($password !== $confirm_password) {
                    echo "<p style='color: red;'>Passwords do not match. Please try again.</p>";
                } else {
                    $checkQuery = "SELECT * FROM user WHERE email = '$email'";
                    $checkResult = $con->query($checkQuery);

                    if ($checkResult->num_rows > 0) {
                        echo "<p style='color: red;'>Email is already registered. Please log in.</p>";
                    } else {

                        $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
                        if ($con->query($query)) {
                            echo "<p style='color: green;'>Signup successful! Redirecting to login page...</p>";
                            header("Refresh: 2; url=login.php");
                        } else {
                            echo "<p style='color: red;'>Error: " . $con->error . "</p>";
                        }
                    }
                }
            }
            ?>
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>

</html>
