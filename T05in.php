<?php
require "connect.php";
require "onlyP.php";
/*
if(!$_POST['sl_num']){
echo "É necessario informar o NUMERO.";
}elseif (($_POST['sl_num'] <= 0)||(!is_int($_POST['sl_num']))){
echo "NUMERO invalido!";
}

if(!$_POST['sl_comp']){
echo "É necessario infomrar o COMPRIMENTO.";
}elseif (!is_float($_POST['sl_comp'])){
echo "COMPRIMENTO invalido!";
}

if(!$_POST['sl_larg']){
echo "É necessario infomrar a LARGURA.";
}elseif (!is_float($_POST['sl_larg'])){
echo "LARGURA invalida!";
}

if(!$_POST['sl_desc']){
echo "É necessario infomrar a DESCRICAO.";
}elseif (strlen($_POST['sl_desc']) > 80){
echo "A DESCRICAO TEM LIMITE de 80 caracteres!";
}

if(!$_POST['selpredio']){
echo "É necessario infomrar O PREDIO.";
}elseif ($_POST['selpredio'] <= 0){
echo "Codigo do Predio invalido!";
}

#FALTA O DEPARTAMENTO SER VALIDADO
#header ("refresh:13; url=T05f.php");
*/

$sql = "insert into Sala values (?,?,?,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['sl_num']);
$resultado->bindParam(2, $_POST['sl_comp']);
$resultado->bindParam(3, $_POST['sl_larg']);
$resultado->bindParam(4, $_POST['sl_desc']);
$resultado->bindParam(5, $_POST['selpredio']);
$resultado->bindParam(6, $_POST['seldep']);
$resultado->execute();
header ("location: index.php");
?>
