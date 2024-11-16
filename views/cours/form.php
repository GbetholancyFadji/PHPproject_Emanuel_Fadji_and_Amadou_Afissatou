<!-- Views/cours/form.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Cours</title>
</head>
<body>
    <h1>Créer un Nouveau Cours</h1>
    
    <form action="index.php?action=create" method="POST">
        <label for="libelle">Libellé du Cours</label>
        <input type="text" name="libelle" id="libelle" required><br>

        <label for="enseignant_id">Enseignant</label>
        <select name="enseignant_id" id="enseignant_id">
            <?php foreach ($enseignants as $enseignant) : ?>
                <option value="<?php echo $enseignant['id']; ?>">
                    <?php echo $enseignant['nom'] . ' ' . $enseignant['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="classe_id">Classe</label>
        <select name="classe_id" id="classe_id">
            <?php foreach ($classes as $classe) : ?>
                <option value="<?php echo $classe['id']; ?>">
                    <?php echo $classe['libelle']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="etudiants">Etudiants</label><br>
        <?php foreach ($etudiantService as $etudiant) : ?>
            <input type="checkbox" name="etudiants[]" value="<?php echo $etudiant['id']; ?>">
            <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?><br>
        <?php endforeach; ?><br>

        <button type="submit">Créer le Cours</button>
    </form>
</body>
</html>
