<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des classes</h1>
<a href="../../controllers/ClasseCtrl.php?action=form" >Go to classrooms form</a> <br >
<?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

<?php
require_once('../../models/Classe.php');
$etService=new Classe();
$classes=$etService->getAll();
?>    


<table border="1" align="center">
    <tr>
    <th>IDENTIFIANT</th><th>NUMERO</th><th>LIBELLE</th><th>NOMBRE D'ETUDIANTS</th>
    </tr>
    <?php
foreach($classes as $et){
 ?>   
    <tr>
    <td><?php echo $et['id']; ?></td>
    <td><?php echo $et['numero']; ?></td>
    <td><?php echo $et['libelle']; ?></td>
    <td><?php echo $et['nbreE']; ?></td>
    <td><a href="../../controllersClasseCtrl.php?action=editForm&id=<?php echo $et['id']; ?>" >MODIFIER LES INFORMATIONS DE LA SALLE</a>--<a href="../../controllers/ClasseCtrl.php?action=delete&id=<?php echo $et['id']; ?>"   onClick="return window.confirm('Etes-vous sûre de vouloir changer de classe')">SUPPRIMER</a></td>
    </tr>
<?php } ?>
   
</table>

<!--
<input type="hidden" name="action" value="editForm" form="f1" />
<input form="f1"  type="submit" value="MODIFIER" />
<input type="hidden" name="ID" value="UIN" form="f1" />
-->

<form action="../../controllers/ClasseCtrl.php" method="GET" id="f1"></form>
</body>
</html>