<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class TestController extends Zend_Controller_Action {
	private $init;
	
	public function indexAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();

/*
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
*/	
	}


	public function yakinikucateAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();
	
		// get xml	
		$base_url = "http://api.moshimo.com/category/list2";
	
		$url_param['authorization_code'] = MOSHIMO_AUTH_CODE;
		$url_param['article_category_code'] = "0101";			
		$url = Util::getUrl($base_url,$url_param);
				
		$xml = simplexml_load_file($url);
		$item = $xml->Category;
/*
		if (($fp = fopen($fname, "r")) !== FALSE) {
		    while (($data = fgets($fp)) !== FALSE) {		    	
				$data2 = explode(",",$data);
				$c = count($data2);

				// DB insert 
				$sql = 	
				"insert into shop2_category(" . 
					"cd," . 				
					"parent_cd," .
					"name," . 					
					"level," . 						
					"leaf," .
					"status," . 
					"upd_date," .																					
					"timestamp" .										 
				") values(" .
					":cd," .
					":parent_cd," . 
					":name," . 
					":level," . 	
					":leaf," . 
					":status," . 
					":upd_date," . 	 																	
					":date" .
					")";
		
		// parent	
		switch( strlen($data2[0]) ) {
			case 2:
				$parent_cd = null;
				$leaf = 0;
				$level = 1;
				break;
			default:
				$len = strlen($data2[0])-2;
				$parent_cd = substr($data2[0],0,$len);
				$leaf = 0;
				$level = strlen($data2[0]) / 2;
				break;												
				
		}		

					
		$param = array(
				':cd' => $data2[0],
				':parent_cd' => $parent_cd,				
				':name' => $data2[1],				
				':level' => $level ,
				':leaf' => $leaf,													
				':status' => '1',	
				':upd_date' => date('Y-m-d H:i:s'),									
				':date' => date('Y-m-d H:i:s')
				);
				
			$result = $this->init->db->query($sql,$param);	
			$cd++;			
		    }
		    fclose($fp);
		}
echo "ins ok";
*/
	}

	public function cateAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();
	
		$fname= FILE_DIR . "cate2.csv";
		$cd = 1;
		if (($fp = fopen($fname, "r")) !== FALSE) {
		    while (($data = fgets($fp)) !== FALSE) {		    	
				$data2 = explode(",",$data);
				$c = count($data2);

				// DB insert 
				$sql = 	
				"insert into yakiniku_org_category(" . 
					"cd," . 				
					"parent_cd," .
					"name," . 					
					"level," . 																								
					"timestamp" .										 
				") values(" .
					":cd," .
					":parent_cd," . 
					":name," . 
					":level," . 																
					":date" .
					")";
		
		// parent	
		switch( strlen($data2[0]) ) {
			case 2:
				$parent_cd = null;
				$level = 1;
				break;
			default:
				$len = strlen($data2[0])-2;
				$parent_cd = substr($data2[0],0,$len);
				$level = strlen($data2[0]) / 2;
				break;												
				
		}		

					
		$param = array(
				':cd' => $data2[0],
				':parent_cd' => $parent_cd,				
				':name' => $data2[1],				
				':level' => $level ,																				
				':date' => date('Y-m-d H:i:s')
				);
				
			$result = $this->init->db->query($sql,$param);	
			$cd++;			
		    }
		    fclose($fp);
		}
echo "ins ok";
	}
			
} 
?>
