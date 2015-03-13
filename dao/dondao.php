<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class DonDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addDon($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into don values(
                '".$d->getIdDonneur()."',
                '".$d->getIdCollecte()."',
                '')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllDonByUserId($idUser){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from don, collecte WHERE don.iddonneur=".$idUser." and don.idcollecte=collecte.idcollecte order by dateCollecte desc LIMIT 10";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Don();
            $d->setIdDon($obj->idDon);
            $d->setIdCollecte($obj->dateCollecte);
            $d->setIdDonneur($obj->lieuCollecte);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

   public function deleteDon($id){
        $bdd = $this->objConnexion->connect();
        $req = "DELETE FROM don WHERE idDon=$id";
       echo "<script>alert('".$req."');</script>";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        echo "<script>alert('afetr DAO');</script>";
        return $v;
    }

   /*  public function getUserById($id){
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

    public function editPassword($newPass,$id){
        $bdd = $this->objConnexion->connect();
        $req = "update user set motdePasse='".$newPass."'
                              WHERE idUser=$id";
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
    }*/
}
?>