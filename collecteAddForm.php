<?php
session_start();
if(!empty($_POST['dateCollecte']) and !empty($_POST['lieuCollecte'])  and !empty($_POST['typeCollecte']) and !empty($_POST['remarque'])){
  include_once("modeles/collecte.php");
  include_once("utils/switchDate.php");
  include_once("dao/connectiondb.php");
  include_once("dao/collectedao.php");
  include_once("metier/collectecontroller.php");
  $collecteCtrl = new CollecteController();
  if($collecteCtrl->ajouterCollecte($_POST['dateCollecte'],$_POST['lieuCollecte'],$_POST['typeCollecte'],$_POST['remarque'])){
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
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Nouvelle collecte</h2>
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
                  <div class="pull-left">Formulaire d'ajout de collecte</div>
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
                         <label class="col-lg-4 control-label">Date de la collecte</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="dateCollecte" onclick="ds_sh(this);">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Lieu de la collecte</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="lieuCollecte">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Type de la collecte</label>
                         <div class="col-lg-8">
                           <select class="form-control" name="typeCollecte">
                             <option>CRTS</option>
                             <option>Mobile</option>
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