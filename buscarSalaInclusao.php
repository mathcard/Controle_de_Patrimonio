<?php

require "connect.php";

#        $sql = "select numero, descricao from sala";
        $sql = "select * from sala";
        $resultado = $con->prepare($sql);
        $resultado->execute();


        $arrSala = array();
        while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
                $arrSala[] = array('nome' => $linha->descricao,
                                                                        'valor' => $linha->numero);
        }

        echo json_encode($arrSala);

?>

