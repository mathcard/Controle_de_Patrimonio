<?php 
require "modelo.php";
require "connect.php";

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
	echo "<th><a href='index.php?ordem=num{$pnome}'>Código</a></th>";
	 echo "<th><a href='index.php?ordem=datasolicitacao{$pnome}'>Data Solicitação</a></th>";
		echo "<th><a href='index.php?ordem=bem{$pnome}'>Bem</a></th>";
		echo "<th><a href='index.php?ordem=motivo{$pnome}'>Motivo</a></th>";
		echo "<th><a href='index.php?ordem=user{$pnome}'>Solicitante</a></th>";
		echo "<th><a href='index.php?ordem=numsalaorigem{$pnome}'>Sala Origem</a></th>";

		echo "<th><a href='index.php?ordem=numsaladestino{$pnome}'>Sala Destino</a></th>";
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


	    $pat= $con->prepare("select m.numero as num, m.datasolicitacao as datas, b.numero as bem, b.descricao as desc, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, s.sigladpto as dep, m.numsaladestino as salad from mbp m inner join usuario u on m.idsolicitante = u.id inner join bempatrimonial b on b.numero = m.numerobem inner join sala s on s.numero = m.numsalaorigem where m.idautorizador is null $ordem ");
 #CHEFE DEPARTAMENTO - lista apenas mbp´s que saiam do seu DP;           
	    $dep= $con->prepare("select m.numero as num, m.datasolicitacao as datas, b.numero as bem, b.descricao as desc, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, s.sigladpto as dep, m.numsaladestino as salad from mbp m inner join sala s on s.numero = m.numsalaorigem inner join departamento d on d.sigla = s.sigladpto inner join usuario u on u.id = m.idsolicitante inner join bempatrimonial b on b.numero = m.numerobem  where m.idautorizador is null and d.sigla = '$sig' $ordem");

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
                echo "<td><b>{$row->bem}-{$row->desc}</b></td>";
                echo "<td><b>{$row->mot}</b></td>";
                echo "<td><b>{$row->user}</b></td>";
                echo "<td><b>{$row->salao}-{$row->dep}</b></td>";
                echo "<td><b>{$row->salad}</b></td>";
		$num=$row->num;
                echo "<td>
		<a href='T08aut.php?numero=$num'>
		<input type='button' name='insert' value='Autorizar' />
		</a></td>
		<td>
		<a href='T08nao.php?numero=$num'>
                <input type='button' name='insert' value='Negar'/>
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
