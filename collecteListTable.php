<?php
session_start();

include_once("modeles/donneur.php");
include_once("dao/donneurdao.php");
include_once("metier/donneurcontroller.php");

include_once("modeles/collecte.php");
include_once("utils/switchDate.php");
include_once("dao/connectiondb.php");
include_once("dao/collectedao.php");
include_once("metier/collectecontroller.php");

if(!empty($_GET['action']) and !empty($_GET['idCollecte'])){
    if($_GET['action']=='supp'){
        $dctrl = new CollecteController();
        $dctrl->deleteCollecte($_GET['idCollecte']);
        header("location:collecteListTable.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Nouvel adherant</title>

    <?php include_once('includes/scripts.php'); ?>

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
            <h2 class="pull-left"><i class="icon-table"></i> Liste des collectes</h2>

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
                                <div class="pull-left">Toutes les collectes</div>
                                <div class="widget-icons pull-right">
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
                                        <th>Date de la collecte</th>
                                        <th>Lieu de la collecte</th>
                                        <th>Type de la collecte</th>
                                        <th>Nombre de présence</th>
                                        <th>Total des dons</th>
                                        <th>Contre indiqués</th>
                                        <th>Donneurs -</th>
                                        <th>Donneurs +</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $ctrl = new CollecteController();
                                                $list = $ctrl->getAllCollecte();
                                                foreach($list as $d){
                                                    echo " <tr>";
                                                    echo "<td>".$d->getIdCollecte()."</td>";
                                                    echo "<td>".$d->getDateCollecte()."</td>";
                                                    echo "<td>".$d->getLieuCollecte()."</td>";
                                                    echo "<td>".$d->getTypeCollecte()."</td>";
                                                    echo "<td>".$d->getNbrPresence()."</td>";
                                                    echo "<td>".$d->getNbrDon()."</td>";
                                                    echo "<td>".$d->getNombreContreIndique()."</td>";
                                                    echo "<td>".$ctrl->getCountParticipant($d->getIdCollecte())."</td>";
                                                    echo "<td>".$d->getNombrePositif($ctrl->getCountParticipant($d->getIdCollecte()))."</td>";
                                                    echo "<td>
    <a href='?action=supp&idCollecte=".$d->getIdCollecte()."' onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer'));\"><img src='style/images/delete.png'></a>
                                                                <a href='collecteModForm.php?idCollecte=".$d->getIdCollecte()."'><img src='style/images/edit.png'></a>
                                                                <a href='collecteFiche.php?idCollecte=".$d->getIdCollecte()."'><img src='style/images/detail.png'></a>
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

        <!-- Matter ends -->

    <!-- Mainbar ends -->
    <div class="clearfix"></div>

</div>
<!-- Content ends -->

<?php include_once('includes/foot.php'); ?>
</body>
</html>