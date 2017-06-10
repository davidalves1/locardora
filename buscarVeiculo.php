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
            <img src="imagens/logoCarro.jpg">
            <br>
            <h2> Pesquisa de Veículos </h2>
            <a href="cadastrarVeiculo.php"><u>Voltar</u></a> || <a href="login.php"><u>Sair</u></a><br>

            <form name="pesquisa" method="post" action="buscarVeiculo.php">
                <br><select name="cmbTipo">
                    <option value="1">Placa</option>
                    <option value="2">Marca</option>
                    <option value="3">Modelo</option>
                </select>
                <input type="text" name="txtPesquisa"><input type="submit" value="Buscar">
            </form>
             <?php
            if (isset($_POST["txtPesquisa"])) {
                $pesq = $_POST["txtPesquisa"];
                $tipo = $_POST["cmbTipo"];
                switch ($tipo){
                    case 1: $sql = "SELECT * FROM veiculo WHERE placa LIKE '%$pesq%' order by marca";
                        break;
                    case 2: $sql = "SELECT * FROM veiculo WHERE marca LIKE '%$pesq%' order by marca";
                        break;
                    case 3: $sql = "SELECT * FROM veiculo WHERE modelo LIKE '%$pesq%' order by marca";
                }

                include_once "conexaobd.php";
                $resultado = mysql_query($sql) or die("ERRO ao INSERIR na tabela VEÍCULO. " . mysql_error());

                if (mysql_num_rows($resultado) > 0) {

                    echo "<table align=\"center\" border=\"1\" cellspacing=\"2px\" cellpadding=\"5px\">";
                    echo "<tr><td>Placa</td><td>Marca</td><td>Modelo</td><td colspan=\"2\">Opções</td></tr>";

                    while ($registro = mysql_fetch_assoc($resultado)) {
                        $cod = $registro["idveiculo"];
                        $placa = $registro["placa"];
                        $ano = $registro["ano"];
                        $marca = $registro["marca"];
                        $modelo = $registro["modelo"];
                        $diaria = $registro["diaria"];
                        $preco = $registro["preco"];
                        echo "<tr>";
                        echo "<td>$placa</td>";
                        echo "<td>$marca</td>";
                        echo "<td>$modelo</td>";
                        echo "<td><A href='cadastrarVeiculo.php?codigo=$cod'><IMG src=\"imagens/alterar.png\" border=\"0\"></A></td>";
                        echo "<td><A href='excluirVeiculo.php?codigo=$cod'><IMG src=\"imagens/excluir.gif\" border=\"0\" onclick=\"msgExcluir()\"></A></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                } else {
                    echo "<tr><td colspan=\"5\"><font color=red size='3'> >> Veículo não encontrado! << </font></td>";
                }
            }
            ?>
        </center>
    </body>
</html>
