<?php 
require "modelo.php"; 
require "connect.php"; 

if (!isset($_GET['id'])) {
    echo "Esse usuario não existe. Você será redirecionado para a pagina de listagem de usuarios.";
    header ("refresh:3;url=T03.php");

}else {
    $numero=$_GET['id'];
    $sql= "SELECT * FROM usuario where id=?";
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
                    echo "<th><b>Id</b></th>";
                    echo "<th><b>Login</b></th>";
                    echo "<th><b>Nome</b></th>";
                    echo "<th><b>Email</b></th>";
                    echo "<th><b>Tipo</b></th>";
                    echo "<th><b>Departamento</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>

<?php
        echo "<td><b>{$row->id}</b></td>";
        echo "<td><b>{$row->login}</b></td>";
        echo "<td><b>{$row->nome}</b></td>";
        echo "<td><b>{$row->email}</b></td>";
        echo "<td><b>{$row->tipo}</b></td>";
        echo "<td><b>{$row->sigla}</b></td>";

?>
    </tbody>
    </table>
    </div>
<script>
window.onload = function(){

    document.getElementById('uslogDiv').style.display = 'none';
    document.getElementById('usnomeDiv').style.display = 'none';
    document.getElementById('uspasswdDiv').style.display = 'none';
    document.getElementById('usemailDiv').style.display = 'none';
    document.getElementById('selpredioDiv').style.display = 'none';
    document.getElementById('seldepDiv').style.display = 'none';
    document.getElementById('reggenderDiv').style.display = 'none';
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
            <form id="login-form" class="text-left" method="POST" action="alterauserin.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                    <div class="form-group">
                    <input type="checkbox" id="uslogChk" name="uslogChk" onclick="esconde('uslogDiv', 'uslogChk');"/>
						<label for="uslogChk">Login</label>
					</div>
                    <div class="form-group" id="uslogDiv" name="uslogDiv">
                    <label for="us_log" class="sr-only">Login</label>
                    <input type="text" class="form-control" id="us_log" name="us_log" placeholder="Login">
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="usnomeChk" name="usnomeChk" onclick="esconde('usnomeDiv', 'usnomeChk');"/>
						<label for="usnomeChk">Nome</label>
					</div>
                    <div class="form-group" id="usnomeDiv" name="usnomeDiv">
                    <label for="us_nome" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="us_nome" name="us_nome" placeholder="Nome">
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="uspasswdChk" name="uspasswdChk" onclick="esconde('uspasswdDiv', 'uspasswdChk');"/>
						<label for="uspasswdChk">Senha</label>
					</div>
                    <div class="form-group" id="uspasswdDiv" name="uspasswdDiv">
                    <label for="us_passwd" class="sr-only">Senha</label>
                    <input type="password" class="form-control" id="us_passwd" name="us_passwd" placeholder="Senha">
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="usemailChk" name="usemailChk" onclick="esconde('usemailDiv', 'usemailChk');"/>
						<label for="usemailChk">Email</label>
					</div>
                    <div class="form-group" id="usemailDiv" name="usemailDiv">
                    <label for="us_email" class="sr-only">Email</label>
                    <input type="text" class="form-control" id="us_email" name="us_email" placeholder="Email">
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="selpredioChk" name="selpredioChk" onclick="esconde('selpredioDiv', 'selpredioChk');"/>
						<label for="selpredioChk">Prédio</label>
					</div>
                    <div class="form-group" id="selpredioDiv" name="selpredioDiv">
                    <label for="sel1" class="sr-only">Prédio</label>
                    <select class="form-control" id="selpredio" name="selpredio" title='Prédio' onchange="buscarDepartamentos()">
                                  <option>Prédio</option>
                                </select>
                      </div>
                        <div class="form-group">
                    <input type="checkbox" id="seldepChk" name="seldepChk" onclick="esconde('seldepDiv', 'seldepChk');"/>
						<label for="seldepChk">Departamento</label>
					</div>
                    <div class="form-group" id="seldepDiv" name="seldepDiv">
                    <label for="seldep" class="sr-only">Departamento</label>
                    <select name="seldep" class="form-control" id="seldep" >

                            <option value="" selected disabled hidden>Departamento</option>

                        </select>
                </div>
                        <div class="form-group">
                    <input type="checkbox" id="reggenderChk" name="reggenderChk" onclick="esconde('reggenderDiv', 'reggenderChk');"/>
						<label for="reggenderChk">Tipo</label>
					</div>
                    <div class="form-group login-group-checkbox" name="reggenderDiv" id="reggenderDiv">
                    <input type="radio" class="" name="reg_gender" value="F" id="funcionario">
                    <label for="funcionario">Funcionário</label>

                    <input type="radio" class="" name="reg_gender" value="D" id="chdepartamento">
                    <label for="chdepartamento">Ch. Departamento</label>

                    <input type="radio" class="" name="reg_gender" value="P" id="chpatrimonio">
                    <label for="chpatrimonio">Ch. Patrimonio</label>
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
