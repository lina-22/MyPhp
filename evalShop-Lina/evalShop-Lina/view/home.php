<?php $title = 'Shop : Home'; ?>

<?php ob_start(); ?>
<div class="container">
<h1>Boutique en ligne</h1>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>