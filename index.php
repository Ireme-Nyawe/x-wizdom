<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-Wisdom</title>
    <link rel="stylesheet" href="components/css/style.css">
</head>

<body>
    <div class="all">
        <?php
        $what="login";
        if(isset($_GET['what'])){
            $what=$_GET['what'];
        }
        if($what=="login"){
            ?>
        <form action="" method="post" class="form">
            <h3 class="form-head">Login <span class="text-black">|</span> X-Wisdom School</h3>
            <br>
            <hr>
            <?php
            include "login.php";
            ?>
            <p><br>
                <label for="">User Name</label><br>
                <input type="text" name="username" palaceholder="type--" required>
            </p>
            <p><br>
                <label for="">Password</label><br>
                <input type="password" name="password" palaceholder="type--" required>
            </p>
            <p><br>
                <input type="submit" name="login" value="Login">
            </p>

            <p><br>
            <span class="text-right">You Dont't Have An Account? <a href="index.php?what=register">Register
                    Now</a></span>
            </p>
        </form>
        <?php
        }
        else{
            ?>
        <form action="" method="post" class="form">
            <h3 class="form-head">Register <span class="text-black">|</span> X-Wisdom School</h3>
            <br>
            <hr>
            <?php
            include "register.php";
            ?>

            <p>
                <br>
                <label for="">User Name</label><br>
                <input type="text" name="username" palaceholder="type--" required>
            </p>
            <p>
                <br>
                <label for="">Password</label><br>
                <input type="password" name="password" palaceholder="type--" required>
            </p>
            <p>
                <br>
                <label for="">Confirm Password</label><br>
                <input type="password" name="password2" palaceholder="type--" required>
            </p>

            <p>
                <br>
                <input type="submit" name="register" value="register">
            </p>
            <p>
                <br>
            <span class="text-right">You Already Have An Account? <a href="index.php?what=login">Login Now</a></span>
            </p>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>