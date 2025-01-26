<?php
include("connect.php");
include("header.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_quantity'])) {
        $cart_id = $_POST['cart_id'];
        $quantity = (int)$_POST['quantity'];
        if ($quantity > 0) {
            $update_query = "UPDATE cart SET quantity = '$quantity' WHERE id = '$cart_id' AND user_id = '$user_id'";
            $con->query($update_query);
        }
    } elseif (isset($_POST['remove_item'])) {
        $cart_id = $_POST['cart_id'];
        $delete_query = "DELETE FROM cart WHERE id = '$cart_id' AND user_id = '$user_id'";
        $con->query($delete_query);
    }
}

$cart_query = "
    SELECT c.id AS cart_id, p.name, p.img, c.quantity, p.price
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = '$user_id'";
$cart_result = $con->query($cart_query);

$totalPrice = 0;
$totalItems = 0;

if ($cart_result && $cart_result->num_rows > 0) {
    while ($item = $cart_result->fetch_assoc()) {
        $totalPrice += $item['price'] * $item['quantity'];
        $totalItems += $item['quantity'];
    }
} else {
    $cart_result = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="..\Frontend\Styles\cart.css">
</head>



<body>
    <section class="cart py-5">
        <div class="container-fluid">
            <h1 class="section-title mb-4 text-center">Shopping Cart</h1>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Update</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cart_result): ?>
                            <?php foreach ($cart_result as $item): ?>
                                <tr>
                                    <td><img src="<?php echo $item['img']; ?>" alt="Product Image" class="cart-item-image" width="100"></td>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                            <input type="number" name="quantity" class="form-control" value="<?php echo $item['quantity']; ?>" min="1">
                                    </td>
                                    <td>
                                            <button type="submit" name="update_quantity" class="btn btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                            <button type="submit" name="remove_item" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-summary text-center mt-4">
                <h2>Order Summary</h2>
                <p>Total Items: <span><?php echo $totalItems; ?></span></p>
                <p>Total Price: <span>$<?php echo number_format($totalPrice, 2); ?></span></p>
                <a class="btn">Proceed to Checkout</a>
            </div>
        </div>
    </section>
</body>

<?php include("footer.php"); ?>

</html>