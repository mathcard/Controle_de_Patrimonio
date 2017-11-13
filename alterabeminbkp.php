<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['in_desc'])) {
    $desc="descricao='" . $_POST['in_desc']. "' ";
}else{
        $desc=" ";
}

if (!empty($_POST['in_dataa'])) {
    $data="datacompra=" . $_POST['in_dataa'] . ",";
    }else{
        $data=" ";
    }

if (!empty($_POST['in_prazo'])) {
    $prazo="prazogarantia=" . $_POST['in_prazo'] . ",";
    }else{
        $prazo=" ";
    }

if (!empty($_POST['in_nfe'])) {
    $nfe="nrnotafiscal=" . $_POST['in_nfe'] . ",";
    }else{
        $nfe=" ";
    }

if (!empty($_POST['in_forn'])) {
    $forn="fornecedor=" . $_POST['in_forn'] . ",";
    }else{
        $forn=" ";
    }

if (!empty($_POST['in_valor'])) {
    $valor="valor=" . $_POST['in_valor'] . ",";
    }else{
        $valor=" ";
    }

if (!empty($_POST['in_sit'])) {
    $sit="situacao=" . $_POST['in_sit'] . ",";
    }else{
        $sit=" ";
    }

if (!empty($_POST['selcat'])) {
    $cat="codcategoria=" . $_POST['selcat'] . ",";
    }else{
        $cat=" ";
    }

if (!empty($_POST['selsala'])) {
    $sala="numsala=" . $_POST['selsala'] . ",";
    }else{
        $sala=" ";
    }

    echo $numero . " " .$desc . " " . $data . " " .$prazo . " " . $nfe . " " . $forn . " " . $valor . " " . $sit . " " . $cat . " " .$sala;
    $sql = "UPDATE bempatrimonial SET " .$desc . $data . $prazo .$nfe .$forn . $valor . $sit . $cat . $sala . " WHERE numero = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
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
