<?php
$site_name = 'Warenkorb';
include 'includes/header.inc.php';
session_start();
echo '<nav class="navbar navbar-light bg-light">
    <h4>
    <a href="productlist.php">Produktenübersicht</a>
    <a href="index.php">Logout</a>
    </h4>
    </nav>';
?>

<div id="container">
    <h2>Warenkorb:</h2>
    <?php
    include 'includes/productclass.inc.php';
    ?>
</div>


<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>