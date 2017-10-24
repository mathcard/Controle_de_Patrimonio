<?php require "modelo.php"; ?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Departamento</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="T04in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="dp_sigla" class="sr-only">Sigla</label>
                            <input type="text" class="form-control" id="dp_sigla" name="dp_sigla" placeholder="Sigla">
                        </div>
                        <div class="form-group">
                            <label for="dp_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="dp_nome" name="dp_nome" placeholder="Nome">
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
