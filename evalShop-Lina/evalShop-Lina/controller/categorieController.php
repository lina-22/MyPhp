<?php
$action = filter_var($_GET["action"] ?? "categories", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
switch ($action) {
    case "categories":
        $objectCategorieManager = new CategorieManager($lePDO);
        $categories = $objectCategorieManager->fetchAllCategorie();
        require('view/categorie/categories.php');
        break;

    case "categorieById":
        $id = filter_var($_GET["idCategorie"], FILTER_SANITIZE_NUMBER_INT);
        $objectCategorieManager = new CategorieManager($lePDO);
        $categorie = $objectCategorieManager->fetchCategorieById($id);
        require('view/categorie/categorieModif.php');
        break;
    case "categorieModif":
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
        $categorie = filter_var($_POST["categorie"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objectCategorieManager = new CategorieManager($lePDO);
        $updatedCategorie = $objectCategorieManager->updateCategorie($id, $categorie);
        header("location:./?path=adminCategorie&action=categories");
        break;

    case "addCategorieForm":
        require ('view/categorie/addCategorieForm.php');
        break;    
     
    case "addCategorieProcesse":
        $nom= filter_var($_POST["nom"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objectCategorieManager = new CategorieManager($lePDO);
        $objectCategorieManager->addCategorie($nom);
        header("location:./?path=adminCategorie&action=categories");
        break;


    case "deleteCategorie":
        $id = filter_var($_GET["idCategorie"], FILTER_SANITIZE_NUMBER_INT);
        $objectCategorieManager = new CategorieManager($lePDO);
        $objectCategorieManager->deleteCategorie($id);
        header("location:./?path=adminCategorie&action=categories");
        break;
    default:
        require('view/404.php');
}
