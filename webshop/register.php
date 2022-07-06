<?php
$site_name = "Registrierung";
include 'includes/header.inc.php';
?>

<div id="container">
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" name="pw" class="form-control" exampleInputPassword1" placeholder="Passwort">
        </div>
        <div class="form-group">
            <input type="password" name="pw2" class="form-control" id="exampleInputPassword1" placeholder="Passwort bestätigen">
        </div>
        <button type="submit" name="regbtn" class="btn btn-primary">Registrierung</button>
        <?php
        if (isset($_POST['regbtn'])) {
            include 'includes/userclass.inc.php';
            $user = new User();
            try {
                $user->signup($_POST);
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