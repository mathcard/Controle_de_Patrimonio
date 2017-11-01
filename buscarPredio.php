<?php

require "connect.php";
	
	$sql = "select nome, codigo from predio";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	
	$arrPredio = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrPredio[] = array('nome' => $linha->nome,
									'valor' => $linha->codigo);
	}

	echo json_encode($arrPredio);

?>
