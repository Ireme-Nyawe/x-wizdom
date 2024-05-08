<?php
if(isset($_POST['viewReport']) && $_POST['trade']){
    $tradi=$_POST['trade'];
    $getTrade=mysqli_query($connect,"SELECT * from Trade where Trade_Id='$tradi'");
      $trade=mysqli_fetch_array($getTrade);
      $tn=$trade['Trade_Name'];

      ?>
      <table>
        <tr>
        <td colspan="100"><?php echo $tn;?></td>
        </tr>
                        <tr>
                            <th>#</th>
                            <th>Trainee</th>
                            <?php
                            $getModules="SELECT * from Marks where Trade_Id='$tradi' group by Module_Name";
                            $executeModules=mysqli_query($connect,$getModules);
                            if(mysqli_num_rows($executeModules)==0){

                            }
                            else{
                                while($modules=mysqli_fetch_array($executeModules)){
                                    ?>
                                    <th colspan="3"><?php echo $modules['Module_Name'];?></th>
                                    <?php
                                }
                            }
                            ?>
                            <th>Average</th>
                        </tr>
                        <?php
                        $queryTrainees="SELECT * from Trainees where Trade_Id='$tradi'";
                        $executeTrainees=mysqli_query($connect,$queryTrainees);
                        if(mysqli_num_rows($executeTrainees)==0){
                            ?>
                            <tr>
                                <th colspan="100">No Trainees Found .</th>
                            </tr>
                            <?php
                        }
                        else{
                            $no=1;
                            while($trainees=mysqli_fetch_array($executeTrainees)){
                                $trainee_Id=$trainees['Trainee_Id'];
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $trainees['FirstNames']." ".$trainees['LastName']?></td>
                                <?php
                                $getModules="SELECT * from Marks where Trade_Id='$tradi' group by Module_Name";
                                $executeModules=mysqli_query($connect,$getModules);
                                if(mysqli_num_rows($executeModules)!=0){
                                    $allTot=0;
                                    $moduleCount=0;
                                    $grade="NYC";
                                    while($modules=mysqli_fetch_array($executeModules)){
                                        $mdn=$modules['Module_Name'];
                                        $getMarks="SELECT * from Marks where Trainee_Id='$trainee_Id' and Module_Name='$mdn'";
                                        $details=mysqli_fetch_array(mysqli_query($connect,$getMarks));
                                        $fa=$details['Formative_Assessment'];
                                        $sa=$details['Summative_Assessment'];
                                        $tm=$details['Total_Marks'];
                                        ?>
                                        <td><?php echo $fa;?></td>
                                        <td><?php echo $sa;?></td>
                                        <td><?php echo $tm;?></td>
                                        <?php
                                        $allTot+=$tm;
                                        $moduleCount++;
                                    }
                                    $averge=ceil($allTot/$moduleCount);
                                    if($averge>69.9){
                                        $grade="C";
                                    }
                                    ?>
                                    <th><?php echo $averge;?></th>
                                    <th><?php echo $grade?></th>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td>No Module Found .</td>
                                    <?php
                                }
                                ?>
                                </tr>
                                <?php
                                $no++;
                            }
                        }
                        ?>
                    </table>
      <?php
}
else{
    ?>
    <p class="warning"> Show Trade To Report On .</p>
    <?php
}
?>