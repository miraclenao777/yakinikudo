<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class IndexController extends Zend_Controller_Action {
	private $init;
	
	public function indexAction(){
		// init
		$this->init = new Init($this);	
		
		// get mata data
		$set_param['meta'] = $this->init->meta->getData($this->init->request);

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
			$set_param['category_list'][$parent][] = array('cd'=>$v['cd'],'name'=>$v['name'],'leaf'=>$v['leaf']);			
		}					
				
		// index_item
		$set_param['index_item']['new'] = $this->get_index_item($this->init,"new");
		$set_param['index_item']['favorite'] = $this->get_index_item($this->init,"favorite");
		$set_param['index_item']['kameyama'] = $this->get_index_item($this->init,"kameyama");
		$set_param['index_item']['bq'] = $this->get_index_item($this->init,"bq");		

		// logging
		$this->init->log->analog($this->init->request,null);

		// display		
		$smarty = new MySmarty();
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);

	}
	
	private function get_index_item($init,$type){
		// index_item
		$cd_array = $init->master->getIndexItem($type);
		// get data	
		$select[] = "cd";
		$select[] = "Name";
		$select[] = "SpecialDescription";	
		$select[] = "CatchCopy";			
		$select[] = "ImageCode";
		$select[] = "ShopPrice";
		$select[] = "FixedPrice";
		$where[] = "cd in (" . implode(",",$cd_array) . ")";
		$from[] = "yakiniku_item";			
		$order[] = "cast(cd as SIGNED)";
		
		$sql = Util::makeSQL($select,$from,$where,$order);

		$item = $this->init->db->fetchAll($sql);
		
		return $item;		
		
	}
} 
?>
