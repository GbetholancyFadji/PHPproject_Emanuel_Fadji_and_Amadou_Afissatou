<?php
// Controllers/CoursController.php
class CoursController {

    private $coursModel;

    public function __construct($coursModel) {
        $this->coursModel = $coursModel;
    }

    // Afficher le formulaire pour modifier un cours
    public function edit($libelle) {
        $cours = $this->coursModel->getByLibelle($libelle);
        $enseignants = $this->coursModel->getEnseignants();
        $classes = $this->coursModel->getClasses();
        $etudiants = $this->coursModel->getEtudiants();

        require 'Views/cours/edit.php'; // Vue d'édition
    }

    // Sauvegarder les modifications du cours
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $enseignant_id = $_POST['enseignant_id'];
            $classe_id = $_POST['classe_id'];
            $etudiants = $_POST['etudiants']; // Liste des étudiants

            $this->coursModel->update($libelle, $enseignant_id, $classe_id, $etudiants);
            header("Location: index.php?action=liste"); // Rediriger vers la liste des cours
        }
    }

    // Afficher la liste des cours
    public function liste() {
        $cours = $this->coursModel->getAll();
        require 'Views/cours/liste.php'; // Vue de la liste des cours
    }
}
?>
