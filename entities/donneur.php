<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Donneur {
    private $nom;
    private $prenom;
    private $codeAd;
    private $dateNaissance;
    private $adresse;
    private $fonction;
    private $etatMatrimonial;
    private $nombreEnfant;
    private $groupeSanguin;
    private $idDonneur;
    private $mail;
    private $tel;
    private $cin;
    private $photo;
    private $dateInscription;
    private $aptPourDon;
    private $remarques;
    private $age;

    /*
     * Les getters et les setters pour tous les attributs ==================================================
     */
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

    public function getCodeAd()
    {
        return $this->codeAd;
    }

    public function setCodeAd($codeAd)
    {
        $this->codeAd = $codeAd;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
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

    public function getEtatMatrimonial()
    {
        return $this->etatMatrimonial;
    }

    public function setEtatMatrimonial($etatMatrimonial)
    {
        $this->etatMatrimonial = $etatMatrimonial;
    }

    public function getNombreEnfant()
    {
        return $this->nombreEnfant;
    }

    public function setNombreEnfant($nombreEnfant)
    {
        $this->nombreEnfant = $nombreEnfant;
    }

    public function getGroupeSanguin()
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;
    }

    public function getIdDonneur()
    {
        return $this->idDonneur;
    }

    public function setIdDonneur($idDonneur)
    {
        $this->idDonneur = $idDonneur;
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

    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    public function getAptPourDon()
    {
        return $this->aptPourDon;
    }

    public function setAptPourDon($aptPourDon)
    {
        $this->aptPourDon = $aptPourDon;
    }

    public function getRemarques()
    {
        return $this->remarques;
    }

    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

}

?>