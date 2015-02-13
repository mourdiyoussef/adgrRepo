<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class CollecteDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addCollecte($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into collecte values(
                '',
                '".$d->getDateCollecte()."',
                '".$d->getLieuCollecte()."',
                '".$d->getTypeCollecte()."',
                '".$d->getRemarques()."')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllCollecte(){
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
    }
}
?>