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
                                            <hr />
                                            <table>
                                                <tr><td><h4>Nom</h4>                    </td>         <td>:</td>   <td><h4><?php echo $donneur->getNom(); ?></h4></td></tr>
                                                <tr><td> <h4>Prénom</h4>                </td>         <td>:</td>   <td><h4><?php echo $donneur->getPrenom(); ?></h4></td></tr>
                                                <tr><td> <h4>Groupe sanguin</h4>        </td>         <td>:</td>   <td><h4><?php echo $donneur->getGroupeSanguin(); ?></h4></td></tr>
                                                <tr><td><h4>Date d'inscription</h4>     </td>         <td>:</td>   <td><h4><?php echo $donneur->getDateInscription(); ?></h4></td></tr>
                                                <tr><td><h4>CIN</h4>                    </td>         <td>:</td>   <td><h4><?php echo $donneur->getCin(); ?></h4></td></tr>
                                                <tr><td><h4>Date du prochain don</h4>   </td>         <td>:</td>   <td><h4><?php echo $donneur->getProchainDon(); ?></h4></td></tr>

                                                <tr><td><h4>Date de naissance</h4>      </td>         <td>:</td>   <td><h4><?php echo $donneur->getDateNaissance(); ?></h4></td></tr>
                                                <tr><td> <h4>Sexe</h4>                  </td>         <td>:</td>   <td><h4><?php echo $donneur->getSexe(); ?></h4></td></tr>
                                                <tr><td> <h4>Fonction</h4>              </td>         <td>:</td>   <td><h4><?php echo $donneur->getFonction(); ?></h4></td></tr>
                                                <tr><td><h4>Adresse</h4>                </td>         <td>:</td>   <td><h4><?php echo $donneur->getAdresse(); ?></h4></td></tr>
                                                <tr><td><h4>Etat matrimonial</h4>       </td>         <td>:</td>   <td><h4><?php echo $donneur->getEtatMatrimonial(); ?></h4></td></tr>
                                                <tr><td><h4>Nombre d'enfant</h4>        </td>         <td>:</td>   <td><h4><?php echo $donneur->getProchainDon(); ?></h4></td></tr>

                                                <tr><td><h4>Login du système</h4>       </td>         <td>:</td>   <td><h4><?php echo $donneur->getLogin(); ?></h4></td></tr>
                                                <tr><td> <h4>Mail</h4>                  </td>         <td>:</td>   <td><h4><?php echo  $donneur->getMail(); ?></h4></td></tr>
                                                <tr><td> <h4>Téléphone</h4>             </td>         <td>:</td>   <td><h4><?php echo $donneur->getTel(); ?></h4></td></tr>
                                                <tr><td><h4>Carte d'adhésion</h4>       </td>         <td>:</td>   <td><h4><?php echo $donneur->getEtatCArte(); ?></h4></td></tr>
                                                <tr><td><h4>Elligible pour le don</h4>  </td>         <td>:</td>   <td><h4><?php
                                                                                                                            if ($donneur->getAptPourDon()=="Oui") echo "<span class='label label-success'>".$donneur->getAptPourDon()."</span>"; ?>
                                                                                                                            if ($donneur->getAptPourDon()=="Non ") echo "<span class='label label-success'>".$donneur->getAptPourDon()."</span>"; ?>
                                                                                                                   </h4></td></tr>
                                                <tr><td><h4>Remarques</h4>              </td>         <td>:</td>   <td><h4><?php echo $donneur->getRemarques(); ?></h4></td></tr>

                                            </table>
                                        </div>

                                        <div class="col-md-4">
                                            <h2>Liste des dons</h2>
                                            <hr />
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
                                                                <a href='?action=supp&idDon=".$d->getIdDon()."&idDonneur=".$donneur->getIdDonneur()."'><img src='style/images/delete.png'></a>
                                                                <a href='donModForm.php?idDon=".$d->getIdDon()."'><img src='style/images/edit.png'></a>
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