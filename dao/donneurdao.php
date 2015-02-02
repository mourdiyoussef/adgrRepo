<?php
include_once('connectiondb.php');
//include_once('..\entities\donneur.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class DonneurDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addDonneur($d){
        //$d = new Donneur();
        $bdd = $this->objConnexion->connect();
        $req = "insert into donneur values(
                '',
                '".$d->getNom()."',
                '".$d->getPrenom()."',
                '".$d->getDernierDon()."',
                '".$d->getCodeAd()."',
                '".$d->getDateNaissance()."',
                '".$d->getAdresse()."',
                '".$d->getFonction()."',
                '".$d->getEtatMatrimonial()."',
                '".$d->getNombreEnfant()."',
                '".$d->getGroupeSanguin()."',
                '".$d->getMail()."',
                '".$d->getTel()."',
                '".$d->getCin()."',
                '".$d->getPhoto()."',
                '".$d->getDateInscription()."',
                '".$d->getAptPourDon()."',
                '".$d->getLogin()."',
                '".$d->getMdp()."',
                '".$d->getRemarques()."',
                )";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
    }

    public function delDonneur($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from user WHERE idUser=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
    }

    public function editDonneur($donneur,$id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user where idUser=$id";
        $Donneur = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $Donneur;
    }

    public function getAllDonneur(){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user";
        $listAllDonneur = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $listAllDonneur;
    }

    public function getDonneurWithId($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user where idUser=$id";
        $Donneur = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $Donneur;
    }

    public function getDonneurWithGroup($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user where idUser=$id";
        $listDonneur = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $listDonneur;
    }

    public function getDonneurWithCinOrNameorFirstName($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user where idUser=$id";
        $listDonneur = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $listDonneur;
    }
}
?>