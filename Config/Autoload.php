<?php namespace Config;
    date_default_timezone_set('America/Costa_Rica'); //define la zona horaria
    class Autoload{
      public static function run(){
          spl_autoload_register(function($class){
              $ruta = str_replace("\\", "/", $class) .".php";
              include_once $ruta;
          });
      }
    }

?>
