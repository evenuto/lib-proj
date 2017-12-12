<?php
require 'config.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Display Chart</title>
 
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Display Chart</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

	 <link rel="shortcut icon" href="assets/ico/favicon.png">


        <!-- load Google AJAX API -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
		
		<!-- These charts show sum of all entries in Visit table for each floor -->
		
            //load the Google Visualization API and the chart
            google.load('visualization', '1', {'packages':['columnchart','piechart']});
 
            //set callback
            google.setOnLoadCallback (createChart);
 
            //callback function
            function createChart() {
 
                //create data table object
                var dataTable = new google.visualization.DataTable();
 
                //define columns
	      dataTable.addColumn('string','Area');
                dataTable.addColumn('number', 'Totals');
 
	      <?php 
                $sql = "SELECT SUM(Area_1), SUM(Area_2), SUM(Area_3) FROM Visit";
                $result = $conn->query($sql);
	      $row = $result->fetch_array();
                ?>

	      var totals = <?php echo json_encode($row) ?>;
	      
                //define rows of data
                dataTable.addRows([['Main Floor',parseInt(totals[0])], ['Concourse',parseInt(totals[1])],['Ground Floor',parseInt(totals[2])]]);
 
                //instantiate our chart object
                var chart = new google.visualization.ColumnChart (document.getElementById('chart'));
		var secondChart = new google.visualization.PieChart (document.getElementById('chart2')); 		

                //define options for visualization
                var options = {width: 400, height: 240, is3D: true};
 
                //draw our chart
                chart.draw(dataTable, options);
		secondChart.draw(dataTable, options);
 
            }
        </script>
 
    </head>
 
    <body>
 
	<h2>Cumulative Visit Stats for Today</h2>
        <!--Div for charts -->
        <div id="chart"></div>
	<div id="chart2"></div>
	<div>
   	  <a href="home.htm" class="btn btn-lg active" role="button" >Return to previous page</a>
	</div>

    </body>
</html>