<?php
session_start();
require_once '../modelo/Usuario.php';

/**
 * Description of ControlUsuario
 *
 * @author ODETH
 */
class ControlUsuario {

    public function ejecutar_accion($accion) {
        switch ($accion) {
            case "LOGIN":
                $this->iniciar_sesion();

                break;
            case "GUARDAR":
                $this->guardar_usuario(NULL);

                break;
            case "BUSCAR":
                $this->buscar_usuario();

                break;
            case "ELIMINAR":
                $this->eliminar_usuario();
                break;
            
             case "EDITAR":
                $u = $_SESSION["usuario.find"];
                $u = unserialize($u);
                $this->guardar_usuario($u);
                
                break;


            default:
                break;
        }
    }

    public function iniciar_sesion() {
        $email = $_REQUEST["correo"];
        $pass = $_REQUEST["clave"];
        try {
            $u = Usuario::find_by_email($email);
            if ($u != null || isset($u)) {
                if ($u->clave == $pass) {
                    header("Location: ../web/index.php");
                    exit;
                } else {
                    header("Location: ../index.php?msj=Clave Incorrecta");
                    exit;
                }
            } else {
                header("Location: ../index.php?msj=Usuario No existe  ");
                exit;
            }
        } catch (Exception $ex) {
            header("Location: ../index.php?msj=Usuario No existe");
            exit;
        }
    }

    public function guardar_usuario($u) {


        $cedula = @$_REQUEST["cc"];
        $nombre = @$_REQUEST["nombre"];
        $clave1 = @$_REQUEST["clave1"];
        $clave2 = @$_REQUEST["clave2"];
        $email = @$_REQUEST["correo"];
        $fn = @$_REQUEST["fecha_nac"];
        $rol = @$_REQUEST["rol"];
        $genero = @$_REQUEST["genero"];
        $hobby1 = @$_REQUEST["pasatiempo1"];
        $hobby2 = @$_REQUEST["pasatiempo2"];
        $hobby3 = @$_REQUEST["pasatiempo3"];
        $hobby4 = @$_REQUEST["pasatiempo4"];
        $todos_los_hobbies = $this->validar_hobies($hobby1);
        $todos_los_hobbies .= $this->validar_hobies($hobby2);
        $todos_los_hobbies .= $this->validar_hobies($hobby3);
        $todos_los_hobbies .= $this->validar_hobies($hobby4);
        
        //validar
        $res = $this->validar_campo_vacio($cedula);

        if ($res) {
            header("Location: ../web/usuario/agregar.php?msj=La Cedula es necesaria");
            exit;
        }
        $res = $this->validar_campo_vacio($nombre);
        if ($res) {
            header("Location: ../web/usuario/agregar.php?msj=El nombre es necesario");
            exit;
        }
        $res = ($this->validar_campo_vacio($clave1)
                || $this->validar_campo_vacio($clave2))
                ? true : false ;
        if ($res) {
            header("Location: ../web/usuario/agregar.php?msj=Las Claves son necesarias");
            exit;
        }
        if($clave1 != $clave2){
            header("Location: ../web/usuario/agregar.php?msj=Las Claves deben ser iguales");
            exit;
        }
        $res = $this->validar_campo_vacio($email);
        if ($res) {
            header("Location: ../web/usuario/agregar.php?msj=El Email es necesario");
            exit;
        }
        $res = $this->validar_campo_vacio($rol);
        if ($res) {
            header("Location: ../web/usuario/agregar.php?msj=El Rol es necesario");
            exit;
        }
        $pagina = "buscar";
        $msj = "Usuario Actualizado";
        $total = "";
        try{
            if ($u == NULL){
            $u = new Usuario();
            $u->cedula = $cedula;
            $u->nombre = $nombre;
            $u->fecha_nacimiento = $fn;
         
            $pagina = "agregar";
            $total = Usuario::count();
            $msj = "Usuario Registrado, Total: " . $total;
            $_SESSION["usuario.find"] = NULL;
            }
            $u->clave = $clave1;
            $u->email = $email;
            $u->hobbies = $todos_los_hobbies;
            $u->rol = $rol;
            $u->genero = $genero;
          
            if($pagina == "buscar"){
                $u2 = serialize($u);
                $_SESSION["usuario.find"] = $u2;
            }
                $u->save(); 
            header("Location: ../web/usuario/$pagina.php?msj=$msj");
            exit;
        } catch (Exception $error) {
            $msj = $error->getMessage();
            if(strstr($msj, "Duplicate")){
                header("Location: ../web/usuario/$pagina.php?msj=USUARIO YA EXISTE");
            exit;
          
            }else{
                 header("Location: ../web/usuario/$pagina.php?msj=USUARIO REGISTRADO");
            exit;
         
            }
        }
    }
    private function validar_hobies($hobby){
        if($hobby != NULL || isset($hobby) || !empty($hobby)){
            return $hobby . ",";
        }
        else{
            return "";
        }
        
    }

    private function validar_campo_vacio($campo) {

        if ($campo == NULL || empty($campo) || !isset($campo)) {
            return true;
        } else {
            return false;
        }
    }

    public function buscar_usuario() {
        $cedula = @$_REQUEST["cc"];
        $res = $this->validar_campo_vacio($cedula);

        if ($res) {
            header("Location: ../web/usuario/buscar.php?msj=La Cedula es necesaria");
            exit;
        }
        try {
            $u = Usuario:: find($cedula);
            $u = serialize($u);
            $_SESSION["usuario.find"] = $u;
            header("Location: ../web/usuario/buscar.php");
            exit;
            
        } catch (Exception $exc) {
            
             header("Location: ../web/usuario/buscar.php?msj=El Usuario NO EXISTE");
             $_SESSION["usuario.find"] = NULL;
            exit;
        }
        
        
    }

    public function eliminar_usuario() {
        $cedula = @$_REQUEST["cc"];
        $res = $this->validar_campo_vacio($cedula);

        if ($res) {
            header("Location: ../web/usuario/buscar.php?msj=La Cedula es necesaria");
            exit;
        }
        $u = $_SESSION["usuario.find"];
        $u = unserialize($u);
        $u->delete();
        $_SESSION["usuario.find"] = NULL;
        $total = Usuario:: count();
        $msj = "Usuario Eliminado, Total ".$total;
        header("Location: ../web/usuario/buscar.php?msj=".$msj);
        exit;
        
        
        
    }

}

$accion = @$_REQUEST["accion"];
if ($accion != null) {
    $controlador = new ControlUsuario();
    $controlador->ejecutar_accion($accion);
} else {
    header("Location: ../index.php?msj=Debe iniciar Sesion soad");
}

