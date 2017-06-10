<?php

     if (  isset( $_GET["codigo"] )   ) {
        $cod = $_GET["codigo"];

        // Montar o SQL para excluir
        include_once("conexaobd.php");
        $sql = "DELETE FROM cliente WHERE idcliente=$cod";
        $res = mysql_query( $sql ) or die ("ERRO ao excluir dados do cliente. " . mysql_error() );
     }
     header("Location:buscarCadastro.php");
?>