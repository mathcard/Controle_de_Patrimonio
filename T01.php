<?php require "modelo.php";
      require "onlyP.php";
 ?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Categoria</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="T01in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="ct_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="ct_nome" name="ct_nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="ct_desc" class="sr-only">Descrição</label>
                            <textarea type="text" class="form-control" id="ct_desc" name="ct_desc" placeholder="Descrição"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ct_vida" class="sr-only">Vida útil</label>
                            <input type="number" class="form-control" id="ct_vida" name="ct_vida" placeholder="Vida útil">
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

</html>
