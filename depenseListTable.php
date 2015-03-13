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

if(!empty($_GET['action']) and !empty($_GET['idDepense'])){
    if($_GET['action']=='supp'){
        $dctrl = new DepenseController();
        $dctrl->deleteDepense($_GET['idDepense']);
        header("location:depenseListTable.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Liste des contacts</title>

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
            <h2 class="pull-left"><i class="icon-table"></i> Répértoire</h2>

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
                                <div class="pull-left">Liste des dépenses</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal" role="form" method="post" novalidate="novalidate" id="register-form">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Collecte du</label>
                                        <div class="col-lg-8">
                                            <table><tr><td width="250px">
                                            <select class="form-control" name="idCollecte">
                                                <?php
                                                $collecteCtrl = new CollecteController();
                                                $listCollecte = $collecteCtrl->getAllCollecte();
                                                foreach($listCollecte as $c){
                                                    echo "<option value=".$c->getIdCollecte().">".$c->getDateCollecte()."</option>";
                                                }
                                                ?>
                                            </select></td><td><button type="submit" class="btn btn-primary">Valider</button></td></tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-9">

                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>

                        <div class="widget">

                            <div class="widget-head">
                                <div class="pull-left">Liste des dépenses</div>
                                <div class="widget-icons pull-right">
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
                                        <th>Categorie</th>
                                        <th>Montant</th>
                                        <th>Remarques</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                if(isset($_POST['idCollecte']))
                                                {
                                                $ctrl = new DepenseController();
                                                $total=0;
                                                if($list = $ctrl->getDepenseByCollecte($_POST['idCollecte'])) {
                                                    foreach ($list as $d) {
                                                        echo " <tr>";
                                                        echo "<td>" . $d->getIdDepense() . "</td>";
                                                        echo "<td>" . $d->getCategory() . "</td>";
                                                        echo "<td>" . $d->getMontant() . "</td>";
                                                        echo "<td>" . $d->getRemarque() . "</td>";
                                                        echo "<td>
                                                                <a href='?action=supp&idDepense=" . $d->getIdDepense() . "' onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer'));\">Supprimer</a> |
                                                                <a href='depenseModForm.php?idDepense=" . $d->getIdDepense() . "'>Modifier</a>
                                                            </td>";
                                                        echo "</tr>";
                                                        $total += $d->getMontant();
                                                    }
                                                }
                                            else{
                                                echo"<tr><td colspan='5' align='center'>Pas de dépense pour cette collecte</td></tr>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                                    <hr />
                                <p align="center">
                                <strong>Total des dépenses: <?php echo $total; ?></strong>
                                </p>
                                <?php  }
                                else {
                                ?>
                                <tr><td colspan="5" align="center">Veuillez selectionner une collecte</td></tr>
                                </tbody>
                                </table>
                                <?php } ?>
                                <div class="widget-foot">

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