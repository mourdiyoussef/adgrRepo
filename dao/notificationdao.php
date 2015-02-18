<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class NotificationDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    public function addNotification($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into notification values(
                '',
                '".$d->getDateNotif()."',
                '".$d->getIdUser()."',
                '".$d->getIdCollecte()."',
                '".$d->getIdDonneur()."',
                '".$d->getRemarques()."',
                '".$d->getTypeNotif()."',
                '".$d->getReponse()."')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

/*    public function getAllCollecte(){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from collecte";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Collecte();
            $d->setIdCollecte($obj->idcollecte);
            $d->setRemarques($obj->remarqueCollecte);
            $d->setLieuCollecte($obj->lieuCollecte);
            $d->setDateCollecte($dateU->DBToForm($obj->dateCollecte));
            $d->setTypeCollecte($obj->typeCollecte);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    public function deleteCollecte($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from collecte WHERE idcollecte=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getCollecteById($id){
        $dateU = new switchDate();
        $bdd = $this->objConnexion->connect();
        $req = "select * from collecte WHERE idcollecte=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $d = new Collecte();
        $d->setIdCollecte($obj->idcollecte);
        $d->setRemarques($obj->remarqueCollecte);
        $d->setLieuCollecte($obj->lieuCollecte);
        $d->setDateCollecte($dateU->DBToForm($obj->dateCollecte));
        $d->setTypeCollecte($obj->typeCollecte);
        $this->objConnexion->close($bdd);
        return $d;
    }
    public function editCollecte($newCollecte,$oldCollecteId){
        $bdd = $this->objConnexion->connect();
        $req = "update collecte set dateCollecte='".$newCollecte->getDateCollecte()."',
                                    lieuCollecte='".$newCollecte->getLieuCollecte()."',
                                    typeCollecte='".$newCollecte->getTypeCollecte()."',
                                    remarqueCollecte='".$newCollecte->getRemarques()."'
                              WHERE idcollecte=$oldCollecteId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }*/
}
?>