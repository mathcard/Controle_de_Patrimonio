<?php 
require "modelo.php"; 
require "connect.php"; 

if (!isset($_GET['id'])) {
    echo "Esse departamento não existe. Você será redirecionado para a pagina de listagem de departamentos.";
    header ("refresh:3;url=T04.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM departamento where sigla=?";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $_GET['id']);
    $resultado->execute();
    $row = $resultado->fetchObject();
 
?>
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
                    echo "<th><b>Sigla</b></th>";
                    echo "<th><b>Nome</b></th>";

                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->sigla}</b></td>";
        echo "<td><b>{$row->nome}</b></td>";

?>
    </tbody>
    </table>
    </div>
<script>
window.onload = function(){

    document.getElementById('dpnomeDiv').style.display = 'none';
    document.getElementById('dpsiglaDiv').style.display = 'none';

}
</script>
<script>
function esconde(field,check) {
        document.getElementById(check).onclick = function () {
            if (!this.checked)
                document.getElementById(field).style.display = 'none';
            else
                document.getElementById(field).style.display = 'block';  
        }
    }
    </script>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Escolha os itens a serem alterados</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="alteradepartamentoin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                    <input type="checkbox" id="dpsiglaChk" name="dpsiglaChk" onclick="esconde('dpsiglaDiv', 'dpsiglaChk');"/>
						<label for="dpsiglaChk">Sigla</label>
					</div>
                    <div class="form-group" id="dpsiglaDiv" name="dpsiglaDiv">
                    <label for="dp_sigla" class="sr-only">Sigla</label>
                    <input type="text" class="form-control" id="dp_sigla" name="dp_sigla" placeholder="Sigla" maxlength="5" />
                </div>


                        <div class="form-group">
                    <input type="checkbox" id="dpnomeChk" name="dpnomeChk" onclick="esconde('dpnomeDiv', 'dpnomeChk');"/>
						<label for="dpnomeChk">Nome</label>
					</div>
                    <div class="form-group" id="dpnomeDiv" name="dpnomeDiv">
                    <label for="dp_nome" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="dp_nome" name="dp_nome" placeholder="Nome" maxlength="30" />
                </div>

                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
</div>

                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T04.php">Voltar</a>
                </div>
            </form>
        </div>

    </div>

</body>
<?php } ?>
</html>
