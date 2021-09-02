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
function getActivites(){
    try{
        $cnxBase = conexionBase();
        $sql = "SELECT idActivite, nomActivite FROM activite";
        $requeteSQL = $cnxBase->query($sql);
        $reponseSQL = $requeteSQL->fetchAll();
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
return $reponseSQL;
}
function getActivites2(){
    try{
        $query=conexionBase()->prepare("SELECT nomActivite FROM activite");
        $query->execute();
        }
    catch (PDOException $e){
        print nl2br("Error");
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getClasse(){
    try{
        $query=conexionBase()->prepare("SELECT nomClasse,idClasse FROM classe");
        $query->execute();
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function setActivites($activite){
    try{
    $query=conexionBase()->prepare("INSERT INTO journeesportive.activite (`nomActivite`) values (?)");
    $query->execute([$activite]);
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
 
}

function setClasse($classe){
    try{
    $query=conexionBase()->prepare("INSERT INTO classe (`nomClasse`) values (?)");
    $query->execute([$classe]);
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
    
}
function modifActivite($idActivite,$nvNomActivite)
{
    try{
    $cnxBase = conexionBase();
    $sql = "UPDATE activite SET nomActivite = '$nvNomActivite' WHERE idActivite = '$idActivite'";
    $requeteSQL = $cnxBase->exec($sql);
    $reponseSQL = $requeteSQL;
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
    return $reponseSQL;
}
function modifClasse($idClasse,$nvNomClasse){
    try{
    $cnxBase = conexionBase();
    $sql = "UPDATE classe SET nomClasse = '$nvNomClasse' WHERE idClasse = '$idClasse'";
    $requeteSQL = $cnxBase->exec($sql);
    $reponseSQL = $requeteSQL;
    }
    catch (PDOException $e){
        print nl2br("Error");
    }
    return $reponseSQL;  

}
function supActivite($idActivite){
    try
    {
        $cnxBase = conexionBase();
        $sql = "DELETE FROM activite WHERE idActivite= '$idActivite' ";
        $requeteSQL = $cnxBase->exec($sql);
        $reponseSQL = $requeteSQL;
    }
    catch (PDOException $e)
    {
        print nl2br("Error");
    }
return $reponseSQL;
}
function supClasse($idClasse){
    try
    {
        $cnxBase = conexionBase();
        $sql = "DELETE FROM classe WHERE idClasse= '$idClasse' ";
        $requeteSQL = $cnxBase->exec($sql);
        $reponseSQL = $requeteSQL;
    }
    catch (PDOException $e)
    {
        print nl2br("Error");
    }
return $reponseSQL;
}
?>