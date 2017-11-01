<?php

require "connect.php";

        $sql = "select nome, codigo from Categoria";
        $resultado = $con->prepare($sql);
        $resultado->execute();

        $arrCategoria = array();
        while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
                $arrCategoria[] = array('nome' => $linha->nome,
                                                                        'valor' => $linha->codigo);
        }

        echo json_encode($arrCategoria);
?>

