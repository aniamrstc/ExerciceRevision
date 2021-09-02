<?php
require_once("./fonctionBD.inc.php");
supClasse($_GET['id']);
header("location: inscription.php");
exit;
?>