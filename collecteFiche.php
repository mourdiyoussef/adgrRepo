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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Fiche de la collecte</title>

    <?php include_once('includes/scripts.php'); ?>
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
    <!-- Main bar -->
    <div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <h2 class="pull-left"><i class="icon-table"></i> Fiche collecte</h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="index.html"><i class="icon-home"></i> Home</a>
                <!-- Divider -->
                <span class="divider">/</span>
                <a href="#" class="bread-current">Dashboard</a>
            </div>

            <div class="clearfix"></div>

        </div>
        <!-- Page heading ends -->

        <!-- Matter -->

        <div class="matter">
            <div class="container">

                <!-- Table -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="widget">

                            <div class="widget-head">
                                <div class="pull-left">Statistiques</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget-content">

                                <div class="padd statement">
                                    <?php
                                    if(isset($_GET['idCollecte'])) {
                                    ?>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="well">
                                                <?php
                                                $ctrls = new DonneurController();
                                                $nbre = $ctrls->getNbreAllDonneurByCollecte($_GET['idCollecte']);
                                                ?>
                                                <h2><?php echo $nbre; ?></h2>
                                                <p>Nombre total de donneurs pour cette collecte
                                                </p>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">



                                        <div class="col-md-6">
                                            <div class="widget">
                                                <!-- Widget title -->
                                                <div class="widget-head">
                                                    <div class="pull-left">Donneur / Sexe</div>
                                                    <div class="widget-icons pull-right">

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="widget-content">
                                                    <!-- Widget content -->
<center>
     <div id="chartdiv" style="width: 450px; height: 200px;"></div>
     </center>

                                                    <div class="widget-foot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    <div class="col-md-6">
                                                        <div class="widget">
                                                            <!-- Widget title -->
                                                            <div class="widget-head">
                                                                <div class="pull-left">Donneur / Groupe</div>
                                                                <div class="widget-icons pull-right">

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="widget-content">
                                                                <!-- Widget content -->
<center>
       <div id="groupe" style="width: 450px; height: 200px;"></div>
</center>
                                                                <div class="widget-foot">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                                <!-- Widget content -->


                                                                <div class="widget-foot">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                    </div>
                                    <?php
                                    }
                                    else
                                        echo "<p align='center'> Selectionnez une Collecte</p>";
                                    ?>

                                </div>

                                </div>

                                <div class="widget-foot">

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        <div class="widget">

                            <div class="widget-head">
                                <div class="pull-left">
                                    Liste des participants
                                </div>
                                <div class="widget-icons pull-right">
                                    <input type="text">
                                    <img src='style/images/search.png'>
                                    <img src='style/images/print.png'>
                                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget-content">

                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>CIN</th>
                                        <th>Groupe</th>
                                        <th>Dernier don</th>
                                        <th>Prochain don</th>
                                        <th>Etat</th>
                                        <th>Téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $ctrl = new DonneurController();
                                    $list = $ctrl->getAllNegativeDonneurParticipantCollecte($_GET['idCollecte']);
                                    foreach($list as $d){
                                        echo " <tr>";
                                        echo "<td>".$d->getCodeAd()."</td>";
                                        echo "<td>".$d->getNom()."</td>";
                                        echo "<td>".$d->getPrenom()."</td>";
                                        echo "<td>".$d->getCin()."</td>";
                                        echo "<td>".$d->getGroupeSanguin()."</td>";
                                        echo "<td>".$d->getDernierDon()."</td>";
                                        echo "<td>".$d->getProchainDon()."</td>";
                                        echo "<td>".$d->getAptPourDon()."</td>";
                                        echo "<td>".$d->getTel()."</td>";
                                        echo "<td>
                                                                <a href='?action=supp&idDonneur=".$d->getIdDonneur()."' onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer'));\"><img src='style/images/delete.png'></a>
                                                                <a href='donneurModForm.php?idDonneur=".$d->getIdDonneur()."'><img src='style/images/edit.png'></a>
                                                                <a href='donneurFiche.php?idDonneur=".$d->getIdDonneur()."'><img src='style/images/detail.png'></a>
                                                                <a href='donAddForm.php?idDonneur=".$d->getIdDonneur()."'><img src='style/images/plus.png'></a>
                                                            </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <div class="widget-foot">


                                    <ul class="pagination pull-right">
                                        <li><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>
                    </div>


                    </div>

                </div>

            </div>
        </div>

        <!-- Matter ends -->

    <!-- Mainbar ends -->
    <div class="clearfix"></div>

</div>
<!-- Content ends -->

<?php include_once('includes/foot.php'); ?>
       <script src="js/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="js/amcharts/pie.js" type="text/javascript"></script>
   <?php

    $ctrl = new DonneurController();
    $homme = $ctrl->getAllDonneurHommeByCollecte($_GET['idCollecte']);
    $femme = $ctrl->getAllDonneurFemmeByCollecte($_GET['idCollecte']);

    ?>

        <script>
            var chart;
            var legend;
// data[0] = { label: "Homme", data: <?php echo $homme*100+1; ?> }
            var chartData = [
                {
                    "country": "Homme",
                    "value": <?php echo $homme; ?>
                },
                 {
                    "country": "femme",
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
                chart.write("sexe");
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
// data[0] = { label: "Homme", data: <?php echo $homme*100+1; ?> }
            var chartDataa = [
                {
                    "groupe": "Oneg",
                    "values": <?php echo $oneg; ?>
                },
				{
                    "groupe": "Aneg",
                    "values": <?php echo $aneg; ?>
                },
				{
                    "groupe": "Bneg",
                    "values": <?php echo $bneg; ?>
                },
				{
                    "groupe": "ABneg",
                    "values": <?php echo $abneg; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartDataa;
                chart.titleField = "groupe";
                chart.valueField = "values";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[values]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("groupe");
            });
        </script>
</body>
</html>