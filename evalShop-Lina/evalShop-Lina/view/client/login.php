<?php
$title="Shop : Connexion";
ob_start(); ?>

<?php if(isset($_SESSION['erreur'])){


            echo ("<div class='text-danger text-center list-unstyled my-3'>");
        
            foreach($_SESSION['erreur'] as $msgErreur){
                    echo "<li>" . $msgErreur . "</li>";

            }
            echo ("</div>");
        
unset($_SESSION['erreur']);
} ?>

<div class="row align-items-start m-auto">
    <div class="container-fluid">

     
        <form method="post" action="./?path=main&action=traitementLogin" class="d-flex justify-content-center" novalidate>

            <section class="my-2 ">
            <h1 class="text-center mb-5"> Connexion </h1>
                <div class="my-2 col-lg-12 col-md-8">
                    <label for="inputMail">Nom d'utilisateur</label>
                    <input required minlenght="6" id="imputMail" type="email" name="email"
                        placeholder="example@email.com" class="form-control">
                </div>
                <div class="my-2 col-lg-12 col-md-8">
                    <label for="Mdp">Mot de passe</label>
                    <input required minlenght="6" id="inputMdp" name="mdp" placeholder="Mot de passe" type="password"
                        class="form-control">
                </div>
                <div class="d-flex justify-content-center my-5"><button class="btn btn-info">Connexion Client</button></div>
               
            </section>
        </form>
        <div class="d-flex justify-content-center my-5">
        <button>
<!-- link added to admin connection form -->
            <a href="http://localhost/htdocs/evalShop-Lina/evalShop-Lina/?path=admin&action=formLogin" class="btn btn-info">Connexion Admin</a></div>
        </button>    
        


</div>
</div>


<?php $content=ob_get_clean();
require( "view/template.php" ); ?>