
<?php
require "connect.php";
require "verifica.php";
$LOGIN = $_SESSION['login']; #usado para buscar o usuario conectado
$bem = $_GET['numero']; #numero da MBP

### Sql buscar o ID autorizador ##
$sql = $con->query("select id from Usuario where login = '$LOGIN'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$id = $row->id;

### SQL  atual
$sqlD = $con->query("select date from current_date");
$row = $sqlD->fetch(PDO::FETCH_OBJ);
$data = $row->date;

### SQL Horario atual
$sqlH = $con->query("select timetz from current_time");
$row = $sqlH->fetch(PDO::FETCH_OBJ);
$hora = $row->timetz;

### SQl buscar sala destino e bem
$sqlS = $con->query("select numsaladestino, numerobem from mbp where numero = '$bem'");
$row = $sqlS->fetch(PDO::FETCH_OBJ);
$sala = $row->numsaladestino;
$numbem = $row->numerobem;


###Sql inserção do autorizador ###
$sql2 = $con->prepare("update MBP set dataconfirmacao = ?, horaconfirmacao = ?, idautorizador = ? where numero = ? ");
$sql2->execute(array($data,$hora,$id,$bem));

### Sql alterando a sala do BEM ###
$sqlB =$con->prepare("update bempatrimonial set numsala = ? where numero = ?");
$sqlB->execute(array($sala, $numbem));

header ("location: T08.php");

?>

