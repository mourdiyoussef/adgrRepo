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
        $login = $nom.".".$prenom;
        $mdp = $codeAd;
        $dateInscription = Date("Y-m-Y");

        $donneur = new Donneur("", $nom, $prenom, $codeAd, $dateNaissance, $dernierDon, $adresse, $fonction, $etatMatrimonial,
            $nombreEnfant, $groupeSanguin, $mail, $tel, $cin, $photo, $dateInscription, $aptPourDon, $login, $mdp,
            $sexe, $etatCArte, $remarques);
        if($this->donneurDao->addDonneur($donneur)){
            return true;
        }else{
            return false;
        }

    }

}
?>