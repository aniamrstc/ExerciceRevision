<!DOCTYPE html>
<!--
M151 : exercices PDO (UE01 et UE02) : étape 3
Patrick J. Bergeret, avril 2021
version 1.0
-->
<?php 

require_once "./fonctionBD.inc.php";

$pseudo = filter_input(INPUT_POST,'pseudo',FILTER_SANITIZE_STRING);
$mdp = filter_input(INPUT_POST,'mdp',FILTER_SANITIZE_STRING);

$mdpBase = verifUtilisateur($pseudo);

if (verifMotdePasse($mdp, $mdpBase[0]))
{
$_SESSION["login"]=true;
 $_SESSION['message'] = "Bienvenue !";

 header("location: liste.php");
 
} else 
{
echo "Erreur login";
}


?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>M151 : publication d'articles</title>
        
    </head>
    <body>
        <div id="container">
        <header>
            <h1>Liste des articles</h1>
        </header>
        <main>
            <section> 
                <h2>Page de connexion<h2>
                
                <form method="POST" action="">
            <p></p>
            <table>
                <tr>
                
                    <td>Nom d'utilisateur</td>
                    <td><input type="text" name="pseudo"></td>
                </tr><tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="mdp"></td>
                </tr><tr>           
                    <td colspan="2"><input type="submit" name="env" value="Envoyer">
                </tr>
                <tr><td><a href="./liste.php"> liste</a></td></tr>
            </table>
        </form>  </tbody>
                
            </section>
        </main>

        
        </div><!-- fin du container -->
    </body>
</html>
