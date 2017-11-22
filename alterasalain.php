<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['sl_comp'])) {
    $comp="comprimento=" . $_POST['sl_comp'];
    $sql = "UPDATE sala SET " .$comp . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['sl_larg'])) {
    $larg="largura=" . $_POST['sl_larg'];
    $sql = "UPDATE usuario SET " .$larg . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['sl_desc'])) {
    $desc="descricao='" . $_POST['sl_desc'] . "' ";
    $sql = "UPDATE sala SET " .$desc . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['selpredio'])) {
    $pred="codpredio=" . $_POST['selpredio'];
    $sql = "UPDATE sala SET " .$pred . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['seldep'])) {
    $dep="sigladpto='" . $_POST['seldep'] . "' ";
    $sql = "UPDATE sala SET " . $dep . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
    
    } 
####   
    header ("location: T05.php");

?>
