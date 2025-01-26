<?php 
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../Frontend/Styles/shared.css">
    <link rel="stylesheet" href="../Frontend/Styles/login-signup.css">
</head>

<body>
    <div class="login-container">
        <div class="card">
            <h2>Log In</h2>

            <form action="login.php" method="POST">
                <div class="input-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <button class="login-btn" type="submit" name="login">Log In</button>
            </form>

            <?php
            if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                $result = $con->query($query);

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    $_SESSION['user_id'] = $user['id']; 
                    $_SESSION['user_name'] = $user['name']; 
                    echo "<p style='color: green;'>Login successful! Redirecting...</p>";

                    header("Refresh: 2; url=home.php");
                } else {
                    echo "<p style='color: red;'>Invalid email or password.</p>";
                }
            }
            ?>

            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>