<?php
// liste.php

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

// Inclure le fichier de service pour récupérer les étudiants
require_once '../../models/EtudiantService.php';

// Initialisation du service d'étudiants
$etudiantService = new EtudiantService();

// Récupérer tous les étudiants
$etudiants = $etudiantService->getAllEtudiants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>

<div class="container">
    <h2>Liste des étudiants</h2>

    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Téléphone</th>
                <th>Date de naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?php echo htmlspecialchars($etudiant['matricule']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['sexe']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['telephone']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['ddn']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="form.php">Ajouter un étudiant</a>
</div>

</body>
</html>
