<?php
include_once("includes/testSession.php");

include_once("modeles/donneur.php");
include_once("modeles/don.php");
include_once("utils/switchDate.php");
include_once("dao/connectiondb.php");
include_once("dao/donneurdao.php");
include_once("metier/donneurcontroller.php");
include_once("dao/dondao.php");
include_once("metier/doncontroller.php");
include_once("dao/collectedao.php");
include_once("metier/collectecontroller.php");
if(!empty($_GET['idDonneur'])/* and !empty($_GET['action']) and $_GET['action']=="fiche"*/){
    $donneurCtrl = new DonneurController();
    $donneur = $donneurCtrl->getDonneurById($_GET['idDonneur']);
    $donCtrl = new DonController();
    $listDon = $donCtrl->getAllDonByUserId($donneur->getIdDonneur());
    $collectCtrl = new CollecteController();
}
if(!empty($_GET['idDonneur']) and !empty($_GET['idDon']) and !empty($_GET['action']) and $_GET['action']=="supp"){
   /* $donneurCtrl = new DonneurController();
    $donneur = $donneurCtrl->getDonneurById($_GET['idDonneur']);
    $listDon = $donCtrl->getAllDonByUserId($donneur->getIdDonneur());
    $collectCtrl = new CollecteController();*/
    $donCtrl = new DonController();
    $donCtrl->deleteDon($_GET['idDon']);
    header("location:?idDonneur=".$_GET['idDonneur']."");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Fiche adhérant</title>

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
            <h2 class="pull-left"><i class="icon-table"></i> Fiche d'informations</h2>

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
                                <div class="pull-left">Code d'adhésion : <?php echo $donneur->getCodeAd(); ?></div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget-content">
                                <div class="padd invoice">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <img src="<?php echo $donneur->getPhoto(); ?>" width="100%" height="100%"><br>
                                            <a href="#" >Modifier l'image</a>
                                        </div>

                                        <div class="col-md-4">
                                            <h2>Information personnel</h2>
                                            <h4>Nom : <?php echo $donneur->getNom(); ?></h4>
                                            <h4>Prénom : <?php echo $donneur->getPrenom(); ?></h4>
                                            <h4>Groupe sanguin : <?php echo $donneur->getGroupeSanguin(); ?></h4>
                                            <h4>Date d'inscription : <?php echo $donneur->getDateInscription(); ?></h4>
                                            <h4>CIN : <?php echo $donneur->getCin(); ?></h4>
                                            <h4>Date du prochain don : <?php echo "Prochain don"; ?></h4>
                                            <hr />
                                            <h4>Date de naissance : <?php echo $donneur->getDateNaissance(); ?></h4>
                                            <h4>Sexe : <?php echo $donneur->getSexe(); ?></h4>
                                            <h4>Fonction : <?php echo $donneur->getFonction(); ?></h4>
                                            <h4>Adresse : <?php echo $donneur->getAdresse(); ?></h4>
                                            <h4>Etat matrimonial : <?php echo $donneur->getEtatMatrimonial(); ?></h4>
                                            <h4>Nombre d'enfant : <?php echo $donneur->getNombreEnfant(); ?></h4>
                                            <hr />
                                            <h4>Login du système : <?php echo $donneur->getLogin(); ?></h4>
                                            <h4>Mail : <?php echo $donneur->getMail(); ?></h4>
                                            <h4>Téléphone : <?php echo $donneur->getTel(); ?></h4>
                                            <h4>Carte d'adhésion : <?php echo $donneur->getEtatCArte(); ?></h4>
                                            <h4>Possibilité de don : <?php echo $donneur->getAptPourDon(); ?></h4>
                                            <h4>Remarques : <?php echo $donneur->getRemarques(); ?></h4>
                                        </div>

                                        <div class="col-md-4">
                                            <h2>Liste des dons</h2>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Lieu</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach($listDon as $d){
                                                    echo " <tr>";
                                                    echo "<td>".$d->getIdDon()."</td>";
                                                    echo "<td>".$d->getIdCollecte()."</td>";
                                                    echo "<td>".$d->getIdDonneur()."</td>";
                                                    echo "<td>
                                                                <a href='?action=supp&idDon=".$d->getIdDon()."&idDonneur=".$donneur->getIdDonneur()."'>Supprimer</a> |
                                                                <a href='donModForm.php?idDon=".$d->getIdDon()."'>Modifier</a>
                                                            </td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>

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
</body>
</html>