<?php

$title="Shop : Ajouter un Produit";

ob_start();?>
<div class="container">
    <?php 
    if(isset($_SESSION['error']))
    {
        var_dump($_SESSION['error']);
        foreach($_SESSION['error'] as $msg)
        {
            echo ("<div class='text-danger'>$msg</div> <br>");
        }
    }
    ?>
    <h1 class="d-flex justify-content-center">Formulaire d'ajout d'un Categorie</h1>
   
    <form novalidate action="./?path=adminCategorie&action=addCategorieProcesse" class="col-lg-6  col-md-8 mx-auto " enctype="multipart/form-data" method="post">
        <div>
            <label for="inputNom">Nom Categorie * :</label>
            <input required type="text" name="nom" id="inputNom" class="form-control" minlength="2" maxlength="100">
        </div>
       
        <button class="btn btn-info my-2">Envoyer</button>
    </form>
</div>
<?php $content=ob_get_clean();
require("view/template.php");?>