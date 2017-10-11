<?php

	$con = new PDO('pgsql:dbname=patrimonio;host=localhost;user=postgres;password=capeta123');
	
	$sql = "SELECT nome FROM Departamento";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	
	//$arrDepartamento = array();
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrDepartamento[] = array('nome' => $linha->nome);
	}

	echo json_encode($arrDepartamento);

?>
