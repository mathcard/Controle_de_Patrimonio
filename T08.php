<?php 
require "modelo.php";
require "connect.php";
	if($tipo == 'F'){
		header ("location:index.php");
	}
?>
   <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Movimentações de Bens Patrimoniais Pendentes</div>
        <!-- Main Form -->
         <div class="login-form-1">
        </div>
    </div> 
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Data Solicitação</th>
                    <th>Motivo</th>
                    <th>Solicitante</th>
                    <th>Sala Origem </th>
                    <th>Sala Destino</th>
                    <th class='actions text-center'>Ação</th>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
	$LOGIN = $_SESSION['login'];

	$sql2 = $con->query("select id, sigla from usuario where login = '$LOGIN'");
	$row = $sql2->fetch(PDO::FETCH_OBJ);
	$usuario = $row->id;
	$sig = $row->sigla;


	    $pat= $con->prepare("select m.numero as num, m.datasolicitacao as datas, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, m.numsaladestino as salad from mbp m inner join usuario u on m.idsolicitante = u.id where m.idautorizador is null");
 #CHEFE DEPARTAMENTO - lista apenas mbp´s que saiam do seu DP;           
	    $dep= $con->prepare("select m.numero as num, m.datasolicitacao as datas, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, m.numsaladestino as salad from mbp m inner join sala s on s.numero = m.numsalaorigem inner join departamento d on d.sigla = s.sigladpto inner join usuario u on u.sigla = d.sigla  where m.idautorizador is null and u.sigla = '$sig' and u.id = '$usuario';");

	if($tipo == 'P'){
	$sql = $pat;
	}else{
	$sql = $dep;
	}	
	    $sql->execute();
            $total = $sql->rowCount();
            while ($row = $sql->fetchObject()) {
                echo "<tr>";
		echo "<td><b>{$row->num}</b></td>";
                echo "<td><b>{$row->datas}</b></td>";
                echo "<td><b>{$row->mot}</b></td>";
                echo "<td><b>{$row->user}</b></td>";
                echo "<td><b>{$row->salao}</b></td>";
                echo "<td><b>{$row->salad}</b></td>";
		$num=$row->num;
                echo "<td>
		<a href='T08aut.php?numero=$num'>
		<input type='button' name='insert' value='Autorizar' />
		</a></td>";
                echo "</tr>";
            
        }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="T11.php">Listar novamente</a>
    </div>
    <!-- end:Main Form -->
</body>
</html>
