<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Veículos</title>
        <link rel="stylesheet" href="principal.css">
        <script type="text/javascript" src="scripts.js"></script>

    </head>
    <body>
        <?php
        if (isset($_GET["codigo"])) {

            $act = "alterarVeiculo.php";
            $cod = $_GET["codigo"];
            include_once("conexaobd.php");
            $sql = "SELECT * FROM veiculo WHERE idveiculo = $cod";
            $res = mysql_query($sql) or die("ERRO ao SELECIONAR o veículo. " . $sql);
            if ($registro = mysql_fetch_assoc($res)) {
                $placa = $registro["placa"];
                $ano = $registro["ano"];
                $marca = $registro["marca"];
                $modelo = $registro["modelo"];
                $diaria = $registro["diaria"];
                $preco = $registro["preco"];
            }
        } else {
            $act = "veiculo.php";
        }
        ?>
        <center>
            <img src="imagens/logoCarro.jpg">
            <br>
            <h2>Cadastro de Veículos</h2>
            <a href="home.php"><u>Voltar</u></a> || <a href="login.php"><u>Sair</u></a>
            <form name="carros" method="post" action="<?php echo $act; ?>">
                <input type="hidden" name="txtIdVeiculo" value="<?php echo $cod; ?>">
                <br>
                <table>
                    <tr>
                        <td>Placa</td>
                        <td><input type="text" name="txtPlaca" maxlength="8" onkeypress="funcaoPlaca(this)" size="8" value="<?php echo $placa; ?>">
                            <input type="button" value="Buscar" name="btnBuscar" onClick="window.location='buscarVeiculo.php'">
                        </td>
                    </tr>
                    <tr>
                        <td>Ano</td>
                        <td><input type="text" name="txtAno" maxlength="4" size="4" value="<?php echo $ano; ?>"></td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td><input type="text" name="txtMarca" maxlength="15" size="15" value="<?php echo $marca; ?>"></td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td><input type="text" name="txtModelo" size="25" value="<?php echo $modelo; ?>"></td>
                    </tr>
                    <tr>
                        <td>Diária</td>
                        <td>R$<input type="text" name="txtDiaria" maxlength="8" size="8" value="<?php echo $diaria; ?>"></td>
                    </tr>
                    <tr>
                        <td>Preço/Km</td>
                        <td>R$<input type="text" name="txtPrecokm" maxlength="8" size="8" value="<?php echo $preco; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><br>
                            <?php
                            if (isset($_GET["codigo"])) {
                                $val = "Alterar";
                            } else {
                                $val = "Incluir";
                            }
                            ?>
                            <input type="submit" value="<?php echo $val; ?>">
                            <input type="reset" value="Limpar">
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
