<?php
/*
 * Created on 2011/12/13
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class LinkController extends Zend_Controller_Action {
	private $init;
	
	public function indexAction(){
		// init
		$this->init = new Init($this);	

		// display		
		$smarty = new MySmarty();
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);
	
	}
} 
?>
