<?php
require_once("Zend/Db.php");

// DBクラスの定義
class CRnews {
	public  $init;
	
	public function __construct() {			
			// init
			$this->init = new InitCron();

			// get category
			$base_url = RECRUIT_R25_CATEGORY_API_URL;	
			$url_param['key'] = RECRUIT_AUTH_CODE;	
			$url = Util::getUrl($base_url,$url_param);	
			$str = file_get_contents($url);

			$file = FILE_DIR . RECRUIT_R25_NEWS_FILE_DIR . "category.xml";
			$fp = fopen($file,"w");
			fwrite($fp,$str);
			fclose($fp);
			
			$cate_xml = simplexml_load_file($file);
				
			$cnt = count($cate_xml->category);
			
			for( $i = 0 ; $i < $cnt ; $i++) {

				$str = "";
				// get xml
				$base_url = RECRUIT_R25_NEWS_API_URL;	
				$url_param['key'] = RECRUIT_AUTH_CODE;
				$url_param['category'] = $cate_xml->category[$i]->code;		
				$url = Util::getUrl($base_url,$url_param);	
	
				//$read_fp = fopen($url,"r");
				$str = file_get_contents($url);
			
				$file = FILE_DIR . RECRUIT_R25_NEWS_FILE_DIR . $cate_xml->category[$i]->code. ".xml";
				$fp = fopen($file,"w");
				fwrite($fp,$str);
				fclose($fp);				
				
			} 		
	}	


}


?>
