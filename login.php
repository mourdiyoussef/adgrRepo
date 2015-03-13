<?php
$msg="";
if(!empty($_POST['login']) and !empty($_POST['mdp'])) {
  include_once("modeles/user.php");
  include_once("dao/connectiondb.php");
  include_once("dao/userdao.php");
  include_once("metier/usercontroller.php");
  $userCtrl = new UserController();
  if($u = $userCtrl->getUserByLoginAndPassword($_POST['login'],$_POST['mdp'])){
      session_start();
      $_SESSION['login'] = $u->getLogin();
      $_SESSION['role'] = $u->getType();
      $_SESSION['idUser'] = $u->getIdUser();
      header("location:donneurListTable.php");

  }else{
      $msg = "Veuillez vérifier votre Login et / ou mot de passe";
  }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="style/font-awesome.css">
  <link href="style/style.css" rel="stylesheet">
  <link href="style/bootstrap-responsive.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.png">
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">

        <!-- Logo ADGR-->

        <img class="logo-login" src="img/logo.png" width="40%">


        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> Authentification
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" action="" method="post">
                    <!-- Email -->
                    <div class="form-group">
                      <label class=".control-label-login col-lg-3" for="inputEmail">Login</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control-login" id="inputEmail" placeholder="login" name="login">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class=".control-label-login col-lg-3" for="inputPassword">Mot de passe</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control-login" id="inputPassword" placeholder="Mot de passe" name="mdp">
                      </div>
                    </div>
                        <div class="col-lg-9 col-lg-offset-2">
							<button type="submit" class="btn btn-danger">S'authentifier</button>
							<button type="reset" class="btn btn-default">Rénitianliser</button>
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot"> <?php echo $msg; ?>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>