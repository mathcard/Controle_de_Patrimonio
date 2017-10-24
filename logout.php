<?php
require "verifica.php";
setcookie("name","",0);
session_destroy();
header ("location: login.html");
?>

