<?php
// models/EtudiantService.php

require_once 'Provider.php'; // Inclure le fichier Provider pour la connexion à la DB

class EtudiantService {
    private $db;

    public function __construct() {
        // Connexion à la base de données
        $this->db = (new Provider())->getConnection();
    }

    // Fonction pour ajouter un étudiant
    public function ajouterEtudiant($matricule, $nom, $prenom, $sexe, $telephone, $ddn) {
        try {
            // Préparer la requête SQL pour insérer les données
            $query = "INSERT INTO etudiant (matricule, nom, prenom, sexe, telephone, ddn) 
                      VALUES (:matricule, :nom, :prenom, :sexe, :telephone, :ddn)";
            
            // Préparer la requête
            $stmt = $this->db->prepare($query);

            // Lier les paramètres
            $stmt->bindParam(':matricule', $matricule);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':ddn', $ddn);

            // Exécuter la requête
            $stmt->execute();

            echo "L'étudiant a été ajouté avec succès!";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
        }
    }

    // Fonction pour récupérer tous les étudiants
    public function getAllEtudiants() {
        try {
            $query = "SELECT * FROM etudiant";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des étudiants : " . $e->getMessage();
            return [];
        }
    }

    // Fonction pour récupérer un étudiant par son matricule
    public function getEtudiantById($id) {
        try {
            $query = "SELECT * FROM etudiant WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de l'étudiant : " . $e->getMessage();
            return null;
        }
    }

    // Fonction pour modifier un étudiant
    public function modifierEtudiant($id, $matricule, $nom, $prenom, $sexe, $telephone, $ddn) {
        try {
            // Préparer la requête SQL pour modifier les données
            $query = "UPDATE etudiant SET matricule = :matricule, nom = :nom, prenom = :prenom, sexe = :sexe, 
                      telephone = :telephone, ddn = :ddn WHERE id = :id";

            // Préparer la requête
            $stmt = $this->db->prepare($query);

            // Lier les paramètres
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':matricule', $matricule);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':ddn', $ddn);

            // Exécuter la requête
            $stmt->execute();

            echo "L'étudiant a été modifié avec succès!";
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de l'étudiant : " . $e->getMessage();
        }
    }

    // Fonction pour supprimer un étudiant
    public function supprimerEtudiant($id) {
        try {
            // Préparer la requête SQL pour supprimer l'étudiant
            $query = "DELETE FROM etudiant WHERE id = :id";
            $stmt = $this->db->prepare($query);

            // Lier l'id de l'étudiant à supprimer
            $stmt->bindParam(':id', $id);

            // Exécuter la requête
            $stmt->execute();

            echo "L'étudiant a été supprimé avec succès!";
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'étudiant : " . $e->getMessage();
        }
    }
}

