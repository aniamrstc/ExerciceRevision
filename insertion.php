<?php

require 'fonctionBD.inc.php';
// if(!isset($_SESSION["login"])){
//     header("location: ./login.php");
//     exit();
// }
$nvActivite = filter_input(INPUT_POST, "activites", FILTER_SANITIZE_STRING);
$nvClasse = filter_input(INPUT_POST, "classe", FILTER_SANITIZE_STRING);
$confirmerActivite=filter_input(INPUT_POST,"confirmerActivite");
$confirmerClasse=filter_input(INPUT_POST,"confirmerClasse");
if (!empty($nvActivite)) {
    setActivites($nvActivite);  
    echo "l'opperation a reussi";
    header("location:./inscription.php");
    
}
else{
    echo "l'opperation à echoué";
}
if (!empty($nvClasse)) {
    setClasse($nvClasse);  
    echo "l'opperation a reussi";
}else{
    echo "l'opperation à echoué";
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Insertion </h1>
<form action="" method="post">
    <table>
    <tr>
        <td>
            <label for="activites">Activite</label>
            <input type="text" name="activites" id="activites">
        </td>
    </tr>
    <tr>
        <td>
            <label for="classe">Classe</label>
            <input type="text" name="classe" id="classe">
        </td>
    </tr>
    <tr>
        <td>
        <input type="submit" value="Confirmer activite" name="confirmerActivite">
            <input type="submit" value="Confirmer classe" name="confirmerClasse">

        </td>
    </tr>
    </table>
</form>    
</body>
</html>