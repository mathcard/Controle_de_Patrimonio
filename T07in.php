<?php
require "connect.php";
require "verifica.php";
$LOGIN = $_SESSION['login'];
#$bem = $_POST['selbem'];
#$org = $_POST['selsalao'];
#$dest = $_POST['selsalad'];

/**
if(!$_POST['motivo']){
echo "É necessario infomrar o MOTIVO.";
}elseif (strlen($_POST['motivo']) > 200){
echo "O MOTIVO TEM LIMITE de 200 caracteres";
}

if(!$_POST['selbem']){
echo "É necessario informar o BEM";
}elseif (!is_int($_POST['selbem']) || ($_POST['selbem']<=0)){
echo "BEM invalida";
}

if(!$_POST['selsalao']){
echo "É necessario informar a SALA DE ORIGEM";
}elseif (!is_int($_POST['selsalao']) || ($_POST['selsalao']<=0)){
echo "SALA DE ORIGEM invalida";
}

if(!$_POST['selsalad']){
echo "É necessario informar a SALA DE DESTINO";
}elseif (!is_int($_POST['selsalad']) || ($_POST['selsalad']<=0)){
echo "SALA DE DESTINO invalida";
}
*/


### Sql buscar o ID solicitante ##
$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sql2->fetch(PDO::FETCH_OBJ);   
$id = $row->id;

### Sql de inserção na tabela MBP ###
$sql = "INSERT into MBP (numero,dataSolicitacao,motivo,idSolicitante,numeroBem,numSalaOrigem,numSalaDestino) values (DEFAULT, current_date,?,'$id',?,?,?)";
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['motivo']);
$resultado->bindParam(2, $_POST['selbem']);
$resultado->bindParam(3, $_POST['selsalao']);
$resultado->bindParam(4, $_POST['selsalad']);
$resultado->execute();

#eader ("location: index.php");
?>
