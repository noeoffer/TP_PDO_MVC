<?php session_start(); 
include "vues/header.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/Accueil.php');
        break;
    case 'continents' :
        break;
}

include "vues/footer.php";?>