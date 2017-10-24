<?php
require "connect.php";
$sql = "insert into Predio values (DEFAULT,?,?,?,?,?,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['pr_nome']);
$resultado->bindParam(2, $_POST['pr_cep']);
$resultado->bindParam(3, $_POST['pr_rua']);
$resultado->bindParam(4, $_POST['pr_comp']);
$resultado->bindParam(5, $_POST['pr_num']);
$resultado->bindParam(6, $_POST['pr_bairro']);
$resultado->bindParam(7, $_POST['pr_city']);
$resultado->bindParam(8, $_POST['estado']);
$resultado->execute();
?>
