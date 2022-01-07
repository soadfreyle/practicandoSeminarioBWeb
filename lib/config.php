<?php


require_once $_SERVER['DOCUMENT_ROOT']."/gastos/lib/php-activerecord/ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory('/path/to/your/model_directory');
   $cfg->set_connections(
     array(
       'development' => 'mysql://root:@localhost/practicando_soad',
       'test' => 'mysql://root:@localhost/practicando_soad',
       'production' => 'mysql://root:@localhost/practicando_soad'
     )
   );
});