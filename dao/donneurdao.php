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

    public function getAllDonneur(){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));
            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    public function deleteDonneur($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from donneur WHERE iddonneur=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }
}
?>