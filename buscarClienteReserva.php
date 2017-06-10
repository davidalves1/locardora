<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Pesquisa</title>
        <link rel="stylesheet" href="principal.css">
        <script type="text/javascript" src="scripts.js"></script>
        
    </head>
    <body>
        <center>
            <img alt="" src="imagens/logoCarro.jpg">
            <br>
            <h2> Pesquisa de Clientes </h2>
            <a href="cadastrarReserva.php"><u>Voltar</u></a> || <a href="login.php"><u>Sair</u></a>
            <form name="pesquisa" method="post" action="buscarClienteReserva.php">

                <br>Nome <input type="text" name="txtPesquisa" size="40"> <input type="submit" value="Buscar">

            </form>
            <?php
            if (isset($_POST["txtPesquisa"])) {
                $pesq = $_POST["txtPesquisa"];
                $sql = "SELECT * FROM cliente WHERE nome LIKE '%$pesq%' ";

                include_once "conexaobd.php";
                $resultado = mysql_query($sql) or die("ERRO ao INSERIR na tabela CLIENTE. " . mysql_error());

                if (mysql_num_rows($resultado) > 0) {

                    echo "<table align=\"center\" border=\"1\" cellspacing=\"2px\" cellpadding=\"5px\">";
                    echo "<tr><td>Código</td><td>Nome</td><td>CPF</td><td colspan=\"2\" align=\"center\">-</td></tr>";
                    while ($registro = mysql_fetch_assoc($resultado)) {
                        $codC = $registro["idcliente"];
                        $nome = $registro["nome"];
                        $cpf = $registro["cpf"];
                        $cnh = $registro["cnh"];
                        $endereco = $registro["endereco"];
                        $bairro = $registro["bairro"];
                        $cidade = $registro["cidade"];
                        $cep = $registro["cep"];
                        $estado = $registro["estado"];
                        $telefone = $registro["telefone"];
                        echo "<tr>";
                        echo "<td>$codC</td>";
                        echo "<td>$nome</td>";
                        echo "<td>$cpf</td>";
                        echo "<td><A href=\"javascript:fecharBuscaCliente($codC,'$nome')\"><IMG src=\"imagens/inserir.png\" border=\"0\"\"></A></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                } else {
                    echo "<tr><td colspan=\"5\"><font color=red size='3'> >> Cliente não encontrado! << </font></td>";
                }
            }
            ?>


        </center>
    </body>
</html>