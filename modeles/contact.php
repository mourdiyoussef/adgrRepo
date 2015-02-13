<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Contact {
    private $idContact;
    private $nom;
    private $prenom;
    private $adresse;
    private $fonction;
    private $mail;
    private $tel;
    private $type;
    private $remarques;

    function __construct($idContact="", $nom="", $prenom="", $adresse="", $fonction="", $mail="", $tel="", $type="", $remarques="")
    {
        $this->idContact = $idContact;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->fonction = $fonction;
        $this->mail = $mail;
        $this->tel = $tel;
        $this->type = $type;
        $this->remarques = $remarques;
    }

    public function getIdContact()
    {
        return $this->idContact;
    }

    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getFonction()
    {
        return $this->fonction;
    }

    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getRemarques()
    {
        return $this->remarques;
    }

    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

}

?>