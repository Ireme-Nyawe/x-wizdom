<?php
include "components/php/connection.php";
if(isset($_POST['register'])){
    $usn=$_POST['username'];
    $ps=$_POST['password'];
    $ps2=$_POST['password2'];
    
    $query="SELECT * from User ";
    $check=mysqli_query($connect,$query);
    if(mysqli_num_rows($check)){
        ?>
        <br>
        <span class="warning">User Registerd Already, Contact System Admin For Support!</span>
        <?php
    }
    else{
        if($ps!=$ps2){
            ?>
            <br>
            <span class="warning">User Password Do Not Match, Retry !</span>
            <?php
        }
        else{
            $query="INSERT into User(UserName,Password) values('$usn','$ps')";
            $register=mysqli_query($connect,$query);
            if($register){
                ?>
                <br>
                <span class="success">User Account Created. Move Login</span>
                <?php
            }
        }
    }

}
?>