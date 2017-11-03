<?php require "modelo.php"; ?>
<script>
function comp(){
senha1 = document.getElementById('us_passwd').value;
senha2 = document.getElementById('us_passwd2').value;
        if(senha1 != senha2){
                alert('As senhas não são iguais');
        return false;
        }
	if(!document.getElementById('funcionario').checked && !document.getElementById('chdepartamento').checked && !document.getElementById('chpatrimonio').checked.checked){
	window.alert("É necessario marcar a profissão.");
	 }
        return true;
}
</script>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1" >
            <form id="login-form" class="text-left" method="post" action="T03innova.php" onSubmit="return comp();">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="us_log" class="sr-only">Login</label>
                            <input type="text" class="form-control" id="us_log" name="us_log" placeholder="Login" size="20" required >
                        </div>
                        <div class="form-group">
                            <label for="us_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="us_nome" name="us_nome" placeholder="Nome" size="50" required >
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Senha</label>
                            <input type="password" class="form-control" id="us_passwd" name="us_passwd" placeholder="Senha" size="32" required >
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Confirmar Senha</label>
                            <input type="password" class="form-control" id="us_passwd2" name="us_passwd2" placeholder="Confirmação de senha" size="32" required >
                        </div>
                        <div class="form-group">
                            <label for="us_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="us_email" name="us_email" placeholder="Email" size="80" required >
                        </div>
                        <div class="form-group">
                        <label for="sel1" class="sr-only">Prédio</label>
                        <select class="form-control" id="selpredio" name="selpredio" title='Prédio' onchange="buscarDepartamentos()" required>
                                      <option>Prédio</option>
                                    </select>
                          </div>
                        <div class="form-group">
                            <label for="seldep" class="sr-only">Departamento</label>
                            <select name="seldep" class="form-control" id="seldep" required >

									<option value="" selected disabled hidden>Departamento</option>

                                </select>
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="radio" class="" name="reg_gender" value="F" id="funcionario" >
                            <label for="funcionario">Funcionário</label>

                            <input type="radio" class="" name="reg_gender" value="D" id="chdepartamento">
                            <label for="chdepartamento">Ch. Departamento</label>

                            <input type="radio" class="" name="reg_gender" value="P" id="chpatrimonio">
                            <label for="chpatrimonio">Ch. Patrimonio</label>
                        </div>
                        <input type="hidden" id="tipo" name="tipo" value="C">
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- end:Main Form -->

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
</html>