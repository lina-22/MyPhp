<?php

class CommandeManager{
private $lePDO;

public function __construct($unPDO)
{
    $this->lePDO=$unPDO;
}


function createCommande(){
    try {
        //idCommande 	dateCommande 	dateLivraison 	etat 	idClient 
        $connex=$this->lePDO;
        $connex->beginTransaction();
        $sql =$connex->prepare("INSERT INTO commande values(null,:dateCommande,null,'En cours',:idClient)");
        $today = date("Y-m-d H:i:s");   
        $sql->bindParam(":dateCommande",$today);
        $sql->bindValue(":idClient",$_SESSION['id']);
        $sql->execute();

        //idArticle 	idCommande 	quantiteArticle 
        $idCommande=$connex->lastInsertId();
        foreach($_SESSION['panier'] as $uneLignePanier)
        {
        $sql =$connex->prepare("INSERT INTO article_commande values(:idArticle,:idCommande,:quantite)");
        
        $sql->bindParam(":idCommande",$idCommande);
        $sql->bindValue(":idArticle",$uneLignePanier[0]);
        $sql->bindValue(":quantite",$uneLignePanier[1]);
        $sql->execute();
        }
        $connex->commit();
        return true;

    } catch (PDOException $error) {
        $connex->rollBack();
        echo $error->getMessage();
        return false;
    }

    
}

function fetchAllCommande(){

    try {
        //Pour la co on utilise l'attribut lePDO
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT 
        cl.adresse, 
        cl.codePostal, 
        cl.email,
        cl.idClient, 
        cl.nom, 
        cl.prenom, 
        cl.ville, 
        com.idClient, 
        com.dateCommande, 
        com.dateLivraison, 
        com.etat,
        a.nom,
        a.description,
        a.prixUnitaire,
        a.estDisponible
        FROM client cl 
        INNER JOIN commande com ON cl.idClient = com.idClient
        INNER JOIN article_commande ar ON ar.idCommande = com.idCommande
        INNER JOIN article a ON ar.idArticle = a.idArticle;
        ");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"CommandDetails");
        $resultat = ($sql->fetchAll());
        // var_dump("res here :", $resultat);
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
}
?>