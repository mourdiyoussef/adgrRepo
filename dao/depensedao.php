<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class DepenseDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addDepense($d){
        $bdd = $this->objConnexion->connect();
        $req = "INSERT INTO `depense`(`iddepense`, `collecte_idcollecte`, `montant`, `remarques`, `categorie_depense_idcategorie_depense`)
                    VALUES ('','".$d->getCollecte()."','".$d->getMontant()."','".$d->getRemarque()."','".$d->getCategorie()."')";
       // echo $req;
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        //echo "<script>alert('OK');</script>";
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllDepense(){
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from depense";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Depense();
            $d->setIdDepense($obj->idDepense);
            $d->setCollecte($obj->collecte);
            $d->setCategorie($obj->categorie);
            $d->setMontant($obj->montant);
            $d->setRemarque($obj->remarque);

            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }
    public function getDepenseByCollecte($collect){
        $tab = array();
        $bdd = $this->objConnexion->connect();
       // $req = "select * from depense where collecte_idcollecte=$collect";
        $req= "SELECT * FROM depense, categorie_depense WHERE categorie_depense_idcategorie_depense = idcategorie_depense and collecte_idcollecte=$collect
 group by iddepense";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Depense();
            $d->setIdDepense($obj->iddepense);
            $d->setCollecte($obj->collecte_idcollecte);
            $d->setMontant($obj->montant);
            $d->setRemarque($obj->remarques);
            $d->setCategory($obj->category);



            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    public function deleteDepense($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from depense WHERE iddepense=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getDepenseById($id){
        $bdd = $this->objConnexion->connect();
        $req = "select * from depense WHERE iddepense=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $d = new Depense();
        $d->setIdDepense($obj->iddepense);
        $d->setCollecte($obj->collecte_idcollecte);
        $d->setCategorie($obj->categorie_depense_idcategorie_depense);
        $d->setMontant($obj->montant);
        $d->setRemarque($obj->remarques);
        $this->objConnexion->close($bdd);
        return $d;
    }

    public function editDepense($newDepense,$oldDepenseId){
        $bdd = $this->objConnexion->connect();
        $req = "update depense set  collecte_idcollecte='".$newDepense->getCollecte()."',
                                    montant='".$newDepense->getMontant()."',
                                    remarques='".$newDepense->getRemarque()."',
                                    categorie_depense_idcategorie_depense='".$newDepense->getCategorie()."'
                              WHERE iddepense=$oldDepenseId";
       // echo $req;
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

}
?>