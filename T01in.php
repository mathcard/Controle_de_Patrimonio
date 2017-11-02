<?php
require "connect.php";
require "onlyP.php";

$nome = $_POST['ct_nome'];
$descricao = $_POST['ct_desc'];
$vida = $_POST['ct_vida'];

$sql = "insert into Categoria values (DEFAULT,?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $nome);
$resultado->bindParam(2, $descricao);
$resultado->bindParam(3, $vida);
$resultado->execute();
header ("location: index.php");


?>
