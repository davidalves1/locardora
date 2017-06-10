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
$idR = $_POST["txtIdReserva"];
$idC = $_POST["txtIdCliente"];
$idV = $_POST["txtIdVeiculo"];

$camposOk = true;
$msg = "";

if ( empty ($nome) ) {
        $msg = $msg . "NOME inválido - ";
        $camposOk = false;
}
    if (empty($veiculo)) {
        $msg = $msg . "VEÍCULO inválido - ";
        $camposOk = false;
    }
    if ( empty ($data) ) {
        $msg = $msg . "DATA inválida - ";
        $camposOk = false;
    }
    if ( empty ($hora) ) {
        $msg = $msg . "HORA inválido - ";
        $camposOk = false;
    }

    if ( $camposOk ) {

        include_once "conexaobd.php";
$sql = "INSERT INTO reserva (nome, veiculo, data, hora, obs) VALUES
                   ( '$nome', '$veiculo', '$data', '$hora','$obs' ) ";

mysql_query($sql) or die("ERRO ao INSERIR na tabela RESERVA. " . mysql_error());
$cod = mysql_insert_id();


$msg = "Reserva CADASTRADA com SUCESSO!";
header("Location:cadastrarReserva?msg=$msg&id=$idR&idCliente=$idC&idVeiculo=$idV");

} else {

header("Location:cadastrarReserva.php?msg=$msg&idCliente=$idC&idVeiculo=$idV");
echo $msg;
}
?>
