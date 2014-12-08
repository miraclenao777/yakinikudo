<?php
class InitCron {
	public  $master;
	public  $meta;
	public  $request;	
	public  $get_param;
	
	public function __construct() {	
		// master
		$this->master = new GetMaster();

		// master
		$this->meta = new GetMeta();
		
		// db
		$this->db = new DBMaster();
		$this->db_info = $this->master->getDBInfo();
		$this->db->connect($this->db_info);
		
		// log
		$this->log = new LogMaster();		
	}	
}

?>