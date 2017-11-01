<?php

require "connect.php";
	
	$sql = "SELECT numero,descricao FROM bempatrimonial";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	
	//$arrBem = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrBem[] = array('descricao' => $linha->descricao,
									'valor' => $linha->numero);
	}

	echo json_encode($arrBem);

?>
