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
            <h2><u>TRA</u>DES</h2>
             <br>
            <div class="two-part">
                <div class="part-one">
                   <?php
                   $what="add";
                   if(isset($_GET['what'])){
                    $what=$_GET['what'];
                   }
                   if($what=="add"){
                    ?>
                     <form action="" method="post">
                        <h3>Add New Trade Here</h3>
                        <?php
                        include "tradeop.php";
                        ?>
                        <br>
                        <p>
                            <label for="">Trade Name</label><br>
                            <input type="text" name="tradeName" placeholder="Type --">
                        </p>
                        <p>
                            <br>
                            <input type="submit" value="Add Now" name="addTrade">
                        </p>
                    </form>
                    <?php
                   }
                   else{
                    $check=mysqli_query($connect,"SELECT * from Trade where Trade_Id='$what'");
                    $trade_info=mysqli_fetch_array($check);
                    ?>

                     <form action="" method="post">
                        <h3>Update Trade Here</h3>
                        <?php
                         include "tradeop.php";
                         ?>
                         <br>
                        <p>
                            <label for="">Trade Name</label><br>
                            <input type="text" name="tradeNameupdt" placeholder="Type --" value="<?php echo $trade_info['Trade_Name'];?>">
                        </p>
                        <p>
                            <br>
                            <input type="submit" value="Update Now" name="updateNow">
                        </p>
                    </form>
                    <?php
                   }
                   ?>
                </div>
                <div class="part-two">
                    <table>
                        <tr>
                            <th colspan="100"> Available Trades In Our School
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Trade Name</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $query="SELECT * from Trade";
                        $getTrades=mysqli_query($connect,$query);
                        if(mysqli_num_rows($getTrades)==0){
                            ?>
                            <tr>
                                <th colspan="100">No Data Found</th>
                            </tr>
                            <?php
                        }
                        else{
                            $no=1;
                            while($trades=mysqli_fetch_array($getTrades)){
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $trades['Trade_Name'];?></td>
                                    <td>
                                        <a href="home.php?delete=<?php echo $trades['Trade_Id'];?>" onclick="return confirm('Are You Sure About Deleting <?php echo $trades['Trade_Name'];?>')">Delete</a>
                                        <a href="home.php?what=<?php echo $trades['Trade_Id']?>">Update</a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>