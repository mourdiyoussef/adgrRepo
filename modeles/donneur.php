<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:26
 */

class Donneur {
    private $idDonneur;
    private $nom;
    private $prenom;
    private $codeAd;
    private $dateNaissance;
    private $dernierDon;
    private $adresse;
    private $fonction;
    private $etatMatrimonial;
    private $nombreEnfant;
    private $groupeSanguin;
    private $mail;
    private $tel;
    private $cin;
    private $photo;
    private $dateInscription;
    private $aptPourDon;
    private $login;
    private $mdp;
    private $sexe;
    private $etatCArte;
    private $remarques;

    function __construct($idDonneur, $nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
                         $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $photo, $dateInscription, $aptPourDon, $login, $mdp,
                         $sexe, $etatCArte, $remarques)
    {
        $this->idDonneur = $idDonneur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->codeAd = $codeAd;
        $this->dateNaissance = $dateNaissance;
        $this->dernierDon = $dernierDon;
        $this->adresse = $adresse;
        $this->fonction = $fonction;
        $this->etatMatrimonial = $etatMatrimonial;
        $this->nombreEnfant = $nombreEnfant;
        $this->groupeSanguin = $groupeSanguin;
        $this->mail = $mail;
        $this->tel = $tel;
        $this->cin = $cin;
        $this->photo = $photo;
        $this->dateInscription = $dateInscription;
        $this->aptPourDon = $aptPourDon;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->sexe = $sexe;
        $this->etatCArte = $etatCArte;
        $this->remarques = $remarques;
    }

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

    public function getDernierDon()
    {
        return $this->dernierDon;
    }

    public function setDernierDon($dernierDon)
    {
        $this->dernierDon = $dernierDon;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function getEtatCArte()
    {
        return $this->etatCArte;
    }

    public function setEtatCArte($etatCArte)
    {
        $this->etatCArte = $etatCArte;
    }

}

?>