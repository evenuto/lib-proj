<?php
require 'config.php';

$NPid = $_POST['id'];
$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$sql = "INSERT INTO Staff(ID, UserName, Password, Email)
	VALUES('$NPid', '$user', '$pass', '$email')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.html");
} else {
    echo "Error:  " . $sql . "<br>" . mysqli_error($conn);
} 

mysqli_close($conn);
?>