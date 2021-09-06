<?php

include "htmlToPhp.inc.php";
require_once 'fonctionBD.inc.php';

$nom=filter_input(INPUT_POST,('nom'));
$prenom=filter_input(INPUT_POST,('prenom'));
$classe=filter_input(INPUT_POST,('Classe'));
$premierChoix=filter_input(INPUT_POST,('premierChoix'));
$deuxiemeChoix=filter_input(INPUT_POST,('deuxiemeChoix'));
$troisiemeChoix=filter_input(INPUT_POST,('troisiemeChoix'));
echo ("nom ".$nom."<br>"."prenom ".$prenom."<br>"."Classe ".$classe."<br>"."Premier Choix ".$premierChoix."<br>"."Deuxieme choix ".$deuxiemeChoix."<br>"."troisieme choix ".$troisiemeChoix."<br>");
// $getActivite=getActivites();
// foreach($getActivite as $getActivite){
//     echo "$getActivite[0] ";
//     echo "$getActivite[1]<br>";
// }
var_dump(getActivites2());
if(filter_has_var(INPUT_POST,'confirmer')){
insererEleve($nom,$prenom,$classe,$premierChoix,$deuxiemeChoix,$troisiemeChoix);
}

// foreach ($getAcivite as $getActivite){
//     echo "$getActivite[0] ";
//     echo "$getActivite[1]<br> ";
    
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journée Sportive du CFPT</title>
    
</head>
<body>
    <h1>Inscription à la journée sportive du cfpt</h1>
    <form method="POST" action="">
            <p></p>
        
            <table>
            
            
        
            
            
            
                <tr>
                    <td>Nom </td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td><input type="text" name="prenom"></td>
                </tr>
                <tr>
                <td>Classe</td>
                <td>
                <?php AfficherSelectClasse("Classe",getClasse())?>
                

            
                
                
                </td>
                </tr>
                <tr><td><hr></td><td><hr></td></tr>
                <tr>
                <td>
                   <?php AfficherSelectActivites("premierChoix",getActivites2())?>
                   </td>
                
                
                </tr>
                <tr>
                <td>
                   <?php AfficherSelectActivites("deuxiemeChoix",getActivites2())?>
                   </td>
                </tr>
                <tr>
                <td>
                   <?php AfficherSelectActivites("troisiemeChoix",getActivites2())?>
                   </td>
                </tr>
                <tr>           
                    <td colspan="2"><input type="submit" name="confirmer" value="Confirmer">
                    <input type="submit" name="annuler" value="Annuler">
                    <p><a href="./insertion.php">Inserer une activité ou ne classe</a></p>
                    <p><a href="./liste.php">liste des activités et des classes</a></p>

                    
                    </td>
                </tr>
            </table>
        </form>  </tbody>
                </table>

</body>
</html>