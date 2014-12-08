<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class DemoController extends Zend_Controller_Action {
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
		
		// logging
		$this->init->log->analog($this->init->request,null);

		// display		
		$smarty = new MySmarty();
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);

	}
} 
?>
