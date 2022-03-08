<?php

$title = "Shop : Administration de categorie";

ob_start(); ?>
<div class="container">
    <h1>Administration de categorie</h1>
    <h2><?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];

            unset($_SESSION['msg']);
        }
        ?></h2>
    <form method="POST" action="?path=adminCategorie&action=categorieModif&id=<?=$categorie->getIdCategorie()?>">
        <div>
            <label for="categorie">Categorie</label>
            <input value="<?=$categorie->getNom()?>" type="text" name="categorie" class="form-control" id="categorie">
        </div>
        <button type="submit">Modifier</button>
    </form>
    <br>
</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>