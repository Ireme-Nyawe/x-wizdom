<?php
session_start();
include "components/php/connection.php";
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
            <h2><u>REPO</u>RTS</h2>
             <br>
             <div class="">
             
                <form action="" method="post">
                        <h3>View Trainees Marks Report Here</h3>
                        <br>
                        <p>
                        <label for="">Trade</label><br>
                            <select name="trade">
                                <option value="">Select Trade To View</option>
                                <?php
                                $getTrades=mysqli_query($connect,"SELECT * from Trade");
                                while($trades=mysqli_fetch_array($getTrades)){
                                    ?>
                                    <option value="<?php echo $trades['Trade_Id'];?>"><?php echo $trades['Trade_Name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="submit"  value="View Report" name="viewReport">
                        </p>

                    </form>
                    <div>
                        <hr>
                        <?php
                    include "marksrepo.php";
                    ?>
                    
    </div>
</body>
</html>