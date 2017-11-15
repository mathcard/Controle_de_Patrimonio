<?php require "modelo.php"; 

if ($tipo != 'D'){
    echo "Você não tem permissão para realizar essa ação";
    header ("refresh:5; url=T03.php");
}else{
?>

<script>
function comp(){
 
senha1 = document.getElementById('us_passwd').value;
senha2 = document.getElementById('us_passwd2').value;

        if(senha1 != senha2){
                alert('As senhas não batem');
        return false;
        }
        return true;
}
</script>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1" >
            <form id="login-form" class="text-left" method="post" action="T03in.php" onSubmit="return comp();">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="us_log" class="sr-only">Login</label>
                            <input type="text" class="form-control" id="us_log" name="us_log" placeholder="Login" maxlength="20" required />
                        </div>
                        <div class="form-group">
                            <label for="us_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="us_nome" name="us_nome" placeholder="Nome" maxlength="50" required />
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Senha</label>
                            <input type="password" class="form-control" id="us_passwd" name="us_passwd" placeholder="Senha" maxlength="32" required />
                        </div>
                        <div class="form-group">
                            <label for="us_passwd" class="sr-only">Confirmar Senha</label>
                            <input type="password" class="form-control" id="us_passwd2" name="us_passwd2" placeholder="Confirme a senha" maxlength="32" required />
                        </div>
                        <div class="form-group">
                            <label for="us_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="us_email" name="us_email" placeholder="Email" maxlength="80" required />
                        </div>
                        <input type="hidden" id="tipo" name="tipo" value="D">
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
<?php } ?>
</html>
