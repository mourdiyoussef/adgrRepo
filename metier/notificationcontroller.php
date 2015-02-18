<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class NotificationController{

    private $notificationDao;

    function __construct()
    {
        $this->notificationDao = new NotificationDAO();
    }

    public function ajouterNotification($idCollecte, $codeDonneur, $reponse, $remarques )
    {
        $donneurCtrl = new DonneurController();
        $donneur = $donneurCtrl->getDonneurByCodeAd($codeDonneur);
        $idDonneur = $donneur->getIdDonneur();
        $idUser = $_SESSION['idUser'];
        $dateNotif = date("Y-m-d");
        $notif = new Notification("", $idCollecte, $idDonneur, $idUser, $dateNotif, $remarques, "appel", $reponse);
        return $this->notificationDao->addNotification($notif);
    }

    /*public function getAllCollecte()
    {
        return $this->collecteDao->getAllCollecte();
    }

    public function deleteCollecte($id)
    {
        return $this->collecteDao->deleteCollecte($id);
    }

    public function getCollecteById($id){
        return $this->collecteDao->getCollecteById($id);
    }

    public function editCollecte($dateCollecte, $lieuCollecte, $type, $remarque, $oldCollecteId){
        $dateUtil = new switchDate();
        $dateCollecte = $dateUtil->formToDB($dateCollecte);
        $collecte = new Collecte("", $dateCollecte, $lieuCollecte, $type, $remarque);
        return $this->collecteDao->editCollecte($collecte, $oldCollecteId);
    }*/
}
?>