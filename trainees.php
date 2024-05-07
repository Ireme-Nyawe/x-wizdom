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
            <h2><u>TRAI</u>NEES</h2>
             <br>
             <div class="">
             <?php
             $what="add";
             if(isset($_GET['what'])){
                $what=$_GET['what'];
             }
             if($what=="add"){
                ?>
                <form action="" method="post">
                        <h3>Add New Trainee Here</h3>
                        <br>
                        <?php
                        include "traineeop.php";
                        ?>
                        <br>
                        <div class="two-part">
                            <div class="part-one">
                            <p>
                            <label for="">First Name</label><br>
                            <input type="text" name="fname" placeholder="Type --">
                            </p>
                            <p>
                            <label for="">Last Name</label><br>
                            <input type="text" name="lname" placeholder="Type --">
                            </p>
                            </div>
                            <div class="part-two">
                            <p>
                            <label for="">Gender</label><br>
                            <select name="gender">
                                <option value="">Select Trainee Gender ..</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </p>
                            <p>
                            <label for="">Trade</label><br>
                            <select name="trade">
                                <option value="">Select Trainee Trade</option>
                                <?php
                                $getTrades=mysqli_query($connect,"SELECT * from Trade");
                                while($trades=mysqli_fetch_array($getTrades)){
                                    ?>
                                    <option value="<?php echo $trades['Trade_Id'];?>"><?php echo $trades['Trade_Name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </p>
                            </div>
                        </div>
                        <p>
                            <br>
                            <input type="submit" value="Add Now" name="addTrainee">
                        </p>
                    </form>
                <?php
             }
             else{
                $id=$_GET['what'];
                $select="SELECT * from Trainees where Trainee_Id='$id'";
                $execute=mysqli_query($connect,$select);
                $trainee=mysqli_fetch_array($execute);
                ?>
                <form action="" method="post">
                        <h3>Update Trainee Here</h3>
                        <br>
                        <?php
                        include "traineeop.php";
                        ?>
                        <br>
                        <div class="two-part">
                            <div class="part-one">
                            <p>
                            <label for="">First Name</label><br>
                            <input type="text" name="fnamed" placeholder="Type --" value="<?php echo $trainee['FirstNames']?>">
                            </p>
                            <p>
                            <label for="">Last Name</label><br>
                            <input type="text" name="lnamed" placeholder="Type --" value="<?php echo $trainee['LastName']?>">
                            </p>
                            </div>
                            <div class="part-two">
                            <p>
                            <label for="">Gender</label><br>
                            <select name="genderd">
                                <?php
                                if($trainee['Gender']=="Male"){
                                    ?>
                                     <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                    <?php
                                }
                                else{
                                    ?>
                                <option value="Female">Female</option>
                                     <option value="Male">Male</option>
                                    <?php

                                }
                                ?>
                               
                            </select>
                            </p>
                            <p>
                            <label for="">Trade</label><br>
                            <select name="traded">
                                <?php
                                $trade=$trainee['Trade_Id'];
                            $tn=mysqli_fetch_array(mysqli_query($connect,"SELECT * from Trade where Trade_Id='$trade'"))['Trade_Name'];
                                ?>
                                <option value="<?php echo $trade;?>"><?php echo $tn;?></option>
                                <?php
                                $getTrades=mysqli_query($connect,"SELECT * from Trade where Trade_Id!='$trade'");
                                while($trades=mysqli_fetch_array($getTrades)){
                                    ?>
                                    <option value="<?php echo $trades['Trade_Id'];?>"><?php echo $trades['Trade_Name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </p>
                            </div>
                        </div>
                        <p>
                            <br>
                            <input type="submit" value="Update Now" name="updateTrainee">
                        </p>
                    </form>
                <?php
             }
             ?>
             </div>
                <div class="">
                    <hr>
                    <table>
                        <tr>
                            <th colspan="100"> Available Trainees In Our School
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Trainee Names</th>
                            <th>Gender</th>
                            <th>Trade</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $query="SELECT * from Trainees,Trade where Trainees.Trade_Id=Trade.Trade_id";
                        $getTrainees=mysqli_query($connect,$query);
                        if(mysqli_num_rows($getTrainees)==0){
                            ?>
                            <tr>
                                <th colspan="100">No Data Found</th>
                            </tr>
                            <?php
                        }
                        else{
                            $no=1;
                            while($trainees=mysqli_fetch_array($getTrainees)){
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $trainees['FirstNames'];?> <?php echo $trainees['LastName'];?></td>
                                    <td><?php echo $trainees['Gender']?></td>
                                    <td><?php echo $trainees['Trade_Name']?></td>
                                    <td>
                                        <a href="trainees.php?delete=<?php echo $trainees['Trainee_Id'];?>" onclick="return confirm('Are You Sure About Deleting <?php echo $trainees['FirstNames'];?>')">Delete</a>
                                        <a href="trainees.php?what=<?php echo $trainees['Trainee_Id']?>">Update</a>
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
</body>
</html>