<?php
#session_start();
if((!isset($_SESSION['login'])==true) and (!isset($_SESSION['senha'])==true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['type']);
        header ("location:login.html");
}
$validacao = $_SESSION['type'];
if ($validacao != 'P'){
	header ("location:index.php");
}
?>
