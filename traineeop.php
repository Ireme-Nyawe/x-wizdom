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
if(isset($_POST['updateTrainee'])){
    $id=$_GET['what'];
    $fname=$_POST['fnamed'];
    $lname=$_POST['lnamed'];
    $gender=$_POST['genderd'];
    $trade=$_POST['traded'];

    $query="UPDATE Trainees set FirstNames='$fname',LastName='$lname',Gender='$gender',Trade_Id='$trade' where Trainee_Id='$id'";
    $execute=mysqli_query($connect,$query);
    if($execute){
        header("location:trainees.php");
    }
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE from Trainees where Trainee_Id='$id'";
    $execute=mysqli_query($connect,$delete);
    if($delete){
        header("location:trainees.php");
    }
}
?>