<?php
//@todo refactoring poo
$title = "Shop : ";

ob_start(); ?>
<div class="container">

    <div class="d-flex justify-content-around row card-deck">
        <h1>Administration de Categories</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Categorie Id</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $categorie) {

                ?>
                    <tr>
                        <td><?= $categorie->getIdCategorie() ?></td>
                        <td><?= $categorie->getNom() ?></td>

                        <td>
                            <button>
                                <a href="?path=adminCategorie&action=categorieById&idCategorie=<?= $categorie->getIdCategorie() ?>"> Modifier</a>
                            </button>
                            <button>
                                <a href="?path=adminCategorie&action=deleteCategorie&idCategorie=<?= $categorie->getIdCategorie() ?>"> Supprimer</a>
                            </button>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
    <br>
</div>
<?php

$content = ob_get_clean();

require("view/template.php");
?>