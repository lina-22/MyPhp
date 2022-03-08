<?php $title = 'Shop : Admin'; ?>

<?php ob_start(); ?>
<div class="container">
<h1>Page Admin</h1>

<div class="row">
    <div class="col-lg-4 col-md-5 col-12">
        <h2>Gestion des articles</h2>
        <a class="btn btn-info my-2" href="?path=admin&action=formAjoutArticle">Ajouter un articles</a>
        <br>
        <a class="btn btn-info my-2" href="?path=admin&action=adminArticle">Gèrer les articles</a>
    </div>

    <div class="col-lg-4 col-md-5 col-12">
        <h2>Gestion des categories</h2>
        <a class="btn btn-primary my-2" href="?path=adminCategorie&action=addCategorieForm">Ajouter une categorie</a>
        <br>
        <a class="btn btn-primary my-2" href="?path=adminCategorie&action=categories">Gèrer les categories</a>
    </div>

    <div class="col-lg-4 col-md-5 col-12">
        <h2>Gestion des utilisateurs</h2>
        <a class="btn btn-danger my-2" href="#">Gèrer les admins</a>
        <br>
        <a class="btn btn-danger my-2" href="#">Gèrer les utilisateurs (et commandes)</a>
    </div>
    <div class="col-lg-4 col-md-5 col-12">


        <!-- 07/03/2022 for see all the products commands pass by clients -->
        <h2>Gestion des commandes</h2>
        <a class="btn btn-primary my-2" href="?path=admin&action=lesCommandes">Afficher les commandes</a> 
    </div>
</div>
<br>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>