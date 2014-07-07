<?php


function log_event($message,$level = "info"){
	global $log_level, $general_log;

	switch ($level) {
		case "debug":
			$message_level = 0;
			break;
		case "info":
			$message_level = 1;
			break;
		case "error":
			$message_level = 2;
			break;
		default:
			$message_level = $log_level;
			break;
	}

	if($log_level>=$message_level){
		$message = "[".date("Y-m-d H:i:s")."] [".$level."] ".$message."\n";
		$fp = fopen($general_log, "a+");
		if($fp){
			fputs($fp, $message);
			fclose($fp);
		}
	}

}

?>