<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Notification {
    private $idNotif;
    private $idCollecte;
    private $idDonneur;
    private $idUser;
    private $dateNotif;
    private $remarques;
    private $typeNotif;
    private $reponse;

    function __construct($idNotif="", $idCollecte="", $idDonneur="", $idUser="", $dateNotif="", $remarques="", $typeNotif="", $reponse="")
    {
        $this->idNotif = $idNotif;
        $this->idCollecte = $idCollecte;
        $this->idDonneur = $idDonneur;
        $this->idUser = $idUser;
        $this->dateNotif = $dateNotif;
        $this->remarques = $remarques;
        $this->typeNotif = $typeNotif;
        $this->reponse = $reponse;
    }

    /**
     * @return mixed
     */
    public function getIdNotif()
    {
        return $this->idNotif;
    }

    /**
     * @param mixed $idNotif
     */
    public function setIdNotif($idNotif)
    {
        $this->idNotif = $idNotif;
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
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getDateNotif()
    {
        return $this->dateNotif;
    }

    /**
     * @param mixed $dateNotif
     */
    public function setDateNotif($dateNotif)
    {
        $this->dateNotif = $dateNotif;
    }

    /**
     * @return mixed
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * @param mixed $remarques
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

    /**
     * @return mixed
     */
    public function getTypeNotif()
    {
        return $this->typeNotif;
    }

    /**
     * @param mixed $typeNotif
     */
    public function setTypeNotif($typeNotif)
    {
        $this->typeNotif = $typeNotif;
    }

    /**
     * @return mixed
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * @param mixed $reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }


}

?>