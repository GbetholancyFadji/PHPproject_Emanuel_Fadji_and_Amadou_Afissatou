<?php
// form.php

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php"); // Redirige vers la page de connexion si non connecté
    exit();
}

// Inclure le fichier de service pour l'insertion (par exemple, EtudiantService.php)
require_once '../../models/EtudiantService.php';

// Initialisation du service d'étudiants
$etudiantService = new EtudiantService();

// Vérification de l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $ddn = $_POST['ddn'];

    // Insérer les données dans la base de données
    $etudiantService->ajouterEtudiant($matricule, $nom, $prenom, $sexe, $telephone, $ddn);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>

<div class="container">
    <h2>Ajouter un étudiant</h2>

    <form method="POST" action="form.php">
        <div class="form-group">
            <label for="matricule">Matricule :</label>
            <input type="text" name="matricule" id="matricule" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select name="sexe" id="sexe" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" name="telephone" id="telephone" required>
        </div>

        <div class="form-group">
            <label for="ddn">Date de naissance :</label>
            <input type="date" name="ddn" id="ddn" required>
        </div>

        <button type="submit">Ajouter</button>
    </form>
</div>

</body>
</html>
