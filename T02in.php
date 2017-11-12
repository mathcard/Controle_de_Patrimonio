<?php
require "connect.php";
require "onlyP.php";
/*
if(!$_POST['pr_nome']){
echo "É necessario infomrar o NOME.";
}elseif (strlen($_POST['pr_nome']) > 50){
echo "O NOME TEM LIMITE de 50 caracteres";
}

if(!$_POST['pr_cep']){
echo "É necessario infomrar o CEP.";
}elseif (strlen($_POST['pr_cep']) != 8){
echo "O CEP deve possui 8 caracteres";
}

if(!$_POST['pr_rua']){
echo "É necessario infomrar o NOME.";
}elseif (strlen($_POST['pr_rua']) > 60){
echo "A RUA TEM LIMITE de 60 caracteres";
}

if(!$_POST['pr_comp']){
echo "É necessario infomrar o COMPLMENTO.";
}elseif (strlen($_POST['pr_comp']) > 10){
echo "O COMPLMENTO TEM LIMITE de 10 caracteres";
}

if(!$_POST['pr_num']){
echo "É necessario infomrar o NUMERO.";
}elseif (strlen($_POST['pr_num']) > 10){
echo "O NÚMERO TEM LIMITE de 10 caracteres";
}

if(!$_POST['pr_bairro']){
echo "É necessario infomrar o BAIRRO.";
}elseif (strlen($_POST['pr_bairro']) > 40){
echo "O BAIRRO TEM LIMITE de 40 caracteres";
}

if(!$_POST['pr_city']){
echo "É necessario infomrar a CIDADE.";
}elseif (strlen($_POST['pr_city']) > 50){
echo "A CIDADE TEM LIMITE de 50 caracteres";
}

if (strlen($_POST['estado']) > 2){
echo "O ESTADO TEM LIMITE de 2 caracteres";
}
header ("refresh:13; url=T02f.php");
*/

$sql = "insert into Predio values (DEFAULT,?,?,?,?,?,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['pr_nome']);
$resultado->bindParam(2, $_POST['pr_cep']);
$resultado->bindParam(3, $_POST['pr_rua']);
$resultado->bindParam(4, $_POST['pr_comp']);
$resultado->bindParam(5, $_POST['pr_num']);
$resultado->bindParam(6, $_POST['pr_bairro']);
$resultado->bindParam(7, $_POST['pr_city']);
$resultado->bindParam(8, $_POST['estado']);
$resultado->execute();
header ("location: index.php");
?>
