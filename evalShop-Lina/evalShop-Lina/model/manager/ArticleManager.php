<?php

class ArticleManager{
private $lePDO;

public function __construct($unPDO)
{
    $this->lePDO=$unPDO;
}



    /**
     * Permet de recuperer tout les articles d'une categorie (par son id)
     *
     * @param [type] $idCate
     * @return array un array a deux dimensions
     */
    function fetchAllArticleByIdCateg($idCate){

        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM article WHERE idCategorie=:idCategorie ORDER BY nom");
            $sql->bindParam(":idCategorie",$idCate);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Article");
            $resultat = ($sql->fetchAll());
            return $resultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * Sauvegarde un nouvelle article dans la table article
     *
     * @param [type] $nom
     * @param [type] $description
     * @param [type] $prix
     * @param [type] $dispo
     * @param [type] $fragile
     * @param [type] $idCateg
     * @return int idArticle
     */
    function createArticle($nom,$description,$prix,$dispo,$fragile,$idCateg){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO article values(null,:nom,:description,:prix,:dispo,:idCateg,:fragile)");
            $sql->bindParam(":nom",$nom);
            $sql->bindParam(":description",$description);
            $sql->bindParam(":prix",$prix);
            $sql->bindParam(":dispo",$dispo);
            $sql->bindParam(":idCateg",$idCateg);
            $sql->bindParam(":fragile",$fragile);
            $sql->execute();
            $idArticle=$connex->lastInsertId();
            return $idArticle;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function fetchArticleByIdArticle($id)
    {
        try{


        $connex=$this->lePDO;
        $sql=$connex->prepare("SELECT * FROM article WHERE idArticle=:idArt");
        $sql->bindParam(":idArt",$id);
        $sql->execute();
        //Definir le mode de récuperation des donnees
        // par défaut on recup les données sous forme array 
        // si on veut recupere nos donner sous la forme d'objet d'une de nos classes
        //on utiliser setFetchMode
        $sql->setFetchMode(PDO::FETCH_CLASS,"Article");
        $resultat=$sql->fetch();
        return $resultat;
    }
    catch(PDOException $e)
    {
        echo "Fichier : ".$e->getFile()."<br>";
        echo "Ligne : ".$e->getLine()."<br>";
        echo $e->getMessage();
    }

    }

    function fetchAllArticle(){

        try {
            //Pour la co on utilise l'attribut lePDO
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM article ORDER BY idArticle");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Article");
            $resultat = ($sql->fetchAll());
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function deleteArticleByIdarticle($id)
    {
        try{
            $connex=$this->lePDO;
            $connex->beginTransaction();
            $sql=$connex->prepare("DELETE from article_commande where idArticle=:id");
            $sql->bindParam(":id",$id);
            $sql->execute();
            $sql2=$connex->prepare("DELETE from article where idArticle =:id");
            $sql2->bindParam(":id",$id);
            $sql2->execute();
            $connex->commit();
        }
        catch(PDOException $error)
        {
            $connex->rollBack();
            echo $error->getMessage();
        }
    }
}
?>