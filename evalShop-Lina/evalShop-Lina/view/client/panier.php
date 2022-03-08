<?php

$title="Shop : Mon panier";

ob_start();?>
<div class="container">
   <h1>Mon panier</h1>
 
   <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Nom</th>
      <th scope="col">Quantite</th>
      <th scope="col">Prix unitaire</th>
      <th scope="col">Prix total</th>
    </tr>
  </thead>
    <tbody>
  <?php 
  if(isset($_SESSION['panier'])){

 
  for($i=0;$i<count($_SESSION['panier']);$i++)
  {
$article=$objetArticleManager->fetchArticleByIdArticle($_SESSION['panier'][$i][0]);

?>
<tr>
    <td><?=$article->getNom()?></td>
    <td><?=$_SESSION['panier'][$i][1]  ?></td>
    <td><?=$article->getPrixUnitaire()?></td>
    <td><?=$_SESSION['panier'][$i][1]*$article->getPrixUnitaire()?></td>
</tr>
<?php
  } 
}
else{
  ?>
  <div class="alert alert-danger">
    Le panier est vide
  </div>
  <?php
}
  ?>

</tbody>
</table>



<form action="./?path=client&action=valideCommande" method="POST">

<button class="btn btn-info">Valider panier</button>
<button class="btn btn-danger">Delete My Order</button>
<button class="btn btn-info">Change My Order</button>
</form>

<br>
</div>
<?php

$content= ob_get_clean();

require("view/template.php");
?>