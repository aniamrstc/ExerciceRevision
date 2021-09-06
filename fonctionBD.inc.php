<?php
session_start();
require_once "config.php";
// fonction qui va permettre la connexion à la base 

    function conexionBase(){
        static $mydb=null;
        try{
        if($mydb===null){
            $connectionString='mysql:host='.DB_HOST.';dbname='.DB_NAME;
            $mydb=new PDO($connectionString,DB_USER,DB_MDP);
            $mydb->setAttribute(PDO :: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
     
        }
    }
        catch (PDOException $e){
            die("Error :".$e-> getMessage());
        }
        return $mydb;
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
function insererEleve($nomEleve,$prenomEleve,$nomClasse,$choix1,$choix2,$choix3){
        $cnxBase = conexionBase();
        $query=$cnxBase->prepare("INSERT INTO `journeesportive`.`eleve` (`eleve`.`nom`,`eleve`.`prenom`,`idClasse`) values (?,?,(Select `classe`.`idClasse` From `journeesportive`.`classe` where `classe`.`nomClasse`= ?));");
        $query->execute([$nomEleve,$prenomEleve,$nomClasse]);

        $lastid=$cnxBase->lastInsertId();
        // for($i = 1; $i<= 3; $i++)
        // {
        //     $query=$cnxBase->prepare("INSERT INTO `journeesportive`.`inscrire` (`inscrire`.`ordrePref`,`inscrire`.`idActivite`,`inscrire`.`idEleve`) values (?,?,(Select `activite`.`idActivite` From `journeesportive`.`activite` where `activite`.`nomActivite`= ?));");

        //     $query->execute([$i,$listechoix[$i-1],$lastid]);
        // }
        $query=$cnxBase->prepare("INSERT INTO `journeesportive`.`inscrire` (`inscrire`.`ordrePref`,`inscrire`.`idActivite`,`inscrire`.`idEleve`) values (?,(Select `activite`.`idActivite` From `journeesportive`.`activite` where `activite`.`nomActivite`= ?),?);");

        for($i=0;$i<=3;$i++){

            if($i==0){

                $query->execute([1,$choix1,$lastid]);
            }
            if($i==1){

                $query->execute([2,$choix2,$lastid]);
            }
            if($i==2){

                $query->execute([3,$choix3,$lastid]);
            }
        }

        
    }
?>