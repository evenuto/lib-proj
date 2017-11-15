<?php
require 'config.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Display Chart</title>
 
	<link rel="shortcut icon" href="assets/ico/favicon.png">

        <!-- load Google AJAX API -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
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
                dataTable.addRows([['Area 1',parseInt(totals[0])], ['Area 2',parseInt(totals[1])],['Area 3',parseInt(totals[2])]]);
 
                //instantiate our chart object
                var chart = new google.visualization.ColumnChart (document.getElementById('chart'));
		var secondChart = new google.visualization.PieChart (document.getElementById('chart2')); 		

                //define options for visualization
                var options = {width: 400, height: 240, is3D: true, title: 'Visit Stats by Area'};
 
                //draw our chart
                chart.draw(dataTable, options);
		secondChart.draw(dataTable, options);
 
            }
        </script>
 
    </head>
 
    <body>
 
        <!--Div for our chart -->
        <div id="chart"></div>
	<div id="chart2"></div>

 
    </body>
</html>