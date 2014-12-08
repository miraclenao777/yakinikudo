<?php
/*
 * Created on 2012/05/29
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class ShopController extends Zend_Controller_Action {

	private  $init;

	public function indexAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();

		// category list
		
		$select[] = "cd";
		$select[] = "name";	
		$from[] = "yakiniku_category";	
		$where[] = "level=1";	
		$where[] = "status=1";	
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		$tmp = $this->init->db->fetchAll($sql);	
		foreach($tmp as $k=>$v) {
			$cd = (int)$v['cd'];
			$set_param['category_list'][$cd] = array('name'=>$v['name']);
		}

		// category list
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		
		$select[] = "cd";
		$select[] = "name";	
		$select[] = "parent_cd";
		$from[] = "yakiniku_category";	
		$where[] = "status=1";	
		$order[] = "cast(parent_cd as SIGNED)";
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);

		$tmp = $this->init->db->fetchAll($sql);
		foreach($tmp as $k=>$v) {
			$parent = (int)$v['parent_cd'];
			$set_param['category2_list'][$parent][] = array('cd'=>$v['cd'],'name'=>$v['name']);			
		}		
		
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);
		
		$set_param['meta']['title'] = $meta['title'];
		foreach($set_param['category_list'] as $key=>$val) {
			$key_str .= $val['name'] . ",";
		}
		$set_param['meta']['key'] = $key_str . $meta['key'];
		$set_param['meta']['desc'] = $meta['desc'];
		
		// logging
		$this->init->log->analog($this->init->request,null);
			
		// display		
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}


	public function keywordAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();

		// category list
		
		$select[] = "cd";
		$select[] = "name";	
		$from[] = "yakiniku_category";	
		$where[] = "level=1";	
		$where[] = "status=1";	
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		$tmp = $this->init->db->fetchAll($sql);	
		foreach($tmp as $k=>$v) {
			$cd = (int)$v['cd'];
			$set_param['category_list'][$cd] = array('name'=>$v['name']);
		}


		// category list
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		
		$select[] = "cd";
		$select[] = "name";	
		$select[] = "parent_cd";
		$from[] = "yakiniku_category";	
		$where[] = "level=2";
		$where[] = "status=1";	
		$order[] = "cast(parent_cd as SIGNED)";
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);

		$tmp = $this->init->db->fetchAll($sql);
		foreach($tmp as $k=>$v) {
			$parent = (int)$v['parent_cd'];
			$set_param['category2_list'][$parent][] = array('cd'=>$v['cd'],'name'=>$v['name'],'leaf'=>$v['leaf']);			
		}
		
				
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);
		
		$set_param['meta']['title'] = $meta['title'];
		foreach($set_param['category_list'] as $key=>$val) {
			$key_str .= $val['name'] . ",";
		}
		$set_param['meta']['key'] = $key_str . $meta['key'];
		$set_param['meta']['desc'] = $meta['desc'];
		
		// logging
		$this->init->log->analog($this->init->request,null);
			
		// display		
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}
			
	public function listAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();	
					
		$set_param['category_cd'] = $this->init->get_param['category_cd'];
		$set_param['page'] = $this->init->get_param['page'];
		if ($set_param['page'] == null) {
			$set_param['page'] = 1;
		}

		$select_s[] = "cd";
		$from_s[] = "yakiniku_item_category";
		$where_s[] = "category_cd=" . $this->init->db->quote($set_param['category_cd']);	
		$order_s[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select_s,$from_s,$where_s,$order_s);	
				
		$cd_array = array();
		$cd_array[] = "0";		
		$dat_s = $this->init->db->fetchAll($sql);
		if(count($dat_s)>0) {
			foreach($dat_s as $k=>$v) {
				$cd_array[] = $v['cd'];
			}			
		}
		
		// get data	
		$select[] = "cd";
		$select[] = "Name";
		$select[] = "SpecialDescription";	
		$select[] = "CatchCopy";			
		$select[] = "ImageCode";
		$select[] = "ShopPrice";
		$select[] = "FixedPrice";
		$select[] = "StockStatus";
		$from[] = "yakiniku_item";			
		$where[] = "status=1";		
		$order[] = "stockstatus desc";
		$order[] = "cast(cd as SIGNED)";
		
		if ( isset($set_param['category_cd']) ) {		
			
			$where[] = "cd in (" . implode(",",$cd_array) . ")";	

			// category
			$select_c[] = "cd";
			$select_c[] = "parent_cd";
			$select_c[] = "name";	
			$from_c[] = "yakiniku_category";
			$where_c[] = "cd=" . $this->init->db->quote($set_param['category_cd']);
	
			$sql = Util::makeSQL($select_c,$from_c,$where_c,null);	
				
			$dat = $this->init->db->fetch($sql);

			$set_param['search'] = $dat['name'];		
			
		}							
		
		$sql = Util::makeSQL($select,$from,$where,$order);

		$item = $this->init->db->fetchAll($sql);
	
		$set_param['count'] = count($item);	
		
		if ($set_param['count'] > 0) {
	        $start = ($set_param['page'] - 1) * SHOP2_PER_PAGE;
	        if ($set_param['count'] < $start + SHOP2_PER_PAGE) {
	        	$end =  $set_param['count'];
	        } else {
	        	$end = $start + SHOP2_PER_PAGE;
	        }
	        
	        
	 
	        for($i=$start;$i<$end;$i++){
	        	$set_param['item'][] = $item[$i];
	        }
	
			// set paging
	        for($i=1;$i<=ceil($set_param['count'] / SHOP2_PER_PAGE);$i++){
	        	$set_param['paging'][] = $i;
	        }				
		}
		
		$set_param['moshimo_shop_id'] = MOSHIMO_SHOP_ID;

		// category list
		$select = "";
		$from = "";
		$where = "";
		$order = "";				
		$select[] = "cd";
		$select[] = "name";	
		$from[] = "yakiniku_category";	
		if ( isset($set_param['category_cd']) ) {
			$where[] = "parent_cd=" . $dat['parent_cd'];	
		}	
		$order[] = "cast(cd as SIGNED)";

		$sql = Util::makeSQL($select,$from,$where,$order);
		
		$set_param['category_list'] = $this->init->db->fetchAll($sql);	
			
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);
		
		$set_param['meta']['title'] = $set_param['search'] . " " . $meta['title'];
		$set_param['meta']['key'] = $set_param['search'] . "," . $meta['key'];
		$set_param['meta']['desc'] = $set_param['search'] . $meta['desc'];
		$set_param['meta']['canonical'] = BASE_URL . "shop/list/category_cd/" . $set_param['category_cd'] . "/";
//print_r($set_param['meta']);	
		// logging
		$log_data[] = $set_param['category_cd'];
		$this->init->log->analog($this->init->request,$log_data);
			
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	}

	public function keywordlistAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();	
		
		$set_param['page'] = $this->init->get_param['page'];
		if ($set_param['page'] == null) {
			$set_param['page'] = 1;
		}
		
		// get data	
		$select[] = "cd";
		$select[] = "Name";
		$select[] = "SpecialDescription";	
		$select[] = "CatchCopy";	
		$select[] = "ImageCode";
		$select[] = "ShopPrice";
		$select[] = "FixedPrice";
		$select[] = "StockStatus";
		$from[] = "yakiniku_item";	
		$where[] = "status='1'";
		$order[] = "StockStatus desc";				
		$order[] = "cd";								

		if ( $this->init->get_param['keyword'] != "" ) {
			
			$words = explode(" ",str_replace("　"," ",$this->init->get_param['keyword']));
			
			foreach($words as $v) {
				$tmp = "";
				$tmp[] = "Name like " . $this->init->db->quotelike($v);
		
				if ($this->init->get_param['key_name'] == "1") {
					$tmp[] = "DispDescription like " . $this->init->db->quotelike($v);
					$tmp[] = "Spec like " . $this->init->db->quotelike($v);
					$tmp[] = "CatchCopy like " . $this->init->db->quotelike($v);
					$tmp[] = "MakerName like " . $this->init->db->quotelike($v);
					$tmp[] = "ModelNumber like " . $this->init->db->quotelike($v);
				}				
				if (is_array($tmp)){
					$where[] = "(" . implode(" or ",$tmp) . ")";
				}										
			}	
		}
		if ( is_array($this->init->get_param['category_cd']) ) {
			// category								
			$where[] = "cd in (select cd from yakiniku_item_category where category_cd in (" . implode(",",$this->init->get_param['category_cd']) . ") )";
		}				
		if ( $this->init->get_param['price_from'] != "" ) {
			$where[] = "ShopPrice>=" . $this->init->db->quote($this->init->get_param['price_from']);
		}
		if ( $this->init->get_param['price_to'] != "" ) {
			$where[] = "ShopPrice<=" . $this->init->db->quote($this->init->get_param['price_to']);
		}

		if ( isset($this->init->get_param['is_newly']) ) {
			$where[] = "isNewly='1'";
		}	
		if ( isset($this->init->get_param['is_delivery_sameday']) ) {
			$where[] = "isDeliverySameday='1'";
		}	
		if ( isset($this->init->get_param['is_free_shipping']) ) {
			$where[] = "isFreeShipping='1'";
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
		$set_param['moshimo_shop_id'] = MOSHIMO_SHOP_ID;
		
		// set search param
		$search = "";
		if ( $this->init->get_param['keyword'] != "" ) {
			$set_param['search_disp']['keyword'] = htmlspecialchars(stripslashes($this->init->get_param['keyword']));
			$search['keyword'] = htmlspecialchars($this->init->get_param['keyword']);
		}	
		$search['key_name'] = htmlspecialchars(stripslashes($this->init->get_param['key_name']));
		$set_param['search_disp']['key_name'] = htmlspecialchars($this->init->get_param['key_name']);

		if ( $this->init->get_param['price_from'] != "" ) {
			$set_param['search_disp']['price_from'] = htmlspecialchars($this->init->get_param['price_from']);
		}	
		if ( $this->init->get_param['price_to'] != "" ) {
			$set_param['search_disp']['price_to'] = htmlspecialchars(stripslashes($this->init->get_param['price_to']));
			$search['price_to'] = htmlspecialchars(stripslashes($this->init->get_param['price_to']));
		}	
		if ( $this->init->get_param['is_newly'] != "" ) {
			$set_param['search_disp']['is_newly'] = htmlspecialchars(stripslashes($this->init->get_param['is_newly']));
			$search['is_newly'] = htmlspecialchars(stripslashes($this->init->get_param['is_newly']));
		}	
		if ( $this->init->get_param['is_delivery_sameday'] != "" ) {
			$set_param['search_disp']['is_delivery_sameday'] = htmlspecialchars(stripslashes($this->init->get_param['is_delivery_sameday']));
			$search['is_delivery_sameday'] = htmlspecialchars(stripslashes($this->init->get_param['is_delivery_sameday']));
		}
		if ( $this->init->get_param['is_free_shipping'] != "" ) {
			$set_param['search_disp']['is_free_shipping'] = htmlspecialchars(stripslashes($this->init->get_param['is_free_shipping']));
			$search['is_free_shipping'] = htmlspecialchars(stripslashes($this->init->get_param['is_free_shipping']));
		}				
		
		if(is_array($search)){
			foreach($search as $k=>$v) {
				$set_param['search_param'] .=  $k . "/" . urlencode($v) . "/";
			}
		}
		
		$set_param['search'] = $this->init->get_param['keyword'];		
		
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);
		
		$set_param['meta']['title'] = $set_param['search'] . " " . $meta['title'];
		$set_param['meta']['key'] = $set_param['search'] . "," . $meta['key'];		
		$set_param['meta']['desc'] = $set_param['search'] . $meta['desc'];

		
		// logging
		$this->init->log->analog($this->init->request,$log_data);
			
		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	}
	
	
	public function locationAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();	
					
		$cd = $this->init->get_param['cd'];
	
		$url = MOSHIMO_SHOP_URL . $this->init->get_param['cd'] . "?shop_id=" . MOSHIMO_SHOP_ID;
		
		if ( $url != null) {
			// logging
			$log_data[] = $cd;
			$log_data[] = $url;			
			$this->init->log->analog($this->init->request,$log_data);
		
			// location
			header("Location: $url");
		} else {
			// display				
			$smarty->assign("param",$set_param);
			$smarty->simpleDisplay($this->init->request);			
		}

	}

	public function reviewAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();	
					
		$cd = $this->init->get_param['cd'];
	
		$url = MOSHIMO_SHOP_URL . $this->init->get_param['cd'] . "/review/" . "?shop_id=" . MOSHIMO_SHOP_ID;
		
		if ( $url != null) {
			// logging
			$log_data[] = $cd;
			$log_data[] = $url;			
			$this->init->log->analog($this->init->request,$log_data);
		
			// location
			header("Location: $url");
		} else {
			// display				
			$smarty->assign("param",$set_param);
			$smarty->simpleDisplay($this->init->request);			
		}

	}
	
	public function cartAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();	
					
		$cd = $this->init->get_param['cd'];
		$amount = $this->init->get_param['amount'];
	
		$url = MOSHIMO_CART_URL . "?shop_id=" . MOSHIMO_SHOP_ID . "&article_id=" . $cd  . "&amount=" . $amount; 
		
		if ( $url != null) {
			// logging
			$log_data[] = $cd;
			$log_data[] = $url;			
			$this->init->log->analog($this->init->request,$log_data);
		
			// location
			header("Location: $url");
		} else {
			// display				
			$smarty->assign("param",$set_param);
			$smarty->simpleDisplay($this->init->request);			
		}

	}
		
	public function detailAction(){
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();

		// get data
		$set_param['cd'] = $this->init->get_param['cd'];

		$select[] = "cd";
		$select[] = "name";
		$select[] = "DispKeyword";
		$select[] = "DispDescription";		
		$select[] = "DispDescription2";
		$select[] = "specialdescription";
		$select[] = "spec";
		$select[] = "catchcopy";
		$select[] = "makername";
		$select[] = "modelnumber";
		$select[] = "isnewly";
		$select[] = "isdeliverysameday";
		$select[] = "isfreeshipping";
		$select[] = "dodfrom";
		$select[] = "dodto";
		$select[] = "preorderflag";
		$select[] = "preorderperiod";
		$select[] = "categorycode";
		$select[] = "parentcategorycode";
		$select[] = "groupid";
		$select[] = "imagecode";
		$select[] = "imagecount";		
		$select[] = "jancode";
		$select[] = "paymenttype";
		$select[] = "bundleimpossible";
		$select[] = "startdate";
		$select[] = "fixedprice";
		$select[] = "wholesaleprice";
		$select[] = "shopprice";
		$select[] = "stockstatus";
														
		$from[] = "yakiniku_item";
		$where[] = "status=1";
		$where[] = "cd=" . $this->init->db->quote($set_param['cd']);
	
		$sql = Util::makeSQL($select,$from,$where,$order);				
		
		$set_param = $this->init->db->fetch($sql);
		$set_param['moshimo_shop_id'] = MOSHIMO_SHOP_ID;
		
		if ( $this->init->get_param['image_no'] == "" || $this->init->get_param['image_no'] > $set_param['imagecount']) {
			$set_param['image_no'] = 1;
		} else {
			$set_param['image_no'] = $this->init->get_param['image_no'];
		}
		$set_param['DispDescription'] = nl2br($set_param['DispDescription']);
					
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);		

/*		
		for ( $i = 2 ; $i <= strlen($set_param['categorycode']) ; $i += 2) {
			$cate_array[] =  "'" . substr($set_param['categorycode'],0,$i) . "'";
		}

		$select = "";
		$from = "";
		$where = "";
		$order = "";	
		$select[] = "cd";				
		$select[] = "name";	
		$from[] = "yakiniku_category";	
		$where[] = "cd in (" . implode(",",$cate_array). ")";
		$order[] = "cd";

		$sql = Util::makeSQL($select,$from,$where,$order);
		
		$category_list = $this->init->db->fetchAll($sql);	
		foreach($category_list as $k=>$v) {
			$key[] = $v['name'];
		}				
*/			
		$key = array();
		$key[] = $set_param['name'];	
		if ($set_param['makername'] != "") {
			$key[] = $set_param['makername'];
		}
		if ($set_param['isnewly'] == 1) {
			$key[] = "新着商品";
		}		
		if ($set_param['isdeliverysameday'] == 1) {
			$key[] = "即日配送";
		}
		if ($set_param['isfreeshipping'] == 1) {
			$key[] = "送料無料";
		}					

		$set_param['meta']['title'] = $set_param['name'] . " " . $meta['title'];
		$set_param['meta']['key'] = $set_param['DispKeyword'] . "," . implode(",",$key);	
		$set_param['meta']['desc'] = $set_param['DispDescription2'];
		$set_param['meta']['canonical'] = BASE_URL . "shop/detail/cd/" . $set_param['cd'] . "/";		
		// logging
		$log_data[] = $set_param['cd'];
		$this->init->log->analog($this->init->request,$log_data);
							
		// display		
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}		
} 
?>
