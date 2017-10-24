
<?php
require 'config.php';

   $user = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $query = mysqli_query($conn, "SELECT * FROM `Staff` WHERE `UserName` = '$user' AND `Password` = '$pass'") 
	or die (mysqli_error()); 

   if(!mysqli_num_rows($query))
	echo "No results found.";
   else {
	header("Location: entry.htm");

   }    
   
   mysqli_close($conn);

?>
