<?php
require_once('../models/Classe.php');

$etService = new Classe();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];





if ($action == 'form') {
    Header('Location:../views/Classes/form.php');
}

if ($action == 'liste') {
    Header('Location:../views/Classes/liste.php');
}

if ($action == 'delete') {
    //recuperation des donnees
    $id=$_GET['id'];

    //appel du model
    $etService->delete($id);

    //redirection vers la vue
    Header('Location:../views/Classes/liste.php?message=Classroom removed');
 
}




if ($action == 'ajout') {
    //1. recupertaion de donnees
    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $libelle = $_POST['libelle'];
    $nbreE = $_POST['nbreE'];
   

    //2. Appel du model
    $etService->add($id, $numero, $libelle, $nbreE);

    //3. appel de la vue
    Header('Location:../views/classes/liste.php?message=Classroom added');
}

