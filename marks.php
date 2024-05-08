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
            <h2><u>MAR</u>KS</h2>
             <br>
             <div class="">
             
                <form action="" method="post">
                        <h3>Record Trainees Marks Here</h3>
                        <br>
                        <?php
                        ?>
                        <br>
                        <?php
                    $progress="start";
                    include "marksop.php";
                    if($progress=="start"){
                        ?>
                        <p>
                            <label for="">Module Name</label><br>
                            <input type="text" name="moduleName" placeholder="Type...">
                            </p>
                            <p>
                            <label for="">Trade</label><br>
                            <select name="trade">
                                <option value="">Select trainees Trade</option>
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
                        <p>
                            <br>
                            <input type="submit" value="Add Now" name="addMark">
                        </p>
                        <?php
                    }
                    else{
                        ?>
                        <form action="">
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Names</th>
                                <th>F.A</th>
                                <th>S.A</th>
                            </tr>
                            <?php
                            $query="SELECT * from Trainees where Trade_Id='$trade'";
                            $execute=mysqli_query($connect,$query);
                            if(mysqli_num_rows($execute)==0){
                                ?>
                                <tr>
                                    <th colspan="100">No Data Found</th>
                                </tr>
                                <?php
                            }
                            else{
                                $no=1;
                                while($trainees=mysqli_fetch_array($execute)){
                                    $tid=$trainees['Trainee_Id'];
                                    $getMarks="SELECT * from Marks where Trainee_Id='$tid' and Module_Name='$module'";
                                    $check=mysqli_query($connect,$getMarks);
                                    $rows=mysqli_num_rows($check);
                                    $tm=mysqli_fetch_array($check);
                                    $fa=0;
                                    $sa=0;
                                    if($rows)
                                    {
                                         $fa=$tm['Formative_Assessment'];
                                         $sa=$tm['Summative_Assessment'];

                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $trainees['FirstNames']?> <?php echo $trainees['LastName']?></td>
                                        <th>
                                            <input type="text" value="<?php echo $fa;?>" name="<?php echo 'f'.$trainees['Trainee_Id'];?>">
                                        </th>
                                        <th>
                                            <input type="text" value="<?php  echo $sa;?>" name="<?php echo 's'.$trainees['Trainee_Id'];?>">
                                        </th>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            }
                            ?>
                            <tr>
                                <input type="hidden" name="mdn" value="<?php echo $module;?>">
                                <input type="hidden" name="td" value="<?php echo $trade;?>">
                                <th colspan="100"><input type="submit" name="saveMarks" value="Save Marks"></th>
                            </tr>
                        </table>
                    </form>
                        <?php
                    }
                    ?>
                    </form>
                    <div>
               
    </div>
</body>
</html>