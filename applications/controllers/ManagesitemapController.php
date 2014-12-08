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

class ManagesitemapController extends Zend_Controller_Action {
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
		
		// header
		$header = "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
		
		// footer
		$footer = "</urlset>\n";		
		
		// index
		$url = BASE_URL;
		$msg = $this->getsitemapurl($url,date("Y-m-d"),"weekly","1.0");


		// sitemap
		$url = BASE_URL . "sitemap/";
		$msg .= $this->getsitemapurl($url,date("Y-m-d"),"monthly","0.5");

		// shop
		$url = BASE_URL . "shop/";
		$msg .= $this->getsitemapurl($url,date("Y-m-d"),"monthly","0.7");
		
		// shop list		
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		$select[] = "cd";
		$from[] = "yakiniku_category";
		$where[] = "status=1";
		$where[] = "level=2";		
		$order[] = "cd";		
		$sql = Util::makeSQL($select,$from,$where,$order);

		$base_url = BASE_URL . "shop/list/";
		$dat = $this->init->db->fetchAll($sql);
			
		foreach ($dat as $k=>$v) {
			$url = $base_url . "category_cd/" . $v['cd']. "/";
			$msg .= $this->getsitemapurl($url,date("Y-m-d"),"weekly","0.3");
		}		

		// shop detail		
		$select = "";
		$from = "";
		$where = "";
		$order = "";
		$select[] = "cd";
		$from[] = "yakiniku_item";
		$where[] = "status=1";	
		$order[] = "cd";		
		$sql = Util::makeSQL($select,$from,$where,$order);

		$base_url = BASE_URL . "shop/detail/";
		$dat = $this->init->db->fetchAll($sql);
			
		foreach ($dat as $k=>$v) {
			$url = $base_url . "cd/" . $v['cd']. "/";
			$msg .= $this->getsitemapurl($url,date("Y-m-d"),"weekly","0.3");
		}				

		// main file output		
		$file = DOC_DIR . "sitemapmain.xml";
		$fp = fopen($file,"w");
		$str = $header . $msg . $footer;
		fputs($fp,$str);
		fclose($fp);
		
		// display	
		$set_param['errmsg'] = $this->init->get_param['errmsg'];						
		$smarty->assign("param",$set_param);
		$smarty->simpleDisplay($this->init->request);	
	}
	
	private function getsitemapurl($loc,$lastmod,$changefreq,$priority) {
		$ret = "<url>\n";
		$ret .= "<loc>" . $loc . "</loc>\n";
		$ret .= "<lastmod>" . $lastmod . "</lastmod>\n";
		$ret .= "<changefreq>" . $changefreq . "</changefreq>\n";
		$ret .= "<priority>" . $priority . "</priority>\n";
		$ret .= "</url>\n";
		
		return $ret;
	}

} 
?>
