<?php
session_start();
require("model/bdd.php");
//Chargement automatique des classes (classes métiers et managers)
spl_autoload_register(function ($class_name) {
    if (strstr($class_name, "Manager")) {
        include "model/manager/" . $class_name . ".php";
    } else {
        include "model/class/" . $class_name . '.class.php';
    }
});

$lePDO = etablirCo();

$path = filter_var($_GET['path'] ?? "main", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


switch ($path) {
    case "main":
        require('controller/controller.php');
        break;
    case "article":
        require("controller/articleController.php");
        break;

    case "client":
        if (empty($_SESSION['role']) || $_SESSION['role'] != "client") {
            header("location:./?path=main&action=formLogin");
        } else {
            require('controller/clientController.php');
        }

        break;

    case "admin":
        // if (empty($_SESSION['role']))
        // {
        //     require("view/403.php");
        // }
        // elseif($_SESSION['role']=="admin")
        require('controller/adminController.php');
        // }
        // else{
        //     require("view/403.php");
        // }
        break;
    case "user":
        require('controller/clientController.php');
        break;

    case "adminCategorie":

        require('controller/categorieController.php');

        break;



    default:
        require("view/404.php");
}
