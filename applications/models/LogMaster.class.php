<?php
require_once("Zend/Db.php");

// DBクラスの定義
class LogMaster {

	public function __construct() {
							
	}
	
	public function analog($req,$data) {
		$ua = $_SERVER['HTTP_USER_AGENT'];

		$date = date("Ymd");
		$time = date("Y/m/d H:i:s");

		if(strpos($ua, 'bot') || strpos($ua, 'Bot')) {
			$file = LOG_DIR . "bot_" . $date . '.log';	

            if ( is_array($data)) {
				$tmp = "\t" . implode(",",$data);
			}

			$msg = 	$time . "\t" . $req->getControllerName(). '_' . $req->getActionName() . "\t" . $tmp . "\n";			
			$fp = fopen($file,"a");
			fwrite($fp,$msg);
			fclose($fp);				
			return null;
		}

		
		$file = LOG_DIR . 
			$req->getControllerName(). '_' . $req->getActionName(). '_' . $date . '.log';		

		if ( is_array($data)) {
			$tmp = "\t" . implode(",",$data);
		}	
		$msg = 	$time . $tmp .  "\t" . $ua  . "\n";
			
		$fp = fopen($file,"a");
		fwrite($fp,$msg);
		fclose($fp);

	}	

	public function testlog($req,$msg) {
		if ( PLATFORM != 1 ) {
			$date = date("Ymd");
			$time = date("Y/m/d h:i:s");
			
			$file = LOG_DIR . 
				'test_' . $date . '.log';
	
			$act = $req->getControllerName() . "/" . $req->getActionName();		
		
			$tmp = "\t" . $act ."\t" . $msg;
			$msg = 	$time . $tmp . "\n";
				
			$fp = fopen($file,"a");
			fwrite($fp,$msg);
			fclose($fp);			
		}
	}	
	
	public function cronlog($ctr,$data) {
		$date = date("Ymd");
		$time = date("Y/m/d H:i:s");
		
		$file = LOG_DIR . 
			"cron_" . $ctr . '_' . $date . '.log';

		$msg = 	$time . "\t" . $data . "\n";
			
		$fp = fopen($file,"a");
		fwrite($fp,$msg);
		fclose($fp);

	}							
}


?>
