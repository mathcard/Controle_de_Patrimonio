<?php require "modelo.php"; ?>
<?php require "connect.php"; ?>
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
	    $sql= $con->prepare("select m.numero as num, m.datasolicitacao as datas, m.motivo as mot, u.nome as  user, m.numsalaorigem as salao, m.numsaladestino as salad from mbp m inner join usuario u on m.idsolicitante = u.id where m.idautorizador is null");
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
