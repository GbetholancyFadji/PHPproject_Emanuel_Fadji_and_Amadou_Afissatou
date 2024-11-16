<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des enseignants</h1>
<a href="../../controllers/EnseignantController.php?action=form" >Go to professors form</a> <br >
<?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

<?php
require_once('../../models/Enseignant.php');
$etService=new Enseignant();
$enseignants=$etService->getAll();
?>    


<table border="1" align="center">
    <tr>
    <th>IDENTIFIANT</th><th>NOM</th><th>PRENOM</th><th>SEXE</th><th>EMAIL</th><th>ADDRESSE</th><th>ACTIONS</th>
    </tr>
    <?php
foreach($enseignants as $et){
 ?>   
    <tr>
    <td><?php echo $et['ID']; ?></td>
    <td><?php echo $et['nom']; ?></td>
    <td><?php echo $et['prenom']; ?></td>
    <td><?php echo $et['sexe']; ?></td>
    <td><?php echo $et['email']; ?></td>
    <td><?php echo $et['adresse']; ?></td>
    <td><a href="../../controllers/EnseignantController.php?action=editForm&ID=<?php echo $et['ID']; ?>" >MODIFIER</a>--<a href="../../controllers/EnseignantController.php?action=delete&ID=<?php echo $et['ID']; ?>"   onClick="return window.confirm('Etes-vous sûre de vouloir supprimer cet enseignant')">SUPPRIMER</a></td>
    </tr>
<?php } ?>
   
</table>

<!--
<input type="hidden" name="action" value="editForm" form="f1" />
<input form="f1"  type="submit" value="MODIFIER" />
<input type="hidden" name="ID" value="UIN" form="f1" />
-->

<form action="../../controllers/EnseignantController.php" method="GET" id="f1"></form>
</body>
</html>