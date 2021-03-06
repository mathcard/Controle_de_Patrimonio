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
        <div class="logo">Buscar Departamento</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T04.php" method="get">
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

                       <a href='T04f.php'>Incluir Departamento</a>

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
                    echo "<th><a href='T04.php?ordem=sigla{$pnome}'>Sigla</a></th>";
                    echo "<th><a href='T04.php?ordem=nome{$pnome}'>Nome</a></th>";
                    echo "<th><a href='T04.php?ordem=predio{$pnome}'>Prédio</a></th>";
                    echo "<th></th>";
                    echo "<th>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(!empty($_GET['nome'])){
    
        $nome = "%" . $_GET['nome'] . "%";
        $sql= "SELECT departamento.sigla, departamento.nome, predio.nome from departamento full join sala on sala.sigladpto=departamento.sigla left join predio on sala.codpredio=predio.codigo where upper(departamento.nome) LIKE upper(:nome)" . $ordem;
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();
    
    }else{
                $sql= "SELECT departamento.sigla, departamento.nome, predio.nome as predio from departamento full join sala on sala.sigladpto=departamento.sigla left join predio on sala.codpredio=predio.codigo" . $ordem;
                $resultado = $con->prepare($sql);
                $resultado->execute();
                }
            
   
            while ($row = $resultado->fetchObject()) {
                $id=$row->sigla;
                echo "<tr>";          
                echo "<td><b>{$row->sigla}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->predio}</b></td>";
                echo "</td>"; 
                echo "<td></td>"; 

                echo "<td>
         <a href='excluirDepartamento.php?id=$id'>
                <input type='button' name='insert' value='Apagar' />
                </a>";
                echo "<a href='alteradepartamento.php?id=$id'>
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
        <a href="T04.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
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
