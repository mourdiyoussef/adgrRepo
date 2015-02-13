<?php
include_once("includes/testSession.php");
if(!empty($_GET['idDonneur'])){
  include_once("modeles/donneur.php");
  include_once("utils/switchDate.php");
  include_once("dao/connectiondb.php");
  include_once("dao/donneurdao.php");
  include_once("metier/donneurcontroller.php");
  $donneurCtrl = new DonneurController();
  $donneur = $donneurCtrl->getDonneurById($_GET['idDonneur']);
}

if(!empty($_POST['nom']) and !empty($_POST['prenom'])  and !empty($_POST['id']) and !empty($_POST['cin'])){
  include_once("modeles/donneur.php");
  include_once("utils/switchDate.php");
  include_once("dao/connectiondb.php");
  include_once("dao/donneurdao.php");
  include_once("metier/donneurcontroller.php");

  $donneurCtrl = new DonneurController();
  if($donneurCtrl->editDonneur($_POST['nom'],$_POST['prenom'],$_POST['codeAd'],$_POST['dateNai'],$_POST['dernierDon'],
      $_POST['adresse'],$_POST['fonction'],$_POST['etatMatri'],$_POST['nbrEnf'],$_POST['groupeS'],
      $_POST['mail'],$_POST['tel'],$_POST['cin'], $_POST['aptPourDon'],$_POST['sexe'],
      $_POST['carte'],$_POST['remarque'],$_POST['id'])){
    header("location:donneurListTable.php");
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
	      <h2 class="pull-left">Modification de l' adhérant <?php echo $donneur->getNom()." ".$donneur->getPrenom(); ?></h2>
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
                  <div class="pull-left"> <?php echo "Code d'adhésion : ".$donneur->getCodeAd(); ?></div>
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
                                  <label class="col-lg-4 control-label">Nom</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="" name="nom" value="<?php echo $donneur->getNom();?>">
                                  </div>
                                </div>
                                 <div class="form-group">
                                   <label class="col-lg-4 control-label">Prénom</label>
                                   <div class="col-lg-8">
                                     <input type="text" class="form-control" placeholder="" name="prenom" value="<?php echo $donneur->getPrenom();?>">
                                   </div>
                                 </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">CIN</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="cin" value="<?php echo $donneur->getCin();?>">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Date de naissance</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="dateNai" onclick="ds_sh(this);" value="<?php echo $donneur->getDateNaissance();?>">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-lg-4 control-label">Code d'adhésion</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="codeAd" value="<?php echo $donneur->getCodeAd();?>">
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
                           <textarea class="form-control" rows="3" placeholder="" name="adresse"><?php echo $donneur->getAdresse();?></textarea>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Fonction</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="fonction" value="<?php echo $donneur->getFonction();?>">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Etat matrimonial</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="etatMatri" value="<?php echo $donneur->getEtatMatrimonial();?>">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Nombre d'enfant</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="nbrEnf" value="<?php echo $donneur->getNombreEnfant();?>">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">E-mail</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="mail" value="<?php echo $donneur->getMail();?>">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-lg-4 control-label">Telephone</label>
                         <div class="col-lg-8">
                           <input type="text" class="form-control" placeholder="" name="tel"value="<?php echo $donneur->getTel();?>">
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
                           <input type="date" class="form-control" placeholder="" name="dernierDon" onclick="ds_sh(this);" value="<?php echo $donneur->getDernierDon();?>">
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
                           <textarea class="form-control" rows="3" placeholder="" name="remarque"><?php echo $donneur->getRemarques();?></textarea>
                         </div>
                       </div>
                       <hr />
                       <div class="form-group">
                         <div class="col-lg-offset-1 col-lg-9">
                           <button type="submit" class="btn btn-primary">Valider</button>
                           <button type="button" class="btn btn-warning">Annuler</button>
                         </div>
                       </div>

                       <input type="hidden" name="id" value="<?php echo $donneur->getIdDonneur();?>">

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