<?php
require_once("Zend/Db.php");

// DBクラスの定義
class Manage {

	public function __construct() {
		session_start();
	}
	
	public function logincheck($pass) {
		if ($pass != md5(MANAGE_PASS)) {
			return false;
		}				
		
		return true;
	}
					
}


?>
