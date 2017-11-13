<?php
require "modelo.php";
require "connect.php";
#$idbem = $_GET['id'];
if(isset($_GET['id'])){
	setcookie('aux2',$_GET['id'] );
}
#$sql = $con->query("select descricao from bempatrimonial where numero = '$idbem'");
#$row = $sql->fetch(PDO::FETCH_OBJ);
#$nome = $row->descricao;

?>
   <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Baixando Bem <?php #echo $idbem . " " . $nome; ?>  </div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="baixain.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="bx_motivo" class="sr-only">Sigla</label>
                            <input type="text" class="form-control" id="bx_motivo" name="bx_motivo" placeholder="Qual motivo da baixa?">
                        </div>

                        <div class="form-group">
		        <label for="bx_tipo" class="sr_only"> Tipo de Baixa</label>
			<select class="form-control" id="bx_tipo" name="bx_tipo">
				<option value="0"> ... </option>
				<option value="D"> Doação </option>
				<option value="E"> Extravio </option>
				<option value="I"> Inutilização </option>
				<option value="V"> Venda </option>
				<option value="O"> Outros </option>
			</select>
			
                        </div>

                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

<?php
/*
if(isset($_POST['bx_motivo']) && isset($_POST['bx_tipo'])){
$idbem = $_COOKIE['aux2'];
$LOGIN = $_SESSION['login'];
$motivo = $_POST['bx_motivo'];
$tipo = $_POST['bx_tipo'];

### Sql busca login
$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sql2->fetch(PDO::FETCH_OBJ);
$iduser = $row->id;

### Sql realiza a baixa
$sql3 = "insert into baixabempatrimonial values ('$idbem', current_date, '$tipo', '$motivo', '$iduser')";
$res=$con->prepare($sql3);
$res->execute();

### Atualiza listagem na T11
$sql4 = $con->prepare("update bempatrimonial set situacao = ? where numero = ?");
$sql4->execute(array("B", $idbem));
#setcookie("aux2","",0);
header ("location: index.php");
} */
?>
