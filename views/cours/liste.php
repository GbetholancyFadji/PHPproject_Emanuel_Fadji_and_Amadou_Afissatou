<!-- Views/cours/liste.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Cours</title>
</head>
<body>
    <h1>Liste des Cours</h1>
    <table>
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Enseignant</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cours as $coursItem) : ?>
                <tr>
                    <td><?php echo $coursItem['libelle']; ?></td>
                    <td><?php echo $coursItem['enseignant_id']; ?></td>
                    <td><?php echo $coursItem['classe_id']; ?></td>
                    <td><a href="index.php?action=edit&libelle=<?php echo $coursItem['libelle']; ?>">Modifier</a></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=create">Créer un Nouveau Cours</a>
</body>
</html>