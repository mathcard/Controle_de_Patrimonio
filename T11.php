

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
    if (!empty($_GET['data'])){
    $data10=$_GET['data'];
    $mm=' < ';

}else {
    $sql= "SELECT date FROM current_date";
    $resultado = $con->prepare($sql);
    $resultado->execute();
    $row = $resultado->fetchObject();
    $data10=$row->date;
    $mm=' > ';

}
$dataX="&data=". $data10;
#$data2=",baixabempatrimonial where datacompra<" . $data . "'2000-10-16' AND baixabempatrimonial.data<'" . $data . "'";
#$data1=" and datacompra<" . $data . "'2000-10-16' AND baixabempatrimonial.data<'" . $data . "'";
#$meio=", baixabempatrimonial ";

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
            <form id="login-form" class="text-left" action="T11.php" method="get">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="data" class="sr-only">Nome</label>
                            <input type="date" class="form-control" id="data" name="data">
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
                    echo "<th><a href='T11.php?ordem=numero{$pnome}{$dataX}'>Código</a></th>";
                    echo "<th><a href='T11.php?ordem=descricao{$pnome}{$dataX}'>Descrição</a></th>";
                    echo "<th><a href='T11.php?ordem=datacompra{$pnome}{$dataX}'>Data da Compra</a></th>";
                    echo "<th><a href='T11.php?ordem=prazogarantia{$pnome}{$dataX}'>Garantia</a></th>";
                    echo "<th><a href='T11.php?ordem=nrnotafiscal{$pnome}{$dataX}'>Nota</a></th>";
                    echo "<th><a href='T11.php?ordem=fornecedor{$pnome}{$dataX}'>Fornecedor</a></th>";
                    echo "<th><a href='T11.php?ordem=valor{$pnome}{$dataX}'>Valor</a></th>";
                    echo "<th><a href='T11.php?ordem=situacao{$pnome}{$dataX}'>Situação</a></th>";
                    echo "<th><a href='T11.php?ordem=codcategoria{$pnome}{$dataX}'>Categoria</a></th>";
                    echo "<th><a href='T11.php?ordem=numsala{$pnome}{$dataX}'>Sala</a></th>";
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
   // $sql= "SELECT * FROM bempatrimonial " . $meio . " WHERE upper(descricao) LIKE upper(:nome)". $data1 . $ordem;
    $sqlX= "SELECT * FROM bempatrimonial where numero in
    ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}')
    union all
    (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}')) and upper(descricao) like upper('{$nome}')" . $ordem;
    $resultado = $con->prepare($sqlX);
   // $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
    $resultado->execute();
    #$total = $resultado->rowCount();

}else{
            $sqlX= "SELECT * FROM bempatrimonial where numero in
            ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}')
            union all
            (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}'))" . $ordem;
            $resultado = $con->prepare($sqlX);
            $resultado->execute();
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
        <a href="T11.php" onClick="SetCookies('aux','','-1')">Listar novamente</a>
        <?php  echo "<a href='pdf.php?data10={$data10}&mm={$mm}&ordem={$ordem}'> Imprime PDF</a>"; ?>
        
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
