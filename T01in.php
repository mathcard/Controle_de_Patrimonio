<?php
require "connect.php";
$nome = $_POST['ct_nome'];
$descricao = $_POST['ct_desc'];
$vida = $_POST['ct_vida'];

if(is_string($vida)){
echo "OK";
}else{
echo "Isso mesmo";
}


$sql = "insert into Categoria values (DEFAULT,?,?,?)";
$resultado = $con->prepare($sql);
#$resultado->bindParam(1, $_POST['ct_nome']);
#$resultado->bindParam(2, $_POST['ct_desc']);
#$resultado->bindParam(3, $_POST['ct_vida']);
$resultado->bindParam(1, $nome);
$resultado->bindParam(2, $descricao);
$resultado->bindParam(3, $vida);
$resultado->execute();


?>
