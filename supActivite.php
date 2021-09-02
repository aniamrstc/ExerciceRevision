<?php
require_once("./fonctionBD.inc.php");
supActivite($_GET['id']);
header("location: inscription.php");
exit;
?>