<?php
require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['pr_nome'])) {
	if (strlen($_POST['pr_nome']) <= 50){
	    $nome="nome='" . $_POST['pr_nome']. "' ";
	    $sql = "UPDATE predio SET " .$nome ." WHERE codigo = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Nome</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Nome</b> não pode exceder 50 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['pr_cep'])) {
	if(strlen($_POST['pr_cep']) == 8){
    		$cep="cep='" . $_POST['pr_cep'] . "' ";
    		$sql = "UPDATE predio SET " .$cep . " WHERE codigo = " . $numero; 
   		$resultado = $con->prepare($sql);
	    	$resultado->execute();
	    	echo "<b>CEP</b> alterado com sucesso.<br>";
	}else{
		echo "O <b>CEP</b> deve possui 8 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['pr_rua'])) {
        if (strlen($_POST['pr_rua']) <= 60){
    	    $rua="logradouro='" . $_POST['pr_rua'] . "' ";
	    $sql = "UPDATE predio SET " .$rua . " WHERE codigo = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Rua</b> alterado com sucesso.<br>";
    	}else{
        	echo "A <b>Rua</b> não deve exceder 60 caracteres. <br>";
		$aux = false;
	 }
}

if (!empty($_POST['pr_comp'])) {
	if (strlen($_POST['pr_comp']) <= 10){
	    $comp="complemento='" . $_POST['pr_comp'] . "' ";
	    $sql = "UPDATE predio SET " .$comp . " WHERE codigo = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
            echo "<b>Complemento</b> alterado com sucesso.<br>";
           }else{
		echo "O <b>Complemento</b> não deve exceder 10 caracteres. <br>";
	        $aux = false;
		$var = false;
	}
}

if (!empty($_POST['pr_num'])) {
	if (strlen($_POST['pr_num']) <=10){
		$num="numero='" . $_POST['pr_num'] . "' ";
		$sql = "UPDATE predio SET " .$num . " WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Número</b> alterado com sucesso.<br>";
    }else{
		echo "O <b>Número</b> não deve exceder 10 caracteres. <br>";
	        $aux = false;
	}
}

if (!empty($_POST['pr_bairro'])) {
		if (strlen($_POST['pr_bairro']) <=40){
			$bairro="bairro='" . $_POST['pr_bairro'] . "' ";
			$sql = "UPDATE predio SET " . $bairro . " WHERE codigo = " . $numero; 
			$resultado = $con->prepare($sql);
			$resultado->execute();
			echo "<b>Bairro</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>Bairro</b> não deve exceder 40 caracteres. <br>";
	        $aux = false;
	}
}
				
if (!empty($_POST['pr_city'])) {
	if (strlen($_POST['pr_city']) <=50){
		$city="cidade='" . $_POST['pr_city'] . "' ";
		$sql = "UPDATE predio SET " . $city . " WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Cidade</b> alterada com sucesso.<br>";
		}else{
			echo "A <b>Cidade</b> não deve exceder 40 caracteres. <br>";
	        $aux = false;
	}
}

if (!empty($_POST['estado'])) {
    if (strlen($_POST['estado']) ==2){
		$uf="uf='" . $_POST['estado'] . "' ";
		$sql = "UPDATE predio SET " . $uf . " WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
	       echo "<b>Estado</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>Estado</b> deve ter 2 caracteres. <br>";
	        $aux = false;
	}
}
	if($aux==true){
		header("refresh:5; url=T02.php");
	}else{
		header("refresh:5; url=alteraPredio.php?id=$numero");
	}
?>
