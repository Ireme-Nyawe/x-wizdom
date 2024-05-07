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
             <form action="" method="post">
                        <h3>Add New Trainee Here</h3>
                        <?php
                        // include "traineeop.php";
                        ?>
                        <br>
                        <div class="two-part">
                            <div class="part-one">
                            <p>
                            <label for="">First Name</label><br>
                            <input type="text" name="tradeName" placeholder="Type --">
                            </p>
                            <p>
                            <label for="">Last Name</label><br>
                            <input type="text" name="tradeName" placeholder="Type --">
                            </p>
                            </div>
                            <div class="part-two">
                            <p>
                            <label for="">Gender</label><br>
                            <input type="text" name="tradeName" placeholder="Type --">
                            </p>
                            <p>
                            <label for="">Trade</label><br>
                            <input type="text" name="tradeName" placeholder="Type --">
                            </p>
                            </div>
                        </div>
                        <p>
                            <br>
                            <input type="submit" value="Add Now" name="addTrade">
                        </p>
                    </form>
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
                                        <a href="home.php?delete=<?php echo $trainees['Trade_Id'];?>" onclick="return confirm('Are You Sure About Deleting <?php echo $trainees['Trade_Name'];?>')">Delete</a>
                                        <a href="home.php?what=<?php echo $trainees['Trade_Id']?>">Update</a>
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