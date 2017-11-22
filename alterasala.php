<?php 
require "modelo.php"; 
require "connect.php"; 

if (!isset($_GET['id'])) {
    echo "Essa sala não existe. Você será redirecionado para a pagina de listagem de salas.";
    header ("refresh:3;url=T05.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM sala where numero=?";
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
                    echo "<th><b>Número</b></th>";
                    echo "<th><b>Comprimento</b></th>";
                    echo "<th><b>Largura</b></th>";
                    echo "<th><b>Descrição</b></th>";
                    echo "<th><b>Prédio</b></th>";
                    echo "<th><b>Departamento</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->numero}</b></td>";
        echo "<td><b>{$row->comprimento}</b></td>";
        echo "<td><b>{$row->largura}</b></td>";
        echo "<td><b>{$row->descricao}</b></td>";
        echo "<td><b>{$row->codpredio}</b></td>";
        echo "<td><b>{$row->sigladpto}</b></td>";

?>
    </tbody>
    </table>
    </div>
<script>
window.onload = function(){

    document.getElementById('selpredioDiv').style.display = 'none';
    document.getElementById('seldepDiv').style.display = 'none';
    document.getElementById('sldescDiv').style.display = 'none';
    document.getElementById('sllargDiv').style.display = 'none';
    document.getElementById('slcompDiv').style.display = 'none';
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
            <form id="login-form" class="text-left" method="POST" action="alterasalain.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                <div class="form-group">
                    <input type="checkbox" id="selpredioChk" name="selpredioChk" onclick="esconde('selpredioDiv', 'selpredioChk');"/>
						<label for="selpredioChk">Predio</label>
					</div>
                    <div class="form-group" id="selpredioDiv" name="selpredioDiv">
                    <label for="sel1" class="sr-only">Prédio</label>
                    <select class="form-control" id="selpredio" name="selpredio" title='Prédio' onchange="buscarDepartamentos()" />
                                  <option>Prédio</option>
                                </select>
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="seldepChk" name="seldepChk" onclick="esconde('seldepDiv', 'seldepChk');"/>
						<label for="seldepChk">Departamento</label>
					</div>
                    <div class="form-group" id="seldepDiv" name="seldepDiv">
                    <label for="seldep" class="sr-only">Departamento</label>
                    <select class="form-control" id="seldep" name="seldep" />
                    <option value="" selected disabled hidden>Departamento</option>

                            </select>
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="sldescChk" name="sldescChk" onclick="esconde('sldescDiv', 'sldescChk');"/>
						<label for="sldescChk">Descrição</label>
                    </div>
                    <div class="form-group" id="sldescDiv" name="sldescDiv">
                    <label for="sl_desc" class="sr-only">Descrição</label>
                    <textarea type="text" class="form-control" id="sl_desc" name="sl_desc" placeholder="Descrição" maxlength="80" /></textarea>
                    </div>

                    <div class="form-group">
                    <input type="checkbox" id="sllargChk" name="sllargChk" onclick="esconde('sllargDiv', 'sllargChk');"/>
						<label for="sllargChk">Largura</label>
					</div>

                    <div class="form-group" id="sllargDiv" name="sllargDiv">
                    <label for="sl_larg" class="sr-only">Largura</label>
                    <input type="number" class="form-control" id="sl_larg" name="sl_larg" placeholder="Largura"/>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="slcompChk" name="slcompChk" onclick="esconde('slcompDiv', 'slcompChk');"/>
						<label for="slcompChk">Comprimento</label>
					</div>

                    <div class="form-group" id="slcompDiv" name="slcompDiv">
                    <label for="sl_comp" class="sr-only">Comprimento</label>
                    <input type="number" class="form-control" id="sl_comp" name="sl_comp" placeholder="Comprimento" />
                </div>
                        
                        <?php echo "<input type='hidden' id='numero' name='numero' value='{$numero}'/>"; ?>
</div>

                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>

    </div>

</body>
<script>
		
		function buscarPredio(){
			var url = "buscarPredio.php";
			$.get(url, mostrarPredio, 'json');
		}
		
		function mostrarPredio(dados){
			$("#selpredio").empty();
			$("#selpredio").append(new Option("Prédio", "") );
			$.each(dados, function(indice, linha){
				$("#selpredio").append(new Option(linha.nome, linha.valor) );
			});
			
		}
        buscarPredio();

        function buscarDepartamentos(){
			var url = "buscatudo.php?predio="+$( "#selpredio" ).val();
			$.get(url, mostrarDepartamentos, 'json');
		}
        function buscarDepartamentos2(){
			var url = "buscardepartamentos.php";
			$.get(url, mostrarDepartamentos, 'json');
		}
		buscarDepartamentos2();
        
		function mostrarDepartamentos(dados){
			$("#seldep").empty();
			$("#seldep").append(new Option("Departamento", "") );
			$.each(dados, function(indice, linha){
				$("#seldep").append(new Option(linha.nome, linha.valor) );
			});
			
		}
</script>
<?php } ?>
</html>
