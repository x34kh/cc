<?php

function db_request($request){
	global $db_host, $db_user, $db_password;
	$db_link = mysql_connect($db_host, $db_user, $db_password);
	if(!$db_link){
		die(log_event("Unable to connect to DataBase", "error"));
	}
	else{
		return mysql_query(mysql_escape_string($request));
	}
	mysql_close($db_link);
}