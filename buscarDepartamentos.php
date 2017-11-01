<?php

require "connect.php";
	
	$sql = "SELECT * FROM Departamento";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	
	//$arrDepartamento = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrDepartamento[] = array('nome' => $linha->nome,
									'valor' => $linha->sigla);
	}

	echo json_encode($arrDepartamento);

?>
