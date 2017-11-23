<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem( 'firstLoad' ) )
    {
      localStorage[ 'firstLoad' ] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem( 'firstLoad' );
  }
})();

</script>
<?php 
require "modelo.php";
require "connect.php";
require "onlyP.php"; 

$id=$_SESSION['login'];
$sql2 = $con->query("select * from usuario where login = '$id'");
$row = $sql2->fetch(PDO::FETCH_OBJ);
$tipo = $row->tipo;

if ($tipo != 'P') {
    echo "Você nao tem permissão para visualizar esta pagina";
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
        <div class="logo">Buscar Categoria</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T01.php" method="get">
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

                       <a href='T01f.php'>Incluir Categoria</a>

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
                    echo "<th><a href='T01.php?ordem=codigo{$pnome}'>Código</a></th>";
                    echo "<th><a href='T01.php?ordem=nome{$pnome}'>Nome</a></th>";
                    echo "<th><a href='T01.php?ordem=descricao{$pnome}'>Descrição</a></th>";
                    echo "<th><a href='T01.php?ordem=vidautil{$pnome}'>Vida Útil</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(!empty($_GET['nome'])){
    
        $nome = "%" . $_GET['nome'] . "%";
        $sql= "SELECT * FROM categoria WHERE upper(nome) LIKE upper(:nome)" . $ordem;
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();
        #$total = $resultado->rowCount();
    
    }else{
                $sql= "SELECT * FROM categoria " . $ordem;
                $resultado = $con->prepare($sql);
                $resultado->execute();
                #$total = $resultado->rowCount();
                }
            
    
            while ($row = $resultado->fetchObject()) {
                $id=$row->codigo;
                echo "<tr>";          
                echo "<td><b>{$row->codigo}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->descricao}</b></td>";
                echo "<td><b>{$row->vidautil}</b></td>";            
                echo "<td><input type='button' name='insert' onclick='confirma({$id})' value='Apagar' />";
                echo "<a href='alteracategoria.php?id=$id'>
                       <input type='button' name='insert' value='Editar' />
                       </a></td>";
                echo "</tr>";
                    }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="T01.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
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

function confirma(id)
{
var r = confirm("Deseja confirmar a exclusão desse item?");
if (r == true) {
    $(window).attr('location','excluirCategoria.php?id=' + id )
} else {

}
}
</script>
</html>
