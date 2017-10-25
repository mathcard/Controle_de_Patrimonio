<?php
require "connect.php";
require "verifica.php";
$LOGIN = $_SESSION['login'];
$bem = $_POST['selbem'];
$dest = $_POST['selsalad'];

### Sql buscar o ID solicitante ##
$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sql2->fetch(PDO::FETCH_OBJ);
$id = $row->id;


### Sql busca o ID da sala, do BEM selecionado ###
$sql3 = $con->prepare("select s.numero as nsala from sala s inner join bempatrimonial b on s.numero = b.numsala where b.numero = :bem");
$sql3->bindValue(":bem", $bem, PDO::PARAM_INT);
$sql3->execute();
    $total = $sql3->rowCount();
            while ($row = $sql3->fetchObject()) {
                $origem=$row->nsala;
        #echo $origem;
        }

### Sql de inserção na tabela MBP ###
$sql = "INSERT into MBP (numero,dataSolicitacao,motivo,idSolicitante,numeroBem,numSalaOrigem,numSalaDestino) values (DEFAULT, current_date,?,'$id',?,'$origem',?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['motivo']);
$resultado->bindParam(2, $_POST['selbem']);
$resultado->bindParam(3, $_POST['selsalad']);
$resultado->execute();

### Sql alterando a sala origem do BEM ###
$sql4 =$con->prepare("update bempatrimonial set numsala = ? where numero = ?");
$sql4->execute(array($dest, $bem));
header ("location: index.php");
?>

