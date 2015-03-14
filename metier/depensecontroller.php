<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class DepenseController{

    private $depenseDao;

    function __construct()
    {
        $this->depenseDao = new depenseDao();
    }

    public function ajouterDepense($collecte, $montant, $remarque, $categorie)
    {
        $depense = new Depense("", $collecte, $montant, $remarque, $categorie);
        return $this->depenseDao->addDepense($depense);
    }

    public function getAllDepense()
    {
        return $this->depenseDao->getAllDepense();
    }

    public function getDepenseByCollecte($idcollect)
    {
        return $this->depenseDao->getDepenseByCollecte($idcollect);
    }

   public function deleteDepense($id)
    {
        return $this->depenseDao->deleteDepense($id);
    }

    public function getDepenseById($id){
        return $this->depenseDao->getDepenseById($id);
    }

    public function editDepense($collecte, $montant, $remarque, $categorie, $oldId){
        $depense = new Depense("", $collecte, $montant, $remarque, $categorie);
        return $this->depenseDao->editDepense($depense, $oldId);
    }
}
?>