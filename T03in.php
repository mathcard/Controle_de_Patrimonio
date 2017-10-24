<?php
require "connect.php";
$a=$_POST['us_log'];
$b=$_POST['us_nome'];
$c=$_POST['us_passwd'];
$d=$_POST['us_email'];
$e=$_POST['reg_gender'];
$f=$_POST['sel1'];
$sql = "insert into usuario values (DEFAULT,?,?,md5(?),?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $a);
$resultado->bindParam(2, $b);
$resultado->bindParam(3, $c);
$resultado->bindParam(4, $d);
$resultado->bindParam(5, $e);
$resultado->bindParam(6, $f);
$resultado->execute();
header ("location: index.php");
?>
