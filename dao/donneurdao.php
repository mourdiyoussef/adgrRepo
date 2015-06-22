<?php
include_once('connectiondb.php');

/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 11:59
 */
class DonneurDAO {

    private $objConnexion;

    public function __construct()
    {
        $this->objConnexion=new ConnectionDB();
    }

    /*
     * Les différentes fonctions d'intéraction avec la base de données ============================================
     */

    public function addDonneur($d){
        $bdd = $this->objConnexion->connect();
        $req = "insert into donneur values(
                '',
                '".$d->getNom()."',
                '".$d->getPrenom()."',
                '".$d->getDernierDon()."',
                '".$d->getCodeAd()."',
                '".$d->getDateNaissance()."',
                '".$d->getAdresse()."',
                '".$d->getFonction()."',
                '".$d->getEtatMatrimonial()."',
                '".$d->getNombreEnfant()."',
                '".$d->getGroupeSanguin()."',
                '".$d->getMail()."',
                '".$d->getTel()."',
                '".$d->getCin()."',
                '".$d->getPhoto()."',
                '".$d->getDateInscription()."',
                '".$d->getAptPourDon()."',
                '".$d->getLogin()."',
                '".$d->getMdp()."',
                '".$d->getSexe()."',
                '".$d->getEtatCArte()."',
                '".$d->getRemarques()."'
                )";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getAllNegativeDonneur(){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur where groupeSonguin='A-' OR groupeSonguin='B-' OR groupeSonguin='AB-' OR groupeSonguin='O-'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));

            $nextDon = date("Y-m-d", strtotime("+3 month", strtotime($obj->dernierDon)));
            $d->setProchainDon($dateU->DBToForm($nextDon));

            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);
            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;
    }

    public function deleteDonneur($id){
        $bdd = $this->objConnexion->connect();
        $req = "delete from donneur WHERE iddonneur=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getDonneurById($id){
        $dateU = new switchDate();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur WHERE idDonneur=$id";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));
            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);
        $this->objConnexion->close($bdd);
        return $d;
    }
    public function editDonneur($newDonneur,$oldDonneurId){
        $bdd = $this->objConnexion->connect();
        $req = "update donneur set nom='".$newDonneur->getNom()."',
                                    prenom='".$newDonneur->getPrenom()."',
                                    dernierDon='".$newDonneur->getDernierDon()."',
                                    codeAd='".$newDonneur->getCodeAd()."',
                                    dateNaissance='".$newDonneur->getDateNaissance()."',
                                    adresse='".$newDonneur->getAdresse()."',
                                    fonction='".$newDonneur->getFonction()."',
                                    etatMatrimonial='".$newDonneur->getEtatMatrimonial()."',
                                    nbrEnfant='".$newDonneur->getNombreEnfant()."',
                                    groupeSonguin='".$newDonneur->getGroupeSanguin()."',
                                    mail='".$newDonneur->getMail()."',
                                    tel='".$newDonneur->getTel()."',
                                    cin='".$newDonneur->getCin()."',
                                    photo='".$newDonneur->getPhoto()."',
                                    dateInscription='".$newDonneur->getDateInscription()."',
                                    aptPourDon='".$newDonneur->getAptPourDon()."',
                                    login='".$newDonneur->getLogin()."',
                                    motDePasse='".$newDonneur->getMdp()."',
                                    sexe='".$newDonneur->getSexe()."',
                                    etatCarte='".$newDonneur->getEtatCArte()."',
                                    remarques='".$newDonneur->getRemarques()."'
                              WHERE iddonneur=$oldDonneurId";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $this->objConnexion->close($bdd);
        return $v;
    }

    public function getNbreDonneurByGroup($group){
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur where groupeSonguin='$group'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $nbr = mysqli_num_rows($v);
        $this->objConnexion->close($bdd);
        return $nbr;
	}
    public function getDonneurByCodeAd($id){
        $dateU = new switchDate();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur WHERE codeAd='$id'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $d = new Donneur();
        $d->setNom($obj->nom);
        $d->setPrenom($obj->prenom);
        $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
        $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
        $d->setDernierDon($dateU->DBToForm($obj->dernierDon));
        $d->setCodeAd($obj->codeAd);
        $d->setCin($obj->cin);
        $d->setAdresse($obj->adresse);
        $d->setFonction($obj->fonction);
        $d->setEtatMatrimonial($obj->etatMatrimonial);
        $d->setNombreEnfant($obj->nbrEnfant);
        $d->setGroupeSanguin($obj->groupeSonguin);
        $d->setMail($obj->mail);
        $d->setTel($obj->tel);
        $d->setPhoto($obj->photo);
        $d->setAptPourDon($obj->aptPourDon);
        $d->setSexe($obj->sexe);
        $d->setEtatCArte($obj->etatCarte);
        $d->setRemarques($obj->remarques);
        $d->setIdDonneur($obj->iddonneur);
        $this->objConnexion->close($bdd);
        return $d;
    }

    public function getAllNegativeDonneurWithCriter($critere){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur WHERE (nom LIKE '%$critere%' OR prenom LIKE '%$critere%' OR cin LIKE '%$critere%' OR codeAd LIKE '%$critere%') AND (groupeSonguin='A-' OR groupeSonguin='B-' OR groupeSonguin='AB-' OR groupeSonguin='O-')";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));

            $nextDon = date("Y-m-d", strtotime("+3 month", strtotime($obj->dernierDon)));
            $d->setProchainDon($dateU->DBToForm($nextDon));

            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);

            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;

    }
    public function getAllDonneurHommeByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrHomme FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.sexe='homme'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrHomme;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getAllDonneurFemmeByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrFemme FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.sexe='femme'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrFemme;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getAllDonneurGroupOnegByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrOneg FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.groupeSonguin='O-'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrOneg;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getAllDonneurGroupAnegByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrAneg FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.groupeSonguin='A-'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrAneg;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getAllDonneurGroupBnegByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrBneg FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.groupeSonguin='B-'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrBneg;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getAllDonneurGroupABnegByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrABneg FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte
                                                          and donneur.groupeSonguin='AB-'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrABneg;
        $this->objConnexion->close($bdd);
        return $nbr;
    }
    public function getNbreAllDonneurByCollecte($idCollecte){
        $bdd = $this->objConnexion->connect();
        $req="SELECT count( * ) as nbrDonneur FROM donneur , don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        $obj = mysqli_fetch_object($v);
        $nbr = $obj->nbrDonneur;
        $this->objConnexion->close($bdd);
        return $nbr;
    }

    /*
     * Retourne les donneurs négatifs ayant la possibilité de donner de leur sang
     * 75 Jours
     * */
    public function getAllNegativeDonneurApt(){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur WHERE DATEDIFF(NOW(),dernierDon) >= 75 AND aptPourDon='Oui'";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));

            $nextDon = date("Y-m-d", strtotime("+3 month", strtotime($obj->dernierDon)));
            $d->setProchainDon($dateU->DBToForm($nextDon));

            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);

            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;

    }

    public function getAllNegativeDonneurParticipantCollecte($idCollecte){
        $dateU = new switchDate();
        $tab = array();
        $bdd = $this->objConnexion->connect();
        $req = "select * from donneur,don WHERE donneur.iddonneur = don.iddonneur
                                                          AND don.idcollecte = $idCollecte";
        $v = mysqli_query($bdd,$req) or die(mysql_error());
        while($obj = mysqli_fetch_object($v)){
            $d = new Donneur();
            $d->setNom($obj->nom);
            $d->setPrenom($obj->prenom);
            $d->setDateInscription($dateU->DBToForm($obj->dateInscription));
            $d->setDateNaissance($dateU->DBToForm($obj->dateNaissance));
            $d->setDernierDon($dateU->DBToForm($obj->dernierDon));

            $nextDon = date("Y-m-d", strtotime("+3 month", strtotime($obj->dernierDon)));
            $d->setProchainDon($dateU->DBToForm($nextDon));

            $d->setCodeAd($obj->codeAd);
            $d->setCin($obj->cin);
            $d->setAdresse($obj->adresse);
            $d->setFonction($obj->fonction);
            $d->setEtatMatrimonial($obj->etatMatrimonial);
            $d->setNombreEnfant($obj->nbrEnfant);
            $d->setGroupeSanguin($obj->groupeSonguin);
            $d->setMail($obj->mail);
            $d->setTel($obj->tel);
            $d->setPhoto($obj->photo);
            $d->setAptPourDon($obj->aptPourDon);
            $d->setSexe($obj->sexe);
            $d->setEtatCArte($obj->etatCarte);
            $d->setRemarques($obj->remarques);
            $d->setIdDonneur($obj->iddonneur);

            $tab[] = $d;
        }
        $this->objConnexion->close($bdd);
        return $tab;

    }
}
?>