<?php $title = 'Shop : Contact'; 
 ob_start(); 
 ?>
 
<div class="container">
<h1>Contact</h1>
<form action="" method="post">
    <div class="row">
        <label for="inputEmail">Email : </label>
        <input type="email" id="inputEmail" class="form-control" name="email" required minlength="6">
    </div>
    <div class="row">
        <label for="inputSujet">Sujet : </label>
        <input type="text" id="inputSujet" name="sujet" class="form-control" required minlength="6">
    </div>
    <div class="row">
        <label for="inputMsg">Message : </label>
        <textarea name="" id="inputMsg" cols="30" rows="10" class="form-control"></textarea>
    </div>
</form>
</div>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>