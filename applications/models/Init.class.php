<?php
require_once("Zend/Db.php");

// DBクラスの定義
class Init {
	public  $master;
	public  $meta;
	public  $request;	
	public  $get_param;
	
	public function __construct($controller) {	
		// master
		$this->master = new GetMaster();

		// master
		$this->meta = new GetMeta();
				
		// get request
		$this->request = $controller->getRequest();
		
		// param
		$this->get_param = $this->request->getParams();

					
		// db
		$this->db = new DBMaster();
		$this->db_info = $this->master->getDBInfo();
		$this->db->connect($this->db_info);
			
		// log
		$this->log = new LogMaster();	
		
	}
	
}


?>
