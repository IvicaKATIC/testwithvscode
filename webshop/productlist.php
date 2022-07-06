<?php
$site_name = 'Produktenübersicht';
include 'includes/header.inc.php';
session_start();
echo '<nav class="navbar navbar-light bg-light">
    <h4><a href="index.php">Logout</a></h4>
    </nav>';
?>
<div id="container">
    <?php
    include 'includes/productclass.inc.php';
    $product = new Product();
    $product->loadAllProducts();
    echo '<h4>Hier geht es zum <a href="cart.php">Warenkorb</a></h4>';
    if (isset($_POST['cartbtn'])) {
        $product_id = $_POST['cartbtn'];
        try {
            $product->addToCart($product_id);
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }

    ?>
</div>


<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>