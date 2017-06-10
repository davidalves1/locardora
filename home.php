<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title>Pagina Principal</title>
        <link rel="stylesheet" href="principal.css">
        <script type="text/javascript" src="scripts.js"></script>

    </head>
    <body>

         <center>
             <img src="imagens/logoCarro.jpg" align="center">
             <br>
             <a href="login.php"><u>Sair</u></a>
         </center>
        <div id="menuPrincipal">
            <form name="principal">
                <div class="menu">

                    <a href="cadastrarCliente.php">Cadastrar Cliente</a><br>
                    <hr>
                    <a href="cadastrarVeiculo.php">Cadastrar Veículo</a><br>
                    <hr>
                    <a href="cadastrarReserva.php">Cadastrar Reserva</a><br>
                    <hr>
                    <a href="home.php">Gerar relatório em PDF</a><br>
                    <hr>

                </div>
                <div class="pesquisa">
                    
                    <select name="cmbBusca">
                        <option name="cliente">Cliente</option>
                        <option name="veiculo">Veículo</option>
                    </select>
                    <input type="text" name="txtBuscar" onclick="value=''" onchange="value='Buscar reserva'" value="Buscar reserva">
                    <input type="button" name="btnBuscar" value="Buscar">
                    
                </div>
            </form>
        </div>
    </body>
</html>
