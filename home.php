<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Wisdom</title>
    <link rel="stylesheet" href="components/css/style.css">

</head>
<body>
    <div class="whole-page">
        <div class="top">
            <?php
            include "components/html/top.html"
            ?>
        </div>
        <div class="side-menu">
            <?php
            include "components/html/side.html";
            ?>
        </div>
        <div class="page-content">
            <h2>TRADES</h2>
            
        </div>
    </div>
</body>
</html>