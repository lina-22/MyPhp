<?php
$action=filter_var($_GET["action"]??"404",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action){
   case "categorie":
        $idCateg=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetCatManager=new CategorieManager($lePDO);
        $laCategorie=$objetCatManager->fetchCategorieById($idCateg);

        $objetArticleManager= new ArticleManager($lePDO);
        $lesArticles=$objetArticleManager->fetchAllArticleByIdCateg($idCateg);
        require ('view/categorie/categorie.php');
    break;

    case "article":
        $idArticle=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetArticleManager=new ArticleManager($lePDO);
        $article=$objetArticleManager->fetchArticleByIdArticle($idArticle);
        
        require("view/article/viewArticle.php");
    break;
    default :
    require('view/404.php');
}