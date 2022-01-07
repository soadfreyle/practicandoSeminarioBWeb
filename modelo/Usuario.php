<?php

require_once $_SERVER['DOCUMENT_ROOT']."/gastos/lib/config.php";

/**
 * Description of Usuario
 *
 * @author ODETH
 */
class Usuario extends ActiveRecord\Model{
    public static $primary_key = "cedula";
}
