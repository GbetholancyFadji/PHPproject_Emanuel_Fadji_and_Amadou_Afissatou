<html>

<head>
    <title>Formulaire ajout classe</title>
</head>

<body>
    <h1>Formulaire ajout classe</h1>
    <a href="../../controllers/ClasseCtrl.php?action=liste" >Go to classrooms list</a> <br >
  
    <form action="../../controllers/ClasseCtrl.php" method="post">
    <table  align="center">
        <tr>
            <td>IDENTIFIANT</td>
            <td><input type="text" name="id" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>NUMERO</td>
            <td><input type="number" name="numero" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>LIBELLE</td>
            <td><input type="text" name="libelle" required></td>
        </tr>
        <tr>
            <td>NOMBRE D'ETUDIANTS</td>
            <td><input type="number" name="nbreE" required></td>
        </tr>
        <tr>
            <input type="hidden" name="action" value="ajout">
            <td colspan="2" style="text-align: center">  
<input type='reset' style="background-color: red; color: white" value="VIDER"> 
&nbsp; &nbsp; &nbsp;&nbsp;
<input type='submit' style="background-color: green; color: white" value="AJOUTER"></td>
        </tr>
    </table>
    </form>
</body>

</html>