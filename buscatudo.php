<?php

require "connect.php";

if (isset($_GET['predio'])) {
    $predio=$_GET['predio'];
    if (isset($_GET['departamento'])) {
        $departamento=$_GET['departamento'];
        $sql = "SELECT sala.numero, sala.descricao from sala inner join predio on sala.codpredio=predio.codigo inner join departamento on sala.sigladpto=departamento.sigla where predio.codigo={$predio} and departamento.sigla='{$departamento}';";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        
        //$arrSalas = array();
        while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
            $arrSalas[] = array('nome' => $linha->descricao,
                                        'valor' => $linha->numero);
        }
    
        echo json_encode($arrSalas);

    }else {
        $sql = "select departamento.sigla, departamento.nome from sala inner join predio on sala.codpredio=predio.codigo inner join departamento on sala.sigladpto=departamento.sigla where sala.codpredio={$predio};";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        
        //$arrDepartamento = array();
        while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
            $arrDepartamento[] = array('nome' => $linha->nome,
                                        'valor' => $linha->sigla);
        }
    
        echo json_encode($arrDepartamento);
    }

}
?>