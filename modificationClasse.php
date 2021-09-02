<?php
require_once 'fonctionBD.inc.php';
if (isset($_GET['id']))
{
  
    $classe=getClasse($_GET['id']);
}

if(isset($_POST))
{

$nomClasse=filter_input(INPUT_POST,'nomClasse');

modifClasse($_GET['id'],$nomClasse);

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
        
            <td>Nom Classe</td>
            
            <td><input type="text" name="nomClasse"></td>
            <td><input type="submit" name="env" value="Envoyer"></td>
        </tr>
    </table>
    </form>
</body>
</html>