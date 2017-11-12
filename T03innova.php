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
