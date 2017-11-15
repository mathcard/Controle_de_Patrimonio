<?php
require "connect.php";
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['us_log'])) {
    $log="login='" . $_POST['us_log']. "' ";
    $sql = "UPDATE usuario SET " .$log ." WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
}

if (!empty($_POST['us_nome'])) {
    $nome="nome='" . $_POST['us_nome'] . "' ";
    $sql = "UPDATE usuario SET " .$nome . " WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['us_passwd'])) {
    $senha="senha=md5('" . $_POST['us_passwd'] . "')";
    $sql = "UPDATE usuario SET " .$senha . " WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['us_email'])) {
    $email="email='" . $_POST['us_email'] . "' ";
    $sql = "UPDATE usuario SET " .$email . " WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['seldep'])) {
    $dep="sigla='" . $_POST['seldep'] . "' ";
    $sql = "UPDATE usuario SET " .$dep . " WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();

    }

if (!empty($_POST['reg_gender'])) {
    $tipo="tipo='" . $_POST['reg_gender'] . "' ";
    $sql = "UPDATE usuario SET " . $tipo . " WHERE id = " . $numero; 
    $resultado = $con->prepare($sql);
    $resultado->execute();
#####
    if ($tipo = 'P'){
        $sqlX = $con->query("select sigla from Usuario WHERE id =  '$numero'"); 
        $row = $sqlX->fetch(PDO::FETCH_OBJ);
        $sig = $row->sigla;

        $sqlA = $con->prepare("update usuario set tipo = ? where tipo = ? and sigla = ? and id != ?");
        $sqlA->execute(array("F","D",$sig,$numero));

    }
    
    } 
####   
    header ("location: T03.php");

?>
