<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['ct_nome'])) {
    $nome="nome='" . $_POST['ct_nome']. "' ";
    $sql = "UPDATE categoria SET " .$nome ." WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
}

if (!empty($_POST['ct_desc'])) {
    $desc="descricao='" . $_POST['ct_desc'] . "' ";
    $sql = "UPDATE categoria SET " .$desc . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['ct_vida'])) {
    $senha="vidautil=" . $_POST['ct_vida'];
    $sql = "UPDATE categoria SET " .$senha . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }
    
####   
    header ("location: T01.php");

?>
