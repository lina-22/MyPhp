<?php

$title="Shop : Administration des articles";

ob_start();?>
<div class="container">
   <h1>Administration des articles</h1>
   <h2><?php 
   if(isset($_SESSION['msg']))
   {
     echo $_SESSION['msg'];

     unset($_SESSION['msg']);
    
   }
   ?></h2>
   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">idArticle</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Est disponible</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
    <tbody>
        <?php
    foreach($articles as $unArticle)
{ 
//@todo afficher les lignes
?>    
<tr>
  <th scope="row"><?=$unArticle->getIdArticle() ?></th>
  <td><?=$unArticle->getNom() ?></td>
  <td><?=$unArticle->getPrixUnitaire()?></td>
  <td><?=$unArticle->getEstDisponible()?></td>
  <td class="d-flex">

      <a class="btn btn-danger mx-2" href="?path=admin&action=formModifActicle&idArticle=<?=$unArticle->getIdArticle()?>">Modifier</a>
      
      <form action="?path=admin&action=supprimerArticle" class="d-flex" method="post">
        <input type="hidden" name="idArticle" id="inputId" required value=<?= $unArticle->getIdArticle()?> >
        <!-- <input type="hidden" name="token"> -->
        <button class="btn btn-danger mx-2">Supprimer</button>
      </form>
  </td>
</tr>

<?php
}
?>
</tbody>
</table>
<br>
</div>
<?php

$content= ob_get_clean();

require("view/template.php");
?>