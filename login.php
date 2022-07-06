<?php
$site_name = "Login";
include './includes/header.inc.php';
?>

<div id="container">
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="Passwort">
        </div>
        <button type="submit" name="loginbtn" class="btn btn-primary"">Login</button>
        <?php
        if (isset($_POST['loginbtn'])) {
            include 'includes/userclass.inc.php';
            $user = new User();
            try {
                $user->login($_POST['uname'], sha1($_POST['pw']));
            } catch (Exception $ex) {
                echo 'Error: ' . $ex->getMessage();
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