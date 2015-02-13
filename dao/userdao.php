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
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        echo "<script>alert('OK');</script>";
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

    public function deleteContact($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from contact WHERE idContact=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getContactById($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from contact WHERE idContact=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
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
        $this->objConnexion->close($bdd);
        return $d;
    }

    public function editContact($newContact,$oldContactId){
        $bdd = $this->objConnexion->connect();
        $req = "update contact set  nom='".$newContact->getNom()."',
                                    prenom='".$newContact->getPrenom()."',
                                    adresse='".$newContact->getAdresse()."',
                                    fonction='".$newContact->getFonction()."',
                                    mail='".$newContact->getMail()."',
                                    tel='".$newContact->getTel()."',
                                    type='".$newContact->getType()."',
                                    remarque='".$newContact->getRemarques()."'
                              WHERE idContact=$oldContactId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }
}
?>