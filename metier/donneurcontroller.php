<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class DonneurController{

    private $donneurDao;

    function __construct()
    {
        $this->donneurDao = new donneurDao();
    }

    public function ajouterDonneur($nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
                                   $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $photo, $aptPourDon, $sexe, $etatCArte, $remarques)
    {
        $login = $cin;
        $mdp = $codeAd;
        $dateInscription = Date("Y-m-d");
        $dateUtil = new switchDate();
        $dateNaissance = $dateUtil->formToDB($dateNaissance);
        $dernierDon = $dateUtil->formToDB($dernierDon);
        $donneur = new Donneur("", $nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
            $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $photo, $dateInscription, $aptPourDon, $login, md5($mdp),
            $sexe, $etatCArte, $remarques);
        return $this->donneurDao->addDonneur($donneur);
    }

    public function getAllDonneur()
    {
        return $this->donneurDao->getAllDonneur();
    }

    public function deleteDonneur($id)
    {
        return $this->donneurDao->deleteDonneur($id);
    }

    public function getDonneurById($id){
        return $this->donneurDao->getDonneurById($id);
    }

    public function editDonneur($nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
                                   $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $aptPourDon, $sexe, $etatCArte, $remarques,$oldDonneurId){
        $login = $cin;
        $mdp = $codeAd;
        $dateInscription = Date("Y-m-d");
        $dateUtil = new switchDate();
        $dateNaissance = $dateUtil->formToDB($dateNaissance);
        $dernierDon = $dateUtil->formToDB($dernierDon);
        $oldDonneur = $this->donneurDao->getDonneurById($oldDonneurId);
        $donneur = new Donneur("", $nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
            $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $oldDonneur->getPhoto(), $dateInscription, $aptPourDon, $login, md5($mdp),
            $sexe, $etatCArte, $remarques);
        return $this->donneurDao->editDonneur($donneur, $oldDonneurId);
    }

    public function getNbreDonneurByGroup($group){
        return $this->donneurDao->getNbreDonneurByGroup($group);
    }
}
?>