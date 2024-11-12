<?php
require_once('index.php');
// index.php

// Démarre la session
session_start();

// Message d'erreur si l'authentification échoue
$error_message = '';

// Vérification des données soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Supposons que nous avons un utilisateur enregistré
    $username = 'UIN';
    $password = 'info3'; // C'est un exemple, n'utilise jamais de mots de passe en clair dans une vraie application

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Validation simple de l'utilisateur
    if ($input_username === $username && $input_password === $password) {
        // Si l'authentification est réussie, on redirige vers la page d'accueil
        $_SESSION['username'] = $input_username;
        header('Location: choix.php');
        exit;
    } else {
        // Si l'authentification échoue
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Welcome</h2>

        <!-- Affichage d'un message d'erreur si les identifiants sont incorrects -->
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form action="index.php" method="POST">
            <div class="input-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>
    </div>
</body>
</html>
