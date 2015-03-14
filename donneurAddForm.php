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
  <title>Nouvel adherant</title>

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
	      <h2 class="pull-left">Nouvel adhérant</h2>
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
                  <div class="pull-left">Formulaire d'inscription</div>
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
                     <form class="form-horizontal" role="form" method="post" novalidate="novalidate" id="register-form" enctype="multipart/form-data">

                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Nom</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="" name="nom">
                                  </div>
                                </div>
                                 <div class="form-group">
                                   <label class="col-lg-4 control-label">Prénom</label>
                                   <div class="col-lg-8">
                                     <input type="text" class="form-control" placeholder="" name="prenom">
                                   </div>
                                 </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">CIN</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="cin">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Date de naissance</label>
                         <div class="col-lg-8">
                           <input type="date" class="form-control" placeholder="" name="dateNai" onclick="ds_sh(this);">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Code d'adhésion</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="codeAd">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Groupe sanguin</label>
                         <div class="col-lg-8">
                           <select class="form-control" name="groupeS">
                             <option>A+</option>
                             <option>A-</option>
                             <option>B+</option>
                             <option>B-</option>
                             <option>AB+</option>
                             <option>AB-</option>
                             <option>O+</option>
                             <option>O-</option>
                           </select>
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Sexe</label>
                         <div class="col-lg-8">
                           <select class="form-control" name="sexe">
                             <option>homme</option>
                             <option>femme</option>
                           </select>
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Adresse</label>
                         <div class="col-lg-8">
                           <textarea class="form-control" rows="3" placeholder="" name="adresse"></textarea>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Fonction</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="fonction">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Etat matrimonial</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="etatMatri">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Nombre d'enfant</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="nbrEnf">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">E-mail</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="mail">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Telephone</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="tel">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Photo</label>
                         <div class="col-lg-8">
                           <input type="file" placeholder="" name="fileToUpload" id="fileToUpload">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Apte pour le don</label>
                         <div class="col-lg-8">
                           <select class="form-control" name="aptPourDon">
                             <option>Oui</option>
                             <option>Non provisoir</option>
                             <option>Non définitif</option>
                           </select>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Dernier don</label>
                         <div class="col-lg-8">
                           <input type="date" class="form-control" placeholder="" name="dernierDon" onclick="ds_sh(this);">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Carte d'adhésion</label>
                         <div class="col-lg-8">
                           <select class="form-control" name="carte">
                             <option value="0">En attente</option>
                             <option value="1">En cours</option>
                             <option value="2">Conçuee</option>
                             <option value="3">Imprimée</option>
                             <option value="4">Reçue</option>
                           </select>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Observations</label>
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