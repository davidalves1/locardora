<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LoCARdora - login</title>
        <link rel="stylesheet" href="principal.css">
	<script type="text/javascript" src="scripts.js"></script>
    </head>
    <body>
        <form name="login" method="post" action="home.php">

        <center>
		<img src="imagens/logoCarro.jpg">

            <table>
            <tr>
                <td align="center">Login</td>
                <td><input type="text" name="txtNome"></td>
            </tr>
            <tr>
                <td align="center">Senha</td>
                <td><input type="password" name="txtSenha" maxlength="12"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right"> <input type="submit" name="btnEnviar" value="Entrar"></td>
            </tr>
            <tr>
                <td align="right"><input type="checkbox" name="chkLembrar"></td>
                <td><font size="1" >Lembrar-me</font></td>
            </tr>


        </table>

        </center>





        </form>
    </body>
</html>