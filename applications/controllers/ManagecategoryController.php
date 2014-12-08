<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Validate/NotEmpty.php';
require_once 'Zend/Validate/LessThan.php';
require_once 'Zend/Validate/Float.php';

class ManagecategoryController extends Zend_Controller_Action {
	public $init;
	public $manage;
	public $errmsg; 

	public function indexAction(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}

		// sql
		$select[] = "cd";
		$select[] = "name";
		$select[] = "status";
		$select[] = "timestamp";		
		$from[] = "yakiniku_category";
		$where[] = "level=1";
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);

		$set_param['item'] = $this->init->db->fetchAll($sql);
	
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function categoryAction(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}
		
		// get param
		$cate_cd = $this->init->get_param['cd'];		
		
		// sql
		$select[] = "cd";
		$select[] = "name";
		$select[] = "status";		
		$select[] = "timestamp";		
		$from[] = "yakiniku_category";
		$where[] = "parent_cd=" .  $this->init->db->quote($cate_cd);
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);

		$set_param['item'] = $this->init->db->fetchAll($sql);

		$select = "";
		$from = "";
		$where = "";
		$order = "";
		$select[] = "cd";
		$select[] = "name";	
		$from[] = "yakiniku_category";	
		$where[] = "cd='" . $cate_cd . "'";	
		$sql = Util::makeSQL($select,$from,$where,$order);	
		$set_param['category'] = $this->init->db->fetch($sql);	
					
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function ins1Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}
		
		// get param
		$cate_cd = $this->init->get_param['category_cd'];
		
		// set param
		$set_param['name'] = Util::htmlEscape($this->init->get_param['name']);
		$set_param['errmsg'] = $this->init->get_param['errmsg'];	

		// this category info
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);		
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
		}
		
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function ins2Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}
		
		// get param
		$cate_cd = $this->init->get_param['category_cd'];
		
		// valid check
		$errmsg = $this->isValid();
		if ( is_array($errmsg) ){			
			$set_param['errmsg'] = implode($errmsg,"<br>");	
			$this->init->request->setParam('errmsg',implode($errmsg,"<br>"));		
			$this->_forward('ins1','managecategory');
			return;	
		}
						
		// set param
		$set_param['name'] = Util::htmlEscape($this->init->get_param['name']);

		// this category info
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);		
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
		}
			
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function ins3Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;						
		}
		
		// get param
		$cate_cd = $this->init->get_param['category_cd'];
		
		// valid check
		$errmsg = $this->isValid();
		if ( is_array($errmsg) ){			
			$set_param['errmsg'] = implode($errmsg,"<br>");	
			$this->init->request->setParam('errmsg',implode($errmsg,"<br>"));		
			$this->_forward('ins1','managecategory');
			return;	
		}

		// get cd 
		$seq_sql = 'select max(cast(cd as signed))+1 as cd from yakiniku_category';

		$dat = $this->init->db->fetch($seq_sql);
		
		if ($dat['cd'] == NULL) {
			$cd = 1;
		} else {
			$cd = $dat['cd'];
		}
		

		// get lv
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";
			$select[] = "level";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);
			$level = $set_param['category']['level'] + 1;	
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
			$level = 1;
		}
				
		// DB insert 
		$sql = 	
				"insert into yakiniku_category(" . 
					"cd," . 	
					"parent_cd," . 								
					"name," . 	
					"level," . 	
					"status," . 					
					"timestamp" .																 
				") values(" .
					":cd," .
					":parent_cd," .					
					":name," .  	
					":level," .		
					":status," .															
					":date" .
					")";
		$param = array(
				':cd' => $cd,
				':parent_cd' => $this->init->get_param['category_cd'],
				':name' => stripslashes($this->init->get_param['name']),
				':level' => $level,	
				':status' => 1,														
				':date' => date('Y-m-d H:i:s')
				);
		$result = $this->init->db->query($sql,$param);
				
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function upd1Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	
		
		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}
		// get cd
		$set_param['cd'] = $this->init->get_param['cd'];
		$cate_cd = $this->init->get_param['category_cd'];

		if ( count($this->init->get_param['back']) > 0) {
			// set param
			$set_param['name'] = Util::htmlEscape($this->init->get_param['name']);
			$set_param['status'] = $this->init->get_param['status'];
			$set_param['errmsg'] = $this->init->get_param['errmsg'];			
		} else {
			$select[] = "cd";
			$select[] = "name";
			$select[] = "status";						
			$from[] = "yakiniku_category";
			$where[] = "cd='" . $set_param['cd'] . "'";
	
			$sql = Util::makeSQL($select,$from,$where,$order);				
			
			$dat = $this->init->db->fetch($sql);
			
			$set_param['name'] = $dat['name'];
			$set_param['status'] = $dat['status'];
							
		}
				
		// set param
		$set_param['errmsg'] = $this->init->get_param['errmsg'];	

		// this category info
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);		
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
		}

			
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function upd2Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;			
			
		}

		// valid check
		$errmsg = $this->isValid();
		if ( is_array($errmsg) ){			
			$set_param['errmsg'] = implode($errmsg,"<br>");	
			$this->init->request->setParam('errmsg',implode($errmsg,"<br>"));		
			$this->_forward('upd1','managecategory');
			return;	
		}
		
		// get param				
		$cate_cd = $this->init->get_param['category_cd'];
						
		// set param
		$set_param['cd'] = $this->init->get_param['cd'];
		$set_param['name'] = Util::htmlEscape($this->init->get_param['name']);
		$set_param['status'] = $this->init->get_param['status'];
		
		// this category info
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";	
			$select[] = "status";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);		
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
		}

			
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function upd3Action(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		// auth
		if ( !$this->manage->logincheck($_SESSION['pass']) ) {			
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');			
			return;						
		}

		// get param				
		$cate_cd = $this->init->get_param['category_cd'];
		
		// valid check
		$errmsg = $this->isValid();
		if ( is_array($errmsg) ){			
			$set_param['errmsg'] = implode($errmsg,"<br>");	
			$this->init->request->setParam('errmsg',implode($errmsg,"<br>"));		
			$this->_forward('upd1','managecategory');
			return;	
		}

		// DB update 
		$sql = 	
				"update yakiniku_category set " .
					"name=:name," . 
					"status=:status," . 					
					"timestamp=now() " .
				" where " . 
					"cd=:cd";
		$param = array(
				':cd' => $this->init->get_param['cd'],
				':name' => stripslashes($this->init->get_param['name']),
				':status' => $this->init->get_param['status'],								
				);
		$result = $this->init->db->query($sql,$param);

		// this category info
		if ( $cate_cd != 0 ) {
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$select[] = "name";	
			$from[] = "yakiniku_category";	
			$where[] = "cd='" . $cate_cd . "'";	
			$sql = Util::makeSQL($select,$from,$where,$order);	
			$set_param['category'] = $this->init->db->fetch($sql);		
		} else {
			$set_param['category']['cd'] = "0";
			$set_param['category']['name'] = "トップ";
		}

					
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}
	
	private function isValid(){
		
		// validate class
		$notEmpty = new Zend_Validate_NotEmpty;
		$float = new Zend_Validate_Float;

		$errmsg = "";
		if(!$notEmpty->isValid($this->init->get_param['name'])) {
			$errmsg[] = $this->setErrMsg("名前","empty");
		}					
		return $errmsg;
	}
		
	private function setErrMsg($name,$type,$other=""){
		switch($type) {
			case "empty":
				$type_name = "必須項目です";
				break;
			case "length":
				$type_name = "文字列長が不正です。";
				break;	
			default:
				$type_name = $other . "です。";
				break;															
		}
	
		return $name . "は" . $type_name;

	}
					
} 
?>
