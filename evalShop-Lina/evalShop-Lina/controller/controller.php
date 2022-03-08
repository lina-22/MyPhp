<?php

$action = filter_var($_GET["action"] ?? "home", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case "home":
        require('view/home.php');
        break;

    case "contact":
        require('view/contact.php');
        break;



    case "formLogin":
        require("view/client/login.php");
        break;

    case "traitementLogin":
        var_dump($_POST);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp = hash("sha256", $mdp);

        $objetClientManager = new ClientManager($lePDO);
        $client = $objetClientManager->fetchClientByEmailAndMdp($email, $mdp);
        if (empty($client)) {
            //msg $msgErreur
            $_SESSION['erreur'] = [];
            array_push($_SESSION['erreur'], "Erreur connexion");
            header("location:./?path=main&action=formLogin");
            var_dump("test here...");
        } else {
            $_SESSION["email"] = $client->getEmail();
            $_SESSION["id"] = $client->getIdClient();
            $_SESSION["role"] = "client";
            header("location:./");
        }

        break;

    case "logout":
        session_unset();
        session_destroy();
        header("location:./?path=main&action=formLogin");
        break;

    case "formInscription":
        require("view/client/inscription.php");
        break;

        
        // Mission 2 : Faire en sorte qu’un utilisateur puisse s’inscrire en tant que client. 
    case "traitementInscription":
        // idClient/1prenom	/2nom	/6email	/7mdp/8cofrm mdp	/3adresse	/4ville	/5codePostal
        
        $prenom = filter_var($_POST["prenom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo "test here traitementInscription";
        $nom = filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp  = filter_var($_POST["mdp1"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp2 = filter_var($_POST["mdp2"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($mdp != $mdp2) {
            $_SESSION["error"] = "Please check your password";
            // header("location:?path=main&action=formInscription");
            exit;
        }
        $hashedPassword=hash("SHA256", $mdp);
        $address = filter_var($_POST["adresse"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ville = filter_var($_POST["ville"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $codePostal = filter_var($_POST["codePostal"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $objetClientManager= new ClientManager($lePDO);
        $resultat=$objetClientManager->createClient($prenom,$nom,$email,$hashedPassword,$address,$ville,$codePostal);
        if($resultat==true){
        
            $_SESSION["msg"]="client registered successfully";
             header("location:?path=user&action=formLogin"); 
        }
        else{
            $_SESSION["error"]="Inscription failed";
            header("location:?path=user&action=formInscription");
        }
    break;

    default:
        require('view/404.php');
}
