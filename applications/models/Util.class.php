<?php
// DBクラスの定義
class Util {

	public function makeSQL($select,$from,$where,$order) {

		if (is_array($where)) {
			$w = " WHERE " . implode(" AND ", $where);
		}
		if (is_array($order)) {
			$o = " ORDER BY " . implode(",", $order);
		}		
		
		$ret = 
			" SELECT " . implode(",", $select) . 
			" FROM " . implode(",", $from) . 
			$w . $o ;	
				
		return $ret;		
	}
	
	public function getArrayName($array,$target) {

		if ( !is_array($array)) {
			return null;
		}
		
		foreach($array as $key=>$val) {
			if($key == $target) {
				return $val['name'];
			}		
		}					
	}

	public function getUrl($url,$param) {

		if ( !is_array($param) ) {
			return $url;
		} else {
			foreach ( $param as $k=>$v ) {
				$str[] = $k . "=" . $v;
			}			
			return $url . "?" . implode("&",$str);
		}				
	}
	
	public function htmlEscape($param) {

		return htmlspecialchars(stripslashes($param)) ;				
	}		
}


?>
