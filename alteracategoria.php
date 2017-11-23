<?php 
require "modelo.php"; 
require "connect.php"; 

if (!isset($_GET['id'])) {
    echo "Essa categoria não existe. Você será redirecionado para a pagina de listagem de categorias.";
    header ("refresh:3;url=T01.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM categoria where codigo=?";
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
                    echo "<th><b>Código</b></th>";
                    echo "<th><b>Nome</b></th>";
                    echo "<th><b>Descrição</b></th>";
                    echo "<th><b>Vida Útil</b></th>";

                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->codigo}</b></td>";
        echo "<td><b>{$row->nome}</b></td>";
        echo "<td><b>{$row->descricao}</b></td>";
        echo "<td><b>{$row->vidautil}</b></td>";

?>
    </tbody>
    </table>
    </div>
<script>
window.onload = function(){

    document.getElementById('ctnomeDiv').style.display = 'none';
    document.getElementById('ctdescDiv').style.display = 'none';
    document.getElementById('ctvidaDiv').style.display = 'none';
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
            <form id="login-form" class="text-left" method="POST" action="alteracategoriain.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">

                        <div class="form-group">
                    <input type="checkbox" id="ctnomeChk" name="ctnomeChk" onclick="esconde('ctnomeDiv', 'ctnomeChk');"/>
						<label for="ctnomeChk">Nome</label>
					</div>
                    <div class="form-group" id="ctnomeDiv" name="ctnomeDiv">
                    <label for="ct_nome" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="ct_nome" name="ct_nome" maxlength="50" placeholder="Nome" />
                </div>


                        <div class="form-group">
                    <input type="checkbox" id="ctdescChk" name="ctdescChk" onclick="esconde('ctdescDiv', 'ctdescChk');"/>
						<label for="ctdescChk">Descrição</label>
					</div>
                    <div class="form-group" id="ctdescDiv" name="ctdescDiv">
                    <label for="ct_desc" class="sr-only">Descrição</label>
                    <textarea type="text" class="form-control" id="ct_desc" name="ct_desc" placeholder="Descrição" maxlength="400" /></textarea>
                </div>


                        <div class="form-group">
                    <input type="checkbox" id="ctvidaChk" name="ctvidaChk" onclick="esconde('ctvidaDiv', 'ctvidaChk');"/>
						<label for="ctvidaChk">Vida Útil</label>
					</div>
                    <div class="form-group" id="ctvidaDiv" name="ctvidaDiv">
                    <label for="ct_vida" class="sr-only">Vida útil</label>
                    <input type="number" class="form-control" id="ct_vida" name="ct_vida" placeholder="Vida útil" min="1" max="99"/>
                </div>


                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
</div>

                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T01.php">Voltar</a>
                </div>
            </form>
        </div>

    </div>

</body>
<?php } ?>
</html>
