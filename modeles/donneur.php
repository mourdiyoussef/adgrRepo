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

    function __construct($idDonneur ="", $nom="", $prenom="", $codeAd="", $dateNaissance="", $dernierDon="", $adresse="", $fonction="", $etatMatrimonial="",
                         $nombreEnfant="", $groupeSanguin="", $mail="", $tel="", $cin="", $photo="", $dateInscription="", $aptPourDon="", $login="", $mdp="",
                         $sexe="", $etatCArte="", $remarques="")
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getCodeAd()
    {
        return $this->codeAd;
    }

    /**
     * @param mixed $codeAd
     */
    public function setCodeAd($codeAd)
    {
        $this->codeAd = $codeAd;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getDernierDon()
    {
        return $this->dernierDon;
    }

    /**
     * @param mixed $dernierDon
     */
    public function setDernierDon($dernierDon)
    {
        $this->dernierDon = $dernierDon;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * @return mixed
     */
    public function getEtatMatrimonial()
    {
        return $this->etatMatrimonial;
    }

    /**
     * @param mixed $etatMatrimonial
     */
    public function setEtatMatrimonial($etatMatrimonial)
    {
        $this->etatMatrimonial = $etatMatrimonial;
    }

    /**
     * @return mixed
     */
    public function getNombreEnfant()
    {
        return $this->nombreEnfant;
    }

    /**
     * @param mixed $nombreEnfant
     */
    public function setNombreEnfant($nombreEnfant)
    {
        $this->nombreEnfant = $nombreEnfant;
    }

    /**
     * @return mixed
     */
    public function getGroupeSanguin()
    {
        return $this->groupeSanguin;
    }

    /**
     * @param mixed $groupeSanguin
     */
    public function setGroupeSanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return mixed
     */
    public function getAptPourDon()
    {
        return $this->aptPourDon;
    }

    /**
     * @param mixed $aptPourDon
     */
    public function setAptPourDon($aptPourDon)
    {
        $this->aptPourDon = $aptPourDon;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getEtatCArte()
    {
        return $this->etatCArte;
    }

    /**
     * @param mixed $etatCArte
     */
    public function setEtatCArte($etatCArte)
    {
        $this->etatCArte = $etatCArte;
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

    /*
     * Les getters et les setters pour tous les attributs ==================================================
     */


}

?>