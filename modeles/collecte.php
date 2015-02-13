<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Collecte {
    private $idCollecte;
    private $dateCollecte;
    private $lieuCollecte;
    private $typeCollecte;
    private $remarques;


    function __construct($idCollecte="", $dateCollecte="", $lieuCollecte="",$type="", $remarques="")
    {
        $this->idCollecte = $idCollecte;
        $this->dateCollecte = $dateCollecte;
        $this->lieuCollecte = $lieuCollecte;
        $this->remarques = $remarques;
        $this->typeCollecte = $type;
    }

    public function getIdCollecte()
    {
        return $this->idCollecte;
    }

    public function setIdCollecte($idCollecte)
    {
        $this->idCollecte = $idCollecte;
    }

    public function getDateCollecte()
    {
        return $this->dateCollecte;
    }

    public function setDateCollecte($dateCollecte)
    {
        $this->dateCollecte = $dateCollecte;
    }

    public function getLieuCollecte()
    {
        return $this->lieuCollecte;
    }

    public function setLieuCollecte($lieuCollecte)
    {
        $this->lieuCollecte = $lieuCollecte;
    }

    public function getRemarques()
    {
        return $this->remarques;
    }

    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

    public function getTypeCollecte()
    {
        return $this->typeCollecte;
    }

    public function setTypeCollecte($typeCollecte)
    {
        $this->typeCollecte = $typeCollecte;
    }

}

?>