<?php

require "connect.php";
	
	$sql = "select descricao, numero from sala";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	
	//$arrSalas = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrSalas[] = array('nome' => $linha->descricao,
									'valor' => $linha->numero);
	}

	echo json_encode($arrSalas);

?>
