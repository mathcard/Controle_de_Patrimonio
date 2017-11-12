<?php 
require "modelo.php";
require "connect.php"; 

$id=$_SESSION['login'];
$sql2 = $con->query("select * from usuario where login = '$id'");
$row = $sql2->fetch(PDO::FETCH_OBJ);
$tipo = $row->tipo;

if ($tipo == 'P') {
    $dep="";
    $dep2="";
}else {
$dep = " AND usuario.sigla='{$row->sigla}'";
$dep2 = " WHERE usuario.sigla='{$row->sigla}'";
}

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
        <div class="logo">Buscar Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T03.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required />
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                <?php
                        if ($tipo == 'P') {
                            echo "<a href='T03c.php'>Incluir Usuário</a>";
                        }else {
                            echo "<a href='T03f.php'>Incluir Usuário</a>";
                        }
                ?>
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
                    echo "<th><a href='T03.php?ordem=id{$pnome}'>Código</a></th>";
                    echo "<th><a href='T03.php?ordem=nome{$pnome}'>Nome</a></th>";
                    echo "<th><a href='T03.php?ordem=login{$pnome}'>Login</a></th>";
                    echo "<th><a href='T03.php?ordem=email{$pnome}'>Email</a></th>";
                    echo "<th><a href='T03.php?ordem=tipo{$pnome}'>Tipo</a></th>";
                    echo "<th><a href='T03.php?ordem=sigla{$pnome}'>Departamento</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(isset($_GET['nome'])){

    $nome = $_GET['nome'];
    $sql= "SELECT * FROM usuario  WHERE UPPER(nome) LIKE UPPER('" . $nome . "') " . $dep . $ordem;
    $resultado = $con->prepare($sql);
    $resultado->execute();
    while ($row = $resultado->fetchObject()) {
                $id=$row->id;
                echo "<tr>";          
		        echo "<td><b>{$row->id}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->login}</b></td>";
                echo "<td><b>{$row->email}</b></td>";
                echo "<td><b>{$row->tipo}</b></td>";
                echo "<td><b>{$row->sigla}</b></td>";
                echo "<td>
		 <a href='excluiUser.php?id=$id'>
                <input type='button' name='insert' value='Apagar' />
                </a>";
                echo "<a href='alterauser.php?id=$id'>
                       <input type='button' name='insert' value='Editar' />
                       </a></td>";
                echo "</tr>";
                    }
}else{
            $sql= "SELECT * FROM usuario " . $dep2 . $ordem;
            $resultado = $con->prepare($sql);
            $resultado->execute();
            while ($row = $resultado->fetchObject()) {
                echo "<tr>";
		        echo "<td><b>{$row->id}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->login}</b></td>";
                echo "<td><b>{$row->email}</b></td>";
                echo "<td><b>{$row->tipo}</b></td>";
                echo "<td><b>{$row->sigla}</b></td>";
		$id2=$row->id;
                echo "<td>
		<a href='excluirUser.php?id=$id2'>
		<input type='button' name='insert' value='Apagar' />
        </a>";
        echo "<a href='alterauser.php?id=$id2'>
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
        <a href="T03.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
    </div>

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
