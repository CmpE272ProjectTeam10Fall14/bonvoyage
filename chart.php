
<?php
//require('conn.php');
$current_user_id =  $_SESSION['user'][0];
?>
<?php
//$new = mysql_query("select board_id,sum(cost) as Cost from pin where user_id=$current_user_id group by board_id");
//$query=mysql_query("select * from pin where user_id=$current_user_id");

	?>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization','1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Board');
        data.addColumn('number', 'Cost');
        data.addRows([
		
		<?php

$query=mysql_query("select board_id, sum(cost) as Cost from pin where user_id=$current_user_id group by board_id");
		while ($row = mysql_fetch_array($query)) {
		$board_id=$row['board_id'];
		$new=mysql_query("select board_name from board where board_id=$board_id");
		$row1 = mysql_fetch_array($new);
		
		?>
 ['<?php echo $row1['board_name']?>',  <?php echo $row['Cost']?>],
 <?php } ?>
        ]);

        // Set chart options
        var options = {'title':'Cost Visualization',
						is3D: true,
                       'width':500,
                       'height':500,
                        'backgroundColor': "transparent"
                        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
 


    <!--Div that will hold the pie chart-->
	<CENTER>
    <div id="chart_div"></div>
	
	

