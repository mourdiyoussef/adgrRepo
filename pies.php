<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
session_start();
include_once("modeles/collecte.php");
include_once("modeles/notification.php");
include_once("modeles/donneur.php");
include_once("modeles/user.php");
include_once("utils/switchDate.php");
include_once("dao/connectiondb.php");
include_once("dao/collectedao.php");
include_once("dao/donneurdao.php");
include_once("dao/userdao.php");
include_once("dao/notificationdao.php");
include_once("metier/collectecontroller.php");
include_once("metier/notificationcontroller.php");
include_once("metier/donneurcontroller.php");
include_once("modeles/collecte.php");
include_once("modeles/categorie.php");
include_once("modeles/donneur.php");
include_once("dao/connectiondb.php");
include_once("dao/collectedao.php");
include_once("dao/donneurdao.php");
include_once("dao/userdao.php");
include_once("dao/categoriedao.php");
include_once("metier/collectecontroller.php");
include_once("metier/categoriecontroller.php");
include_once("metier/donneurcontroller.php");

include_once("modeles/depense.php");
include_once("dao/connectiondb.php");
include_once("dao/depensedao.php");
include_once("metier/depensecontroller.php");
?>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="js/amcharts/style.css" type="text/css">
        <script src="js/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="js/amcharts/pie.js" type="text/javascript"></script>
          <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/dataloader.min.js"></script>
   <?php

    $ctrl = new DonneurController();
    $homme = $ctrl->getAllDonneurHommeByCollecte($_GET['idCollecte']);
    $femme = $ctrl->getAllDonneurFemmeByCollecte($_GET['idCollecte']);

    ?>
        <script>
            var chart;
            var legend;

            var chartData = [
                {
                    "country": "Homme",
                    "value": <?php echo $homme; ?>
                },
                 {
                    "country": "Femme",
                    "value": <?php echo $femme; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
		 <?php

    $ctrl = new DonneurController();
     $oneg = $ctrl->getAllDonneurGroupOnegByCollecte($_GET['idCollecte']);
    $aneg = $ctrl->getAllDonneurGroupAnegByCollecte($_GET['idCollecte']);
    $bneg = $ctrl->getAllDonneurGroupBnegByCollecte($_GET['idCollecte']);
    $abneg = $ctrl->getAllDonneurGroupABnegByCollecte($_GET['idCollecte']);


    ?>
        <script>
            var chart;
            var legend;

            var chartData = [
                {
                    "country": "O-",
                    "value": <?php echo $oneg; ?>
                },
				{
                    "country": "A-",
                    "value": <?php echo $aneg; ?>
                },
				{
                    "country": "B-",
                    "value": <?php echo $bneg; ?>
                },
                 {
                    "country": "AB-",
                    "value": <?php echo $abneg; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("groupeparcollecte");
            });
        </script>
        <?php

    $Thomme = $ctrl->getAllDonneurHomme();
    $Tfemme = $ctrl->getAllDonneurFemme();

    ?>   
       
                <script>
            var chart;
            var legend;

            var chartTotal = [
                {
                    "sexe": "Homme",
                    "value": <?php echo $Thomme; ?>
                },
                 {
                    "sexe": "Femme",
                    "value": <?php echo $Tfemme; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartTotal;
                chart.titleField = "sexe";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("charttotal");
            });
        </script>
                <?php

    $AP = $ctrl->getNbreDonneurByGroup("A+");
    $BP = $ctrl->getNbreDonneurByGroup("B+");
    $ABP = $ctrl->getNbreDonneurByGroup("AB+");
    $OP = $ctrl->getNbreDonneurByGroup("O+");
    ?>   
       
                <script>
            var chart;
            var legend;

            var chartPGroup = [
                {
                    "group": "A+",
                    "value": <?php echo $AP; ?>
                },
				
				{
                    "group": "B+",
                    "value": <?php echo $BP; ?>
                },
				
				{
                    "group": "AB+",
                    "value": <?php echo $ABP; ?>
                },
				
				{
                    "group": "O+",
                    "value": <?php echo $OP; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartPGroup;
                chart.titleField = "group";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartPgroup");
            });
        </script>
                <?php

    
    $AN = $ctrl->getNbreDonneurByGroup("A-");
    $BN = $ctrl->getNbreDonneurByGroup("B-");
    $ABN = $ctrl->getNbreDonneurByGroup("AB-");
    $ON = $ctrl->getNbreDonneurByGroup("O-");	
    ?>   
                    <script>
            var chart;
            var legend;

            var chartNGroup = [
             
				{
                    "group": "A-",
                    "value": <?php echo $AN; ?>
                },
				{
                    "group": "B-",
                    "value": <?php echo $BN; ?>
                },
				{
                    "group": "AB-",
                    "value": <?php echo $ABN; ?>
                },
				{
                    "group": "O-",
                    "value": <?php echo $ON; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartNGroup;
                chart.titleField = "group";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartNgroup");
            });
        </script>   
                <script>
            var chart;
            var legend;

            var chartTGroup = [
                {
                    "group": "A+",
                    "value": <?php echo $AP; ?>
                },
				{
                    "group": "A-",
                    "value": <?php echo $AN; ?>
                },
				{
                    "group": "B+",
                    "value": <?php echo $BP; ?>
                },
				{
                    "group": "B-",
                    "value": <?php echo $BN; ?>
                },
				{
                    "group": "AB+",
                    "value": <?php echo $ABP; ?>
                },
				{
                    "group": "AB-",
                    "value": <?php echo $ABN; ?>
                },
				{
                    "group": "O+",
                    "value": <?php echo $OP; ?>
                },
				{
                    "group": "O-",
                    "value": <?php echo $ON; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartTGroup;
                chart.titleField = "group";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartTgroup");
            });
        </script>
        


    </head>

    <body>
	 <br>
        <div id="groupeparcollecte" style="width: 100%; height: 400px;"></div>
         
        <br>
        <div id="charttotal" style="width: 100%; height: 400px;"></div>
        <br>
        <div id="chartTgroup" style="width: 100%; height: 400px;"></div>
         <br>
        <div id="chartPgroup" style="width: 100%; height: 400px;"></div>
         <br>
        <div id="chartNgroup" style="width: 100%; height: 400px;"></div>
         <br>
        <div id="chartEvoCollT" style="width: 100%; height: 500px;"></div>
             <script>
  var chart = AmCharts.makeChart( "chartEvoCollT", {
    "type": "serial",
    "dataLoader": {
      "url": "data.php"
    },
    "pathToImages": "http://www.amcharts.com/lib/images/",
    "categoryField": "category",
    "dataDateFormat": "YYYY-MM-DD",
    "startDuration": 1,
    "categoryAxis": {
      "parseDates": true
    },
    "graphs": [ {
      "valueField": "value1",
      "bullet": "round",
      "bulletBorderColor": "#FFFFFF",
      "bulletBorderThickness": 2,
      "lineThickness ": 2,
      "lineAlpha": 0.5
    }, {
      "valueField": "value2",
      "bullet": "round",
      "bulletBorderColor": "#FFFFFF",
      "bulletBorderThickness": 2,
      "lineThickness ": 2,
      "lineAlpha": 0.5
    } ]
  } );
  </script>
    </body>

</html>