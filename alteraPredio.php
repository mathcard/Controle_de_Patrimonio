<?php 
require "modelo.php"; 
require "connect.php"; 
if (!isset($_GET['id'])) {
    echo "Esse prédio não existe. Você será redirecionado para a pagina de listagem de prédios.";
    header ("refresh:3;url=T03.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM predio where codigo=?";
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
                    echo "<th><b>CEP</b></th>";
                    echo "<th><b>Logradouro</b></th>";
                    echo "<th><b>Número</b></th>";
                    echo "<th><b>Complemento</b></th>";
                    echo "<th><b>Bairro</b></th>";
                    echo "<th><b>Cidade</b></th>";
                    echo "<th><b>Estado</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->codigo}</b></td>";
        echo "<td><b>{$row->nome}</b></td>";
        echo "<td><b>{$row->cep}</b></td>";
        echo "<td><b>{$row->logradouro}</b></td>";
        echo "<td><b>{$row->numero}</b></td>";
        echo "<td><b>{$row->complemento}</b></td>";
        echo "<td><b>{$row->bairro}</b></td>";
        echo "<td><b>{$row->cidade}</b></td>";
        echo "<td><b>{$row->uf}</b></td>";

?>

<script>
window.onload = function(){

    document.getElementById('prnomeDiv').style.display = 'none';
    document.getElementById('prcepDiv').style.display = 'none';
    document.getElementById('prruaDiv').style.display = 'none';
    document.getElementById('prcompDiv').style.display = 'none';
    document.getElementById('prnumDiv').style.display = 'none';
    document.getElementById('prbairroDiv').style.display = 'none';
    document.getElementById('prcityDiv').style.display = 'none';
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

    </tbody>
    </table>
    </div>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Altera Prédio</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="alteraPredioin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                    <div class="form-group">
                    <input type="checkbox" id="prnomeChk" name="prnomeChk" onclick="esconde('prnomeDiv', 'prnomeChk');"/>
						<label for="prnomeChk">Nome</label>
					</div>
                        <div class="form-group" id="prnomeDiv" name="prnomeDiv">
                            <label for="pr_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="pr_nome" name="pr_nome" placeholder="Nome">
                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prcepChk" name="prcepChk" onclick="esconde('prcepDiv', 'prcepChk');"/>
						<label for="prcepChk">CEP</label>
					</div>
                        <div class="form-group" id="prcepDiv" name="prcepDiv">
               
                                        <label for="pr_cep" class="sr-only">CEP</label>
                                        <input type="number" class="form-control" id="pr_cep" name="pr_cep" placeholder="CEP">

                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prruaChk" name="prruaChk" onclick="esconde('prruaDiv', 'prruaChk');"/>
						<label for="prruaChk">Logradouro</label>
					</div>

                        <div class="form-group" id="prruaDiv" name="prruaDiv">
                            <label for="pr_rua" class="sr-only">Logradouro</label>
                            <input type="text" class="form-control" id="pr_rua" name="pr_rua" placeholder="Logradouro">
                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prcompChk" name="prcompChk" onclick="esconde('prcompDiv', 'prcompChk');"/>
						<label for="prcompChk">Complemento</label>
					</div>

                        <div class="form-group" id="prcompDiv" name="prcompDiv">
                            <label for="pr_comp" class="sr-only">Complemento</label>
                            <input type="text" class="form-control" id="pr_comp" name="pr_comp" placeholder="Complemento">
                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prnumChk" name="prnumChk" onclick="esconde('prnumDiv', 'prnumChk');"/>
						<label for="prnumChk">Número</label>
					</div>

                        <div class="form-group" id="prnumDiv" name="prnumDiv">
                            <label for="pr_num" class="sr-only">Número</label>
                            <input type="number" class="form-control" id="pr_num" name="pr_num" placeholder="Número">
                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prbairroChk" name="prbairroChk" onclick="esconde('prbairroDiv', 'prbairroChk');"/>
						<label for="prbairroChk">Bairro</label>
					</div>

                        <div class="form-group" id="prbairroDiv" name="prbairroDiv">
                            <label for="pr_bairro" class="sr-only">Bairro</label>
                            <input type="text" class="form-control" id="pr_bairro" name="pr_bairro" placeholder="Bairro">
                        </div>

                        <div class="form-group">
                    <input type="checkbox" id="prcityChk" name="prcityChk" onclick="esconde('prcityDiv', 'prcityChk');"/>
						<label for="prcityChk">Localidade</label>
					</div>
                        <div class="form-group" id="prcityDiv" name="prcityDiv">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="pr_city" class="sr-only">Cidade</label>
                                        <input type="text" class="form-control" id="pr_city" name="pr_city" placeholder="   Cidade">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="estado" class="sr-only">Estado</label>
                                            <select class="form-control" name="estado">
                                            <option value="" selected disabled hidden>Estado</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T02.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- end:Main Form -->

</body>

<?php } ?>
    </html>
