<!DOCTYPE html>
<?php
$msj = @$_REQUEST["msj"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EJEMPLO DE WEB APP CON MVC</title>
        <script src="../../js/mis_funciones.js" type="text/javascript"></script>
    </head>

    <body>
    <center>
        <h2 style="blue">FORMULARIO PARA INGRESAR USUARIOS</h2>
        <hr>
        <form action="../../controladores/ControlUsuario.php" onsubmit="return confirmar();">
            <fieldset style="width: 35%">
                <legend>AGREGAR</legend>
                <table border="1">
                    <tr>
                        <th>CEDULA:</th>
                        <td><input type="number" name="cc" placeholder="Ingrese su Cedula" required></td>
                    </tr>
                    <tr>
                        <th>NOMBRE:</th>
                        <td><input type="text" name="nombre" placeholder="Ingrese su Nombre" required></td>
                    </tr>

                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="password" name="clave1" placeholder="Ingrese su Clave" required></td>
                    </tr>
                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="password" name="clave2" placeholder="Ingrese nuevamente su Clave" required></td>
                    </tr>
                    <tr>
                        <th>CORREO:</th>
                        <td><input type="email" name="correo" placeholder="Ingrese su Email" required></td>
                    </tr>
                    <tr>
                        <th>FECHA DE NACIMIENTO:</th>
                        <td><input type="date" name="fecha_nac" placeholder="Ingrese su Fecha de nacimiento" required></td>
                    </tr>
                    <tr>
                        <th>ROL:</th>
                        <td>
                            <select name="rol" required aria-required>
                                <option value="">Seleccione un ...</option>
                                <option value="Usuario">USUARIO</option>
                                <option value="Administrador">ADMINISTRADOR</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <legend>GENERO:</legend>
                                Masculino: <input type="radio" name="genero" value="Masculino">&nbsp;&nbsp;&nbsp;
                                Femenino: <input type="radio" name="genero" value="Femenino">&nbsp;&nbsp;&nbsp;
                                Otros: <input type="radio" name="genero" value="Otros">&nbsp;&nbsp;&nbsp;

                            </fieldset>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <legend>PASATIEMPOS:</legend>
                                Leer: <input type="checkbox" name="pasatiempo1" value="Leer">&nbsp;&nbsp;&nbsp;
                                Programar: <input type="checkbox" name="pasatiempo2" value="Programar">&nbsp;&nbsp;&nbsp;
                                Cine: <input type="checkbox" name="pasatiempo3" value="Cine">&nbsp;&nbsp;&nbsp;
                                Deportes: <input type="checkbox" name="pasatiempo4" value="Deportes">&nbsp;&nbsp;&nbsp;

                            </fieldset>
                        </td>

                    </tr>








                    <tr>
                        <th colspan="2" style="text-align: right">
                            <input type="reset" value="LIMPIAR">&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="accion" value="GUARDAR" onclick="return confirm('Desea Agregar')">
                        </th>
                    </tr>

                </table>

            </fieldset>  
        </form>
        <span style="color: red"><?= @$msj ?></span>
    </center>

</body>
</html>
