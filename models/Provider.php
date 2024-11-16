<?php
//require_once('index.php');

class Provider {
    // Informations de connexion à la base de données
    private $host = 'localhost'; // L'hôte de la base de données MySQL (localhost dans un environnement local)
    private $dbName = "scolarite"; // Le nom de la base de données
    private $user = "root"; // Nom d'utilisateur MySQL
    private $password = ""; // Mot de passe de l'utilisateur MySQL (mettre votre mot de passe ici)

    // Méthode pour établir la connexion
    public function getConnection() {
        try {
            // Chaîne DSN correcte pour MySQL
            $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=utf8";

            // Création d'une instance PDO pour la connexion
            $con = new PDO($dsn, $this->user, $this->password);

            // Configuration pour gérer les erreurs via les exceptions PDO
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Si la connexion réussit
            //echo 'Connexion réussie à la base de données !';

            return $con;
        } catch (PDOException $e) {
            // En cas d'échec de la connexion, on affiche l'erreur
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }
}

// Créer une instance de la classe Provider
$p = new Provider();

// Appeler la méthode pour obtenir la connexion à la base de données
$p->getConnection();

