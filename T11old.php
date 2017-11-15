<?php 
require "modelo.php";
require "connect.php"; 
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

?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Buscar Bem</div>
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
                <?php
                    echo "<th><a href='T11.php?ordem=numero{$pnome}'>Código</a></th>";
                    echo "<th><a href='T11.php?ordem=descricao{$pnome}'>Descrição</a></th>";
                    echo "<th><a href='T11.php?ordem=datacompra{$pnome}'>Data da Compra</a></th>";
                    echo "<th><a href='T11.php?ordem=prazogarantia{$pnome}'>Garantia</a></th>";
                    echo "<th><a href='T11.php?ordem=nrnotafiscal{$pnome}'>Nota</a></th>";
                    echo "<th><a href='T11.php?ordem=fornecedor{$pnome}'>Fornecedor</a></th>";
                    echo "<th><a href='T11.php?ordem=valor{$pnome}'>Valor</a></th>";
                    echo "<th><a href='T11.php?ordem=situacao{$pnome}'>Situação</a></th>";
                    echo "<th><a href='T11.php?ordem=codcategoria{$pnome}'>Categoria</a></th>";
                    echo "<th><a href='T11.php?ordem=numsala{$pnome}'>Sala</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(isset($_GET['nome'])){
    #$nome = "%".$_GET['nome']."%";
    $nome = $_GET['nome'];
    $sql= "SELECT * FROM bempatrimonial WHERE descricao LIKE :nome" . $ordem;
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
                </a>";
                echo "<a href='alterabem.php?id=$id'>
                       <input type='button' name='insert' value='Editar' />
                       </a></td>";
                echo "</tr>";
                    }
}else{
            $sql= "SELECT * FROM bempatrimonial" . $ordem;
            $resultado = $con->prepare($sql);
           # $resultado->bindParam(':ordem', $ordem, PDO::PARAM_STR);
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
        </a>";
        echo "<a href='alterabem.php?id=$id2'>
		<input type='button' name='insert' value='Editar' />
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
        <a href="T11.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
    </div>
    <!-- end:Main Form -->
</body>
<script>
function SetCookies(c_name,value,expiredays)
{
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
</script>
</html>