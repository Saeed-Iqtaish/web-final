<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Explore cutting-edge 3D printers and accessories at [Your Store Name]. 
        Discover high-quality, affordable 3D printing solutions for hobbyists, professionals, and businesses.">
    <meta name="keywords"
        content="3D printers, 3D printing, affordable 3D printers, professional 3D printers, 
        3D printing accessories, 3D printing materials, filament, resin printers, FDM printers, SLA printers">
    <meta name="author" content="3D World | 3D Printing Experts">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="rating" content="General">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home - 3D Printing Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="..\Frontend\Styles\header.css">
    <link rel="stylesheet" href="..\Frontend\Styles\shared.css">
    <link rel="stylesheet" href="..\Frontend\Styles\footer.css">
</head>

<header>
    <div class="nav-container">
        <div class="brand">
            <img class="logo" src="..\Frontend\Resources\3d-printer colored.png" alt="store logo">
            <div class="name">3D Works</div>
        </div>

        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="printers.php">3D Printers</a></li>
                <li><a href="materials.php">Materials</a></li>
                <li><a href="about-us.php">About Us</a></li>
            </ul>
        </nav>

        <div class="auth-links">

            <div class="user-avatar" onclick="toggleDropdown()">
                <img src="..\Frontend\Resources\user.png" alt="User Avatar" class="avatar-img" />
            </div>

            <div class="dropdown-menu" id="dropdownMenu">
                <?php if ($is_logged_in): ?>
                    <a href="logout.php" class="logout-btn">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="login-btn">Log In</a>
                    <a href="signup.php" class="signup-btn">Sign Up</a>
                <?php endif; ?>
            </div>

            <?php if (!$is_logged_in): ?>
                <a href="login.php" class="login-btn">Log In</a>
                <a href="signup.php" class="signup-btn">Sign Up</a>
            <?php else: ?>
                <a href="logout.php" class="logout-btn">Log Out</a>
            <?php endif; ?>

            <a href="cart.php" class="cart-btn">
                <i class="bi bi-cart-fill"></i> Cart
            </a>
        </div>

        <button class="hamburger" id="hamburger-btn">
            &#9776;
        </button>
    </div>

    <div id="side-nav" class="side-nav">
        <ul class="side-nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="printers.php">3D Printers</a></li>
            <li><a href="materials.php">Materials</a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </div>
    <script src="..\Frontend\JS\script.js"></script>
</header>