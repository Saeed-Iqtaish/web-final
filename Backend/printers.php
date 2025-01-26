<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");
?>

<body>
    <main>
        <h2 class="section-title">All Printers</h2>
        <section class="search">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search for printers...">
                <button class="search-btn">Search</button>
            </div>
        </section>

        <section class="all-printers">
            <div class="container">
            <div id="product-grid" class="product-grid">
                <?php
                $query = "SELECT * FROM products WHERE category = 'printer'";
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
    </main>

    <script src="../JS/script.js"></script>
</body>

<?php 
include("footer.php");
?>

</html>