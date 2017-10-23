<?php
require "connect.php";
$id = $_GET['id'];
$sql = $con->prepare("update bempatrimonial set situacao = ? where numero = ?");
$sql->execute(array("B", $id));
header ("location: T11.php");
?>

