<?php
require_once 'modelo/Usuario.php';
//$u = new Usuario();
//$u->cedula = "4510";
//$u->clave = "wsx";
//$u->nombre = "Camilo Palacios Altuz";
//$u->email = "altuz@gmail.com";
//$u->fecha_nacimiento = "1998/07/09";
//$u->genero= "Masculino";
//$u->hobbies = "Cine,Leer";
//$u->rol = "USUARIO";
//try {
//    $u->save();
//    $total = Usuario::count();
//} catch (Exception $error) {
//    echo"Error al insertar<br>".$error->getMessage();
//}
//$u = Usuario::find(4512);
//echo "Nombre: ".$u->nombre."<br>";
//echo "Clave: ".$u->clave."<br>";
//echo "Email: ".$u->email."<br>";
//echo "Nacio: ".$u->fecha_nacimiento."<br>";
//echo "Genero: ".$u->genero."<br>";
//echo "Pasatiempos: ".$u->hobbies."<br>";
//echo "Rol: ".$u->rol."<br>";
//
////MODIFICAR O CAMBIAR
////$u->cedula = "4510";
//$u->clave = "luna15";
////$u->nombre = "Camilo Palacios Altuz";
//$u->email = "altuz2@gmail.com";
////$u->fecha_nacimiento = "1998/07/09";
////$u->genero= "Masculino";
////$u->hobbies = "Cine,Leer";
//$u->rol = "ADMINISTRADOR";
//echo"<hr>";
//echo"ACTUALIZANDO.....";
//$u->save();
//echo"<hr>";
//
//$u = Usuario::find();
//echo "Nombre: ".$u->nombre."<br>";
//echo "Clave: ".$u->clave."<br>";
//echo "Email: ".$u->email."<br>";
//echo "Nacio: ".$u->fecha_nacimiento."<br>";
//echo "Genero: ".$u->genero."<br>";
//echo "Pasatiempos: ".$u->hobbies."<br>";
//echo "Rol: ".$u->rol."<br>";
//ELIMINAR
//$u = NULL;
//try {
//    $u = Usuario::find(151478);
//    
//} catch (Exception $ex) {
//    echo"<hr>";
//    echo"NO EXISTE.....";
//    echo"<hr>";
//    
//}
//
//if($u != NULL){
//    echo"<hr>";
//    echo"ELIMINANDO.....";
//    echo"<hr>";
//    $u->delete();
//    
//}else{
//     echo"<hr>";
//    echo"NO EXISTE.....";
//    echo"<hr>";
//    
//    
//    
//}
$lista_de_usuarios = Usuario::all(); // select*from usuarios;
if (count($lista_de_usuarios) < -0) {
    echo "SIN  USUARIOS QUE MOSTRAR";
} else {
    ?>
    <table border="1">
        <tr>
            <th>CEDULA</th>
            <th>CLAVE</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>GENERO</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>PASATIEMPOS</th>
            <th>ROL</th>
        </tr>
    <?php
    foreach ($lista_de_usuarios as $u) {
        ?>
            <tr>
                <td><?= $u->cedula ?></td>
                <td><?= $u->clave ?></td>
                <td><?= $u->nombre ?></td>
                <td><a href="mailto:<?= $u->email ?>?subject-PRUEBA&body=SI VES ESTO ES QUE FUNCIONA"><?= $u->email ?></a></td>
                <td><?= $u->genero ?></td>
                <td><?= $u->fecha_nacimiento ?></td>
                <td><?= $u->hobbies ?></td>
                <td><?= $u->rol ?></td>
            </tr>

        <?php
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

