<?php
$site_name = "";
include 'includes/header.inc.php';
session_start();
if ($_SESSION['userrole'] == 2) {
    echo "<h3>Herzlich willkommen Admin, du wirst in Kürze weitergeleitet!</h3>";
    header("Refresh:1; url=admin.php");
} else {
    echo "<h3>Herzlich willkommen, du wirst in Kürze weitergeleitet!</h3>";
    header("Refresh:1; url=user.php");
}
?>

<div id="footer">
    <?php
    include './includes/footer.inc.php';
    ?>
</div>