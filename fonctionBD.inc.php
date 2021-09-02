<?php
session_start();
// fonction qui va permettre la connexion à la base 
function conexionBase(){
    try {
        $connexionBase = new PDO('mysql:host=localhost;dbname=journeesportive','sportive','123');
    } catch (PDOException $e){
        print nl2br("Error");
    }
    return $connexionBase;
}

function getActivites2(){
    $query=conexionBase()->prepare("SELECT nomActivite FROM activite");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getClasse(){
    $query=conexionBase()->prepare("SELECT nomClasse FROM classe");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function setActivites($activite){
    $query=conexionBase()->prepare("INSERT INTO journeesportive.activite (`nomActivite`) values (?)");
    $query->execute([$activite]);
 
}

function setClasse($classe){
    $query=conexionBase()->prepare("INSERT INTO classe (`nomClasse`) values (?)");
    $query->execute([$classe]);
    
}
?>