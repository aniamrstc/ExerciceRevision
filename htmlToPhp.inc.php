<?php
require "fonctionBD.inc.php";

function AfficherSelectActivites($name,$tableauActivite){
echo "<label for='$name'>$name : </label>
<select name='$name' id='$name'>";


foreach($tableauActivite as $activite){
    echo "\t<option value='$activite[nomActivite]'>$activite[nomActivite]</option>\n";
}
}
echo"</select>";

function AfficherSelectClasse($name,$tableauClasse){
    echo "<label for='$name'>$name : </label>
    <select name='$name' id='$name'>";
    
    
    foreach($tableauClasse as $classe){
        echo "\t<option value='$classe[nomClasse]'>$classe[nomClasse]</option>\n";
    }
    }
    echo"</select>";
?>