<?php require "modelo.php"; ?>
<?php require "connect.php"; ?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Buscar Usuário</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T03out.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T03.php">Incluir Usuário</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end:Main Form -->
    </div>
    <div id="main" class="container-fluid">
    </div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Tipo</th>
                    <th class='actions text-center'>Ação</th>
                </tr>
            </thead>
    </div>
    <tbody>
    
            <?php
if(isset($_GET['nome'])){
    $nome = "%".$_GET['nome']."%";
    $sql= "SELECT * FROM usuario WHERE nome LIKE :nome";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
    $resultado->execute();
    $total = $resultado->rowCount();
    while ($row = $resultado->fetchObject()) {
        
                 echo "<tr>";
                echo "<td><b>{$row->login}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->tipo}</b></td>";
                echo "<td><b>{$row->sigla}</b></td>";
                echo "<td class='actions text-center'><a href='#'>Editar</a> <a href='#'>Apagar</a>";
                echo "</tr>";
                    }
}else{
            $sql= "SELECT * FROM usuario";
            $resultado = $con->prepare($sql);
            $resultado->execute();
            $total = $resultado->rowCount();
            while ($row = $resultado->fetchObject()) {

                echo "<tr>";
                echo "<td><b>{$row->login}</b></td>";
                echo "<td><b>{$row->nome}</b></td>";
                echo "<td><b>{$row->tipo}</b></td>";
                echo "<td><b>{$row->sigla}</b></td>";
                echo "<td class='actions text-center'><a href='#'>Editar</a> <a href='#'>Apagar</a>";
                echo "</tr>";
            }
        }
/*
    $sql = 'SELECT login, nome, sigla, tipo from usuario';
    foreach ($con->query($sql) as $row) {
            echo "<tr>";
            echo "<td><b>" . print $row['login'] . "</b></td>";
            echo "<td><b>" . print $row['nome'] . "</b></td>";
            echo "<td><b>" . print $row['sigla'] . "</b></td>";
            echo "<td><b>" . print $row['tipo'] . "</b></td>";
            echo "<td class='actions text-center'><a href='#'>Editar</a> <a href='#'>Apagar</a>";
            echo "</tr>";
    }
    */
            ?>

    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>
            
        <a href="T03out.php">Listar novamente</a>
    </div>


    <!-- end:Main Form -->

</body>

</html>
