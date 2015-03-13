<?php
include_once('connectiondb.php');

/**
 * User: Mido
 * Date: 02/02/2015
 * Time: 11:59
 */
class CategorieDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addCategorie($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into categorie_depense values(
                '',
                '".$d->getcategory()."')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllCategoride(){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from categorie_depense";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Categorie();
            $d->setIdcategorieDepense($obj->idcategorie_depense);
            $d->setCategory($obj->category);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }
    public function getAllCategorie(){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from categorie_depense";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Categorie();
            $d->setCategory($obj->category);
            $d->setIdcategorieDepense($obj->idcategorie_depense);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    public function deleteCategorie($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from categorie_depense WHERE idCategorie_depense=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getCategorieById($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from categorie_depense WHERE idCategorie_depense=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $d = new Categorie();
        $d->setCategory($obj->category);
        $d->setIdcategorieDepense($obj->idcategorie_depense);
        return $d;
    }

    public function editCategorie($newCategorie,$oldCategorieId){
        $bdd = $this->objConnexion->connect();
        $req = "update categorie_depense set category ='".$newCategorie->getCategory()."' WHERE idcategorie_depense=".$oldCategorieId;
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }
}
?>