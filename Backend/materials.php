<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php 
include("header.php");
?>

<body>
    <div id="side-nav" class="side-nav">
        <button id="close-btn" class="close-btn" aria-label="Close side navigation">&times;</button>
        <ul class="side-nav-links">
            <li><a href="home.html">Home</a></li>
            <li><a href="printers.html">3D Printers</a></li>
            <li><a href="materials.html">Materials</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </div>

    <main>
        <h2 class="section-title">All Materials</h2>
        <section class="search">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search for materials...">
                <button class="search-btn">Search</button>
            </div>
        </section>

        <section class="materials">
            <div class="container">
            <div id="product-grid" class="product-grid">
                <?php
                $query = "SELECT * FROM products WHERE category = 'material'";
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
        </section>
    </main>

    <script src="../JS/script.js"></script>
</body>

<?php 
include("footer.php");
?>

</html>