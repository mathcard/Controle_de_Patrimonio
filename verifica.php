<?php
session_start();
if((!isset($_SESSION['login'])==true) and (!isset($_SESSION['senha'])==true)){
	unset($_SESSION['login']);	
	unset($_SESSION['senha']);
	unset($_SESSION['type']);
	header ("location:login.html");
}
$tipo = $_SESSION['type'];
?>
