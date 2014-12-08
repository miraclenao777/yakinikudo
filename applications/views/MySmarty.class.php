<?php
// Smartyコンポーネント（クラス）のロード
require_once("smarty/libs/Smarty.class.php");

// MySmartyクラスの定義
class MySmarty extends Smarty {
	public function __construct() {
		// 親クラスであるSmartyクラスのコンストラクタを呼び出す
		$this->Smarty();
	}
	
	public function simpleDisplay($req) {

		$path = APP_DIR;
		$this->template_dir = APP_DIR . 'templates/';
		$this->compile_dir = APP_DIR . 'templates_c/';
		$name = $req->getControllerName(). '/' . $req->getActionName(). '.tpl';
//		$this->assign('current',$name);
		$this->display($name);

	}
}


?>
