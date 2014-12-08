<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class SitemapController extends Zend_Controller_Action {
	private $init;
	
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

		// shop detail		
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		$select[] = "cd";
		$select[] = "Name";
		$select[] = "ShopPrice";	
		$select[] = "StockStatus";		
		$from[] = "yakiniku_item";
		$where[] = "status=1";	
		$order[] = "cast(cd as SIGNED)";
		$sql = Util::makeSQL($select,$from,$where,$order);

		$set_param['item_list'] = $this->init->db->fetchAll($sql);
						
		// get mata data
		$meta = $this->init->meta->getData($this->init->request);
		
		$set_param['meta']['title'] = $meta['title'];
		$set_param['meta']['key'] = $meta['key'];
		$set_param['meta']['desc'] = $meta['desc'];
		

			
		// display		
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}
} 
?>
