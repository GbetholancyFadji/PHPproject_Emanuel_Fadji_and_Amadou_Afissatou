<?php
// Models/Cours.php
class Cours {

    // Connexion à la base de données
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les cours
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM cours");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un cours par son libellé
    public function getByLibelle($libelle) {
        $stmt = $this->pdo->prepare("SELECT * FROM cours WHERE libelle = ?");
        $stmt->execute([$libelle]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un cours
    public function update($libelle, $enseignant_id, $classe_id, $etudiants) {
        // Mise à jour du cours dans la table cours
        $stmt = $this->pdo->prepare("UPDATE cours SET enseignant_id = ?, classe_id = ? WHERE libelle = ?");
        $stmt->execute([$enseignant_id, $classe_id, $libelle]);

        // Mise à jour des étudiants associés
        // Suppression des étudiants précédemment associés
        $stmt = $this->pdo->prepare("DELETE FROM cours_etudiants WHERE cours_libelle = ?");
        $stmt->execute([$libelle]);

        // Ajout des nouveaux étudiants
        foreach ($etudiants as $etudiant_id) {
            $stmt = $this->pdo->prepare("INSERT INTO cours_etudiants (cours_libelle, etudiant_id) VALUES (?, ?)");
            $stmt->execute([$libelle, $etudiant_id]);
        }
    }

    // Récupérer tous les enseignants
    public function getEnseignants() {
        $stmt = $this->pdo->query("SELECT id, nom, prenom FROM enseignant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les classes
    public function getClasses() {
        $stmt = $this->pdo->query("SELECT id, libelle FROM classe");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer tous les étudiants
    public function getEtudiants() {
        $stmt = $this->pdo->query("SELECT id, nom, prenom FROM etudiant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
