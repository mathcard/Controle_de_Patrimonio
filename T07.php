<?php require "modelo.php"; ?>

    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Manipulação de Bem Patrimônial</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="T07in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="motivo" class="sr-only">Motivo</label>
                            <textarea style="height: 100px" type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="selbem" class="sr-only">Bem</label>
                            <select class="form-control" id="selbem" name="selbem" title='Bem' onChange="javascript: buscarSalas();">
                                    <option>Bem</option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label for="selsalad" class="sr-only">Sala Destino</label>
                            <select class="form-control" id="selsalad" name="selsalad">
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

