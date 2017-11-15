<?php require "modelo.php"; 
      require "onlyP.php";
?>
<div style="margin-left:33%;padding:70px 0">
    <div class="logo">Inclusão de Salas</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" method="post" action="T05in.php">
            <div style="width:500px" class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="sl_num" class="sr-only">Numero</label>
                        <input type="number" class="form-control" id="sl_num" name="sl_num" placeholder="Número" min="1" max="999" required />
                    </div>
                    <div class="form-group">
                        <label for="sl_comp" class="sr-only">Comprimento</label>
                        <input type="number" class="form-control" id="sl_comp" name="sl_comp" placeholder="Comprimento" required />
                    </div>
                    <div class="form-group">
                        <label for="sl_larg" class="sr-only">Largura</label>
                        <input type="number" class="form-control" id="sl_larg" name="sl_larg" placeholder="Largura" required />
                    </div>
                    <div class="form-group">
                        <label for="sl_desc" class="sr-only">Descrição</label>
                        <textarea type="text" class="form-control" id="sl_desc" name="sl_desc" placeholder="Descrição" maxlength="80" required /></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="sr-only">Prédio</label>
                        <select class="form-control" id="selpredio" name="selpredio" title='Prédio' onchange="buscarDepartamentos()" required />
                                      <option>Prédio</option>
                                    </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="sr-only">Departamento</label>
                        <select class="form-control" id="seldep" name="seldep" required />
                        <option value="" selected disabled hidden>Departamento</option>

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
			//var url = "buscatudo.php?predio="+$( "#selpredio" ).val();
            var url = "buscarDepartamento.php";
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
