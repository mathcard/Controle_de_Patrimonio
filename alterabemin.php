<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['in_desc'])) {
    $desc="descricao='" . $_POST['in_desc']. "' ";
    $sql = "UPDATE bempatrimonial SET " .$desc ." WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
}

if (!empty($_POST['in_dataa'])) {
    $data="datacompra='" . $_POST['in_dataa'] . "' ";
    $sql = "UPDATE bempatrimonial SET " .$data . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['in_prazo'])) {
    $prazo="prazogarantia=" . $_POST['in_prazo'];
    $sql = "UPDATE bempatrimonial SET " .$prazo . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['in_nfe'])) {
    $nfe="nrnotafiscal=" . $_POST['in_nfe'];
    $sql = "UPDATE bempatrimonial SET " .$nfe . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['in_forn'])) {
    $forn="fornecedor='" . $_POST['in_forn'] . "'";
    $sql = "UPDATE bempatrimonial SET " .$forn . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['in_valor'])) {
    $valor="valor=" . $_POST['in_valor'];
    $sql = "UPDATE bempatrimonial SET " . $valor . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['in_sit'])) {
    $sit="situacao='" . $_POST['in_sit'] . "'";
    $sql = "UPDATE bempatrimonial SET " .$sit . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['selcat'])) {
    $cat="codcategoria='" . $_POST['selcat'] . "'";
    $sql = "UPDATE bempatrimonial SET " .$cat. " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['selsala'])) {
    $sala="numsala='" . $_POST['selsala'] . "'";
    $sql = "UPDATE bempatrimonial SET ". $sala . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }
    header ("location: T11.php");
/*
$sql = "UPDATE bempatrimonial SET :descricao :data :prazo :nfe :forn :valor :sit :cat :sala WHERE numero = :numero"; 
$resultado = $con->prepare($sql);
$resultado->bindParam(':descricao', $desc);
$resultado->bindParam(':data', $data);
$resultado->bindParam(':prazo', $prazo);
$resultado->bindParam(':nfe', $nfe);
$resultado->bindParam(':forn', $forn);
$resultado->bindParam(':valor', $valor);
$resultado->bindParam(':sit', $sit);
$resultado->bindParam(':cat', $cat);
$resultado->bindParam(':numero', $numero);
$resultado->execute();
*/
?>
