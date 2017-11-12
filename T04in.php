<?php
require "connect.php";
require "onlyP.php";

$sig = $_POST['dp_sigla'];
$nome = $_POST['dp_nome'];
/*
if(!$sig){
echo "É necessario informar a SIGLA";
}elseif (strlen($sig)>5){
echo "A SIGLA TEM LIMITE de 5 caracteres";
}

if(!$nome){
echo "É necessario informar o NOME";
}elseif (strlen($nome) > 30){
echo "O NOME TEM LIMITE  de 30 caracteres";
}

header ("refresh:3; url=T01f.php");
*/

$sql = "insert into Departamento values (?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $sig);
$resultado->bindParam(2, $nome);
$resultado->execute();
header ("location: index.php");
?>
