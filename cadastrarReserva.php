
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Reserva</title>
        <link rel="stylesheet" href="principal.css">
        <script type="text/javascript" src="scripts.js"></script>
        <script type="text/javascript">
            function abrirBuscaCliente(){
                open('buscarClienteReserva.php')
            }
            function abrirBuscaVeiculo(){
                open('buscarVeiculoReserva.php')
            }
        </script>
    </head>
    <body>
        <?php
            if (isset($_GET["codC"])) {

            $codC = $_GET["codC"];
            }
            if (isset($_GET["codV"])) {

            $codV = $_GET["codV"];
            /*include_once("conexaobd.php");

            $sqlC = "SELECT * FROM cliente WHERE  idcliente = $codC";
            $resC = mysql_query($sqlC) or die("ERRO ao SELECIONAR a cliente. " . $sqlC);
            if ($registro = mysql_fetch_assoc($resC)) {
                $nome = $registro["nome"];
            }
            }
            if (isset($_GET["codV"])){

            $codV = $_GET["codV"];
            include_once("conexaobd.php");
            $sqlV = "SELECT * FROM veiculo WHERE idveiculo = $codV";
            $resV = mysql_query($sqlV) or die("ERRO ao SELECIONAR a veiculo. " . $sqlV);
            if ($registro = mysql_fetch_assoc($resV)) {
                $veiculo = $registro["modelo"];
            }*/
            }
                
             ?>
        
        <center>
            <img alt="" src="imagens/logoCarro.jpg">
            <br>
            <h2> Cadastro de Reserva </h2>
            <a href="home.php"><u>Voltar</u></a> || <a href="login.php"><u>Sair</u></a>

            <form name="reservas" method="post" action="reserva.php">
                <input type="hidden" name="txtIdReserva" value="">
                <input type="hidden" name="txtIdCliente" value="">
                <input type="hidden" name="txtIdVeiculo" value="">
                <br>
                <table align="center">
                    <tr>
                        <td>Nome do Cliente</td>
                        <td><input type="text" name="txtNome" size="30" value=""> <input type=button value="Buscar" onclick="abrirBuscaCliente()"></td>
                    </tr>
                        <tr>
                            <td>Veículo</td>
                            <td><input type="text" name="txtVeiculo" size="30" value=""> <input type=button value="Buscar" onclick="abrirBuscaVeiculo()"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td> Data </td>
                            <td colspan="2"> <input type="text" name="txtData" value="" maxlength="10" size="10" onkeypress="funcaoData(this)"> </td>
                        </tr>
                        <tr>
                            <td> Hora </td>
                            <td colspan="2"> <input type="text" name="txtData" value="" maxlength="5" size="5"onkeypress="funcaoHora(this)"> hs </td>
                        </tr>
                        <tr>
                            <td>Observações</td>
                            <td>
                                <textarea cols="25" rows="5" name="areaObs"> </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <br><br>
                                <input type="submit" value="Incluir">
                                <input type="reset" value="Limpar">
                                <input type="button" value="Procurar Reserva" onclick="window.value='buscarReserva.php'">
                            </td>
                        </tr>      
                </table>
            </form>
            <?php
                  if (isset($_GET["msg"])) {
                     $msg = $_GET["msg"];
                     echo "<script language=javascript>
                             alert ('$msg');
                           </script>";
                                }
            ?>
            </center>
    </body>
</html>