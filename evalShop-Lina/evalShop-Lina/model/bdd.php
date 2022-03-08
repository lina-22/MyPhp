<?php


/**
 * Function qui permet d'établir la co a la BDD 
 * retourne la connexion
 */
function etablirCo()
{
    $urlSGBD="localhost";
    $nomBDD="exemple_shop"; // le nom de la BDD
    $loginBDD="root";
    $mdpBDD="";// le mdp est root si on utilise Mamp
    try{
    $connex = new PDO("mysql:host=$urlSGBD;dbname=$nomBDD", "$loginBDD", "$mdpBDD", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error) {
        echo "Il y a un problème de co a la BDD verifier que la bdd est presente et les lignes 7 à 10 du fichier bdd.php<br>";
        echo $error->getMessage();
    }
    // var_dump("connection okk");
    return $connex;
}

/**
 * Fonction qui permet de recuperer toutes les categories
 *
 * @return array Les categories dans un array a 2 dimensions
 */
require_once("model/class/categorie.class.php");
function fetchAllCategorie(){

        try {
            $connex=etablirCo();
            $sql =$connex->prepare("SELECT * FROM categorie ORDER BY nom");
            $sql->execute();
            //$sql->setFetchMode(PDO::FETCH_CLASS,"Categorie");
            $resultat = ($sql->fetchAll());
            return $resultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

   

    /**
     * Permet de recuperer tout les articles d'une categorie (par son id)
     *
     * @param [type] $idCate
     * @return array un array a deux dimensions
     */
    function fetchAllArticleByIdCateg($idCate){

        try {
            $connex=etablirCo();
            $sql =$connex->prepare("SELECT * FROM article WHERE idCategorie=:idCategorie ORDER BY nom");
            $sql->bindParam(":idCategorie",$idCate);
            $sql->execute();
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
     * @return void
     */
    function createArticle($nom,$description,$prix,$dispo,$fragile,$idCateg){
        try {
            $connex=etablirCo();
            $sql =$connex->prepare("INSERT INTO article values(null,:nom,:description,:prix,:dispo,:idCateg,:fragile)");
            $sql->bindParam(":nom",$nom);
            $sql->bindParam(":description",$description);
            $sql->bindParam(":prix",$prix);
            $sql->bindParam(":dispo",$dispo);
            $sql->bindParam(":idCateg",$idCateg);
            $sql->bindParam(":fragile",$fragile);
            $sql->execute();
      

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


?>