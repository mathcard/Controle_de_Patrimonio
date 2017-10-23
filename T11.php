<?php require "modelo.php"; ?>
<?php require "connect.php"; ?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Buscar Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T11.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T06.php">Incluir Bem</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end:Main Form -->
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descrição</th>
                    <th>Data de compra</th>
                    <th>Garantia</th>
                    <th>Nota</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Situação</th>
                    <th>Categoria</th>
                    <th>Sala</th>
                    <th class='actions text-center'>Ação</th>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(isset($_GET['nome'])){
    $nome = "%".$_GET['nome']."%";
    $sql= "SELECT * FROM bempatrimonial WHERE descricao LIKE :nome";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
    $resultado->execute();
    $total = $resultado->rowCount();
    while ($row = $resultado->fetchObject()) {
                $id=$row->numero;
                echo "<tr>";          
		echo "<td><b>{$row->numero}</b></td>";
		echo "<td><b>{$row->descricao}</b></td>";
                echo "<td><b>{$row->datacompra}</b></td>";
                echo "<td><b>{$row->prazogarantia}</b></td>";
                echo "<td><b>{$row->nrnotafiscal}</b></td>";
                echo "<td><b>{$row->fornecedor}</b></td>";
                echo "<td><b>{$row->valor}</b></td>";
                echo "<td><b>{$row->situacao}</b></td>";
                echo "<td><b>{$row->codcategoria}</b></td>";
                echo "<td><b>{$row->numsala}</b></td>";
                echo "<td>
		 <a href='baixa.php?id=$id'>
                <input type='button' name='insert' value='Apagar' />
                </a></td>";
                echo "</tr>";
                    }
}else{
            $sql= "SELECT * FROM bempatrimonial";
            $resultado = $con->prepare($sql);
            $resultado->execute();
            $total = $resultado->rowCount();
            while ($row = $resultado->fetchObject()) {
                echo "<tr>";
                echo "<td><b>{$row->numero}</b></td>";
                echo "<td><b>{$row->descricao}</b></td>";
                echo "<td><b>{$row->datacompra}</b></td>";
                echo "<td><b>{$row->prazogarantia}</b></td>";
                echo "<td><b>{$row->nrnotafiscal}</b></td>";
                echo "<td><b>{$row->fornecedor}</b></td>";
                echo "<td><b>{$row->valor}</b></td>";
                echo "<td><b>{$row->situacao}</b></td>";
                echo "<td><b>{$row->codcategoria}</b></td>";
                echo "<td><b>{$row->numsala}</b></td>";
		$id2=$row->numero;
                echo "<td>
		<a href='baixa.php?id=$id2'>
		<input type='button' name='insert' value='Apagar' />
		</a></td>";
                echo "</tr>";
            }
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
