<?php
$title="Shop : Connexion";
ob_start(); ?>

<?php if(isset($_SESSION['erreur'])){
        if(count($_SESSION['erreur'])>0){

            echo ("<div class='text-danger text-center list-unstyled my-3'>");
        
            foreach($_SESSION['erreur'] as $msgErreur){
                    echo "<li>" . $msgErreur . "</li>";

            }
            echo ("</div>");
        }

} ?>

<div class="row align-items-start m-auto">
    <div class="container-fluid">



<form novalidate action="./?path=main&action=traitementInscription" method="post" class="d-flex justify-content-center">
    <section class="my-2">
        <h1 class="text-center mb-5">Formulaire d'inscription</h1>

        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputPrenom">Prénom* </label>
            <input minlength="2" required name="prenom" id="inputPrenom" type="text" class="form-control">
        </div>

        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputNom">Nom* </label>
            <input minlength="2" required name="nom" id="inputNom" type="text" class="form-control">
        </div>
        <hr>
        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputNom">Adresse* </label>
            <input minlength="8" required name="adresse" id="inputAdresse" type="text" class="form-control">
        </div> 

        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputNom">Ville* </label>
            <input minlength="2" required name="ville" id="inputVille" type="text" class="form-control">
        </div>  

        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputNom">Code Postal* </label>
            <input minlength="4" required name="codePostal" id="inputCP" type="text" class="form-control">
        </div> 

        <hr>

        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputEmail">Email* </label>
            <input required name="email" id="inputEmail" type="email" class="form-control">
        </div>
        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputMDP1">Mot de passe* </label>
            <input minlength="8" required name="mdp1" id="inputMDP1" type="password" class="form-control">
        </div>
        <div class="my-2 col-lg-12 col-md-8">
            <label for="inputMDP2">Confirmation Mot de passe* </label>
            <input minlength="8" required name="mdp2" id="inputMDP2" type="password" class="form-control"></div>
      
         

        <div class="d-flex justify-content-center my-5">
            <button class="btn btn-info">Envoyer</button>
        </div>
    </section>
</form>
</div>
</div>

<!-- pattern="^(? = .*[A-Z])(? = .*[a-z])(? = .*\d)(? = .*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" -->
<?php $content=ob_get_clean();
require( "view/template.php" ); ?>