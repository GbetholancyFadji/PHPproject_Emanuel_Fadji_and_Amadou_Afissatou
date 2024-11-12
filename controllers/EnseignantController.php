<?php
require_once('../models/Enseignant.php');

$etService = new Enseignant();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];





if ($action == 'form') {
    Header('Location:../views/Enseignant/form.php');
}

if ($action == 'liste') {
    Header('Location:../views/Enseignant/liste.php');
}

if ($action == 'delete') {
    //recuperation des donnees
    $ID=$_GET['ID'];

    //appel du model
    $etService->delete($ID);

    //redirection vers la vue
    Header('Location:../views/Enseignant/liste.php?message=Enseignant supprimé');
 
}




if ($action == 'ajout') {
    //1. recupertaion de donnees
    $ID = $_POST['ID'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $email = $_POST['email'];


    //2. Appel du model
    $etService->add($ID, $nom, $prenom, $sexe, $email, $ddn);

    //3. appel de la vue
    Header('Location:../views/Enseignant/liste.php?message=Enseignant ajouté');
}


if($action=='editForm'){
    $ID=$_GET['ID'];
    Header('Location:../views/Enseignant/edit.php?ID='.$ID);
}




if ($action == 'modifier') {
    //1. recupertaion de donnees
    $matricule = $_POST['ID'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $email = $_POST['email'];


    //2. Appel du model
    $etService->edit($matricule, $nom, $prenom, $sexe, $email, $ddn);

    //3. appel de la vue
    Header('Location:../views/Enseignant/liste.php?message=Enseignant modifié');
}
