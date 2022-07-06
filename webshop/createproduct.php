<?php
$site_name = "Produkt erstellen";
include './includes/header.inc.php';
session_start();
echo '<nav class="navbar navbar-light bg-light">
<h4>
<a href="userlist.php">Userliste</a>
<a href="editproduct.php">Produkt bearbeiten</a>
<a href="index.php">Logout</a>
<h4>
    </nav>';
?>

<div id="container">
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="pname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name des Produktes">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Beschreibung">
        </div>
        <div class="form-group">
            <input type="number" step="0.01" name="price" class="form-control" exampleInputPassword1" placeholder="Preis">
        </div>
        <button type="submit" name="productbtn" class="btn btn-primary">Produkt erstellen</button>
        <?php
        if (isset($_POST['productbtn'])) {
            include 'includes/productclass.inc.php';
            $product = new Product();
            try {
                $product->createProduct($_POST);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        ?>
    </form>
</div>

<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>