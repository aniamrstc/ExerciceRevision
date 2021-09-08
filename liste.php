<?php
require_once 'fonctionBD.inc.php';

if(!isset($_SESSION["login"])){
    header("location: ./login.php");
    exit();
}

$getActivite=getActivites();
$getClasse=getClasse();
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
    <table>
    <h2>liste Des Activite </h2>
            <?php foreach ($getActivite as $getActivite){ ?>
                
            <tr>
          
            <td><?php echo $getActivite[0];?></td>
            <td><?php echo $getActivite[1];?></td>
            <?php if(isset($_SESSION["login"])){ ?>
            <td><li><a href="./modificationActivite.php?id=<?php echo $getActivite[0];?>"> Editer</a></li></td>
            <td><li><a href="./supActivite.php?id=<?php echo $getActivite[0];?>"> supprimer</a></li></td>
            </tr>
            <?php } ?>
            <?php } ?>
    
    </table>
    <table>
    <h2>liste Des classes </h2>
            <?php foreach ($getClasse as $getClasse){ ?>
            <tr>
            
            <td><?php echo $getClasse['idClasse'];?></td>
            <td><?php echo $getClasse['nomClasse'];?></td>
            <?php if(isset($_SESSION["login"])){ ?>
            <td><li><a href="./modificationClasse.php?id=<?php echo $getClasse['idClasse'];?>"> Editer</a></li></td>
            <td><li><a href="./supClasse.php?id=<?php echo $getClasse['idClasse'];?>"> supprimer</a></li></td>
            <?php } ?>
            <?php } ?>
            </tr>
    </table>
    <a href="./inscription.php">inscription</a>
    <a href="./deco.php">deconnexion</a>
    
</body>
</html>