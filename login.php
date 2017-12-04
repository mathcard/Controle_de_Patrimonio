<?php
session_start();
include "connect.php";
include "modelo2.php";
if(!$con){
	echo "Erro na conexão:" . pg_last_error($con);
}
$user = $_POST['lg_username'];
$senha = $_POST['lg_password'];
	if((!$user)||(!$senha)){
?>	
<div class="text-center" style="padding:50px 0">
	<div class="logo">Atenção</div>
É necessario informar o usuario e senha.
</div>

<?php
		header ("refresh:3;url=login.html");
	}else{		
	$sql = "select * from usuario where login=? and senha=md5(?);";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $user);
	$resultado->bindParam(2, $senha);
	$resultado->execute();
	$login_check = $resultado->rowCount();

		if($login_check>0){
			$row = $resultado->fetchObject();
			$nome = $row->nome;
			$tipo = $row->tipo;
			echo $nome;
			Echo " " . $tipo;
			setcookie ("name", $nome);	
			$_SESSION['type'] = $tipo;
			$_SESSION['login']= $user;
			$_SESSION['senha']= $senha;
			header ("location: index.php");
		}else{
?>
<div class="text-center" style="padding:50px 0">
        <div class="logo">Atenção</div>
Usuario ou senha invalido!
</div>
<?php	
	unset ($_SESSION['type']);
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header ("refresh:5;url=login.html");
		}
	} 

?>
