<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir sala";
	header ("refresh:3; url=index.php");
}else{
	$valid = true;
	$id = $_GET['id'];
	 $sqlBem = "select b.numero as num from bempatrimonial b inner join sala on sala.numero = b.numsala where sala.numero = $id";
	$resultado = $con->prepare($sqlBem);
        $resultado->execute();
	if($resultado->rowCount()> 0 ){
		$valid = false;
                echo "Existem <b>Bens</b> cadastrados nessa sala.<br>";
                header ("refresh:5; url=T05.php");
        }
        $sqlMbp ="select m.numero as numero from mbp m inner join sala on sala.numero = m.numsalaorigem where sala.numero = '$id'";
        $resultado2 = $con->prepare($sqlMbp);
	$resultado2->execute();
	if($resultado2->rowCount()>0){
		$valid = false;
                echo "Existem <b>Movimentações</b> registradas com essa sala <b>Origem</b>.<br>";
                header ("refresh:5; url=T05.php");
        }

        $sqlMbpD ="select m.numero as numero from mbp m inner join sala on sala.numero = m.numsaladestino where sala.numero = '$id'";
	$resultado3 = $con->prepare($sqlMbpD);
          $resultado3->execute();
          if($resultado3->rowCount()>0){
                  $valid = false;
                  echo "Existem <b>Movimentações</b> registradas com essa sala<b> Destino.</b><br>";
                  header ("refresh:5; url=T05.php");
		}

	if(($valid!=true)){
		echo "Não foi possivel excluir esta <b>sala</b>.";
                header ("refresh:5; url=T05.php");
	}else{
	$sql = $con->prepare("delete from sala where numero = ?");
	$sql->bindParam(1,$id);
	$sql->execute();
        echo " <b>Sala</b> excluida com sucesso!!!<br>";
        header ("refresh:5; url=T05.php");
	}
}
