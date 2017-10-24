<?php
require 'config.php';
session_start();


if(isset($_POST['login'])) {

   $user = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $query="SELECT * FROM Staff WHERE UserName='".$username."' AND  Password = '".$password."'";
    
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0) {
        header("Location: entry.htm");
    } else {
        echo "Error:  " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);
?>
