<?php
include "modelo.php";
#if(isset($_COOKIE['name'])){
$op = $_COOKIE['type'];
	switch($op){
	case 'F':{
?>
<div class="text-center" style="padding:50px 0">
	<div class="logo">Bem vindo <?php echo $_COOKIE['name'];?>!
</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<a href="T07.html"> Criar MBP</a>
					</div>
					<div class="form-group">
						<a href="T09.html">Localização dos Bens</a>
					</div>
					<div class="form-group">
						<a href="T10.html">Relação das movimentações</a>
					</div>
				</div>
			</div>
			
		</form>
	</div>
	<!-- end:Main Form -->
</div>
<?php
	break;
	}
	case 'D':{
?>
<div class="text-center" style="padding:50px 0">
        <div class="logo">Bem vindo <?php echo $_COOKIE['name'];?>!
</div>
        <!-- Main Form -->
        <div class="login-form-1">
                <form id="login-form" class="text-left">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                                <div class="login-group">
                                        <div class="form-group">
                                                <a href="T03.html"> Incluir Usuario</a>
                                        </div>										
										<div class="form-group">
                                                <a href="T07.html"> Criar MBP</a>
                                        </div>
                                        <div class="form-group">
                                                <a href="T09.html">Movimentações Pendentes</a>
                                        </div>				
										<div class="form-group">
                                                <a href="T09.html">Localização dos Bens</a>
                                        </div>
                                        <div class="form-group">
                                                <a href="T10.html">Relação das movimentações</a>
                                        </div>
                                </div>
                        </div>

                </form>
        </div>
        <!-- end:Main Form -->
</div>
<?php
	break;
	}
	case 'P':{
?>
<div class="text-center" style="padding:50px 0">
        <div class="logo">Bem vindo <?php echo $_COOKIE['name'];?>!
</div>
        <!-- Main Form -->
        <div class="login-form-1">
                <form id="login-form" class="text-left">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                                <div class="login-group">
                                        <div class="form-group">
                                                <a href="T03.html"> Incluir Usuario</a>
                                        </div>										
										<div class="form-group">
                                                <a href="T07.html"> Todas Opções</a>
                                        </div>
										</div>
                        </div>

                </form>
        </div>
        <!-- end:Main Form -->
</div>
<?php
	break;
	}

}
?>
