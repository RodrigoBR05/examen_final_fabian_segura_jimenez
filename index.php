<?php
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)).DS);
	define('URL', "http://localhost/examen_final_fabian_segura_jimenez/");
        //define('URL', "http://localhost:8080/SCAI/");
	require_once "Config/Autoload.php";
	Config\Autoload::run();
	Config\Enrutador::run(new Config\Request());
?>
