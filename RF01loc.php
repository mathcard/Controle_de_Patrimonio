<?php require "modelo.php"; ?>
<?php require "connect.php"; ?>
    <!-- end:Main Form -->
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Nome do Prédio</th>
                    <th>Nome da Sala</th>
                    <th>Nome do Bem</th>
                    <th>Codigo do Bem</th>
                <!--    <th>Sala</th> -->
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
$id = $_POST['id'];

#header ("location: listando.php");

$sql = $con->prepare("select p.nome as pnome, s.descricao as sdesc, b.descricao as bdesc, b.numero as bnum from predio p inner join sala s on p.codigo = s.codpredio inner join bempatrimonial  b on b.numsala = s.numero where b.numero = :id ");    
	    $sql->bindValue(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            $total = $sql->rowCount();
            while ($row = $sql->fetchObject()) {
                echo "<tr>";
                echo "<td><b>{$row->pnome}</b></td>";
                echo "<td><b>{$row->sdesc}</b></td>";
                echo "<td><b>{$row->bdesc}</b></td>";
                echo "<td><b>{$row->bnum}</b></td>";
	#$id2=$row->numero;
                echo "</tr>";
        } 
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="RF01.php">Listar novamente</a>
    </div>
    <!-- end:Main Form -->
</body>
</html>
