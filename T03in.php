<?php
session_start();
$id=$_SESSION['login'];
require "modelo2.php";
require "connect.php";
echo "<br><br>";
$aux = true;
if (isset($_POST['selpredio'])) {
    $g=$_POST['selpredio'];
}
$a=$_POST['us_log'];
$b=$_POST['us_nome'];
$c=$_POST['us_passwd'];
$d=$_POST['us_email'];

if (isset($_POST['tipo'])){
    $tipo=$_POST['tipo'];
}
    switch ($tipo) {
        case 'D':
        $e='F';
        $sql2 = $con->query("select sigla from usuario where login = '$id'");
        $row = $sql2->fetch(PDO::FETCH_OBJ);
        $f = $row->sigla;
 
        break;

        case 'P':
        $e=$_POST['reg_gender'];
        $f=$_POST['seldep'];

            break;
    }

if(empty($a)){
	echo "O <b>LOGIN</b> deve ser informada.<br>";
	$aux = false;
}elseif(strlen($a) > 20){
	echo "O <b>LOGIN</b> não deve exceder 20 caracteres.<br>";
	$aux = false;
}

if(empty($b)){
	echo "O <b>NOME</b> deve ser informada.<br>";
	$aux = false;
}elseif(strlen($b) > 50){
	echo "O <b>NOME</b> não deve exceder 50 caracteres.<br>";
	$aux = false;
}

if(empty($c)){
	echo "É necessario infomar a <b>SENHA</b><br>";
	$aux = false;
}elseif(strlen($c) > 32){
	echo "A <b>SENHA</b> não deve exceder 32 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['us_passwd2'])){
	echo "É necessario confirmar a <b>SENHA</b>. <br>";
	$aux = false;
}
if($c != $_POST['us_passwd2']){
	echo "As <b>senhas</b> não são iguais!!!<br>";
	$aux = false;
}

if(empty($d)){
	echo "É necessario infomar a <b>EMAIL</b><br>";
	$aux = false;
}elseif(strlen($d) > 80){
	echo "O <b>EMAIL</b> não deve exceder 80 caracteres.<br>";
	$aux = false;
}

if(empty($e)){
	echo "É necessario informar a <b>TIPO</b><br>";
	$aux = false;
}elseif(($e != 'P')&&($e !='D')&&($e !='F')){
	echo "<b>TIPO</b> de usuario invalido.<br> ";
	$aux = false;
}

if(!$f){
	echo "É necessario informar o <b>DEPARTAMENTO</b><br>";
	$aux = false;
}elseif (strlen($f)>5){
	echo "O <b>DEPARTAMENTO</b> não deve exceder 5 caracteres. <br>";
	$aux = false;
}
	
	if($aux != true){
		header ("refresh:5; url=T03.php");
	}else{
		if(($tipo=='P') && ($e=='D')){
			$sqlA = $con->prepare("update usuario set tipo = ? where tipo = ? and sigla = ?");
			$sqlA->execute(array("F","D",$f));
		}

    $sql = "insert into usuario values(DEFAULT,?,?,md5(?),?,?,?)";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $a);
    $resultado->bindParam(2, $b);
    $resultado->bindParam(3, $c);
    $resultado->bindParam(4, $d);
    $resultado->bindParam(5, $e);
    $resultado->bindParam(6, $f);
    $resultado->execute();
     echo "Usuario cadastrado com sucesso!";
     header ("refresh:5; url=T03.php");
}
?>
