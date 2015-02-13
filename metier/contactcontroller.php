<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class ContactController{

    private $contactDao;

    function __construct()
    {
        $this->contactDao = new contactDao();
    }

    public function ajouterContact($nom, $prenom, $adresse, $fonction, $mail, $tel, $type, $remarques)
    {
        $contact = new Contact("", $nom, $prenom, $adresse, $fonction, $mail, $tel, $type, $remarques);
        return $this->contactDao->addContact($contact);
    }

    public function getAllContact()
    {
        return $this->contactDao->getAllContact();
    }

   /* public function deleteDonneur($id)
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
    }*/
}
?>