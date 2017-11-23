<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
if($tipo =='F'){
		header ("location:index.php");
}else{
$aux = true;
}
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['us_log'])) {
	if(strlen($_POST['us_log']) <= 20){
		$log="login='" . $_POST['us_log']. "' ";
		$sql = "UPDATE usuario SET " .$log ." WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Login</b> alterado com sucesso.<br>";
	}else{
		echo "O <b>login</b> não pode exceder 20 caracteres.<br>";
		$aux = false;
	}
}

if (!empty($_POST['us_nome'])) {
    if(strlen($_POST['us_nome']) <= 50){
		$nome="nome='" . $_POST['us_nome'] . "' ";
		$sql = "UPDATE usuario SET " .$nome . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Nome</b> alterado com sucesso.<br>";
	}else{
		echo "O <b>Nome</b> não pode exceder 50 caracteres.<br>";
		$aux = false;
	}
}

if (!empty($_POST['us_passwd'])) {
    if(strlen($_POST['us_passwd']) <= 32){
		$senha="senha=md5('" . $_POST['us_passwd'] . "')";
		$sql = "UPDATE usuario SET " .$senha . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Senha</b> alterado com sucesso.<br>";
		}else{
			echo "A <b>senha</b> não pode exceder 32 caracteres.<br>";
			$aux = false;
		}
}

if (!empty($_POST['us_email'])) {
	if(strlen($_POST['us_email']) <= 80){
		$email="email='" . $_POST['us_email'] . "' ";
		$sql = "UPDATE usuario SET " .$email . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Email</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>Email</b> não pode exceder 80 caracteres.<br>";
			$aux = false;
		}
}
if ($tipo == 'P'){
if (!empty($_POST['seldep'])) {
    if(strlen($_POST['seldep']) <= 5){
		$dep="sigla='" . $_POST['seldep'] . "' ";
		$sql = "UPDATE usuario SET " .$dep . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Departamento</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>Departamento</b> não pode exceder 20 caracteres.<br>";
			$aux = false;
		}
}

if (!empty($_POST['reg_gender'])) {
    if(strlen($_POST['reg_gender']) == 1){
		$tipo="tipo='" . $_POST['reg_gender'] . "' ";
		$sql = "UPDATE usuario SET " . $tipo . " WHERE id = " . $numero;		$resultado = $con->prepare($sql);
		$resultado->execute();
		if($_POST['reg_gender']=='D'){
		        $sqlX = $con->query("select sigla from Usuario WHERE id =  '$numero'");
		        $row = $sqlX->fetch(PDO::FETCH_OBJ);
		        $sig = $row->sigla;
		        $sqlA = $con->prepare("update usuario set tipo = ? where tipo = ? and sigla = ? and id != ?");
		        $sqlA->execute(array("F","D",$sig,$numero));
        	}
		echo "<b>Tipo</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>tipo</b> não pode exceder 20 caracteres.<br>";
			$aux = false;
		}
    }		
}
	if($aux==true){
		header("refresh:5; url=T03.php");
	}else{
		header("refresh:5; url=alterauser.php?id=$numero");
	}
?>
