<?php
require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;

if(empty($_POST['sl_num'])){
	echo "É necessario informar o <b>NUMERO.</b><br>";
	$aux = false;
}elseif ($_POST['sl_num'] <= 0){
	echo "<b>NÚMERO</b> inválido!<br>";
	$aux = false;
}

if(empty($_POST['sl_comp'])){
	echo "É necessario infomrar o <b>COMPRIMENTO.</b><br>";
	$aux = false;
}
/*elseif (!is_float($_POST['sl_comp'])){
	echo "<b>COMPRIMENTO</b> invalido!<br>";
	$aux = false;
} */

if(empty($_POST['sl_larg'])){
	echo "É necessario infomrar a <b>LARGURA.</b><br>";
	$aux = false;
}
/*elseif (!is_float($_POST['sl_larg'])){
	echo "<b>LARGURA</b> inválida!<br>";
	$aux = false;
}*/

if(empty($_POST['sl_desc'])){
	echo "É necessario infomrar a <b>DESCRICAO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['sl_desc']) > 80){
	echo "A <b>DESCRICAO</b> não deve exceder 80 caracteres!<br>";
	$aux = false;
}

if(empty($_POST['selpredio'])){
	echo "É necessario infomrar O <b>PREDIO.</b><br>";
	$aux = false;
}elseif ($_POST['selpredio'] <= 0){
	echo "Codigo do <b>Predio</b> inválido!<br>";
	$aux = false;
}

if(empty($_POST['seldep'])){
	echo "É necessario infomrar O <b>DEPARTAMENTO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['seldep'] > 5)){
	echo "Sigla do <b>DEPARTAMENTO</b> inválido!<br>";
	$aux = false;
}
	if($aux!=true){
		header ("refresh:5; url=T05f.php");
	}else{
		$sql = "insert into Sala values (?,?,?,?,?,?)";
		$resultado = $con->prepare($sql);
		$resultado->bindParam(1, $_POST['sl_num']);
		$resultado->bindParam(2, $_POST['sl_comp']);
		$resultado->bindParam(3, $_POST['sl_larg']);
		$resultado->bindParam(4, $_POST['sl_desc']);
		$resultado->bindParam(5, $_POST['selpredio']);
		$resultado->bindParam(6, $_POST['seldep']);
		$resultado->execute();
		echo "Categoria incluida com sucesso!!!";
		header ("refresh:5; url=T05f.php");	
	}
?>
