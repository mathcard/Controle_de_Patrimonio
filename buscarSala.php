<?php

require "connect.php";

	$sql = "SELECT sala.numero, sala.descricao from bempatrimonial, sala where bempatrimonial.descricao=? and bempatrimonial.numsala = sala.numero";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $_GET['descricao']);
	$resultado->execute();
	
	
	$arrSala = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrSala[] = array('nome' => $linha->descricao,
									'valor' => $linha->numero);
	}

	echo json_encode($arrSala);

?>
