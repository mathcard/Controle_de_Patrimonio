<?php
require "connect.php";
require "verifica.php";
	if($tipo=='F'){
	header ("location:index.php");
}
$LOGIN = $_SESSION['login'];
$bem = $_GET['numero'];
	if($tipo=='P'){
$sql = $con->prepare("delete from mbp where idautorizador is null and numero = ?");
$sql->bindParam(1, $bem);
$sql->execute();
	}elseif($tipo=='D'){
### Sql buscar o Departaemnto do usuario ##
$sqlD = $con->query("select sigla from Usuario where login = '$LOGIN'");
$row = $sqlD->fetch(PDO::FETCH_OBJ);
$sig = $row->sigla;
### Sql buscar o Departaemnto da mbp ##
$buscadep = $con->query("select d.sigla as dep from departamento d inner join sala s on d.sigla = s.sigladpto inner join mbp m on s.numero = m.numsalaorigem where m.numero = '$bem'");
       $row = $buscadep->fetch(PDO::FETCH_OBJ);
       $depalterado = $row->dep;
	if($depalterado == $sig){
$sql2 = $con->prepare("delete from mbp where idautorizador is null and numero = ?");
$sql2->bindParam(1, $bem);
$sql2->execute();
	}else{
		header("location: T08.php");
	}

}

header ("location: T08.php")
?>
