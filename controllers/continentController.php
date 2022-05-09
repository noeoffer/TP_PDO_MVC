<?php
$action=$_GET['action'];
switch($action){
    
    case 'list' : 
        $lesContinents = Continent::findAll();
        include('vues/continent/listeContinents.php');
    break;

    case 'add' :
        $mode="Ajouter";
        $lesContinents = Continent::findAll();
        include ("vues/continent/formContinent.php");
    break;

    case 'update' :
        $mode="Modifier";
        
        $continent=Continent::findById($_GET['num']);
        include ("vues/continent/formContinent.php");
        break;

    case 'delete' :  
        $continent=Continent::findById($_GET['num']);
        $nb=Continent::delete($continent);
        if ($nb==1){
            $_SESSION['message']=["success"=>"Le continent à bien été supprimé"];
        }
        else{
           $_SESSION['message']=["danger"=>"Le continent n'a pas été supprimé"];

        }
        header('location:index.php?uc=continents&action=list');
        exit();
    break;

    case 'valideform' :
         $continent = new  Continent();
         if (empty($_POST['num'])){ //Création
             $continent->setLibelle($_POST['libelle']);
             $nb=Continent::add($continent);
             $message="ajouté";
         }else{ //Modification
            $continent->setNum($_POST['num']);
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::update($continent);
            $message="modifié";
         }
         if ($nb==1){
             $_SESSION['message']=["success"=>"Le continent à bien été $message"];
         }
         else{
            $_SESSION['message']=["danger"=>"Le continent à bien été $message"];

         }
         header('location:index.php?uc=continents&action=list');
        exit();
        break; 
}