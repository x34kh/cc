<?php

include_once "config.php";
include_once "classes/soap.class.php";
include_once "functions/logging.function.php";
include_once "functions/database.function.php";

function init_soap_server(){
	try { 
	$soap_server = new SOAPServer(
		NULL,
		array(
			'uri' => 'http://cc.nixsupport.net/soap.server.php'
			)
	);
	
	$soap_server->setClass('Soap_processor');
	$soap_server->handle();
	log_event("Soap Server initialized, initiated from: ".(($_SERVER['REMOTE_HOST'])? $_SERVER['REMOTE_HOST'] : "Unknown host")." - ".$_SERVER['REMOTE_ADDR'],"debug");
	}
	catch (SOAPFault $f) {
	  log_event($f->faultstring, "error");
	}
}

init_soap_server();

?>