<?php
$site_name = 'Admin';
include 'includes/header.inc.php';
session_start();
echo '
<nav class="navbar navbar-light bg-light">
    <h4>
    <a href="userlist.php">Userliste</a>
    <a href="editproduct.php">Produkt bearbeiten</a>
    <a href="createproduct.php">Produkt erstellen</a>
    <a href="productlist.php">Produktenübersicht</a>
    <a href="index.php">Logout</a>
    </h4>
</nav>
';
?>

<div id="container">
    <h2>Hallo Admin!</h2>
    <br><br>
    <h3>Das ist dein persönlicher Bereich.</h3>
    <h3>Im Navigationsbereich findest du die, zur Zeit verfügbaren Bearbeituns- und Ansichtsmöglichkeiten.</h3><br>
    <h3>Bei bedarf kontaktiere den Support. Viel spaß!</h3><br>
</div>


<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>