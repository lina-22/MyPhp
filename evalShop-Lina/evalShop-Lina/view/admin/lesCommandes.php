<?php

$title="Shop : Administration des articles";

ob_start();?>
<div class="container">
   <h1>Administration des commandes</h1>
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
      <th scope="col">Client Nom</th>
      <th scope="col">Client PreNom</th>
      <th scope="col">Client Email</th>
      <th scope="col">Ville</th>
      <th scope="col">Date de Commande</th>
      <th scope="col">Date de Livraison</th>
      <th scope="col">Article</th>
      <th scope="col">Est disponible</th>
      <th scope="col">Etat</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
    <tbody>
        <?php
    foreach($commandes as $commande)
{ 
//@todo afficher les lignes
?>    
<tr>
  <td><?=$commande->getPrenom() ?></td>
  <td><?=$commande->getNom() ?></td>
  <td><?=$commande->getEmail() ?></td>
  <td><?=$commande->getVille() ?></td>
  <td><?=$commande->getDateCommande() ?></td>
  <td><?=$commande->getDateLivraison()?></td>
  <td><?=$commande->getArticleNom()?></td>
  <td><?=$commande->getEstDisponible()?></td>
  <td><?=$commande->getEtat()?></td>
  <td>
      <button>Confirmer</button>
      <button>Annuler</button>
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