<?php
require "connect.php";
require "verifica.php";
$LOGIN = $_SESSION['login'];
$bem = $_GET['numero'];

### Sql buscar o ID solicitante ##
$sql = $con->query("select id from Usuario where login = '$LOGIN'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$id = $row->id;

##Sql inserção do autorizador ###
$sql2 = $con->prepare("update MBP set dataconfirmacao = ?, horaconfirmacao = ?, idautorizador = ? where numero = ? ");
$sql2->execute(array("current_date", "current_time" ,$id, $bem));
#header ("location: T08.php");
?>
