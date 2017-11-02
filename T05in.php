<?php
require "connect.php";
require "onlyP.php";

$sql = "insert into Sala values (?,?,?,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['sl_num']);
$resultado->bindParam(2, $_POST['sl_comp']);
$resultado->bindParam(3, $_POST['sl_larg']);
$resultado->bindParam(4, $_POST['sl_desc']);
$resultado->bindParam(5, $_POST['selpredio']);
$resultado->bindParam(6, $_POST['seldep']);
$resultado->execute();
header ("location: index.php");
?>
