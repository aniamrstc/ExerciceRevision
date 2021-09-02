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
    $cnxBase = conexionBase();
$sql = "SELECT idActivite, nomActivite FROM activite";
$requeteSQL = $cnxBase->query($sql);
$reponseSQL = $requeteSQL->fetchAll();
return $reponseSQL;
}
function getActivites2(){
    $query=conexionBase()->prepare("SELECT nomActivite FROM activite");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getClasse(){
    $query=conexionBase()->prepare("SELECT nomClasse,idClasse FROM classe");
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
function modifActivite($idActivite,$nvNomActivite)
{
$cnxBase = conexionBase();
$sql = "UPDATE activite SET nomActivite = '$nvNomActivite' WHERE idActivite = '$idActivite'";
$requeteSQL = $cnxBase->exec($sql);
$reponseSQL = $requeteSQL;
return $reponseSQL;
}
function modifClasse($idClasse,$nvNomClasse){
    $cnxBase = conexionBase();
    $sql = "UPDATE classe SET nomClasse = '$nvNomClasse' WHERE idClasse = '$idClasse'";
    $requeteSQL = $cnxBase->exec($sql);
    $reponseSQL = $requeteSQL;
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