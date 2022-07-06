<?php
$site_name = "Liste aller user";
include './includes/header.inc.php';
echo '
<nav class="navbar navbar-light bg-light">
    <h4>
    <a href="editproduct.php">Produkt bearbeiten</a>
    <a href="createproduct.php">Produkt erstellen</a>
    <a href="productlist.php">Produktenübersicht</a>
    <a href="index.php">Logout</a>
    </h4>
</nav>
';
?>

<div id="container">
    <?php
    include './includes/userclass.inc.php';
    $user = new User();
    $user->showAllUsers();
    ?>
    </form>
</div>

<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>