<?php
//@todo refactoring poo
$title="Shop : ".$laCategorie->getNom();

ob_start();?>
<div class="container">
   
    <?php 
    echo" <h1>".ucfirst($laCategorie->getNom())."</h1>";
    echo "<br>";
    ?>
    <div class="d-flex justify-content-around row card-deck">
        <?php
    foreach($lesArticles as $unArticle)
{ ?>
    <div class="card mx-1 my-2" style="width: 20rem;" >
        <img class="card-img-top"  src="./public/img/articles/article<?=$unArticle->getIdArticle() ?>.jpg" alt="Card image cap">
        <div class="card-body" style="display: flex; flex-direction:column; justify-content:space-between;">
            <h5 class="card-title"><?=$unArticle->getNom() ?></h5>
            <p class="card-text"><?=$unArticle->getPrixUnitaire() ?>€</p>
            <?php 
            if($unArticle->getEstDisponible())
            {
                echo "<p class='text-success'> Article diponible</p>";
            }
            else{
                echo "<p class='text-danger'> Article indiponible</p>";
            }
            ?>
            <a href="./?path=article&action=article&id=<?php echo $unArticle->getIdArticle()?>" class="btn btn-primary">Consulter</a>
        </div>
    </div>
    <?php
}
?>
</div>
<br>
</div>
<?php

$content= ob_get_clean();

require("view/template.php");
?>