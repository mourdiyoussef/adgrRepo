<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class UserDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addUser($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into user values(
                '',
                '".$d->getNom()."',
                '".$d->getPrenom()."',
                '".$d->getLogin()."',
                '".$d->getMdp()."',
                '".$d->getType()."')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllUser(){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from user";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new User();
            $d->setIdUser($obj->iduser);
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setType($obj->typeUser);
            $d->setLogin($obj->login);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

   public function deleteUser($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from user WHERE idUser=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

     public function getUserById($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user WHERE iduser=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $d = new User();
        $d->setIdUser($obj->iduser);
        $d->setNom($obj->nom);
        $d->setPrenom($obj->prenom);
        $d->setType($obj->typeUser);
        $d->setLogin($obj->login);
        $this->objConnexion->close($bdd);
        return $d;
    }

    public function editUser($newUser,$oldId){
        $bdd = $this->objConnexion->connect();
        $req = "update user set nom='".$newUser->getNom()."',
                                prenom='".$newUser->getPrenom()."',
                                login='".$newUser->getLogin()."',
                                typeUser='".$newUser->getType()."'
                              WHERE idUser=$oldId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function initMotDePasseUser($newUser,$oldId){
        $bdd = $this->objConnexion->connect();
        $req = "update user set motdePasse='".$newUser->getMdp()."'
                              WHERE idUser=$oldId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getUserByLoginAndPassword($login, $mdp){
        $bdd = $this->objConnexion->connect();
        $req = "select * from user WHERE login='$login' and motdePasse='$mdp'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        if($obj = mysqli_fetch_object($v)){
            $d = new User();
            $d->setIdUser($obj->iduser);
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setType($obj->typeUser);
            $d->setLogin($obj->login);
            $this->objConnexion->close($bdd);
            return $d;
        }
        $this->objConnexion->close($bdd);
        return false;
    }
}
?>