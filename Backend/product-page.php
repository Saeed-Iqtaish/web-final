<?php
include("connect.php");

$product_id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = '$product_id'";
$result = $con->query($query);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");
?>

<head>
    <link rel="stylesheet" href="..\Frontend\Styles\product-page.css">
</head>

<body>
    <section class="product">
        <div class="container">
            <div class="product-details">
                <div class="product-image">
                    <img src="<?php echo $product['img']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </div>

                <div class="product-info">
                    <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                    <p class="product-price">$<?php echo htmlspecialchars($product['price']); ?></p>
                    <p class="product-delivery">Estimated Delivery: <span>3-5 Business Days</span></p>
                    <form action="add-to-cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    
                    <?php if (isset($_GET['added']) && $_GET['added'] == '1'): ?>
                        <div class="alert alert-success">Product successfully added to your cart!</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="product-tabs">
                <button class="tab-button active" data-tab="description">Description</button>
                <button class="tab-button" data-tab="specifications">Specifications</button>
            </div>

            <div id="description" class="tab-content active">
                <p><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
            <div id="specifications" class="tab-content">
                <ul>
                    <?php
                    $specifications = explode("\n", $product['specifications']);
                    foreach ($specifications as $spec) {
                        echo "<li>" . htmlspecialchars($spec) . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <script src="..\Frontend\JS\tabs.js"></script>
</body>

<?php
include("footer.php");
?>

</html>