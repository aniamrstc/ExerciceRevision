<?php
session_start();
session_destroy();
if(ini_get("session.use_cookie")){
    setcookie(session_name(),"",0);
}
header("location: login.php");

?>