<?php 
require "modelo.php";
require "connect.php";
	if($tipo == 'F'){
		header ("location:index.php");
	}
###################


if (isset($_GET['ordem'])) {
    $ordem=" ORDER BY " . $_GET['ordem'];
}else {
    $ordem="";
}

if (isset($_GET['nome'])) {
   setcookie('aux',$_GET['nome'], time() + 30);
}else{
$pnome="";
}

if (isset($_COOKIE['aux'])){
    if (empty($_COOKIE['aux'])){
        $pnome="";
    }else {
        $pnome="&nome=" . $_COOKIE['aux'];
}
}else {
    $pnome="";
}











#####################
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
		<?php
		echo "<th><a href='T08.php?ordem=numero{$pnome}'>Código</a></th>";		  echo "<th><a href='T08.php?ordem=datasolicitacao{$pnome}'>Data Solicitação</a></th>";
		echo "<th><a href='T08.php?ordem=motivo{$pnome}'>Motivo</a></th>";
		echo "<th><a href='T08.php?ordem=nome{$pnome}'>Solicitante</a></th>";
		echo "<th><a href='T08.php?ordem=numsalaorigem{$pnome}'>Sala Origem</a></th>";

		echo "<th><a href='T08.php?ordem=numsaladestino{$pnome}'>Sala Destino</a></th>";
	      ?>
                    <th class='actions text-center'>Autorizada</th>
                    <th class='actions text-center'>Negada</th>
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


	    $pat= $con->prepare("select m.numero as num, m.datasolicitacao as datas, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, m.numsaladestino as salad from mbp m inner join usuario u on m.idsolicitante = u.id where m.idautorizador is null $ordem ");
 #CHEFE DEPARTAMENTO - lista apenas mbp´s que saiam do seu DP;           
	    $dep= $con->prepare("select m.numero as num, m.datasolicitacao as datas, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, m.numsaladestino as salad from mbp m inner join sala s on s.numero = m.numsalaorigem inner join departamento d on d.sigla = s.sigladpto inner join usuario u on u.id = m.idsolicitante  where m.idautorizador is null and d.sigla = '$sig' $ordem");

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
		</a></td>
		<td>
		<a href='T08nao.php?numero=$num'>
                <input type='button' name='insert' value='Negar' />
                </a></td>";
	        


        echo "</tr>";
            
        }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
    </div>
    <!-- end:Main Form -->
</body>
</html>
