
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Table Display</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

	 <link rel="shortcut icon" href="assets/ico/favicon.png">
<style>
body {
  padding-top: 20px;
  padding-left: 30px;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    color: black;
}
</style>
</head>
<body>
<div>
   <h2>Today's Visit Statistics</h2>
   <p>Date/Time: <span id="datetime"></span></p>
</div>

<a href="home.htm" class="btn btn-lg active" role="button" >Return to previous page</a>

<?php
  require 'config.php';

  $sql = "SELECT * FROM Visit";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>Time</th>
	<th>Main Floor</th>
	<th>Concourse</th>
	<th>Ground Floor</th>
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

<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
</script>

</body>
</html>
