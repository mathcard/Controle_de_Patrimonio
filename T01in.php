<?php

require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";
$nome = $_POST['ct_nome'];
$descricao = $_POST['ct_desc'];
$vida = $_POST['ct_vida'];
echo "<br><br>";
$aux = true;
if(empty($nome)){
	echo " É necessario informar o <b>NOME.</b> <br> ";
	$aux = false;
}elseif (strlen($nome) > 50) {
	echo "O <b>NOME</b> não pode exceder 50 caracteres. <br>";
	$aux = false;
}

if(empty($descricao)){
	echo "É necessario informar a <b>DESCRIÇÃO</b> <br>";
	$aux = false;
}elseif (strlen($descricao)>400){
	echo "A <b>DESCRIÇÃO</b> não pode exceder 400 caracteres <br>";
	$aux = false;
}

if(empty($vida)){
	echo "É necessario infomrar a <b>VIDA ÚTIL</b> <br>";
	$aux = false;
}elseif($vida <= 0){
	echo "<b>Vida Útil</b>  inválida <br>";
	$aux = false;
}
	if($aux!=true){
		header ("refresh:5; url=T01f.php");
	}else{
	$sql = "insert into Categoria values (DEFAULT,?,?,?)";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $nome);
	$resultado->bindParam(2, $descricao);
	$resultado->bindParam(3, $vida);
	$resultado->execute();
	echo "<b>Categoria</b> incluida com sucesso.";
	header ("refresh:5; url=T01.php");

}
?>
