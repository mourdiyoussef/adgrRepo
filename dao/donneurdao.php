<?php
include_once('connectiondb.php');

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
                '".$d->getSexe()."',
                '".$d->getEtatCArte()."',
                '".$d->getRemarques()."'
                )";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }
}
?>