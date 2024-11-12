<?php
// choix.php

session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page d'authentification
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Afficher un message de bienvenue à l'utilisateur
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix d'action</title>
    <link rel="stylesheet" href="assets/styles.css"> <!-- Si tu as un fichier CSS externe -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .menu a {
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            width: 200px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .menu a:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .logout {
            text-align: center;
            margin-top: 30px;
        }

        .logout a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bienvenue à <?php echo htmlspecialchars($username); ?> !</h2>

    <div class="message">
        <p>Choisissez une action à effectuer :</p>
    </div>

    <div class="menu">
        <a href="views/Etudiant/form.php">Gérer les étudiants</a>
        <a href="views/Enseignant/form.php">Gérer les enseignants</a>
        <a href="views/Classe/form.php">Gérer les classes</a>
        <a href="views/Cours/form.php">Gérer les cours</a>
    </div>
</div>

</body>
</html>

