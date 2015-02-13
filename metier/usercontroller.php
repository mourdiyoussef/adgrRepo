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

   public function deleteContact($id)
    {
        return $this->contactDao->deleteContact($id);
    }

    public function getContactById($id){
        return $this->contactDao->getContactById($id);
    }

    public function editContact($nom, $prenom, $adresse, $fonction, $mail, $tel, $type, $remarques, $oldId){
        $contact = new Contact("", $nom, $prenom, $adresse, $fonction, $mail, $tel, $type, $remarques);
        return $this->contactDao->editContact($contact, $oldId);
    }
}
?>