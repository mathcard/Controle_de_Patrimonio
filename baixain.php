<?php
require "modelo.php";
require "connect.php";
require "onlyP.php";

$idbem = $_COOKIE['aux2'];

if(!$_POST['bx_motivo']){
	echo "É necessario informar o motivo";
	header ("refresh:3; url=baixa.php?id={$idbem}");
}
$tipo = $_POST['bx_tipo'];
if(($tipo!='D')&&($tipo!='E')&&($tipo!='I')&&($tipo!='V')&&($tipo!='O')){
	echo "<br>Tipo de baixa invalido";
	header ("refresh:3; url=baixa.php?id={$idbem}");
}

if(!empty($_POST['bx_motivo']) && !empty($_POST['bx_tipo'])){
#$idbem = $_COOKIE['aux2'];
$LOGIN = $_SESSION['login'];
$motivo = $_POST['bx_motivo'];
$tipo = $_POST['bx_tipo'];

### Sql busca login
$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sql2->fetch(PDO::FETCH_OBJ);
$iduser = $row->id;

### Sql realiza a baixa
$sql3 = "insert into baixabempatrimonial values ('$idbem', current_date, '$tipo', '$motivo', '$iduser')";
$res=$con->prepare($sql3);
$res->execute();

### Atualiza listagem na T11
$sql4 = $con->prepare("update bempatrimonial set situacao = ? where numero = ?");
$sql4->execute(array("B", $idbem));
setcookie("aux2","",0);
echo "Item baixado com sucesso";
header ("refresh:3; url=T11.php");
}

?>
