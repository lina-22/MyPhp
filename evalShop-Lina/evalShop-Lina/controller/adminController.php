<?php
$action=filter_var($_GET["action"]??"admin",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
switch ($action){
    case "admin":
        require('view/admin/admin.php');
    break;

    // comments for adminLogin step line no: 07 until 35 05/03/2022, 1st AdminClass create korlam
    // ?path=admin&action=traitementLogin

    case "formLogin":
        require("view/admin/login.php");
    break;

    case "traitementLogin":
        var_dump($_POST);
        $email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp=filter_var($_POST['mdp'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp=hash("sha256",$mdp);
      var_dump("here problem");
        $objetAdminManager=new AdminManager($lePDO);
        $admin=$objetAdminManager->fetchAdminByEmailAndMdp($email,$mdp);
        if(empty($admin)){
            //msg $msgErreur
            $_SESSION['erreur']= [];
            array_push($_SESSION['erreur'],"Erreur connexion");
            header("location:./?path=main&action=formLogin");
        }
        else{
            $_SESSION["email"]=$admin->getEmail();
            $_SESSION["id"]=$admin->getIdAdmin();
            $_SESSION["role"]="admin";
            header("location:./");
      
        }
        
    break;

    case "logout":
        session_unset();
        session_destroy();
        header("location:./?path=main&action=formLogin");
        break;

        // comments for adminLogin step line no: 07 until 35 05/03/2022


        case "adminArticle":
            //@todo Recuperer les articles
            $objetArticleManager=new ArticleManager($lePDO);
            $articles=$objetArticleManager->fetchAllArticle();
            
            require("view/admin/adminArticle.php");
            break;
    case "formAjoutArticle":
        $objetCategorieManager=new CategorieManager($lePDO);
        $lesCategories=$objetCategorieManager->fetchAllCategorie();
     
        require('view/article/formAddArticle.php');
    break; 

    case "traitementAjoutArticle":
       var_dump($_POST);
       var_dump($_FILES);

       $imageOk=true;
       if ($_FILES["image"]["size"] > 1000000) {
           //array_push($_SESSION['error'],"Taille de l'image trop grande (>1Mo)");
           $imageOk=false;
         } 
         $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
         if($imageFileType!="jpg"&&$imageFileType!="jpeg"&&$imageFileType!="png"&&$imageFileType!="gif")
         {
        //    array_push($_SESSION['error'],"Format de fichier invalide");
           $imageOk=false;
         }
       if($imageOk==false)
       {
           echo "image incorecte";
           //header("location:./?path=admin&action=formAjoutArticle");
           exit;
       }

       $varNom=filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $varDescription=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $varPrix=filter_var($_POST['prix'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $varIdCateg=filter_var($_POST['idCategorie'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetArticleManager=new ArticleManager($lePDO);
        
       $idArticle=$objetArticleManager->createArticle($varNom,$varDescription,$varPrix,1,0,$varIdCateg);

       $nomImage="article".$idArticle.".jpg";

        echo $nomImage;
        move_uploaded_file($_FILES["image"]["tmp_name"],"public/img/articles/$nomImage");

        $_SESSION['msg']="Aticle Ajouter ".$varNom;
        header("location:?path=admin&action=adminArticle");

        break;

        case "supprimerArticle":
            $id=filter_var($_POST['idArticle'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $objetArticleManager=new ArticleManager($lePDO);
            $objetArticleManager->deleteArticleByIdarticle($id);
            header("location:./?path=admin&action=adminArticle");
            break;

            

        case "lesCommandes":
            
            $objectCommandeManager=new CommandeManager($lePDO);
            $commandes = $objectCommandeManager->fetchAllCommande();
            require ("view/admin/lesCommandes.php");
            break;    
    default :
    require('view/404.php');
}

?>