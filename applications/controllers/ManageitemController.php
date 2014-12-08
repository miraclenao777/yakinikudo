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

class ManageitemController extends Zend_Controller_Action {
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
		
		$cate_cd = $this->init->get_param['category_cd'];		
		
		// category info
		$select = "";
		$from = "";
		$where = "";
		$order = ""; 		
		$select[] = "c.cd";
		$select[] = "c.name";
		$select[] = "p.name as parent_name";
		$from[] = "yakiniku_category c";	
		$from[] = "yakiniku_category p";		
		$where[] = "p.cd=c.parent_cd";	
		$where[] = "c.cd not in(select parent_cd from yakiniku_category )";	
		$order[] = "cast(p.cd as SIGNED)";
		$order[] = "cast(c.cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		$set_param['cate'] = $this->init->db->fetchAll($sql);		
		$set_param['search']['category_list'] = $this->init->db->fetchAll($sql);
		
		// org category info
		$select = "";
		$from = "";
		$where = "";
		$order = ""; 	
		$select[] = "c.cd as cd";
		$select[] = "c.name as name";
		$select[] = "p.name as parent_name";						
		$from[] = "yakiniku_category c";
		$from[] = "yakiniku_category p";		
		$where[] = "p.cd=c.parent_cd";		
		$where[] = "c.cd not in(select parent_cd from yakiniku_category )";	
		$order[] = "cast(p.cd as SIGNED)";
		$order[] = "cast(c.cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		$set_param['search']['org_category_list'] = $this->init->db->fetchAll($sql);

		// get data	
		$set_param['page'] = $this->init->get_param['page'];
		if ($set_param['page'] == null) {
			$set_param['page'] = 1;
		}		
		
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		$select[] = "i.cd";
		$select[] = "i.Name";
		$select[] = "i.SpecialDescription";	
		$select[] = "i.ImageCode";
		$select[] = "i.ShopPrice";
		$select[] = "i.FixedPrice";
		$select[] = "i.StockStatus";
		$select[] = "i.status";
		$select[] = "i.timestamp";
		$select[] = "o.Name as CategoryName";
		$from[] = "yakiniku_item i";	
		$from[] = "yakiniku_org_category o";					
		$where[] = "i.CategoryCode=o.cd";
		$order[] = "cast(i.cd as SIGNED)";

		if ($this->init->get_param['search_category'] != "") {
			$where[] = "i.cd in(select cd from yakiniku_item_category where category_cd=" . $this->init->get_param['search_category'] . ") ";
		}										
		if ($this->init->get_param['search_org_category'] != "") {
			$where[] = "i.CategoryCode=" . $this->init->get_param['search_org_category'];
		}	
	
		if ($this->init->get_param['search_stock_status'] != "") {
			if ($this->init->get_param['search_stock_status'] == 2) {
				$where[] = "i.StockStatus>=" . (int)$this->init->get_param['search_stock_status'];
			} else {
				$where[] = "i.StockStatus=" . (int)$this->init->get_param['search_stock_status'];
			}		
		}
		
		if ($this->init->get_param['search_status'] != "") {
			$where[] = "i.status=" . (int)$this->init->get_param['search_status'];
	
		}	
		if ( $this->init->get_param['price_from'] != "" ) {
			$where[] = "i.ShopPrice>=" . $this->init->db->quote($this->init->get_param['price_from']);
		}
		if ( $this->init->get_param['price_to'] != "" ) {
			$where[] = "i.ShopPrice<=" . $this->init->db->quote($this->init->get_param['price_to']);
		}	
		if ( isset($this->init->get_param['is_newly']) ) {
			$where[] = "i.isNewly='1'";
		}	
		if ( isset($this->init->get_param['is_delivery_sameday']) ) {
			$where[] = "i.isDeliverySameday='1'";
		}	
		if ( isset($this->init->get_param['is_free_shipping']) ) {
			$where[] = "i.isFreeShipping='1'";
		}			
		if ( $this->init->get_param['keyword'] != "" ) {
			$words = explode(" ",$this->init->get_param['keyword']);
			foreach($words as $v) {
				$tmp = "";
				if (isset($this->init->get_param['key_name'])) {
					$tmp[] = "i.Name like " . $this->init->db->quotelike($v);
				}			
				if (isset($this->init->get_param['key_desc'])) {
					$tmp[] = "i.Description like " . $this->init->db->quotelike($v);
				}				
				if (isset($this->init->get_param['key_point'])) {
					$tmp[] = "i.SpecialDescription like " . $this->init->db->quotelike($v);
				}
				if (isset($this->init->get_param['key_spec'])) {
					$tmp[] = "i.Spec like " . $this->init->db->quotelike($v);
				}				
				if (isset($this->init->get_param['key_catch'])) {
					$tmp[] = "i.CatchCopy like " . $this->init->db->quotelike($v);
				}
				if (isset($this->init->get_param['key_maker'])) {
					$tmp[] = "i.MakerName like " . $this->init->db->quotelike($v);
				}				
				if (isset($this->init->get_param['key_modelnomber'])) {
					$tmp[] = "i.ModelNumber like " . $this->init->db->quotelike($v);
				}
				if (is_array($tmp)){
					$where[] = "(" . implode(" or ",$tmp) . ")";
				}										
			}	
		}		
							
		$sql = Util::makeSQL($select,$from,$where,$order);

		$item = $this->init->db->fetchAll($sql);
	
		$set_param['count'] = count($item);	
		
		if ($set_param['count'] > 0) {
	        $start = ($set_param['page'] - 1) * MANAGE_SHOP2_PER_PAGE;
	        if ($set_param['count'] < $start + MANAGE_SHOP2_PER_PAGE) {
	        	$end =  $set_param['count'];
	        } else {
	        	$end = $start + MANAGE_SHOP2_PER_PAGE;
	        } 
	        for($i=$start;$i<$end;$i++){
	        	$set_param['item'][] = $item[$i];
	        }
	
			// set paging
	        for($i=1;$i<=ceil($set_param['count'] / MANAGE_SHOP2_PER_PAGE);$i++){
	        	$set_param['paging'][] = $i;
	        }				
		}
		$set_param['search_category'] = $this->init->get_param['search_category'];
		$set_param['search_org_category'] = $this->init->get_param['search_org_category'];
		$set_param['search_stock_status'] = $this->init->get_param['search_stock_status'];
		$set_param['search_status'] = $this->init->get_param['search_status'];
		$set_param['keyword'] = htmlspecialchars($this->init->get_param['keyword']);
		$set_param['key_name'] = htmlspecialchars($this->init->get_param['key_name']);	
		$set_param['key_point'] = htmlspecialchars($this->init->get_param['key_point']);	
		$set_param['key_spec'] = htmlspecialchars($this->init->get_param['key_spec']);	
		$set_param['key_catch'] = htmlspecialchars($this->init->get_param['key_catch']);	
		$set_param['key_maker'] = htmlspecialchars($this->init->get_param['key_maker']);	
		$set_param['key_modelnomber'] = htmlspecialchars($this->init->get_param['key_modelnomber']);	
		$set_param['price_from'] = htmlspecialchars($this->init->get_param['price_from']);	
		$set_param['price_to'] = htmlspecialchars($this->init->get_param['price_to']);	
		$set_param['is_newly'] = htmlspecialchars($this->init->get_param['is_newly']);	
		$set_param['is_delivery_sameday'] = htmlspecialchars($this->init->get_param['is_delivery_sameday']);	
		$set_param['is_free_shipping'] = htmlspecialchars($this->init->get_param['is_free_shipping']);
			
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
		
		// get data	
		$select = "";
		$from = "";
		$where = "";
		$order = ""; 			
		$set_param['cd'] = $this->init->get_param['cd'];

		$select[] = "i.cd";
		$select[] = "i.name";
		$select[] = "o.Name as CategoryName";
		$select[] = "i.DispKeyword";
		$select[] = "i.DispDescription";		
		$select[] = "i.DispDescription2";
		$select[] = "i.description";
		$select[] = "i.specialdescription";
		$select[] = "i.spec";
		$select[] = "i.catchcopy";
		$select[] = "i.makername";
		$select[] = "i.modelnumber";
		$select[] = "i.isnewly";
		$select[] = "i.isdeliverysameday";
		$select[] = "i.isfreeshipping";
		$select[] = "i.dodfrom";
		$select[] = "i.dodto";
		$select[] = "i.preorderflag";
		$select[] = "i.preorderperiod";
		$select[] = "i.categorycode";
		$select[] = "i.parentcategorycode";
		$select[] = "i.groupid";
		$select[] = "i.imagecode";
		$select[] = "i.jancode";
		$select[] = "i.paymenttype";
		$select[] = "i.bundleimpossible";
		$select[] = "i.startdate";
		$select[] = "i.fixedprice";
		$select[] = "i.wholesaleprice";
		$select[] = "i.shopprice";
		$select[] = "i.StockStatus";
		$select[] = "i.status";
														
		$from[] = "yakiniku_item i";		
		$from[] = "yakiniku_org_category o";					
		$where[] = "i.CategoryCode=o.cd";
		$where[] = "i.cd=" . $this->init->db->quote($set_param['cd']);
	
		$sql = Util::makeSQL($select,$from,$where,$order);				
		
		$set_param = $this->init->db->fetch($sql);		
		
		// category info
		$select = "";
		$from = "";
		$where = "";
		$order = ""; 		
		$select[] = "c.cd";
		$select[] = "c.name";
		$select[] = "p.name as parent_name";						
		$from[] = "yakiniku_category c";
		$from[] = "yakiniku_category p";		
		$where[] = "p.cd=c.parent_cd";		
		$where[] = "c.cd not in(select parent_cd from yakiniku_category )";	
		$order[] = "cast(p.cd as SIGNED)";
		$order[] = "cast(c.cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		$set_param['category_list'] = $this->init->db->fetchAll($sql);		
				
		$set_param['cate_cd'] = array();		
		if ( count($this->init->get_param['back']) > 0) {
			// set param
			$set_param['DispKeyword'] = Util::htmlEscape($this->init->get_param['DispKeyword']);
			$set_param['DispDescription'] =   Util::htmlEscape($this->init->get_param['DispDescription']);
			$set_param['DispDescription2'] =   Util::htmlEscape($this->init->get_param['DispDescription2']);
			$set_param['status'] = $this->init->get_param['status'];
			$set_param['cate_cd'] = $this->init->get_param['cate_cd'];
			$set_param['errmsg'] = $this->init->get_param['errmsg'];			
		} else {
			// get this category
			$select = "";
			$from = "";
			$where = "";
			$order = ""; 		
			$select[] = "category_cd";	
			$from[] = "yakiniku_item_category";	
			$where[] = "cd=" . $this->init->db->quote($set_param['cd']);
			$order[] = "cd";
	
			$sql = Util::makeSQL($select,$from,$where,$order);				
			
			$dat = $this->init->db->fetchAll($sql);
		
			foreach($dat as $k=>$v) {
				$cate_cd = $v['category_cd'];		
				$set_param['cate_cd'][] = $cate_cd;
			}			
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
			$this->_forward('upd1','manageitem');
			return;	
		}
				
		// get data
		$set_param['cd'] = $this->init->get_param['cd'];
		$select[] = "i.cd";
		$select[] = "i.name";
		$select[] = "i.description";													
		$from[] = "yakiniku_item i";	

		$where[] = "i.cd=" . $this->init->db->quote($set_param['cd']);
	
		$sql = Util::makeSQL($select,$from,$where,$order);				
		
		$set_param = $this->init->db->fetch($sql);
						

		// category info
		$select = "";
		$from = "";
		$where = "";
		$order = ""; 		
		$select[] = "c.cd";
		$select[] = "c.name";
		$select[] = "p.name as parent_name";						
		$from[] = "yakiniku_category c";
		$from[] = "yakiniku_category p";		
		$where[] = "p.cd=c.parent_cd";
		$where[] = "c.cd in(" . implode(",",$this->init->get_param['cate_cd']) . ")";	
		$order[] = "cast(p.cd as SIGNED)";
		$order[] = "cast(c.cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		
		$set_param['category_list'] = $this->init->db->fetchAll($sql);	

		// set param
		$set_param['DispKeyword'] = Util::htmlEscape($this->init->get_param['DispKeyword']);
		$set_param['DispDescription'] =  $this->init->get_param['DispDescription'];
		$set_param['DispDescription2'] =  $this->init->get_param['DispDescription2'];
		$set_param['D_DispDescription'] =  nl2br(Util::htmlEscape($this->init->get_param['DispDescription']));
		$set_param['D_DispDescription2'] =  nl2br(Util::htmlEscape($this->init->get_param['DispDescription2']));
		$set_param['status'] = $this->init->get_param['status'];
		$set_param['cate_cd'] = $this->init->get_param['cate_cd'];
							
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

		// DB update 
		$sql = 	
				"update yakiniku_item set " .	
					"DispKeyword=:DispKeyword," . 	
					"DispDescription=:DispDescription," . 	
					"DispDescription2=:DispDescription2," . 																									
					"status=:status," . 					
					"timestamp=now() " .
				" where " . 
					"cd=:cd";
		$param = array(
				':cd' => $this->init->get_param['cd'],
				':DispKeyword' => stripslashes($this->init->get_param['DispKeyword']),
				':DispDescription' => stripslashes($this->init->get_param['DispDescription']),				
				':DispDescription2' => stripslashes($this->init->get_param['DispDescription2']),				
				':status' => $this->init->get_param['status'],								
				);
		$result = $this->init->db->query($sql,$param);

		// delete category 
		$this->category_delete($this->init->get_param['cd']);
		foreach ($this->init->get_param['cate_cd'] as $v) {
				// insert category
				$this->category_insert($this->init->get_param['cd'],$v);			
		}

					
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function multicateAction(){	
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
		
		$cate_cd = $this->init->get_param['category_cd'];
		$item_cd = $this->init->get_param['cd'];
		
		// 
		if ( count($item_cd) > 0 ) {
			foreach ($item_cd as $v) {
				// check
				if ( $this->category_check($v,$cate_cd) == 0 ) {
					// insert 
					$this->category_insert($v,$cate_cd);
				}				
			}			
		}
		
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}
	
	private function category_check($item_cd,$cate_cd){
		// category
		$select[] = "count(cd) as cnt";
		$from[] = "yakiniku_item_category";
		$where[] = "cd=" . $this->init->db->quote($item_cd);
		$where[] = "category_cd=" . $this->init->db->quote($cate_cd) ;
	
		$sql = Util::makeSQL($select,$from,$where,null);
		
		$dat = $this->init->db->fetch($sql);
	
		return ($dat['cnt']);		
	}		
	
	private function category_delete($item_cd){
		// DB insert 
		$sql = 	
				"delete from yakiniku_item_category where cd=:cd";
		$param = array(
				':cd' => $item_cd,
				);
		$result = $this->init->db->query($sql,$param);		
	}
	
	private function category_insert($item_cd,$cate_cd){
		// DB insert 
		$sql = 	
				"insert into yakiniku_item_category(" . 
					"cd," . 	
					"category_cd," . 												
					"timestamp" .										 
				") values(" .
					":cd," .
					":category_cd," .					 								
					":date" .
					")";
		$param = array(
				':cd' => $item_cd,
				':category_cd' => $cate_cd,												
				':date' => date('Y-m-d H:i:s')
				);
			
		$result = $this->init->db->query($sql,$param);		
	}

	private function isValid(){
		
		// validate class
		$notEmpty = new Zend_Validate_NotEmpty;
		$float = new Zend_Validate_Float;

		$errmsg = "";
		if(count($this->init->get_param['cate_cd']) == 0) {
			$errmsg[] = $this->setErrMsg("カテゴリ","empty");
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
