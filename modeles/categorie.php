<?php
/**
 * User: mido
 * Date: 02/02/2015
 * Time: 12:26
 */

class Categorie {
    private $idcategorie_depense;
    private $category;

    function __construct($idcategorie_depense="", $category="")
    {
        $this->idcategorie_depense = $idcategorie_depense;
        $this->category = $category;
    }


    public function getIdcategorieDepense()
    {
        return $this->idcategorie_depense;
    }

    public function setIdcategorieDepense($idcategorie_depense)
    {
        $this->idcategorie_depense = $idcategorie_depense;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

}

?>