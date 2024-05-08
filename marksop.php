<?php
if(isset($_POST['addMark'])){
    $progress="move";
    $module=$_POST['moduleName'];
    $trade=$_POST['trade'];
    if($module==""){
        header("location:marks.php");
    }
    else if($trade==""){
        header("location:marks.php");
    }
}
if(isset($_POST['saveMarks'])){
    $module=$_POST['mdn'];
    $trade=$_POST['td'];
    $check="SELECT * from Marks where Trade_Id='$trade' and Module_Name='$module'";
    $execute=mysqli_query($connect,$check);
    $update=0;
    if(mysqli_num_rows($execute)==0){
        $query="INSERT into Marks (Trainee_Id,Trade_Id,Module_Name) SELECT Trainee_Id,'$trade','$module' from Trainees where Trade_Id ='$trade'";
        $execute=mysqli_query($connect,$query);
    }
    $getTrainees="SELECT * from Trainees where Trade_Id='$trade'";
    $run=mysqli_query($connect,$getTrainees);
    while($trainees=mysqli_fetch_array($run)){
        $id=$trainees['Trainee_Id'];
        $key1="f".$id;
        $key2="s".$id;
        $fa=$_POST[$key1];
        $sa=$_POST[$key2];

        $query="UPDATE Marks set Formative_Assessment='$fa',
        Summative_Assessment='$sa',Total_Marks=(Formative_Assessment+Summative_Assessment)
        where Trainee_Id='$id' and Module_Name='$module'";

        $execute=mysqli_query($connect,$query);
    }
    header("loction:marks.php");
}
?>
