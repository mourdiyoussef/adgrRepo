<?php
include_once("includes/testSession.php");
include_once("modeles/donneur.php");
include_once("utils/switchDate.php");
include_once("dao/connectiondb.php");
include_once("dao/donneurdao.php");
include_once("metier/donneurcontroller.php");

if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['cin'])){

  /*---------------- Upload de la photo --------------------*/
  $target_dir = "photo_user/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $target_file = $target_dir . $_POST['cin'] .".". $imageFileType;
  $uploadOk = 1;
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  include_once("utils/UploadPhoto.php");
  /*---------------------- Fin de l'upload de la photo ------------------------*/
  $donneurCtrl = new DonneurController();
  if($donneurCtrl->ajouterDonneur($_POST['nom'],$_POST['prenom'],$_POST['codeAd'],$_POST['dateNai'],$_POST['dernierDon'],
      $_POST['adresse'],$_POST['fonction'],$_POST['etatMatri'],$_POST['nbrEnf'],$_POST['groupeS'],
      $_POST['mail'],$_POST['tel'],$_POST['cin'], $target_file, $_POST['aptPourDon'],$_POST['sexe'],
      $_POST['carte'],$_POST['remarque'])){
  }else{
    echo "<h1>oIo</h1>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Acceuil</title>
<link rel="stylesheet" href="js/amcharts/style.css" type="text/css">
        <script src="js/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="js/amcharts/pie.js" type="text/javascript"></script>
          <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/dataloader.min.js"></script>
  <?php include_once('includes/scripts.php'); ?>
  <script type="text/javascript">
    /**
     * Basic jQuery Validation Form Demo Code
     * Copyright Sam Deering 2012
     * Licence: http://www.jquery4u.com/license/
     */
    (function($,W,D)
    {
      var JQUERY4U = {};

      JQUERY4U.UTIL =
      {
        setupFormValidation: function()
        {
          //form validation rules
          $("#register-form").validate({
            rules: {
              nom: "required",
              prenom: "required",
              cin: "required",
              dateNai: {
                required: true,
                date: true
              },
              codeAd: "required",
              adresse: "required",
              fonction: "required",
              etatMatri: "required",
              nbrEnf: {
                required: true,
                digits: true
              },
              mail:  {
                required: true,
                email: true
              },

              tel: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength:10
              },
              dernierDon: {
                required: true,
                date: true
              }

            },
            messages: {
              nom: "Entrez le nom",
              prenom: "Entrez le prénom",
              cin: "Entrez la CIN",
              dateNai: {
                required: "Entrez la date de naissance de Donneur",
                date: "Entrez une date valide"
              },
              codeAd: "Entrez le code d'adherent",
              adresse: "Entrez l'adresse",
              fonction: "Entrez la fonction",
              etatMatri: "Entrez l'etat matrimonial",
              nbrEnf:{
                required: "Entrez le nombre d'enfant",
                digits: "N'entrez que des nombres "
              },
              mail:  {
                required: "Entrez l'email de Donneur",
                mail: "Entrez une adresse mail valide"
              },
              tel:{
                required: "Entrez le numero de téléphone",
                digits: "N'entrez que des chiffres ",
                minlength: "Le numero de téléphone doit contenir 10 chiffres ",
                maxlength: "Le numero de téléphone ne doit contenir que 10 chiffres "
              },
              dernierDon: {
                required: "Entrez la date de dernier don de Donneur",
                date: "Entrez une date valide"
              }
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
        }
      }

      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
      });

    })(jQuery, window, document);
  </script>
<?php
 $ctrl = new DonneurController();
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

</head>

<body>

<!--Baniere de recherche rapide et parametre de l'utilisateur -->
<?php include_once('includes/baniererecherche.php'); ?>

<!-- baniere principale contenant le logo -->
<?php include_once('includes/baniereprincipale.php'); ?>

<!-- Tableau obligatoire ! C'est lui qui contiendra le calendrier -->
<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
  <tr>
    <td id="ds_calclass"></td>
  </tr>
</table>
<!-- Fin du Tableau obligatoire -->


<!-- Main content starts -->
<div class="content">

  <!-- Menu gauche -->
  <?php
    include_once('includes/menugauche.php');
  ?>
  <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Tableau de bord</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="icon-home"></i> Acceuil</a> 
          <!-- Divider -->
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->

	    <!-- Matter -->
<div class="col-md-11">

              <!-- Widget -->
              <div class="widget">
                <!-- Widget head -->
                <div class="widget-head">
                  <div class="pull-left">Dashboard</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>              

                <!-- Widget content -->
                <div class="widget-content">
                  <div class="padd">

                    <!-- Curve chart (Blue color). jQuery Flot plugin used. -->
                    
<div id="chartEvoCollT" style="width: 100%; height: 350px;"></div>
                    <hr />
                    <!-- Hover location -->
- Orange: Nombre total de donneurs.  <br>
- Jaune: Nombre total de donneurs négatifs.
                    <!-- Skil this line. <div class="uni"><input id="enableTooltip" type="checkbox">Enable tooltip</div> -->

                  </div>
                  
                </div>
                <!-- Widget ends -->

              </div>
            </div>
<div class="col-md-6">

              <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Statistique par groupe</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <div id="chartNgroup" style="width: 100%; height: 250px;"></div>

                  </div>
                </div>

              </div>

            </div>
            <div class="col-md-6">

              <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Statistique par sexe</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">
<div id="charttotal" style="width: 100%; height: 250px;"></div>
                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
      

                  </div>
                </div>

              </div>

            </div>
		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<?php include_once('includes/foot.php'); ?>
 
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
      "parseDates": false
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