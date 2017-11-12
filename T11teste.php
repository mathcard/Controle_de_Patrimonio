

<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem( 'firstLoad' ) )
    {
      localStorage[ 'firstLoad' ] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem( 'firstLoad' );
  }
})();

</script>

<?php 
require "modelo.php";
require "connect.php"; 

/*
if (!empty($_GET['selpredio'])) {
    if (isset($_GET['seldep'])) {
        if (isset($_GET['selsala'])) {
            $inner=", sala, predio, departamento ";
            $select=" and bempatrimonial.numsala=sala.numero and sala.numero={$_GET['selsala']}";
        }
    $inner=", sala, departamento";
    $select=" and bempatrimonial.numsala=sala.numero and sala.sigladpto=departamento.sigla and departamento.sigla={$_GET['seldep']}";
    }
$inner=", sala, predio, departamento ";
$predio=" and bempatrimonial.numsala=sala.numero and sala.codpredio=predio.codigo and predio.codigo={$_GET['selpredio']}";
}else{
$inner="";
$predio="";
}

*/
if (isset($_GET['ordem'])) {
    $ordem=" ORDER BY " . $_GET['ordem'];
}else {
    $ordem="";
}

if (isset($_GET['nome'])) {
   setcookie('aux',$_GET['nome'], time() + 30);
}else{
$pnome="";
}

if (isset($_COOKIE['aux'])){
    if (empty($_COOKIE['aux'])){
        $pnome="";
    }else {
        $pnome="&nome=" . $_COOKIE['aux'];
}
}else {
    $pnome="";
}

?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo" style="margin-left: 5cm;">Buscar Bem</div>

        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T11teste.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                        <label for="sel1" class="sr-only">Prédio</label>
                        <select class="form-control" id="selpredio" name="selpredio" title='Prédio' onchange="buscarDepartamentos()">
                                      <option value="">Prédio</option>
                                    </select>
                    </div>
                    <div class="form-group">
                             <label for="sel1" class="sr-only">Departamento</label>
                             <select class="form-control" id="seldep" name="seldep" onchange="buscarSala()">
                                <option value="" selected disabled hidden>Departamento</option>

                                </select>
                    </div>
                    <div class="form-group">
                            <label for="selsala" class="sr-only">Sala </label>
                            <select class="form-control" id="selsala" name="selsala" title='Sala'> 
                                  <option value="" selected disabled hidden>Sala</option>

                                </select>
                        </div>
                    </div>                    
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="T06.php">Incluir Bem</a>
                </div>
                
            </form>
        </div>
    </div>

    <div id="main" class="container-fluid">
	</div>
    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
                    echo "<th><a href='T11teste.php?ordem=numero{$pnome}'>Código</a></th>";
                    echo "<th><a href='T11teste.php?ordem=descricao{$pnome}'>Descrição</a></th>";
                    echo "<th><a href='T11teste.php?ordem=datacompra{$pnome}'>Data da Compra</a></th>";
                    echo "<th><a href='T11teste.php?ordem=prazogarantia{$pnome}'>Garantia</a></th>";
                    echo "<th><a href='T11teste.php?ordem=nrnotafiscal{$pnome}'>Nota</a></th>";
                    echo "<th><a href='T11teste.php?ordem=fornecedor{$pnome}'>Fornecedor</a></th>";
                    echo "<th><a href='T11teste.php?ordem=valor{$pnome}'>Valor</a></th>";
                    echo "<th><a href='T11teste.php?ordem=situacao{$pnome}'>Situação</a></th>";
                    echo "<th><a href='T11teste.php?ordem=codcategoria{$pnome}'>Categoria</a></th>";
                    echo "<th><a href='T11teste.php?ordem=numsala{$pnome}'>Sala</a></th>";
                    echo "<th><a href='#'>Depreciaçao</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
                                               

if(!empty($_GET['nome'])){

    $nome = "%" . $_GET['nome'] . "%";
    $sql= "SELECT * FROM bempatrimonial WHERE upper(descricao) LIKE upper(:nome)" . $ordem;
    $resultado = $con->prepare($sql);
    $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
    $resultado->execute();
    #$total = $resultado->rowCount();

}else{
            $sql= "SELECT * FROM bempatrimonial " . $ordem;
            $resultado = $con->prepare($sql);
            $resultado->execute();
            #$total = $resultado->rowCount();
            }
        

        while ($row = $resultado->fetchObject()) {
            $id=$row->numero;
            echo "<tr>";          
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
            $sql2="select round(valor/vidautil, 2) as depre from bempatrimonial inner join categoria on codcategoria=codigo and numero=" . $row->numero;
            $resultado2 = $con->prepare($sql2);
            $resultado2->execute();
            $row2 = $resultado2->fetchObject();
                echo "<td><b>{$row2->depre} a/m</b></td>";
            
            echo "<td>
     <a href='baixa.php?id=$id'>
            <input type='button' name='insert' value='Apagar' />
            </a>";
            echo "<a href='alterabem.php?id=$id'>
                   <input type='button' name='insert' value='Editar' />
                   </a></td>";
            echo "</tr>";
                }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="T11teste.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
    </div>

</body>
<script>
function SetCookies(c_name,value,expiredays)
{
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
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

function buscarSala(){
                        var url = "buscatudo.php?predio=" +$( "#selpredio" ).val()+"&departamento="+$( "#seldep" ).val();
                        $.get(url, mostrarSala, 'json');
                }

                function mostrarSala(dados){
                        $("#selsala").empty();
                        $("#selsala").append(new Option("Sala", "") );
                        $.each(dados, function(indice, linha){
                                $("#selsala").append(new Option(linha.nome, linha.valor) );
                        });

                }
//buscarSala();

function buscarDepartamentos(){
			var url = "buscatudo.php?predio="+$( "#selpredio" ).val();
			$.get(url, mostrarDepartamentos, 'json');
		}
		
		function mostrarDepartamentos(dados){
			$("#seldep").empty();
			$("#seldep").append(new Option("Departamento", "") );
			$.each(dados, function(indice, linha){
				$("#seldep").append(new Option(linha.nome, linha.valor) );
			});
			
		}
 //buscarDepartamentos();
</script>
</html>
