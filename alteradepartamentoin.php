<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['dp_nome'])) {
    $nome="nome='" . $_POST['dp_nome']. "' ";
    $sql = "UPDATE departamento SET " .$nome ." WHERE sigla = '" . $numero . "'"; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
}

if (!empty($_POST['dp_sigla'])) {
    $sig="sigla='" . $_POST['dp_sigla'] . "' ";
    $sql = "UPDATE departamento SET " .$sig . " WHERE sigla = '" . $numero . "'"; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

    
####   
    header ("location: T04.php");

?>
