<?php require "modelo.php"; ?>

    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Movimentação de Bem</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="T07in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="motivo" class="sr-only">Motivo</label>
                            <textarea style="height: 100px" type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo" maxlength="200" required /></textarea>
                        </div>
                        <div class="form-group">
                            <label for="selbem" class="sr-only">Bem</label>
                            <select class="form-control" id="selbem" name="selbem" title='Bem' onChange="javascript: buscarSala();" required />  
                                    <option>Bem</option> 
                                    </select>
                        </div>

                        <div class="form-group">
                            <label for="selsalao" class="sr-only">Sala Origem</label>
                            <select class="form-control" id="selsalao" name="selsalao" onChange="javascript: buscarSalas();" required />
                                  <option>SalaOrigem</option>

                                </select>
                        </div>
                        <div class="form-group">
                            <label for="selsalad" class="sr-only">Sala Destino</label>
                            <select class="form-control" id="selsalad" name="selsalad" required />
                                  <option>SalaDestino</option>
  
                                </select>
                        </div>
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
		


		function buscarBem(){
			var url = "buscarBem.php";
			$.get(url, mostrarBem, 'json');
		}
		
		function mostrarBem(dados){
			$("#selbem").empty();
			$("#selbem").append(new Option("Bem", "") );
			$.each(dados, function(indice, linha){
				$("#selbem").append(new Option(linha.descricao, linha.valor) );
			});
			
		}
        buscarBem();

        function buscarSala(){
			var url = "buscarSala.php?descricao=" + $("#selbem :selected").text();
			$.get(url, mostrarSala, 'json');
		}
		
		function mostrarSala(dados){
			$("#selsalao").empty();
			$("#selsalao").append(new Option("SalaOrigem", "") );
			$.each(dados, function(indice, linha){
				$("#selsalao").append(new Option(linha.nome, linha.valor) );
			});
			
		}
        function buscarSalas(){
			var url = "buscarSalas.php";
			$.get(url, mostrarSalas, 'json');
		}
		
		function mostrarSalas(dados){
			$("#selsalad").empty();
			$("#selsalad").append(new Option("SalaDestino", "") );
			$.each(dados, function(indice, linha){
				$("#selsalad").append(new Option(linha.nome, linha.valor) );
			});
			
		}
      
</script>
</html>
