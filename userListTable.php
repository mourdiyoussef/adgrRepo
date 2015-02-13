<?php
include_once("modeles/contact.php");
include_once("utils/switchDate.php");
include_once("dao/connectiondb.php");
include_once("dao/contactdao.php");
include_once("metier/contactcontroller.php");

if(!empty($_GET['action']) and !empty($_GET['idContact'])){
    if($_GET['action']=='supp'){
        $dctrl = new ContactController();
        $dctrl->deleteContact($_GET['idContact']);
        header("location:contactListTable.php");
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
                                <div class="pull-left">Liste des contacts</div>
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
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Type</th>
                                        <th>mail</th>
                                        <th>Téléphone</th>
                                        <th>Fonction</th>
                                        <th>Adresse</th>
                                        <th>Remarques</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $ctrl = new ContactController();
                                                $list = $ctrl->getAllContact();
                                                foreach($list as $d){
                                                    echo " <tr>";
                                                    echo "<td>".$d->getIdContact()."</td>";
                                                    echo "<td>".$d->getNom()."</td>";
                                                    echo "<td>".$d->getPrenom()."</td>";
                                                    echo "<td>".$d->getType()."</td>";
                                                    echo "<td>".$d->getMail()."</td>";
                                                    echo "<td>".$d->getTel()."</td>";
                                                    echo "<td>".$d->getFonction()."</td>";
                                                    echo "<td>".$d->getAdresse()."</td>";
                                                    echo "<td>".$d->getRemarques()."</td>";
                                                    echo "<td>
                                                                <a href='?action=supp&idContact=".$d->getIdContact()."'>Supprimer</a> |
                                                                <a href='contactModForm.php?idContact=".$d->getIdContact()."'>Modifier</a>
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