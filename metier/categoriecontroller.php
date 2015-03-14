<?php
/**
 * User: Mido
 * Date: 08/02/2015
 * Time: 18:30
 */
class CategorieController{

    private $categorieDao;

    function __construct()
    {
        $this->categorieDao = new categorieDao();
    }

    public function ajouterCategorie($category)
    {
        $categorie = new Categorie("", $category);
        return $this->categorieDao->addCategorie($categorie);
    }

    public function getAllCategorie()
    {
        return $this->categorieDao->getAllCategorie();
    }

   public function deleteCategorie($id)
    {
        return $this->categorieDao->deleteCategorie($id);
    }

    public function getCategorieById($id){
        return $this->categorieDao->getCategorieById($id);
    }

    public function editCategorie($category, $oldId){
        $categorie = new Categorie("", $category);
        return $this->categorieDao->editCategorie($categorie, $oldId);
    }
}
?>