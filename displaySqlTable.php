
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Data Table Display</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">    </head>
     <link rel="shortcut icon" href="assets/ico/favicon.png">
<style>
body {
  padding-top: 20px;
  padding-left: 30px;
}

table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
  require 'config.php';

  $sql = "SELECT * FROM Visit";
  $result = $conn->query($sql);

  echo date("Y-m-d h:i:s");

  if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>Time</th>
	<th>Area 1</th>
	<th>Area 2</th>
	<th>Area 3</th>
	</tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Time"].
	     "</td><td>".$row["Area_1"].
	     "</td><td>".$row["Area_2"].
	     "</td><td>".$row["Area_3"].
	     "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<div>
   <a href="home.htm" class="btn btn-primary btn-lg active" role="button" >Back</a>
</div>

</body>
</html>
