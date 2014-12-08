<?php
require_once("Zend/Db.php");

// DBクラスの定義
class CRShop2 {
	public  $init;
	
	public function __construct() {		
	
			// init
			$this->init = new InitCron();
	
			// get category code
			$select[] = "cd";
			$from[] = "shop2_category";	
			$where[] = "leaf=1";
			$where[] = "status=1";	
			$order[] = "upd_date";
			$order[] = "cd";
	
			$sql = Util::makeSQL($select,$from,$where,$order);
			$dat = $this->init->db->fetchAll($sql);
			$cate_cd = $dat[0]['cd'];
	
			// get now code
			$select = "";
			$from = "";
			$where = "";
			$order = "";
			$select[] = "cd";
			$from[] = "shop2";		
			$where[] = "CategoryCode='" . $cate_cd . "'";				
		
			$sql = Util::makeSQL($select,$from,$where,null);
	
			$now_cd = $this->init->db->fetchAll($sql);
			
			$check_cd = array();
			foreach($now_cd as $k=>$v) {
				$check_cd[] = $v['cd'];
			}
					
			// get xml
			$base_url = MOSHIMO_SHOP_API_URL;
	
			$url_param['authorization_code'] = MOSHIMO_AUTH_CODE;
			$url_param['list_per_page'] = 1;
			$url_param['article_category_code'] = $cate_cd;			
			$url = Util::getUrl($base_url,$url_param);
				
			$xml = simplexml_load_file($url);
		
			// get total hit
			$total_hit = $xml->Found;		
			$max = ceil($total_hit / MOSHIMO_PER_PAGE);
		
			$ins_cd = array();
			$upd_cd = array();
			$del_cd = array();	
			$url_param['list_per_page'] = MOSHIMO_PER_PAGE;					
	
		
			for ($page = 0; $page < $max ; $page++) {
		
				$url_param['page_index'] = $page;
				$url_param['article_category_code'] = $cate_cd;			
				$url = Util::getUrl($base_url,$url_param);
						
				$xml = simplexml_load_file($url);
				$item = $xml->Articles->Article;
									
					
				foreach($item as $k=>$v) {			
					// check item
					if (in_array($v->ArticleId,$check_cd) ) {
						// item DB update 
						$this->item_update($v,1,null);
						$upd_cd[] = $v->ArticleId;
					} else {
						// item DB insert 
						$this->item_insert($v,1,null);
						$ins_cd[] = $v->ArticleId;
					}
				}		
			}
	
			
			// item delete 
			$del_cd = array_diff($upd_cd,$check_cd);
			if (count($del_cd) > 0) {
				$this->item_delete($del_cd,$cate_cd);
			}
	
			// time update
			$this->time_update($cate_cd);
			
			// logging
			$ins = count($ins_cd);
			$upd = count($upd_cd);
			$del = count($del_cd);
			LogMaster::cronlog("shop2","cd:$cate_cd/hit:$total_hit/ins:$ins/upd:$upd/del:$del");
		
	}	


	 private function item_insert($data,$lv,$parent_cd) {

		// DB insert 
		$sql = 	
				"insert into shop2(" . 
					"cd,".
					"name,".
					"description,".
					"specialdescription,".
					"spec,".
					"catchcopy,".
					"makername,".
					"modelnumber,".
					"isnewly,".
					"isdeliverysameday,".
					"isfreeshipping,".
					"dodfrom,".
					"dodto,".
					"preorderflag,".
					"preorderperiod,".
					"categorycode,".
					"parentcategorycode,".
					"groupid,".					
					"imagecode,".
					"imagecount,".
					"jancode,".
					"paymenttype,".
					"bundleimpossible,".
					"startdate,".
					"fixedprice,".
					"wholesaleprice,".
					"shopprice,".
					"stockstatus,".	
					"status,".																													
					"timestamp" .										 
				") values(" .
					":cd,".
					":Name,".
					":Description,".
					":SpecialDescription,".
					":Spec,".
					":CatchCopy,".
					":MakerName,".
					":ModelNumber,".
					":IsNewly,".
					":IsDeliverySameday,".
					":IsFreeShipping,".
					":DodFrom,".
					":DodTo,".
					":PreorderFlag,".
					":PreorderPeriod,".
					":CategoryCode,".
					":ParentCategoryCode,".
					":GroupId,".				
					":ImageCode,".
					":ImageCount,".
					":JanCode,".
					":PaymentType,".
					":BundleImpossible,".
					":StartDate,".
					":FixedPrice,".
					":WholesalePrice,".
					":ShopPrice,".
					":StockStatus,".
					":status," .																	
					":date" .			
					")";
				
		$param = array(
				':cd' => $data->ArticleId,			
				':Name' => $data->Name,
				':Description' => $data->Description,
				':SpecialDescription' => $data->SpecialDescription,
				':Spec' => $data->Spec,
				':CatchCopy' => $data->CatchCopy,
				':MakerName' => $data->MakerName,
				':ModelNumber' => $data->ModelNumber,
				':IsNewly' => $data->IsNewly,
				':IsDeliverySameday' => $data->IsDeliverySameday,
				':IsFreeShipping' => $data->IsFreeShipping,
				':DodFrom' => $data->DodFrom,
				':DodTo' => $data->DodTo,
				':PreorderFlag' => $data->PreorderFlag,
				':PreorderPeriod' => $data->PreorderPeriod,
				':CategoryCode' => $data->Category->Code,
				':ParentCategoryCode' => $data->ParentCategoryCode,
				':GroupId' => $data->GroupId,			
				':ImageCode' => $data->ImageCode,
				':ImageCount' => $data->ImageCount,
				':JanCode' => $data->JanCode,
				':PaymentType' => $data->PaymentType,
				':BundleImpossible' => $data->BundleImpossible,
				':StartDate' => $data->StartDate,
				':FixedPrice' => $data->FixedPrice,
				':WholesalePrice' => $data->WholesalePrice,
				':ShopPrice' => $data->ShopPrice,
				':StockStatus' => $data->StockStatus,											
				':status' => 1,														
				':date' => date('Y-m-d H:i:s')
				);
				
		$result = $this->init->db->query($sql,$param);
// logging
//LogMaster::testlog($this->init->request,"(i) cd:".$data->ArticleId);				
	}	
	
	private function item_update($data,$lv,$parent_cd) {
// logging
//LogMaster::testlog($this->init->request,"(u) cd:".$data->ArticleId);		
		// DB update 
		$sql = 	
				"update shop2 set " .
					"name=:Name," . 							
					"description=:Description," . 
					"specialdescription=:SpecialDescription," . 
					"spec=:Spec," . 
					"catchcopy=:CatchCopy," . 
					"makername=:MakerName," . 
					"modelnumber=:ModelNumber," . 
					"isnewly=:IsNewly," . 
					"isdeliverysameday=:IsDeliverySameday," . 
					"isfreeshipping=:IsFreeShipping," . 
					"dodfrom=:DodFrom," . 
					"dodto=:DodTo," . 
					"preorderflag=:PreorderFlag," . 
					"preorderperiod=:PreorderPeriod," .					 
					"categorycode=:CategoryCode," . 
					"parentcategorycode=:ParentCategoryCode," . 
					"groupid=:GroupId," . 
					"imagecode=:ImageCode," . 
					"imagecount=:ImageCount," . 
					"jancode=:JanCode," . 
					"paymenttype=:PaymentType," . 
					"bundleimpossible=:BundleImpossible," . 
					"startdate=:StartDate," . 
					"fixedprice=:FixedPrice," . 
					"wholesaleprice=:WholesalePrice," . 
					"shopprice=:ShopPrice," . 
					"stockstatus=:StockStatus," . 
					"status=:status," . 																							
					"timestamp=now() " 	.				
				" where cd=:cd;";
		$param = array(	
				':cd' => $data->ArticleId,			
				':Name' => $data->Name,						
				':Description' => $data->Description,
				':SpecialDescription' => $data->SpecialDescription,
				':Spec' => $data->Spec,
				':CatchCopy' => $data->CatchCopy,
				':MakerName' => $data->MakerName,
				':ModelNumber' => $data->ModelNumber,
				':IsNewly' => $data->IsNewly,
				':IsDeliverySameday' => $data->IsDeliverySameday,
				':IsFreeShipping' => $data->IsFreeShipping,
				':DodFrom' => $data->DodFrom,
				':DodTo' => $data->DodTo,
				':PreorderFlag' => $data->PreorderFlag,
				':PreorderPeriod' => $data->PreorderPeriod,			
				':CategoryCode' => $data->Category->Code,
				':ParentCategoryCode' => $data->ParentCategoryCode,
				':GroupId' => $data->GroupId,
				':ImageCode' => $data->ImageCode,
				':ImageCount' => $data->ImageCount,					
				':JanCode' => $data->JanCode,
				':PaymentType' => $data->PaymentType,
				':BundleImpossible' => $data->BundleImpossible,
				':StartDate' => $data->StartDate,
				':FixedPrice' => $data->FixedPrice,
				':WholesalePrice' => $data->WholesalePrice,
				':ShopPrice' => $data->ShopPrice,
				':StockStatus' => $data->StockStatus,	
				':status' => 1											
				);
				
		$result = $this->init->db->query($sql,$param);
	
	}
	
	private function item_delete($del_cd,$cate_cd) {
		// DB update 
		$sql = 	
				"update shop2 set " .
					"status=:status," . 																
					"timestamp=now() " .
				" where " . 
					"cd in (" . implode(",",$del_cd) . ")" . 
				" and " .
					"CategoryCode='" . $cate_cd . "'";					
				
		$param = array(
				':status' => 0,															
				);
		$result = $this->init->db->query($sql,$param);			
	}	
	private function time_update($cate_cd) {
		// DB update 
		$sql = 	
				"update shop2_category set " .
					"upd_date=now()," . 																
					"timestamp=now() " .
				" where cd=:cd;";
		$param = array(
				':cd' => $cate_cd													
				);
		$result = $this->init->db->query($sql,$param);				
	}	

}


?>
