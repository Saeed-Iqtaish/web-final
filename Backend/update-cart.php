<?php
session_start();
include("connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$cart_id = $_POST['cart_id'];
$quantity = (int)$_POST['quantity'];

if ($quantity < 1) {
    header("Location: cart.php?error=Invalid quantity");
    exit();
}

$update_query = "UPDATE cart SET quantity = '$quantity' WHERE id = '$cart_id' AND user_id = '$user_id'";
if ($con->query($update_query)) {
    header("Location: cart.php?success=Cart updated");
} else {
    header("Location: cart.php?error=Could not update cart");
}
exit();
?>