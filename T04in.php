<?php
require "connect.php";
$sig = $_POST['dp_sigla'];
$nome = $_POST['dp_nome'];

$sql = "insert into Departamento values (?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $sig);
$resultado->bindParam(2, $nome);
$resultado->execute();
?>
