<?php
// Masterクラスの定義
class GetMaster {
	var $dat;
	public function __construct() {
		
		$master_class = new master();
		$this->dat = $master_class->getMaster();			
	}

	public function getDBInfo() {
		return $this->dat["db_info"];
	}

	public function getData($type) {
		return $this->dat[$type];
	}
	
	public function getExt() {
		return $this->dat["ext"];
	}
		
	public function getStatus() {
		return $this->dat["status"];
	}	
	
	public function getIndexItem($type) {
		return $this->dat["index_item"][$type];
	}
	
}


?>
