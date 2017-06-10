<?php

function inverterData($dt) {
    $dia = substr($dt, 0, 2);
    $mes = substr($dt, 3, 2);
    $ano = substr($dt, 6, 4);
    return "$ano-$mes-$dia";
}

//Obter os dados:
$nome = $_POST["txtNome"];
$cpf = $_POST["txtCpf"];
$cnh = $_POST["txtCnh"];
$endereco = $_POST["txtEndereco"];
$bairro = $_POST["txtBairro"];
$cidade = $_POST["txtCidade"];
$cep = $_POST["txtCep"];
$estado = $_POST["cmbEstado"];
$telefone = $_POST["txtTel"];

$camposOk = true;
$msg = "";

if ( empty ($nome) ) {
        $msg = $msg . "NOME inválido <BR>";
        $camposOk = false;
    }
    if (strlen($cpf) != 14 ) {
        $msg = $msg . "CPF inválido <BR>";
        $camposOk = false;
    }
    if (strlen($cnh)!= 11 ) {
        $msg = $msg . "CNH inválida <BR>";
        $camposOk = false;
    }
    if (empty($endereco)) {
        $msg = $msg . "ENDEREÇO inválido <BR>";
        $camposOk = false;
    }
    if ( empty ($bairro) ) {
        $msg = $msg . "BAIRRO inválido <BR>";
        $camposOk = false;
    }
    if ( empty ($cep) ) {
        $msg = $msg . "CEP inválido <BR>";
        $camposOk = false;
    }
    if ( $estado == 0 ) {
        $msg = $msg . "ESTADO inválido <BR>";
        $camposOk = false;
    }
    if ( empty ($telefone) ) {
        $msg = $msg . "TELEFONE inválido <BR>";
        $camposOk = false;
    }

    if ( $camposOk ) {

        include_once "conexaobd.php";
$sql = "INSERT INTO cliente (nome, cpf, cnh, endereco, bairro, cidade, cep, estado, telefone) VALUES
                   ( '$nome', '$cpf', '$cnh', '$endereco','$bairro', '$cidade', '$cep', '$estado', '$telefone' ) ";

mysql_query($sql) or die("ERRO ao INSERIR na tabela CLIENTE. " . mysql_error());
$cod = mysql_insert_id();


$msg = "Cliente CADASTRADO com SUCESSO!";
header("Location:cadastrarCliente.php?msg=$msg&nome=$nome&cpf=$cpf&cnh=$cnh&endereco$endereco&bairro$bairro&cidade$cidade&cep$cep&telefone$telefone");
//echo $msg;

} else {

header("Location:cadastrarCliente.php?msg=$msg");
echo $msg;
}
?>
