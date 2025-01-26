<?php
session_start();
include("connect.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$product_id = $_POST["product_id"];

$cart_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
$cart_result = $con->query($cart_query);

if ($cart_result->num_rows > 0) {
    $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $con->query($update_query);
} else {
    $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";
    $con->query($insert_query);
}

header("Location: product-page.php?id=$product_id&added=1");
exit();
?>