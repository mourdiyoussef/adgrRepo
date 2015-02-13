<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class ContactDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addContact($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into contact values(
                '',
                '".$d->getType()."',
                '".$d->getNom()."',
                '".$d->getPrenom()."',
                '".$d->getMail()."',
                '".$d->getTel()."',
                '".$d->getAdresse()."',
                '".$d->getFonction()."',
                '".$d->getRemarques()."')";
        echo "<script>alert('OK');</script>";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllContact(){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from contact";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Contact();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setRemarques($obj->remarque);
            $d->setIdContact($obj->idContact);
            $d->setType($obj->type);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    /*public function deleteDonneur($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from donneur WHERE iddonneur=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getDonneurById($id){
        $dateU = new switchDate();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur WHERE idDonneur=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
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
        $this->objConnexion->close($bdd);
        return $d;
    }
    public function editDonneur($newDonneur,$oldDonneurId){
        $bdd = $this->objConnexion->connect();
        $req = "update donneur set nom='".$newDonneur->getNom()."',
                                    prenom='".$newDonneur->getPrenom()."',
                                    dernierDon='".$newDonneur->getDernierDon()."',
                                    codeAd='".$newDonneur->getCodeAd()."',
                                    dateNaissance='".$newDonneur->getDateNaissance()."',
                                    adresse='".$newDonneur->getAdresse()."',
                                    fonction='".$newDonneur->getFonction()."',
                                    etatMatrimonial='".$newDonneur->getEtatMatrimonial()."',
                                    nbrEnfant='".$newDonneur->getNombreEnfant()."',
                                    groupeSonguin='".$newDonneur->getGroupeSanguin()."',
                                    mail='".$newDonneur->getMail()."',
                                    tel='".$newDonneur->getTel()."',
                                    cin='".$newDonneur->getCin()."',
                                    photo='".$newDonneur->getPhoto()."',
                                    dateInscription='".$newDonneur->getDateInscription()."',
                                    aptPourDon='".$newDonneur->getAptPourDon()."',
                                    login='".$newDonneur->getLogin()."',
                                    motDePasse='".$newDonneur->getMdp()."',
                                    sexe='".$newDonneur->getSexe()."',
                                    etatCarte='".$newDonneur->getEtatCArte()."',
                                    remarques='".$newDonneur->getRemarques()."'
                              WHERE iddonneur=$oldDonneurId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }*/
}
?>