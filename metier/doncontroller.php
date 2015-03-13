<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class DonController{

    private $donDao;

    function __construct()
    {
        $this->donDao = new donDao();
    }

    public function ajouterDon($idDonneur, $idCollecte)
    {
        $don = new Don('', $idDonneur, $idCollecte);
        return $this->donDao->addDon($don);
    }

    public function getAllDonByUserId($idUser){
        return $this->donDao->getAllDonByUserId($idUser);
    }

    public function deleteDon($id)
    {
        return $this->donDao->deleteDon($id);
    }

   /* public function getUserById($id){
        return $this->userDao->getUserById($id);
    }

    public function editUser($nom, $prenom, $type, $oldId){
        $login = strtolower($nom.".".$prenom);
        $u = $this->userDao->getUserById($oldId);
        $user = new User("", $nom, $prenom, $login, $u->getMdp() , $type);
        return $this->userDao->editUser($user, $oldId);
    }

    public function initMotDePasseUser($id){
        $user =  $this->userDao->getUserById($_GET['idUser']);
        $user->setMdp(md5($user->getNom().".".$user->getPrenom()));
        return $this->userDao->initMotDePasseUser($user, $id);
    }

    public function getUserByLoginAndPassword($login, $mdp){
        return $this->userDao->getUserByLoginAndPassword($login,md5($mdp));
    }

    public function editPassword($newPass, $idUser){
        return $this->userDao->editPassword(md5($newPass),$idUser);
    }*/
}
?>