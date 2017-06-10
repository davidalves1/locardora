<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Clientes</title>
        <link rel="stylesheet" href="principal.css">
        <script type="text/javascript" src="scripts.js"></script>

    </head>

    <body>
        <?php
        if (isset($_GET["codigo"])) {

            $act = "alterarCliente.php";
            $cod = $_GET["codigo"];
            include_once("conexaobd.php");
            $sql = "SELECT * FROM cliente WHERE idcliente = $cod";
            $res = mysql_query($sql) or die("ERRO ao SELECIONAR o cliente. " . $sql);
            if ($registro = mysql_fetch_assoc($res)) {
                $nome = $registro["nome"];
                $cpf = $registro["cpf"];
                $cnh = $registro["cnh"];
                $endereco = $registro["endereco"];
                $bairro = $registro["bairro"];
                $cidade = $registro["cidade"];
                $cep = $registro["cep"];
                $estado = $registro["estado"];
                $telefone = $registro["telefone"];
            }
        } else {
            $act = "cliente.php";
        }
        ?>
        <center>
            <img alt="" src="imagens/logoCarro.jpg">
            <br>
            <h2> Cadastro de Clientes</h2>
            <a href="home.php"><u>Voltar</u></a> || <a href="login.php"><u>Sair</u></a>
            <form name="clientes" method="post" action="<?php echo $act; ?>">
                <input type="hidden" name="txtIdCliente" value="<?php echo $cod; ?>">
                <br>
                <table align="center">
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" name="txtNome" size="40" value="<?php echo $nome; ?>"> <input type="button" value="Buscar" name="btnBuscar" onClick="window.location='buscarCadastro.php'"></td>
                    </tr>
                    <tr>
                        <td>CPF</td>
                        <td><input type="text" name="txtCpf" maxlength="14" onkeypress="funcaoCpf(this)" size="14" value="<?php echo $cpf; ?>"></td>
                    </tr>
                    <tr>
                        <td>CNH</td>
                        <td><input type="text" name="txtCnh" maxlength="11" size="11"value="<?php echo $cnh; ?>"></td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td><input type="text" name="txtEndereco" size="40"value="<?php echo $endereco; ?>"></td>
                    </tr>
                    <tr>
                        <td>Bairro</td>
                        <td><input type="text" name="txtBairro" size="40"value="<?php echo $bairro; ?>"></td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td><input type="text" name="txtCidade" value="<?php echo $cidade; ?>"></td>
                    </tr>
                    <tr>
                        <td>CEP</td>
                        <td><input type="text" name="txtCep" maxlength="9" size="9" onkeypress="funcaoCep(this)" value="<?php echo $cep; ?>"></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>
                            <select name="cmbEstado">
                                <option value="0">Selecione o Estado</option>
                                <?php
                                $campo = array(
                                    array(1, 'Acre'),
                                    array(2, 'Alagoas'),
                                    array(3, 'Amapá'),
                                    array(4, 'Amazonas'),
                                    array(5, 'Bahia'),
                                    array(6, 'Ceará'),
                                    array(7, 'Distrito Federal'),
                                    array(8, 'Espirito Santo'),
                                    array(9, 'Goiás'),
                                    array(10, 'Maranhão'),
                                    array(11, 'Mato Grosso'),
                                    array(12, 'Mato Grosso do Sul'),
                                    array(13, 'Minas Gerais'),
                                    array(14, 'Pará'),
                                    array(15, 'Paraíba'),
                                    array(16, 'Paraná'),
                                    array(17, 'Pernambuco'),
                                    array(18, 'Piauí'),
                                    array(19, 'Rio de Janeiro'),
                                    array(20, 'Rio Grande do Norte'),
                                    array(21, 'Rio Grande do Sul'),
                                    array(22, 'Rondônia'),
                                    array(23, 'Roraima'),
                                    array(24, 'Santa Catarina'),
                                    array(25, 'São Paulo'),
                                    array(26, 'Sergipe'),
                                    array(27, 'Tocantins')
                                );
                                foreach ($campo as $opcao) {
                                    if (isset($_GET["codigo"])) {
                                        if ($opcao[0] == $_GET['cmbEstado']) {
                                            $selected = "selected";
                                        } else {
                                            $selected = null;
                                        }
                                    }
                                    $select .= "<option " . $selected . " value='" . $opcao[0] . "'>" . $opcao[1] . "</option>";
                                }
                                $select .= '</select>';
                                echo $select;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" name="txtTel" maxlength="13" onkeypress="funcaoTel(this)" size="13" value="<?php echo $telefone; ?>"></td>
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