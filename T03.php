<?php require "modelo.php"; ?>
<script type="text/javascript">
function comp(){
senha1 = document.getElementById('us_passwd').value;
senha2 = document.getElementById('us_passwd2').value;
        if(senha1 != senha2){
                alert('As senhas não são iguais');
        return false;
        }
        return true;
}
</script>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1" >
            <form id="login-form" class="text-left" method="post" action="T03in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="us_log" class="sr-only">Login</label>
                            <input type="text" class="form-control" id="us_log" name="us_log" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="us_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="us_nome" name="us_nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Senha</label>
                            <input type="password" class="form-control" id="us_passwd" name="us_passwd" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Confirmar Senha</label>
                            <input type="password" class="form-control" id="us_passwd" name="us_passwd2" placeholder="Confirmação de senha">
                        </div>
                        <div class="form-group">
                            <label for="us_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="us_email" name="us_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="sel1" class="sr-only">Departamento</label>
                            <select name="sel1" class="form-control" id="sel1" >

									<option value="" selected disabled hidden>Departamento</option>

                                </select>
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="radio" class="" name="reg_gender" value="F" id="funcionario">
                            <label for="funcionario">Funcionário</label>

                            <input type="radio" class="" name="reg_gender" value="D" id="chdepartamento">
                            <label for="chdepartamento">Ch. Departamento</label>

                            <input type="radio" class="" name="reg_gender" value="P" id="chpatrimonio">
                            <label for="chpatrimonio">Ch. Patrimonio</label>
                        </div>
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
		
		function buscarDepartamentos(){
			var url = "buscarDepartamentos.php";
			$.get(url, mostrarDepartamentos, 'json');
		}
		
		function mostrarDepartamentos(dados){
			$("#sel1").empty();
			$("#sel1").append(new Option("Departamento", "") );
			$.each(dados, function(indice, linha){
				$("#sel1").append(new Option(linha.nome, linha.valor) );
			});
			
		}
        buscarDepartamentos();
</script>
</html>
