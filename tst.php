<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>amCharts tutorial: Loading external data</title>
  <script src="js/amcharts/amcharts.js"></script>
  <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/dataloader.min.js"></script>
</head>
<body>
  <div id="chartdiv" style="width: 100%; height: 500px;"></div>
  <script>
  var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "dataLoader": {
      "url": "data.php"
    },
    
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

