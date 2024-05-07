<?php
session_start();
include "components/php/connection.php";
if(isset($_POST['login'])){
    $usn=$_POST['username'];
    $ps=$_POST['password'];
    $check="SELECT * from User where UserName='$usn'";
    $execute=mysqli_query($connect,$check);
    if(mysqli_num_rows($execute)==0){
        ?>
        <br>
        <span class="warning">Invalid User!</span>
        <?php
    }
    else{
        $check="SELECT * from User where UserName='$usn' and Password='$ps'";
        $execute=mysqli_query($connect,$check);
        if(mysqli_num_rows($execute)==0){
            ?>
            <br>
            <span class="warning">Invalid User Password!</span>
            <?php
        }
        else{
            $user_info=mysqli_fetch_array($execute);
            $user=$user_info['User_Id'];
            $_SESSION['user']=$user;
            header("location:home.php");
        }
    }

}
?>