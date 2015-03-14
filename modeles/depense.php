<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Depense {
    private $idDepense;
    private $collecte;
    private $categorie;
    private $montant;
    private $remarque;
    private $category;

    function __construct($idDepense="", $collecte="", $montant="", $remarque="", $categorie="")
    {
        $this->idDepense = $idDepense;
        $this->collecte = $collecte;
        $this->montant = $montant;
        $this->remarque = $remarque;
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getIdDepense()
    {
        return $this->idDepense;
    }

    /**
     * @param mixed $idDepense
     */
    public function setIdDepense($idDepense)
    {
        $this->idDepense = $idDepense;
    }

    /**
     * @return mixed
     */
    public function getCollecte()
    {
        return $this->collecte;
    }

    /**
     * @param mixed $collecte
     */
    public function setCollecte($collecte)
    {
        $this->collecte = $collecte;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * @param mixed $remarque
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
    }


}

?>