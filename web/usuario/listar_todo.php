<?php
require_once '../../modelo/Usuario.php';

?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>EJEMPLO DE WEB APP CON MVC</title>
    </head>

    <body>
    <center>
        <h2 style="color: blue">REPORTE DE USUARIOS EN EL SISTEMA</h2>
        <fieldset style="width: 45%">
            <legend>DATOS DE LOS USUARIOS</legend>
            <?php
            $lista_de_usuarios = Usuario::all(); // select*from usuarios;
            if (count($lista_de_usuarios) < -0) {
            echo "SIN  USUARIOS QUE MOSTRAR";
            } else {
            ?>
            <table border="1">
                <tr>
                    <th>N°.</th>
                    <th>CEDULA</th>
          
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>GENERO</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th>PASATIEMPOS</th>
                    <th>ROL</th>
                </tr>
                <?php
                $cuenta = 1;
                foreach ($lista_de_usuarios as $u) {
                    ?>
                    <tr>
                        <td><?= $cuenta ?></td>
                        <td><?= $u->cedula ?></td>
                     
                        <td><?= $u->nombre ?></td>
                        <td><a href="mailto:<?= $u->email ?>?subject-PRUEBA&body=SI VES ESTO ES QUE FUNCIONA"><?= $u->email ?></a></td>
                        <td><?= $u->genero ?></td>
                        <td><?= date_format($u->fecha_nacimiento, "d-m-Y")?></td>
                        <?php
                        $partes = explode(",", $u->hobbies);
                        $lineas = "<ul>";
                        foreach($partes as $h){
                            $lineas .= "<li>".$h . "<br>";
                        }
                        
                         $lineas .= "</ul>";
                        ?>
                       
                        <td><?= $lineas ?></td>
                        <td><?= $u->rol ?></td>
                    </tr>

                    <?php
                    $cuenta++;
                }
                ?>
                <tr>
                    <td colspan="6" style="text-align: right">TOTAL:</td>
                    <td colspan="2" style="text-align: left"><?= count($lista_de_usuarios) ?></td>
                </tr>

            </table>
            <?php
            }
            ?>


        </fieldset>       

    </center>

</body>
</html>
