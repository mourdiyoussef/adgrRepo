<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Don {

    private $idDon;
    private $idDonneur;
    private $idCollecte;

    function __construct($idDon="", $idDonneur="", $idCollecte="")
    {
        $this->idDon = $idDon;
        $this->idDonneur = $idDonneur;
        $this->idCollecte = $idCollecte;
    }

    /**
     * @return mixed
     */
    public function getIdDon()
    {
        return $this->idDon;
    }

    /**
     * @param mixed $idDon
     */
    public function setIdDon($idDon)
    {
        $this->idDon = $idDon;
    }

    /**
     * @return mixed
     */
    public function getIdDonneur()
    {
        return $this->idDonneur;
    }

    /**
     * @param mixed $idDonneur
     */
    public function setIdDonneur($idDonneur)
    {
        $this->idDonneur = $idDonneur;
    }

    /**
     * @return mixed
     */
    public function getIdCollecte()
    {
        return $this->idCollecte;
    }

    /**
     * @param mixed $idCollecte
     */
    public function setIdCollecte($idCollecte)
    {
        $this->idCollecte = $idCollecte;
    }


}

?>