<?php
/**
 * User: youssef
 * Date: 08/02/2015
 * Time: 18:30
 */
class CollecteController{

    private $collecteDao;

    function __construct()
    {
        $this->collecteDao = new collecteDao();
    }

    public function ajouterCollecte($dateCollecte, $lieuCollecte, $type, $remarque )
    {
        $dateUtil = new switchDate();
        $dateCollecte = $dateUtil->formToDB($dateCollecte);
        $collecte = new Collecte("", $dateCollecte, $lieuCollecte, $type, $remarque);
        return $this->collecteDao->addCollecte($collecte);
    }

    public function getAllCollecte()
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
    }
}
?>