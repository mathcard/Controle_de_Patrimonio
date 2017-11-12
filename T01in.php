<?php
require "connect.php";
require "onlyP.php";

$nome = $_POST['ct_nome'];
$descricao = $_POST['ct_desc'];
$vida = $_POST['ct_vida'];

/*
if(!$nome){
echo " É necessario informar o NOME.";
}elseif (strlen($nome) > 50) {
echo "O NOME tem Limite de 50 caracteres";
}
if(!$descricao){
echo "É necessario informar a DESCRIÇÃO";
}elseif (strlen($descricao)>400){
echo "A DESCRIÇÃO possui limite de 400 caracteres";
}
if(!$vida){
echo "É necessario infomrar a VIDA ÚTIL";
}elseif($vida <= 0){
echo "Esse valor é invalido";
}
header ("refresh:3; url=T01f.php");
*/

$sql = "insert into Categoria values (DEFAULT,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $nome);
$resultado->bindParam(2, $descricao);
$resultado->bindParam(3, $vida);
$resultado->execute();
header ("refresh:3; url=index.php");
?>
