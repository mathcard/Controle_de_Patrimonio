<?php
require "connect.php";
require "verifica.php";
$LOGIN = $_SESSION['login'];
$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sql2->fetch(PDO::FETCH_OBJ);   
$id = $row->id;

$sql = "INSERT into MBP (numero,dataSolicitacao,motivo,idSolicitante,numeroBem,numSalaOrigem,numSalaDestino) values (DEFAULT, current_date,?,'$id',?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['motivo']);
$resultado->bindParam(2, $_POST['selbem']);
$resultado->bindParam(3, $_POST['selsalao']);
$resultado->bindParam(4, $_POST['selsalad']);
$resultado->execute();
header ("location: index.php");

?>
