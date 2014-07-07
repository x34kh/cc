<?php
class Soap_processor {
	public function get_server_details(){
		return 'My name is CommandCenter';
	}
	public function get_commands($client_name){
		return 'ps aux';
	}
}


?>