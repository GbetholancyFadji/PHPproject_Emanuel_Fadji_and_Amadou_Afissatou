<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des information de la salle</title>
</head>
<body>
    <?php
    $id=$_GET['id'];
    require_once('../../models/Classe.php');
    $etService=new Classe();
    $classe=$etService->getByid($id);
    //var_dump($etudiant);
    ?>
<h1>Formulaire de modification des informations d'une salle </h1>
  
    <form action="../../controllers/ClasseCtrl.php" method="post">
    <table  align="center">
        <tr>
            <td>IDENTIFIANT</td>
            <td><input type="text" name="id" readOnly value="<?= $classe['id'] ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>NUMERO</td>
            <td><input type="text" name="numero" value="<?php echo $classe['numero']; ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>LIBELLE</td>
            <td><input type="text" name="libelle" value="<?= $classe['libelle'] ?>" required></td>
        </tr>
            <td>NOMBRE D'ETUDIANTS</td>
            <td><input type="number" value="<?= $classe['nbreE'] ?>" name="nbreE" required></td>
        </tr>
        <tr>
            <input type="hidden" name="action" value="modifier">
            <td colspan="2" style="text-align: center">  

&nbsp; &nbsp; &nbsp;&nbsp;
<input type='submit' style="background-color: green; color: white" value="MODIFIER"></td>
        </tr>
    </table>
    </form>
</body>
</html>