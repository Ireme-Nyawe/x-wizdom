<?php
if(isset($_POST['addTrainee'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $trade=$_POST['trade'];
  
  if($gender==""){
    echo $gender;
    ?>
    <span class="warning">Fill Out All Fields!</span>
    <?php
  }
  else if($trade==""){
    echo $gender;
    ?>
    <span class="warning">Fill Out All Fields!</span>
    <?php
  }
  else{
    $query="INSERT into Trainees values(null,'$fname','$lname','$gender','$trade')";
    $execute=mysqli_query($connect,$query);
    if($execute){
        header("location:trainees.php");
    }
  }
}
?>