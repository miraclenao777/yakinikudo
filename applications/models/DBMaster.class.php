<?php
require_once("Zend/Db.php");

// DBクラスの定義
class DBMaster {
	var $db_info;
	var $db;
	public function __construct() {
							
	}
	
	public function connect($db_info) {
		try {
			//接続情報にもとづいて、アダプタクラスを生成$this->db_info
			$this->db = Zend_Db::factory('Pdo_Mysql',$db_info);
		
			//データベースへの実際の接続を確立
			$this->db->getConnection();
			$this->db->query('SET CHARACTER SET utf8');			
			
		} catch (Zend_Exception $e) {
			//例外発生時のエラーメッセージを表示
			die($e->getMessage());
		}	
	}	
	
	public function query($sql,$param) {
		try {
			$this->db->query($sql,$param);			
			
		} catch (Zend_Exception $e) {
			//例外発生時のエラーメッセージを表示
			die($e->getMessage());
		}					

	}	
	
	public function fetchall($sql) {	
		try {
			$ret = $this->db->fetchall($sql);
			return $ret;						
		} catch (Zend_Exception $e) {
			//例外発生時のエラーメッセージを表示
			die($e->getMessage());
		}				
	
	}
	
	public function fetch($sql) {	
		try {
			$ret = $this->db->fetchRow($sql);
			return $ret;				
		} catch (Zend_Exception $e) {
			//例外発生時のエラーメッセージを表示
			die($e->getMessage());
		}					
		
	}	

	public function quote($value) {
		return $this->db->quote($value);					

	}

	public function quotelike($value) {
		return $this->db->quotelike($value);					

	}
								
}


?>
