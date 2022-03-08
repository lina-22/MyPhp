<?php
class CategorieManager{
private $lePDO;

public function __construct($unPDO)
{
    $this->lePDO=$unPDO;
}

/**
 * Fonction qui permet de recuperer toutes les categories
 *
 * @return array Les categories dans un array a 2 dimensions
 */
function fetchAllCategorie(){

    try {
        //Pour la co on utilise l'attribut lePDO
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM categorie ORDER BY nom");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Categorie");
        $resultat = ($sql->fetchAll());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

 /**
     * Permet de recuperer une categorie par son id
     *
     * @param [type] $id l'id de la categorie
     * @return array la categorie sous la forme d'un array
     */
    function fetchCategorieById($id)
    {
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM categorie WHERE idCategorie=:idCategorie");
            $sql->bindParam(":idCategorie",$id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Categorie");
            $resultat = ($sql->fetch());
            return $resultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function updateCategorie($id,$categorie){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("UPDATE categorie set nom=:nom where idCategorie=:id");
            $sql->bindParam(":nom",$categorie);
            $sql->bindParam(":id",$id);
            $sql->execute();
            return true;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        } 
    }

    public function deleteCategorie($id){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("DELETE FROM categorie WHERE idCategorie=:idCategorie");
            $sql->bindParam(":idCategorie",$id);
            $sql->execute();
            var_dump("here...");
            return true;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        } 
    }
    public function addCategorie($nom){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO categorie VALUES (null, :nom)");
            $sql->bindParam(":nom",$nom);
            $sql->execute();
            return true;


            // $sql =$connex->prepare("INSERT INTO categorie (name, lastName, add, phone) VALUES (:name, :lastName, :add, :phone)");
            // $sql =$connex->prepare("INSERT INTO categorie VALUES (null,:name, :lastName, :add, :phone, null)");
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        } 
    }

}
?>