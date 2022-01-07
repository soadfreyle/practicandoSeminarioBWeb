<?php
session_start();
require_once '../../modelo/Usuario.php';
$msj = @$_REQUEST["msj"];
$u = @$_SESSION["usuario.find"];
if($u != NULL){
$u = unserialize($u);
}
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>EJEMPLO DE WEB APP CON MVC</title>
         <script src="../../js/mis_funciones.js" type="text/javascript"></script>
    </head>

    <body>
    <center>
         <h2 style="blue">FORMULARIO PARA BUSCAR USUARIOS</h2>
        <hr>
        <form action="../../controladores/ControlUsuario.php" onsubmit="confirmar()">
            <fieldset style="width: 35%">
                <legend>CONSULTAR DATOS EN LA BD</legend>
                <table border="1">
                    <tr>
                        <th style="text-align: right">CEDULA:</th>
                        <td><input type="number" name="cc" placeholder="Ingrese su Cedula" required value="<?= ($u)? $u->cedula : ""  ?>"></td>
                    </tr>
                    <tr>
                        <th>NOMBRE:</th>
                        <td><input type="text" name="nombre" placeholder="Ingrese su Cedula" value="<?= ($u)? $u->nombre : ""  ?>"></td>
                    </tr>

                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="password" name="clave1" placeholder="Ingrese su Clave" value="<?= ($u)? $u->clave : ""  ?>"></td>
                    </tr>
                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="password" name="clave2" placeholder="Ingrese nuevamente su Clave" value="<?= ($u)? $u->clave : ""  ?>"></td>
                    </tr>
                    <tr>
                        <th>CORREO:</th>
                        <td><input type="email" name="correo" placeholder="Ingrese su Email" value="<?= ($u)? $u->email : ""  ?>"></td>
                    </tr>
                    <tr>
                        <th>FECHA DE NACIMIENTO:</th>
                        <?php $fecha = @date("d/m/Y", strtotime(@$u->fecha_nacimiento)); ?>
                        <td><input type="date" name="fecha_nac" placeholder="Ingrese su Fecha de nacimiento" value="<?= ($u)? $u->fecha_nacimiento : ""  ?>"></td>
                    </tr>
                    <tr>
                        <th>ROL:</th>
                        <td>
                            <select name="rol" >
                                <?php
                                $rol_1 = "";
                                $rol_2 = "";
                                if($u){
                                    $rol = $u->rol;
                                    
                                    if(strtolower($rol) == "usuario"){
                                        $rol_1 = "selected";
                                    }else if(strtolower($rol) == "administrador"){
                                        $rol_2 = "selected";
                                    }
                                    
                                }
                                ?>
                                <option value="">Seleccione un ...</option>
                                <option <?= $rol_1 ?> value="Usuario">USUARIO</option>
                                <option <?= $rol_2 ?> value="Administrador">ADMINISTRADOR</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <?php 
                                 $masc = "";
                                 $fem = "";
                                 $otros = "";
                                if($u){
                                    $genero = $u->genero;
                                   
                                if($genero == "Masculino"){
                                    $masc = "checked";
                                }
                                else if($genero == "Femenino"){
                                    $fem = "checked";
                                }
                                else if($genero == "Otros"){
                                    $otros = "checked";
                                }
                                }
                                
                                ?>
                                
                                <legend>GENERO:</legend>
                                Masculino: <input <?=  $masc ?> type="radio" name="genero" value="Masculino">&nbsp;&nbsp;&nbsp;
                                Femenino: <input <?=  $fem ?>type="radio" name="genero" value="Femenino">&nbsp;&nbsp;&nbsp;
                                Otros: <input <?=  $otros ?>type="radio" name="genero" value="Otros">&nbsp;&nbsp;&nbsp;

                            </fieldset>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                                <?php
                                $leer = "";
                                $prog = "";
                                $dep = "";
                                $tv = "";
                                if($u){
                                    $pasatiempos = $u->hobbies;
                                    if(strstr(strtoupper($pasatiempos), "LEER")){
                                        $leer = "cheched";
                                    }
                                    if(strstr(strtoupper($pasatiempos), "PROGRAMAR")){
                                        $prog = "cheched";
                                    }
                                    if(strstr(strtoupper($pasatiempos), "CINE")){
                                        $tv = "cheched";
                                    }
                                    if(strstr(strtoupper($pasatiempos), "DEPORTES")){
                                        $dep = "cheched";
                                    }
                                }
                                
                                ?>
                                
                                <legend>PASATIEMPOS:</legend>
                                Leer: <input <?= $leer?>type="checkbox" name="pasatiempo1" value="Leer">&nbsp;&nbsp;&nbsp;
                                Programar: <input <?= $prog?>type="checkbox" name="pasatiempo2" value="Programar">&nbsp;&nbsp;&nbsp;
                                Cine: <input <?= $tv?>type="checkbox" name="pasatiempo3" value="Cine">&nbsp;&nbsp;&nbsp;
                                Deportes: <input <?= $dep?>type="checkbox" name="pasatiempo4" value="Deportes">&nbsp;&nbsp;&nbsp;

                            </fieldset>
                        </td>

                    </tr>








                    <tr>
                        <th colspan="2" style="text-align: right">
                            <input type="reset" value="LIMPIAR">&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="accion" id ="eliminar" onclick="return confirm('Desea eliminar')" value="ELIMINAR">&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="accion" id ="editar" onclick="return confirm('Desea editar')"value="EDITAR">&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="accion" id ="buscar" onclick="return confirm('Desea buscar')"value="BUSCAR">
                        </th>
                    </tr>

                </table>

            </fieldset>  
        </form>
        <span style="color: red"><?= @$msj ?></span>
    </center>

</body>
</html>
