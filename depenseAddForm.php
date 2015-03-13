<?php
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

session_start();
if(!empty($_POST['montant'])){
  include_once("modeles/depense.php");
  include_once("dao/connectiondb.php");
  include_once("dao/depensedao.php");
  include_once("metier/depensecontroller.php");

  $depenseCtrl = new DepenseController();
  if($depenseCtrl->ajouterDepense($_POST['idCollecte'], $_POST['montant'],$_POST['remarque'],$_POST['idCategorie'])){

  }else{

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Nouvelle dépense</title>

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
              montant: {
                required: true,
                digits: true
              }
            },
            messages: {
              montant: {
                required: "Entrez le montant",
                digits: "N'entrez que des nombres "
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
	      <h2 class="pull-left">Nouvelle dépense</h2>
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
                  <div class="pull-left">Formulaire d'ajout</div>
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
                     <form class="form-horizontal" role="form" method="post" novalidate="novalidate" id="register-form">
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
                         <label class="col-lg-4 control-label">Catégorie</label>
                         <div class="col-lg-8">

                           <select class="form-control" name="idCategorie">
                             <?php
                             $categorieCtrl = new CategorieController();
                             $listCategorie = $categorieCtrl->getAllCategorie();
                             foreach($listCategorie as $c){
                               echo "<option value=".$c->getIdcategorieDepense().">".$c->getCategory()."</option>";
                             }
                             ?>
                           </select>
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Montant</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="montant">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Remarque</label>
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