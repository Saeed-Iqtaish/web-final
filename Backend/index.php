<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php 
include("header.php");
?>

<body>
    <section class="hero">
        <div class="hero-container">
            <h1>Welcome to our 3D printing store</h1>
            <p class="lead">Explore the best 3D printers and materials for all your creative needs.</p>
        </div>
    </section>
    <section class="recommended">
        <div class="container">
            <h2 class="section-title">Recommended Products</h2>
            <div id="product-grid" class="product-grid">
                <?php
                $query = "SELECT * FROM products WHERE category = 'printer' ORDER BY rating DESC LIMIT 10";
                $result = $con->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="product-card">
                            <img src="' . $row['img'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>
                                <p class="card-text">$' . htmlspecialchars($row['price']) . '</p>
                                <a href="product-page.php?id=' . $row['id'] . '" class="btn btn-secondary">See More</a>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </section>
</body>

<?php 
require("footer.php");
?>

</html>