<?php
require 'config.php';

date_default_timezone_set("America/New_York");
$date = date("H:i:s");
$a1 = $_POST['area1'];
$a2 = $_POST['area2'];
$a3 = $_POST['area3'];


$sql = "INSERT INTO Visit(Time, Area_1, Area_2, Area_3)
	VALUES('$date', '$a1', '$a2', '$a3')";

if (mysqli_query($conn, $sql)) {
    header("Location: home.htm");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 

mysqli_close($conn);
?>