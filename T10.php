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
        <div class="logo">Movimentação de Bem Patrimonial </div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T10.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Motivo</label>
                            <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">

                       <a href='T07.php'>Incluir MBP</a>

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
                    echo "<th><a href='T10.php?ordem=numero{$pnome}'>Código</a></th>";
                    echo "<th><a href='T10.php?ordem=motivo{$pnome}'>Motivo</a></th>";
                    echo "<th><a href='T10.php?ordem=dataconfirmacao{$pnome}'>Data de Confirmação</a></th>";
                    echo "<th><a href='T10.php?ordem=horaconfirmacao{$pnome}'>Hora da Confirmação</a></th>";
                    echo "<th><a href='T10.php?ordem=idsolicitante{$pnome}'>Solicitante</a></th>";
                    echo "<th><a href='T10.php?ordem=idautorizador{$pnome}'>Autorizador</a></th>";
                    echo "<th><a href='T10.php?ordem=numerobem{$pnome}'>Codigo Bem</a></th>";
                    echo "<th><a href='T10.php?ordem=numsalaorigem{$pnome}'>Sala Origem</a></th>";
                    echo "<th><a href='T10.php?ordem=numsaladestino{$pnome}'>Sala Destino</a></th>";
#                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
if(!empty($_GET['motivo'])){
    
        $motivo = "%" . $_GET['motivo'] . "%";
#        $sql= "SELECT * FROM mbp WHERE upper(motivo) LIKE upper(:motivo)" . $ordem;

                $sql= "SELECT m.numero as numero, m.motivo as motivo, m.dataconfirmacao as dataconfirmacao, m.horaconfirmacao as horaconfirmacao, u.nome as solicitante, m.idautorizador as idautorizador, m.numerobem as numerobem, m.numsalaorigem as numsalaorigem, m.numsaladestino as numsaladestino FROM mbp m inner join usuario u on  m.idsolicitante = u.id  WHERE upper(motivo) LIKE upper(:motivo)" . $ordem;
        $resultado = $con->prepare($sql);
        $resultado->bindParam(':motivo', $motivo, PDO::PARAM_STR);
        $resultado->execute();
    }else{
#                $sql= "SELECT * FROM mbp " . $ordem;
                $sql= "SELECT m.numero as numero, m.motivo as motivo, m.dataconfirmacao as dataconfirmacao, m.horaconfirmacao as horaconfirmacao, u.nome as solicitante, m.idautorizador as idautorizador, m.numerobem as numerobem, m.numsalaorigem as numsalaorigem, m.numsaladestino as numsaladestino FROM mbp m inner join usuario u on  m.idsolicitante = u.id " . $ordem;
                $resultado = $con->prepare($sql);
                $resultado->execute();
                }
            
    
            while ($row = $resultado->fetchObject()) {
                echo "<tr>";          
                echo "<td><b>{$row->numero}</b></td>";
                echo "<td><b>{$row->motivo}</b></td>";
                echo "<td><b>{$row->dataconfirmacao}</b></td>";
                echo "<td><b>{$row->horaconfirmacao}</b></td>";
#                echo "<td><b>{$row->idsolicitante}</b></td>";
                echo "<td><b>{$row->solicitante}</b></td>";
                echo "<td><b>{$row->idautorizador}</b></td>";
                echo "<td><b>{$row->numerobem}</b></td>";
                echo "<td><b>{$row->numsalaorigem}</b></td>";
                echo "<td><b>{$row->numsaladestino}</b></td>";            
                echo "</tr>";
                    }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="T10.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
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
