<?php

$action=filter_var($_GET["action"]??"client",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action){

    case "formLogin":
        require("view/client/login.php");
        break;

    case "panier":
        $objetArticleManager=new ArticleManager($lePDO);
        require("view/client/panier.php");
        break;
        
    case "traitementAjoutPanier":
        $idArticle=filter_var($_POST['idArticle'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $quantite=filter_var($_POST['quantite'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier']=[];
        }
        else{
            for($i=0;$i<count($_SESSION['panier']);$i++)
            {
                if($idArticle==$_SESSION['panier'][$i][0])
                {
                    $quantite+=$_SESSION['panier'][$i][1];
                    $_SESSION['panier'][$i][1]=$quantite; 
                   header("location:./?path=client&action=panier");
                    exit;
                }
            }
        }
       
        array_push($_SESSION['panier'],[$idArticle,$quantite]);
        header("location:./?path=client&action=panier");
        break;

        case "valideCommande":
            $objetCommandeManager= new CommandeManager($lePDO);
            $resultat=$objetCommandeManager->createCommande();
            if($resultat){
                unset($_SESSION["panier"]);
            }
            header("location:?path=client&action=panier");
            break;

    default :
    require('view/404.php');
}

?>