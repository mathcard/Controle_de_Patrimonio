<?php
require "connect.php";
$sql = "insert into bempatrimonial values (DEFAULT,?,?,?,?,?,?,?,?,?)"; 
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['in_desc']);
$resultado->bindParam(2, $_POST['in_dataa']);
$resultado->bindParam(3, $_POST['in_prazo']);
$resultado->bindParam(4, $_POST['in_nfe']);
$resultado->bindParam(5, $_POST['in_forn']);
$resultado->bindParam(6, $_POST['in_valor']);
$resultado->bindParam(7, $_POST['in_sit']);
$resultado->bindParam(8, $_POST['selcat']);
$resultado->bindParam(9, $_POST['selsala']);
$resultado->execute();
?>
