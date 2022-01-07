<!DOCTYPE html>
<?php
$msj = @$_REQUEST["msj"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EJEMPLO DE WEB APP CON MVC</title>
    </head>

    <body>
    <center>
        <form action="controladores/ControlUsuario.php">
            <fieldset style="width: 35%">
                <legend>LOGIN</legend>
                <table>
                    <tr>
                        <th>EMAIL:</th>
                        <td><input type="email" name="correo" placeholder="Ingrese su Email" required></td>
                    </tr>
                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="password" name="clave" placeholder="Ingrese su Clave" required></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: right">
                            <input type="reset" value="LIMPIAR">&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="accion" value="LOGIN">
                        </th>
                    </tr>

                </table>

            </fieldset>  
        </form>
        <span style="color: red"><?= @$msj ?></span>
    </center>

</body>
</html>
