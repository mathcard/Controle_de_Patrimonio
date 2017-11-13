<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['pr_nome'])) {
    $nome="nome='" . $_POST['pr_nome']. "' ";
    $sql = "UPDATE predio SET " .$nome ." WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
}

if (!empty($_POST['pr_cep'])) {
    $cep="cep='" . $_POST['pr_cep'] . "' ";
    $sql = "UPDATE predio SET " .$cep . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['pr_rua'])) {
    $rua="logradouro='" . $_POST['pr_rua'] . "' ";
    $sql = "UPDATE predio SET " .$rua . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['pr_comp'])) {
    $comp="complemento='" . $_POST['pr_comp'] . "' ";
    $sql = "UPDATE predio SET " .$comp . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['pr_num'])) {
    $num="numero='" . $_POST['pr_num'] . "' ";
    $sql = "UPDATE predio SET " .$num . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['pr_bairro'])) {
    $bairro="bairro='" . $_POST['pr_bairro'] . "' ";
    $sql = "UPDATE predio SET " . $bairro . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }
if (!empty($_POST['pr_city'])) {
    $city="cidade='" . $_POST['pr_city'] . "' ";
    $sql = "UPDATE predio SET " . $city . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
    
    }
if (!empty($_POST['estado'])) {
    $uf="uf='" . $_POST['estado'] . "' ";
    $sql = "UPDATE predio SET " . $uf . " WHERE codigo = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
        
            }

    header ("location: T02.php");

?>
