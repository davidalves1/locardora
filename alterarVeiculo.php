<?php

function inverterData($dt) {
    $dia = substr($dt, 0, 2);
    $mes = substr($dt, 3, 2);
    $ano = substr($dt, 6, 4);
    return "$ano-$mes-$dia";
}

//Obter os dados:
$placa = $_POST["txtPlaca"];
$ano = $_POST["txtAno"];
$marca = $_POST["txtMarca"];
$modelo = $_POST["txtModelo"];
$diaria = $_POST["txtDiaria"];
$preco = $_POST["txtPrecokm"];
$id = $_POST["txtIdVeiculo"];

$camposOk = true;
$msg = "";

if (empty($placa)) {
    $msg = $msg . "Número da PLACA inválida! <BR>";
    $camposOk = false;
}

if (empty($ano)) {
    $msg = $msg . "ANO inválido! <BR>";
    $camposOk = false;
}
if (empty($marca)) {
    $msg = $msg . "MARCA inválida! <BR>";
    $camposOk = false;
}
if (empty($modelo)) {
    $msg = $msg . "MODELO inválido! <BR>";
    $camposOk = false;
}
if (empty($diaria)) {
    $msg = $msg . "Valo da DIARIA inválido! <BR>";
    $camposOk = false;
}
if (empty($preco)) {
    $msg = $msg . "PREÇO inválido! <BR>";
    $camposOk = false;
}

if ($camposOk) {

    include_once "conexaobd.php";
    $sql = "UPDATE `veiculo` SET `placa` = '$placa',
            `ano` = '$ano',
            `marca` = '$marca',
            `modelo` = '$modelo',
            `diaria` = '$diaria',
            `preco` = '$preco' WHERE `idveiculo` = $id ;";

    mysql_query($sql) or die("ERRO ao INSERIR na tabela VEICULO. " . mysql_error());
    $cod = mysql_insert_id();

    $msg = "Veículo CADASTRADO com SUCESSO!";
    header("Location:cadastrarVeiculo.php?msg=$msg&nome=$nome&cpf=$cpf&cnh=$cnh&endereco$endereco&bairro$bairro&cidade$cidade&cep$cep&telefone$telefone");
} else {
    header("Location:cadastrarVeiculo.php?msg=$msg");
}
?>
