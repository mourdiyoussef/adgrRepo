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
if(!empty($_POST['idCollecte']) and !empty($_POST['codeAd'])  and !empty($_POST['reponse']) and !empty($_POST['remarque'])){

    $ctrl = new NotificationController();
    if($ctrl->ajouterNotification($_POST['idCollecte'],$_POST['codeAd'], $_POST['reponse'],$_POST['remarque'])){
      echo "<h1>OKKKKKK</h1>";
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
  <title>Nouvelle notification</title>

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
  	<div class="mainbar">

	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Nouvelle notification</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="icon-home"></i> Home</a>
          <!-- Divider -->
          <span class="divider">/</span>
          <a href="#" class="bread-current">Forms</a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->

	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">

                <div class="widget-head">
                  <div class="pull-left">Formulaire d'ajout de notification</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <h6>Veuillez remplire tous les champs</h6>
                    <hr />

                    <!-- Form starts.-->
                     <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Collecte du</label>
                         <div class="col-lg-8">

                           <select class="form-control" name="idCollecte">
                               <?php
                               $collecteCtrl = new CollecteController();
                               $listCollecte = $collecteCtrl->getAllCollecte();
                               foreach($listCollecte as $c){
                                   echo "<option value=".$c->getIdCollecte().">".$c->getDateCollecte()."</option>";
                               }
                               ?>
                           </select>
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Code d'adhérant</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="codeAd">
                         </div>
                       </div>
                         <div class="form-group">
                             <label class="col-lg-4 control-label">Réponse</label>
                             <div class="col-lg-8">

                                 <select class="form-control" name="reponse">
                                    <option>confirmée</option>
                                    <option>à rappler</option>
                                    <option>Boite vocale</option>
                                    <option>Hors zone</option>
                                    <option>Ne répond pas</option>
                                 </select>
                             </div>
                         </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Remarques</label>
                         <div class="col-lg-8">
                           <textarea class="form-control" rows="3" placeholder="" name="remarque"></textarea>
                         </div>
                       </div>
                       <hr />
                       <div class="form-group">
                         <div class="col-lg-offset-1 col-lg-9">
                           <button type="submit" class="btn btn-primary">Valider</button>
                           <button type="button" class="btn btn-warning">Annuler</button>
                         </div>
                       </div>
                     </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>

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
</body>
</html>