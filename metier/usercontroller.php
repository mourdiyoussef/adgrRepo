<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class UserController{

    private $userDao;

    function __construct()
    {
        $this->userDao = new userDao();
    }

    public function ajouterUser($nom, $prenom, $type)
    {
        $login = strtolower($nom.".".$prenom);
        $mdp = md5($login);
        $user = new User("", $nom, $prenom, $login, $mdp, $type);
        return $this->userDao->addUser($user);
    }

   public function getAllUser()
    {
        return $this->userDao->getAllUser();
    }

    public function deleteUser($id)
    {
        return $this->userDao->deleteUser($id);
    }

    public function getUserById($id){
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
}
?>