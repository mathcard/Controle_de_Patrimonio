<?php require "modelo.php"; ?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Localizar Bem</div>
        <div class="login-form-1">
           <form id="login-form" class="text-left" action="RF01loc.php" method="POST">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="id" class="sr-only">Nome</label>
                            <input type="number" class="form-control" id="id" name="id" placeholder="Digite o codigo para realizar a busca">
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
    </div>
</body>
</html>
