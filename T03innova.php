<?php
session_start();
$id=$_SESSION['login'];

require "connect.php";
if (isset($_POST['selpredio'])) {
    $g=$_POST['selpredio'];
}
$a=$_POST['us_log'];
$b=$_POST['us_nome'];
$c=$_POST['us_passwd'];
$d=$_POST['us_email'];

if (isset($_POST['tipo'])){
    $tipo=$_POST['tipo'];

    switch ($tipo) {
        case 'F':
        $e='F';
        $sql2 = $con->query("select sigla from usuario where login = '$id'");
        $row = $sql2->fetch(PDO::FETCH_OBJ);
        $f = $row->sigla;
 
        break;

        case 'C':
        $e=$_POST['reg_gender'];
        $f=$_POST['seldep'];

            break;
    }
/*
if(!$a){
echo "O LOGIN deve ser informada";
}elseif(strlen($a) > 20){
echo "O LOGIN TEM LIMITE de 20 cacteres";
}

if(!$b){
echo "O NOME deve ser informada";
}elseif(strlen($b) > 50){
echo "O NOME TEM LIMITE de 50 cacteres";
}

if(!$c){
echo "É necessario infomar a SENHA";
}elseif(strlen($c) > 32){
echo "A SENHA TEM LIMITE de 32 caracteres";
}

if(!$_POST['us_passwd2']){
echo "É necessario confirmar a SENHA";
}elseif(strlen($_POST['us_passwd2']) > 32){
echo "A SENHA TEM LIMITE de 32 caracteres";
}

if($c != $_POST['us_passwd2']){
echo "As senhas não são iguais!!!";
}

if(!$d){
echo "É necessario infomar a EMAIL";
}elseif(strlen($d) > 80){
echo "A EMAIL TEM LIMITE de 80 caracteres";
}

if(($e != 'P')||($e !='D')||($e !='F')){
echo "TIPO invalido ";
}

if(!$f){
echo "É necessario informar a DEPARTAMENTO";
}elseif (strlen($f)>5){
echo "O DEPARTAMENTO TEM LIMITE de 5 caracteres";
}

*/
	
$sqlA = $con->prepare("update usuario set tipo = ? where tipo = ? and sigla = ?");
$sqlA->execute(array("F","D",$f));

    $sql = "insert into usuario values(DEFAULT,?,?,md5(?),?,?,?)";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $a);
    $resultado->bindParam(2, $b);
    $resultado->bindParam(3, $c);
    $resultado->bindParam(4, $d);
    $resultado->bindParam(5, $e);
    $resultado->bindParam(6, $f);
    $resultado->execute();
    header ("location: index.php");
}

?>
