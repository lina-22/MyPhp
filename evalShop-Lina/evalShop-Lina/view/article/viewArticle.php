<?php 
    $title = 'Shop : Article'; 
    ob_start(); 
   
 ?>
 
<div class="container">
<h1>Page article</h1>
<div class="row">
    <div class=" col-lg-6">
        <h2>Image</h2>
        <img class="col-10" src="./public/img/articles/article<?=$article->getIdArticle()?>.jpg" alt="Image de l'article">
    </div>
    <div class=" col-lg-6 d-flex-column ">
        <h2><?php echo  ucfirst($article->getNom()); ?></h2>
        <div>
            <h3>Description :</h3>
            <p><?= $article->getDescription(); ?></p>
        </div>
        <p>
        <?php if($article->getEstDisponible()){
            echo "<div class='text-success'>Produit disponible</div>";
        }
        else{
            echo "<div class='text-danger'>Produit indisponible</div>";
        }
        ?></p>
        <p>Prix unitaire : <?=$article->getPrixUnitaire()?> € </p>
        <?php if(empty($_SESSION['role']) || $_SESSION['role']!="client"):
        ?>
        <a href="./?path=main&action=formLogin" class="btn btn-info">Se connecter</a>
        <a href="./?path=main&action=" class="btn btn-info">S'inscrire</a>
        <?php else: ?>
            <form novalidate action="./?path=client&action=traitementAjoutPanier" method="post" class="mx-auto col-6 my-3">
            <h2>Commander l'article</h2>
            <input type="hidden" name="idArticle" value="<?=$article->getIdArticle()?>" required>
            <label for="inputQuantite">Nombre d'article :</label>
            <div class="col-sm-5">
            <input type="number" name="quantite" id="inputQuantite" min="0" max="20" size="2" required class="form-control">
            </div>
            <button class="btn btn-danger my-2">Ajouter au panier</button>
        </form>
        <?php endif;?>
        
    </div>
</div>
</div>

<?php 
    $content = ob_get_clean(); 
    require("view/template.php");?>