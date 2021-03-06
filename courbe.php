<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/serial.js" type="text/javascript"></script>
         <?php

    //$ctrl = new CollecteController();
   // $nbre = $ctrl->getCountParticipantTotal();
   // $femme = $ctrl->getAllDonneurFemmeByCollecte($_GET['idCollecte']);

    ?>

        </script>

        <script>
            // since v3, chart can accept data in JSON format
            // if your category axis parses dates, you should only
            // set date format of your data (dataDateFormat property of AmSerialChart)
            var lineChartData = [
                <?php
				for($i=0;$i<5;$i++)
				{
					?>
					{
                    "date": "2009-10-02",
                    "value": <?php echo $i;?>
					<?php if($i==4)
					echo "}";
					else
					echo "},";
					
					?>
					
                    
				<?php
				}
				?>
				
				
            ];

            AmCharts.ready(function () {
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = lineChartData;

                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginRight = 0;
                chart.marginLeft = 0;
                chart.marginBottom = 0;
                chart.marginTop = 0;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.inside = true;
                categoryAxis.gridAlpha = 0;
                categoryAxis.tickLength = 0;
                categoryAxis.axisAlpha = 0;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.dashLength = 4;
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "line";
                graph.valueField = "value";
                graph.lineColor = "#D8E63C";
                graph.customBullet = "images/star.png"; // bullet for all data points
                graph.bulletSize = 14; // bullet image should be a rectangle (width = height)
                graph.customBulletField = "customBullet"; // this will make the graph to display custom bullet (red star)
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.addChartCursor(chartCursor);

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>

    <body>
        <div id="chartdiv" style="width:100%; height:400px;"></div>
    </body>

</html>