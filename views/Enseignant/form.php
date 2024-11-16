<html>

<head>
    <title>Formulaire ajout enseignant</title>
</head>

<body>
    <h1>Formulaire ajout enseignant</h1>
    <a href="../../controllers/EnseignantController.php?action=liste" >Go to professors list</a> <br >
  
    <form action="../../controllers/EnseignantController.php" method="post">
    <table  align="center">
        <tr>
            <td>IDENTIFIANT</td>
            <td><input type="text" name="ID" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>NOM</td>
            <td><input type="text" name="nom" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>PRENOM</td>
            <td><input type="text" name="prenom" required></td>
        </tr>
        <tr>
            <td>SEXE</td>
            <td>
               <!-- H <input type="radio" name="sexe"> 
                F <input type="radio" name="sexe"> -->

                <select name="sexe" required>
                    <option value="">Veuillez choisir le sexe de l'enseignant</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td><input type="text" name="email" required></td>
        </tr>
        <tr>
            <td>ADDRESSE</td>
            <td><input type="text" name="adresse" required></td>
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