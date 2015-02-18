<?php
if(!empty($_GET['idContact'])){
  include_once("modeles/contact.php");
  include_once("dao/connectiondb.php");
  include_once("dao/contactdao.php");
  include_once("metier/contactcontroller.php");
  $contactCtrl = new ContactController();
  $contact = $contactCtrl->getContactById($_GET['idContact']);
}

if(!empty($_POST['nom']) and !empty($_POST['prenom'])  and !empty($_POST['id']) and !empty($_POST['fonction'])){
  echo "<script>alert('Ok');</script>";
  include_once("modeles/contact.php");
  include_once("dao/connectiondb.php");
  include_once("dao/contactdao.php");
  include_once("metier/contactcontroller.php");

  $contactCtrl = new ContactController();
  if($contactCtrl->editContact($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['fonction'],$_POST['mail'],
      $_POST['tel'],$_POST['type'],$_POST['remarque'],$_POST['id'])){
    header("location:contactListTable.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Modification de contact</title>

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
              adresse: "required",
              fonction: "required",
              mail:  {
                required: true,
                email: true
              },

              tel: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength:10
              }

            },
            messages: {
              nom: "Entrez le nom",
              prenom: "Entrez le prénom",
              adresse: "Entrez l'adresse",
              fonction: "Entrez la fonction",
              mail:  {
                required: "Entrez l'email",
                mail: "Entrez une adresse mail valide"
              },
              tel:{
                required: "Entrez le numero de téléphone",
                digits: "N'entrez que des chiffres ",
                minlength: "Le numero de téléphone doit contenir 10 chiffres ",
                maxlength: "Le numero de téléphone ne doit contenir que 10 chiffres "
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
	      <h2 class="pull-left">Modification de  <?php echo $contact->getNom()." ".$contact->getPrenom(); ?></h2>
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
                  <div class="pull-left"> <?php echo "Code d'adhésion : ".$contact->getIdContact(); ?></div>
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
                    <form class="form-horizontal" role="form" method="post" novalidate="novalidate" id="register-form" >
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Nom</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="" name="nom" value="<?php echo $contact->getNom();?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Prénom</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="" name="prenom" value="<?php echo $contact->getPrenom();?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-lg-4 control-label">Type</label>
                        <div class="col-lg-8">
                          <select class="form-control" name="type">
                            <option>Bien-faiteur</option>
                            <option>Bénévole</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-lg-4 control-label">Adresse</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" placeholder="" name="adresse"><?php echo $contact->getAdresse();?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Fonction</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="" name="fonction" value="<?php echo $contact->getFonction();?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-4 control-label">E-mail</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="" name="mail" value="<?php echo $contact->getMail();?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Telephone</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="" name="tel" value="<?php echo $contact->getTel();?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-4 control-label">Observations</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" placeholder="" name="remarque"><?php echo $contact->getRemarques();?></textarea>
                        </div>
                      </div>

                      <input type="hidden" name="id" value="<?php echo $contact->getIdContact();?>">

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