<?php 
    $title = 'Shop : 404'; 
    ob_start(); 
 ?>
 
<div class="container">
<h1>404 : Page introuvable</h1>
</div>

<?php 
    $content = ob_get_clean(); 
    require('template.php'); 
?>