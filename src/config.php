<?php

// Attiva la visualizzazione degli errori in fase di debug (rimuovere in produzione)
error_reporting(E_ALL);
ini_set('display_errors', '1');

$sqlDetails = array(
	"user" 			=> "root",
	"password" 		=> "mela",
	"host" 			=> "10.11.14.78",
	"port" 			=> "",
	"db"   			=> ['controllo','archivi'],
	"dsn" 			=> "",
	"pdoAttr" 		=> array(),
	"ftpServer" 	=> "10.11.14.77",
	"ftpUser"   	=> "if65",
	"ftpPassword" 	=> ""
);

$dcDetails = array(
	"dcFolder" => "/data/datacollect"
);

?>
