<?php
require "modelo.php";
require "connect.php";
if (!isset($_GET['id'])) {
    echo "Essa bem não existe. Você será redirecionado para a pagina de listagem de bens.";
    header ("refresh:3;url=T11.php");

}else{
        setcookie('aux2',$_GET['id'] );
        $numero=$_GET['id'];
        $sql= "SELECT * FROM bempatrimonial where numero=?";
        $resultado = $con->prepare($sql);
        $resultado->bindParam(1, $_GET['id']);
        $resultado->execute();
        $row = $resultado->fetchObject();
?>
   <div id="main" class="container-fluid">
        </div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
                    echo "<th><b>Numero</b></th>";
                    echo "<th><b>Descrição</b></th>";
                    echo "<th><b>Data de Compra</b></th>";
                    echo "<th><b>Prazo de Garantia</b></th>";
                    echo "<th><b>Nota Fiscal</b></th>";
                    echo "<th><b>Fornecedor</b></th>";
                    echo "<th><b>Valor</b></th>";
                    echo "<th><b>Situação</b></th>";
                    echo "<th><b>Categoria</b></th>";
                    echo "<th><b>Sala</b></th>";
                    ?>
                </tr>
            </thead>
    </div>
 <tbody>

<?php
        echo "<td><b>{$row->numero}</b></td>";
        echo "<td><b>{$row->descricao}</b></td>";
        echo "<td><b>{$row->datacompra}</b></td>";
        echo "<td><b>{$row->prazogarantia}</b></td>";
        echo "<td><b>{$row->nrnotafiscal}</b></td>";
        echo "<td><b>{$row->fornecedor}</b></td>";
        echo "<td><b>{$row->valor}</b></td>";
        echo "<td><b>{$row->situacao}</b></td>";
        echo "<td><b>{$row->codcategoria}</b></td>";
        echo "<td><b>{$row->numsala}</b></td>";

?>
        </tbody>
        </table>
        </div>



   <div style="margin-left:33%;padding:70px 0">
        <div class="logo"> Infome os motivos para realizar a baixa:  </div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="baixain.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="bx_motivo" class="sr-only">Sigla</label>
                            <input type="text" class="form-control" id="bx_motivo" name="bx_motivo" placeholder="Qual motivo da baixa?">
                        </div>

                        <div class="form-group">
                        <label for="bx_tipo" class="sr_only"> Tipo de Baixa</label>
<select class="form-control" id="bx_tipo" name="bx_tipo">
                                <option value="0"> ... </option>
                                <option value="D"> Doação </option>
                                <option value="E"> Extravio </option>
                                <option value="I"> Inutilização </option>
                                <option value="V"> Venda </option>
                                <option value="O"> Outros </option>
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
<?php
}
?>

