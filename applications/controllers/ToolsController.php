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

class ToolsController extends Zend_Controller_Action {
	public $init;
	public $errmsg; 
	
	public function indexAction(){	
		// init
		$this->init = new Init($this);
		$smarty = new MySmarty();	
		
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
			$errmsg[] = $this->setErrMsg("氏名","empty");
		}
		if(!$notEmpty->isValid($this->init->get_param['address'])) {
			$errmsg[] = $this->setErrMsg("所在地","empty");
		}
		if(!$notEmpty->isValid($this->init->get_param['topic'])) {
			$errmsg[] = $this->setErrMsg("見出し","empty");
		}
		if(!$notEmpty->isValid($this->init->get_param['comment'])) {
			$errmsg[] = $this->setErrMsg("コメント","empty");
		}	
/*							
		if(!$notEmpty->isValid($this->init->get_param['url'])) {
			$errmsg[] = $this->setErrMsg("ＵＲＬ","empty");
		}
		if(!$notEmpty->isValid($this->init->get_param['access'])) {
			$errmsg[] = $this->setErrMsg("アクセス","empty");
		}		
*/						
		return $errmsg;
	}
	private function isImage($ext){
		
		$errmsg = "";
		if (!$_FILES["img"]["tmp_name"]) {
			$errmsg[] = "画像が存在しません";
		} else if($_FILES["img"]["size"] > MAX_IMG_SIZE) {
			$errmsg[] = "画像が大きすぎます";
		} else if(!in_array($_FILES["img"]["type"],$ext)  ) {
			$errmsg[] = "JPEG以外は登録できません";
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
			case "int":
				$type_name = "数字で入力してください。";
				break;
			case "float":
				$type_name = "小数で入力してください。";
				break;		
			case "mail":
				$type_name = "メールアドレスの書式が不正です。";
				break;	
			default:
				$type_name = $other . "です。";
				break;															
		}
	
		return $name . "は" . $type_name;

	}
		
	public function testAction(){	
		// init
		$this->init = new Init($this);	
		$smarty = new MySmarty();
		
		$pref= $this->init->master->getPref();
		$area= $this->init->master->getArea();
		
		// regist 
		foreach($area as $k=>$v) {
			$sql = "insert into area values(:cd,:name,:date)";
			$result = $this->init->db->query($sql,array(':cd' => $k,':name' => $v['name'],':date' => date('Y-m-d H:i:s')));
		}
		
		// regist 
		foreach($pref as $k=>$v) {
			$sql = "insert into pref values(:cd,:name,:area_cd,:date)";
			$result = $this->init->db->query($sql,array(':cd' => $k,':name' => $v['name'],':area_cd' => $v['area'],':date' => date('Y-m-d H:i:s')));
		}	
		//クエリ（SQL文）の定義
		$sql = 'select * from area;';
		//クエリの発行と結果取得
		$area = $this->init->db->fetchAll($sql);
		//取得結果の表示
		print_r($area);
	
		// display		
		$smarty = new MySmarty();

		$smarty->simpleDisplay($init->request);		
	}

} 
?>
