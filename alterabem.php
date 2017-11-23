<?php 
require "modelo.php"; 
require "connect.php"; 

if (!isset($_GET['id'])) {
    echo "Essa bem não existe. Você será redirecionado para a pagina de listagem de bens.";
    header ("refresh:3;url=T11.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM bempatrimonial where numero=?";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $_GET['id']);
    $resultado->execute();
    $row = $resultado->fetchObject();
    #preenche($row);
?>
    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
                    echo "<th><b>Numero</b></th>";
                    echo "<th><b>Descrição</b></th>";
                    echo "<th><b>Data de Compra</b></th>";
                    echo "<th><b>Prazo de Garantia</b></th>";
                    echo "<th><b>Nota Fiscal</b></th>";
                    echo "<th><b>Fornecedor</b></th>";
                    echo "<th><b>Valor</b></th>";
                    echo "<th><b>Categoria</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->numero}</b></td>";
        echo "<td><b>{$row->descricao}</b></td>";
        echo "<td><b>{$row->datacompra}</b></td>";
        echo "<td><b>{$row->prazogarantia}</b></td>";
        echo "<td><b>{$row->nrnotafiscal}</b></td>";
        echo "<td><b>{$row->fornecedor}</b></td>";
        echo "<td><b>{$row->valor}</b></td>";
        echo "<td><b>{$row->codcategoria}</b></td>";
?>
    </tbody>
    </table>
    </div>
<script>
window.onload = function(){
    document.getElementById('selcatDiv').style.display = 'none';
    document.getElementById('infornDiv').style.display = 'none';
    document.getElementById('invalorDiv').style.display = 'none';
    document.getElementById('innfeDiv').style.display = 'none';
    document.getElementById('inprazoDiv').style.display = 'none';
    document.getElementById('indataaDiv').style.display = 'none';
    document.getElementById('indescDiv').style.display = 'none';
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
            <form id="login-form" class="text-left" method="POST" action="alterabemin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                    <div class="form-group">
                    <input type="checkbox" id="indescChk" name="indescChk" onclick="esconde('indescDiv', 'indescChk');"/>
						<label for="indescChk">Descrição</label>
					</div>
                        <div class="form-group" id="indescDiv" name="indescDiv">
                            <label for="in_desc" class="sr-only">Descrição</label>
                            <textarea style="height: 100px" type="text" class="form-control" id="in_desc" name="in_desc" placeholder="Descrição"></textarea>
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="indataaChk" name="indataaChk" onclick="esconde('indataaDiv', 'indataaChk');"/>
						<label for="indataaChk">Data de Aquisição</label>
					</div>
                        <div class="form-group" id="indataaDiv" name="indataaDiv">
                            <label for="in_dataa">Data de Aquisição</label>
                            <input type="date" class="form-control" id="in_dataa" name="in_dataa">
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="inprazoChk" name="inprazoChk" onclick="esconde('inprazoDiv', 'inprazoChk');"/>
						<label for="inprazoChk">Prazo de Garantia</label>
					</div>
                        <div class="form-group" id="inprazoDiv" name="inprazoDiv">
                            <label for="in_prazo" class="sr-only">Prazo de Garantia</label>
                            <input type="number" class="form-control" id="in_prazo" name="in_prazo" placeholder="Prazo de garantia">
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="innfeChk" name="innfeChk" onclick="esconde('innfeDiv', 'innfeChk');"/>
						<label for="innfeChk">Nota Fiscal</label>
					</div>
                        <div class="form-group" id="innfeDiv" name="innfeDiv">
                            <label for="in_nfe" class="sr-only">Nota Fiscal</label>
                            <input type="number" class="form-control" id="in_nfe" name="in_nfe" placeholder="Nota Fiscal">
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="infornChk" name="infornChk" onclick="esconde('infornDiv', 'infornChk');"/>
						<label for="infornChk">Fornecedor</label>
					</div>
                        <div class="form-group" id="infornDiv" name="infornDiv">
                            <label for="in_forn" class="sr-only">Fornecedor</label>
                            <input type="text" class="form-control" id="in_forn" name="in_forn" placeholder="Fornecedor">
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="invalorChk" name="invalorChk" onclick="esconde('invalorDiv', 'invalorChk');"/>
						<label for="invalorChk">Valor</label>
					</div>
                        <div class="form-group" name="invalorDiv" id="invalorDiv">
                            <label for="in_valor">Valor</label>
                            <div class="input-group">
                                <span class="input-group-addon">R$</span>
				<input type="number" value="" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="in_valor" name="in_valor">
                            </div>
                        </div>
                        <div class="form-group">
                    <input type="checkbox" id="selcatChk" name="selcatChk" onclick="esconde('selcatDiv', 'selcatChk');"/>
						<label for="selcatChk">Categoria</label>
					</div>
			 <div class="form-group" id="selcatDiv" name="selcatDiv">
                        	<label for="selcat" class="sr-only">Categoria</label>
                        	<select class="form-control" id="selcat" name="selcat" title='Categoria'>
                                      <option>Categoria</option>
                                    </select>
                    </div>                    
                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
</div>

                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T11.php">Voltar</a>
                </div>
            </form>
        </div>

    </div>

</body>
<script>

   function buscarCategoria(){
                        var url = "buscarCategoria.php";
                        $.get(url, mostrarCategoria, 'json');
                }

                function mostrarCategoria(dados){
                        $("#selcat").empty();
                        $("#selcat").append(new Option("Categoria", "") );
                        $.each(dados, function(indice, linha){
                                $("#selcat").append(new Option(linha.nome, linha.valor) );
                        });

                }
        buscarCategoria();    
</script>
<?php } ?>
</html>
