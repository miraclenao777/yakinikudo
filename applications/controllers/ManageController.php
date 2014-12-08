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

class ManageController extends Zend_Controller_Action {
	public $init;
	public $manage;
	public $errmsg; 
	
	public function indexAction(){	
		// init
		$this->init = new Init($this);
		$smarty = new MySmarty();	
		
		// display	
		$set_param['errmsg'] = $this->init->get_param['errmsg'];						
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}

	public function loginAction(){	
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);
		$smarty = new MySmarty();	

		if(isset($_POST["login"])&&$_POST["login"]==="ログイン"){
			$pass = md5($this->init->get_param['pass']);		
		} else {
			$pass = $_SESSION["pass"];		
		}

		
		if ( !$this->manage->logincheck($pass) ) {
			$errmsg = "パスワードが違います。";
			session_destroy();
			$this->init->request->setParam('errmsg',$errmsg);		
			$this->_forward('index','manage');	
			return;			
		}
		
		if(isset($_POST["login"])&&$_POST["login"]==="ログイン"){
			$_SESSION["pass"] = $pass;//
		}		

		// display				
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}
	
	public function logoutAction(){
		// init
		$this->init = new Init($this);
		$this->manage = new Manage($this);		
		session_destroy();
		$this->_forward('index','manage');
	}	
} 
?>
