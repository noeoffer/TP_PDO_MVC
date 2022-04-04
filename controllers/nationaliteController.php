<?php
$action=$_GET['action'];
switch($action){
    
    case 'list' : 
        $lesNationalites = Nationalite::findAll();
        include('vues/nationalite/listeNationalites.php');
    break;

    case 'add' :
        $mode="Ajouter";
        include ("vues/nationalite/formNationalite.php");
    break;

    case 'update' :
        $mode="Modifier";
        $nationalite=Nationalite::findById($_GET['num']);
        include ("vues/nationalite/formNationalite.php");
        break;

    case 'delete' :  
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalites);
        if ($nb==1){
            $_SESSION['message']=["success"=>"Le nationalite à bien été supprimé"];
        }
        else{
           $_SESSION['message']=["danger"=>"Le nationalite n'a pas été supprimé"];

        }
        header('location:index.php?uc=nationalites&action=list');
        exit();
    break;

    case 'valideform' :
         $nationalite = new  Nationalite();
         if (empty($_POST['num'])){ //Création
             $nationalite->setLibelle($_POST['libelle']);
             $nb=Nationalite::add($nationalite);
             $message="ajouté";
         }else{ //Modification
            $nationalite->setNum($_POST['num']);
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::update($nationalite);
            $message="modifié";
         }
         if ($nb==1){
             $_SESSION['message']=["success"=>"Le nationalite à bien été $message"];
         }
         else{
            $_SESSION['message']=["danger"=>"Le nationalite à bien été $message"];

         }
         header('location:index.php?uc=nationalites&action=list');
        exit();
        break; 
}