<?php
require_once 'fonctionBD.inc.php';
if (isset($_GET['id']))
{
    $activite=getActivites($_GET['id']);
   
}

if(isset($_POST))
{
$nomActivite=filter_input(INPUT_POST,'nomActivite');

modifActivite($_GET['id'],$nomActivite);


    if(!empty($_POST['env'])){
        header("location: inscription.php");
    }
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
 
    <form method="POST" action="">
    <table>
       
        <tr>
        <td>Nom activité</td>
            <td><input type="text" name="nomActivite" ></td>
            <
            
            <td><input type="submit" name="env" value="Envoyer"></td>
        </tr>
    </table>
    </form>
</body>
</html>