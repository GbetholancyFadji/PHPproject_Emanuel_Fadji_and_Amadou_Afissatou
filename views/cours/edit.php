<!-- Views/cours/edit.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Cours</title>
</head>
<body>
    <h1>Modifier le Cours: <?php echo $cours['libelle']; ?></h1>
    
    <form action="index.php?action=update" method="POST">
        <label for="libelle">Libellé du Cours</label>
        <input type="text" name="libelle" id="libelle" value="<?php echo $cours['libelle']; ?>" required><br>

        <label for="enseignant_id">Enseignant</label>
        <select name="enseignant_id" id="enseignant_id">
            <?php foreach ($enseignants as $enseignant) : ?>
                <option value="<?php echo $enseignant['id']; ?>" <?php echo $enseignant['id'] == $cours['enseignant_id'] ? 'selected' : ''; ?>>
                    <?php echo $enseignant['nom'] . ' ' . $enseignant['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="classe_id">Classe</label>
        <select name="classe_id" id="classe_id">
            <?php foreach ($classes as $classe) : ?>
                <option value="<?php echo $classe['id']; ?>" <?php echo $classe['id'] == $cours['classe_id'] ? 'selected' : ''; ?>>
                    <?php echo $classe['libelle']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="etudiants">Etudiants</label><br>
        <?php foreach ($etudiants as $etudiant) : ?>
            <input type="checkbox" name="etudiants[]" value="<?php echo $etudiant['id']; ?>"
                <?php echo in_array($etudiant['id'], explode(',', $cours['etudiants'])) ? 'checked' : ''; ?>>
            <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?><br>
        <?php endforeach; ?><br>

        <button type="submit">Modifier le Cours</button>
    </form>
</body>
</html>
