<?php
if(isset($_POST['addTrade'])){
    $name=$_POST['tradeName'];
    $check=mysqli_query($connect,"SELECT * from Trade where Trade_Name='$name'");
    if(mysqli_num_rows($check)){
        ?>
        <br>
        <span class="warning">Trade Already Exist, Try Add Another!</span>
        <br>
        <?php
    }
    else{
        $query="INSERT into Trade value(null,'$name')";
        $execute=mysqli_query($connect,$query);
        if($execute){
            header("location:home.php");
        }
    }
}
if(isset($_POST['updateNow'])){
    $id=$_GET['what'];
    $name=$_POST['tradeNameupdt'];
    $check=mysqli_query($connect,"SELECT * from Trade where Trade_Name='$name' and Trade_Id!='$id'");
    if(mysqli_num_rows($check)){
        ?>
        <br>
        <span class="warning">Trade Already Exist, Try Another Name!</span>
        <br>
        <?php
    }
    else{
        $query="UPDATE Trade set Trade_Name='$name' where Trade_Id='$id'";
        $execute=mysqli_query($connect,$query);
        if($execute){
            header("location:home.php");
        }
    }
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $query="DELETE from Trade where Trade_Id='$id'";
    $execute=mysqli_query($connect,$query);
    if($execute){
        header("home.php");
    }
}
?>