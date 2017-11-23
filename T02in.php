<?php
require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if(empty($_POST['pr_nome'])){
	echo "É necessario informar o <b>NOME.</b><br>";
	$aux = false;
}elseif (strlen($_POST['pr_nome']) > 50){
	echo "O <b>NOME</b> não pode exceder 50 caracteres<br>";
	$aux = false;
}

if(empty($_POST['pr_cep'])){
	echo "É necessario informar o <b>CEP</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['pr_cep']) != 8){
	echo "O <b>CEP</b> deve possui 8 caracteres<br>";
	$aux = false;
}

if(empty($_POST['pr_rua'])){
	echo "É necessario informar o <b>RUA.</b><br>";
	$aux = false;
}elseif (strlen($_POST['pr_rua']) > 60){
	echo "A <b>RUA</b> não deve exceder 60 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['pr_comp'])){
	echo "É necessario infomrar o <b>COMPLMENTO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['pr_comp']) > 10){
	echo "O <b>COMPLMENTO</b> não deve exceder 10 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['pr_num'])){
	echo "É necessario infomrar o <b>NUMERO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['pr_num']) > 10){
	echo "O <b>NÚMERO</b> não deve exceder 10 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['pr_bairro'])){
	echo "É necessario infomrar o <b>BAIRRO</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['pr_bairro']) > 40){
	echo "O <b>BAIRRO</b> não deve exceder 40 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['pr_city'])){
	echo "É necessario infomrar a <b>CIDADE</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['pr_city']) > 50){
	echo "A <b>CIDADE</b> não deve exceder 50 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['estado'])){
	echo "É necessario informar a <b>ESTADO</b>.<br>";
	$aux = false;
}elseif(strlen($_POST['estado']) > 2){
	echo "O <b>ESTADO</b> não deve exceder 2 caracteres.<br>";
	$aux = false;
}
	if($aux != true){
		header ("refresh:5; url=T02f.php");
	}else{
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
        echo "Predio incluido com sucesso!!!";
	header ("refresh:5; url=T02.php");
	}
?>
