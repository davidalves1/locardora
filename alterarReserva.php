<?php

function inverterData($dt) {
    $dia = substr($dt, 0, 2);
    $mes = substr($dt, 3, 2);
    $ano = substr($dt, 6, 4);
    return "$ano-$mes-$dia";
}

//Obter os dados:
$nome = $_POST["txtNome"];
$veiculo = $_POST["txtVeiculo"];
$data = $_POST["txtData"];
$hora = $_POST["txtHora"];
$obs = $_POST["areaObs"];
$id = $_POST["txtIdReserva"];

$camposOk = true;
$msg = "";

if (empty($nome)) {
    $msg = $msg . "NOME inválido! <BR>";
    $camposOk = false;
}

if (empty($veiculo)) {
    $msg = $msg . "VEÍCULO inválido! <BR>";
    $camposOk = false;
}
if (empty($data)) {
    $msg = $msg . "DATA inválida! <BR>";
    $camposOk = false;
}
if (empty($hora)) {
    $msg = $msg . "HORA inválido! <BR>";
    $camposOk = false;
}

if ($camposOk) {

    include_once "conexaobd.php";
    $sql = "UPDATE `reserva` SET `nome` = '$nome',
            `veiculo` = '$veiculo',
            `data` = '$data',
            `hora` = '$hora',
            `obs` = '$obs' WHERE `idreserva` = $id ;";

    mysql_query($sql) or die("ERRO ao INSERIR na tabela RESERVA. " . mysql_error());
    $cod = mysql_insert_id();

    $msg = "Veículo CADASTRADO com SUCESSO!";
    header("Location:cadastrarReserva.php?msg=$msg&id=$id");
} else {
    header("Location:cadastrarReserva.php?msg=$msg");
}
?>
