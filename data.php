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

include_once("modeles/depense.php");
include_once("dao/connectiondb.php");
include_once("dao/depensedao.php");
include_once("metier/depensecontroller.php");


?>
<?php
// Fetch the data
    $ctrl = new CollecteController();
    $list = $ctrl->getCountParticipantTotal();
	//				    $list2 = $ctrl->getNbreAllDonneurNegatifByCollecte(1);
//echo $list2;							

// Print out rows
$prefix = '';
echo "[\n";
foreach($list as $d){
   // $list2 = $ctrl->getNbreAllDonneurNegatifByCollecte($d->getIdCollecte());
  echo $prefix . " {\n";
  echo '  "category": "' . $d->getDateCollecte() . '",' . "\n";
  echo '  "value1": ' . $d->getNbrDon() . ',' . "\n";
  echo '  "value2": ' . $ctrl->getNbreAllDonneurNegatifByCollecte($d->getIdCollecte()) . '' . "\n";
  echo " }";
  $prefix = ",\n";
 // echo ;
}
echo "\n]";

?>