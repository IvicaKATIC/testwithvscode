<?php
$site_name = 'Dashboard';
include 'includes/header.inc.php';
session_start();

?>

<div id="container">
    <h2>Herzlich willkommen zum Webshop!</h2><br><br>
    <nav class="navbar navbar-light bg-light">
        <h4>Überblick alle unseren Produkte --> <a href="productlist.php">Unsere produkte</a></h4><br>
        <h4>Hier geht es zum Warenkorb --> <a href="cart.php">Warenkorb</a></h4>
    </nav>
</div>


<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>