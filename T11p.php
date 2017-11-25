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

if (isset($_GET['ordem'])) {
    $ordem=" ORDER BY bp." . $_GET['ordem'];
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



if (isset($_GET['selpredio'])) {
    setcookie('auxp',$_GET['selpredio'], time() + 60);
 }else{
 $ppredio="";
 $predio="";
 $pred="";
 }
 
 if (isset($_COOKIE['auxp'])){
     if (empty($_COOKIE['auxp'])){
         $ppredio="";
         $predio="";
         $pred="";
     }else {
         $ppredio="&selpredio=" . $_COOKIE['auxp'];
         $predio=" and sala.codpredio=" . $_COOKIE['auxp'];
         $pred=$_COOKIE['auxp'];

 }
 }else {
     $ppredio="";
     $predio="";
     $pred="";
 }
 

?>
    <div style="margin-left:33%;padding:70px 0">
        <div class="logo" style="margin-left: 5cm;">Buscar Bem</div>

        <div class="login-form-1">
            <form id="login-form" class="text-left" action="T11p.php" method="get">
                <div style="width:500px" class="main-login-form">

                    <div class="login-group">
                        <div class="form-group">
                            <label for="nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="data" class="sr-only">Data</label>
                            <input type="date" class="form-control" id="data" name="data">
                        </div>
        
                        <div class="form-group">
                             <label for="sel1" class="sr-only">Prédio</label>
                            <select class="form-control" id="selpredio" name="selpredio" title='Prédio'>
                                      <option value="">Prédio</option>
                                    </select>
                         </div>                    
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                </div>
                <div class="etc-login-form" style="width: 500px">
                <a href="T06.php">Incluir Bem /</a>
                <a href="T11p.php"> Prédio / </a>
                <a href="T11d.php"> Departamento /</a>
                <a href="T11s.php"> Sala</a>
            </div>
                
            </form>
        </div>
    </div>

    <div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
                <?php
                    echo "<th><a href='T11p.php?ordem=numero{$pnome}{$dataX}{$ppredio}'>Código</a></th>";
                    echo "<th><a href='T11p.php?ordem=descricao{$pnome}{$dataX}{$ppredio}'>Descrição</a></th>";
                    echo "<th><a href='T11p.php?ordem=datacompra{$pnome}{$dataX}{$ppredio}'>Data da Compra</a></th>";
                    echo "<th><a href='T11p.php?ordem=prazogarantia{$pnome}{$dataX}{$ppredio}'>Garantia</a></th>";
                    echo "<th><a href='T11p.php?ordem=nrnotafiscal{$pnome}{$dataX}{$ppredio}'>Nota</a></th>";
                    echo "<th><a href='T11p.php?ordem=fornecedor{$pnome}{$dataX}{$ppredio}'>Fornecedor</a></th>";
                    echo "<th><a href='T11p.php?ordem=valor{$pnome}{$dataX}{$ppredio}'>Valor</a></th>";
                    echo "<th><a href='T11p.php?ordem=situacao{$pnome}{$dataX}{$ppredio}'>Situação</a></th>";
                    echo "<th><a href='T11p.php?ordem=codcategoria{$pnome}{$dataX}{$ppredio}'>Categoria</a></th>";
                    echo "<th><a href='T11p.php?ordem=numsala{$pnome}{$dataX}{$ppredio}'>Sala</a></th>";
                    if ($tipo != "F"){
                    echo "<th><a href='#'>Depreciaçao</a></th>";
                    echo "<th class='actions text-center'>Ação</th>";
                    }
                    ?>
                </tr>
            </thead>
    </div>
	<tbody>
	
            <?php
                                               

if(!empty($_GET['nome'])){

    $nome = "%" . $_GET['nome'] . "%";
   $sqlX= "SELECT bp.numero, bp.descricao, bp.datacompra, bp.prazogarantia, bp.nrnotafiscal, bp.fornecedor, bp.valor, bp.situacao, bp.codcategoria, bp.numsala from sala, bempatrimonial bp where bp.numsala=sala.numero and bp.numero in
   ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}}')
   union all
   (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}')) and upper(bp.descricao) like upper('{$nome}')". $predio . $ordem;
 
    $resultado = $con->prepare($sqlX);

    $resultado->execute();

}else{
            $sqlX="SELECT bp.numero, bp.descricao, bp.datacompra, bp.prazogarantia, bp.nrnotafiscal, bp.fornecedor, bp.valor, bp.situacao, bp.codcategoria, bp.numsala from sala, bempatrimonial bp where bp.numsala=sala.numero and bp.numero in
            ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}}')
            union all
            (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}'))". $predio . $ordem;

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
            if ($tipo != "F"){
            $sql2="select round(valor/vidautil, 2) as depre from bempatrimonial inner join categoria on codcategoria=codigo and numero=" . $row->numero;
            $resultado2 = $con->prepare($sql2);
            $resultado2->execute();
            $row2 = $resultado2->fetchObject();
            echo "<td><b>{$row2->depre} a/m</b></td>";
            echo "<td><input type='button' name='insert' onclick='confirma({$id})' value='Apagar' />";
            echo "<a href='alterabem.php?id=$id'><input type='button' name='insert' value='Editar' /></a></td>";
            }
            echo "</tr>";

                }
            ?>
    </tbody>
    </table>
    </div>
    <div class="etc-login-form">
        <a href="index.php">Voltar</a>        
        <a href="T11p.php" onClick="SetCookies('aux','','-1'); SetCookies('auxp','','-1');">Listar novamente   </a>
        <?php  echo "<a href='pdf.php?data10={$data10}&mm={$mm}&ordem={$ordem}&predio={$pred}'>  Imprime PDF</a>"; ?>
        
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
/*
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
*/
function confirma(id)
{
var r = confirm("Deseja continuar com a baixa desse item?");
if (r == true) {
    $(window).attr('location','baixa.php?id=' + id )
} else {

}
}

</script>
</html>
