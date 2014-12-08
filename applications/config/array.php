<?php
/**
 * config file	
 */
class master {	
	var $master_array;
	public function __construct() {
		$this->master_array = array(
			"db_info"=>array(
				'host' => DB_HOST,
				'username' => DB_USER,
				'password' => DB_PASS,
				'dbname' => DB_NAME					
		
			),

			"ext"=>array(
				"image/jpeg",
				"image/pjpeg",
			),
			
			"status"=>array(
				"0"=>array("name"=>"無効"),			
				"1"=>array("name"=>"有効"),
				"2"=>array("name"=>"確認中")
			),

			"area"=>array(
				"1"=>array("name"=>"北海道"),
				"2"=>array("name"=>"東北"),
				"3"=>array("name"=>"関東"),
				"4"=>array("name"=>"北陸・甲信越"),
				"5"=>array("name"=>"東海"),
				"6"=>array("name"=>"関西"),
				"7"=>array("name"=>"中国"),
				"8"=>array("name"=>"四国"),
				"9"=>array("name"=>"九州"),
			),			
		
			"pref"=>array(
				"1"=>array("name"=>"北海道","name_s"=>"北海道","area"=>"1"),
				"2"=>array("name"=>"青森県","name_s"=>"青森","area"=>"2"),
				"3"=>array("name"=>"岩手県","name_s"=>"岩手","area"=>"2"),
				"4"=>array("name"=>"宮城県","name_s"=>"宮城","area"=>"2"),
				"5"=>array("name"=>"秋田県","name_s"=>"秋田","area"=>"2"),
				"6"=>array("name"=>"山形県","name_s"=>"山形","area"=>"2"),
				"7"=>array("name"=>"福島県","name_s"=>"福島","area"=>"2"),
				"8"=>array("name"=>"茨城県","name_s"=>"茨城","area"=>"3"),
				"9"=>array("name"=>"栃木県","name_s"=>"栃木","area"=>"3"),
				"10"=>array("name"=>"群馬県","name_s"=>"群馬","area"=>"3"),
				"11"=>array("name"=>"埼玉県","name_s"=>"埼玉","area"=>"3"),
				"12"=>array("name"=>"千葉県","name_s"=>"千葉","area"=>"3"),
				"13"=>array("name"=>"東京都","name_s"=>"東京","area"=>"3"),
				"14"=>array("name"=>"神奈川県","name_s"=>"神奈川","area"=>"3"),
				"15"=>array("name"=>"新潟県","name_s"=>"新潟","area"=>"4"),
				"16"=>array("name"=>"富山県","name_s"=>"富山","area"=>"4"),
				"17"=>array("name"=>"石川県","name_s"=>"石川","area"=>"4"),
				"18"=>array("name"=>"福井県","name_s"=>"福井","area"=>"4"),
				"19"=>array("name"=>"山梨県","name_s"=>"山梨","area"=>"4"),
				"20"=>array("name"=>"長野県","name_s"=>"長野","area"=>"4"),
				"21"=>array("name"=>"岐阜県","name_s"=>"岐阜","area"=>"5"),
				"22"=>array("name"=>"静岡県","name_s"=>"静岡","area"=>"5"),
				"23"=>array("name"=>"愛知県","name_s"=>"愛知","area"=>"5"),
				"24"=>array("name"=>"三重県","name_s"=>"三重","area"=>"5"),
				"25"=>array("name"=>"滋賀県","name_s"=>"滋賀","area"=>"6"),
				"26"=>array("name"=>"京都府","name_s"=>"京都","area"=>"6"),
				"27"=>array("name"=>"大阪府","name_s"=>"大阪","area"=>"6"),
				"28"=>array("name"=>"兵庫県","name_s"=>"兵庫","area"=>"6"),
				"29"=>array("name"=>"奈良県","name_s"=>"奈良","area"=>"6"),
				"30"=>array("name"=>"和歌山県","name_s"=>"和歌山","area"=>"6"),
				"31"=>array("name"=>"鳥取県","name_s"=>"鳥取","area"=>"7"),
				"32"=>array("name"=>"島根県","name_s"=>"島根","area"=>"7"),
				"33"=>array("name"=>"岡山県","name_s"=>"岡山","area"=>"7"),
				"34"=>array("name"=>"広島県","name_s"=>"広島","area"=>"7"),
				"35"=>array("name"=>"山口県","name_s"=>"山口","area"=>"7"),
				"36"=>array("name"=>"徳島県","name_s"=>"徳島","area"=>"8"),
				"37"=>array("name"=>"香川県","name_s"=>"香川","area"=>"8"),
				"38"=>array("name"=>"愛媛県","name_s"=>"愛媛","area"=>"8"),
				"39"=>array("name"=>"高知県","name_s"=>"高知","area"=>"8"),
				"40"=>array("name"=>"福岡県","name_s"=>"福岡","area"=>"9"),
				"41"=>array("name"=>"佐賀県","name_s"=>"佐賀","area"=>"9"),
				"42"=>array("name"=>"長崎県","name_s"=>"長崎","area"=>"9"),
				"43"=>array("name"=>"熊本県","name_s"=>"熊本","area"=>"9"),
				"44"=>array("name"=>"大分県","name_s"=>"大分","area"=>"9"),
				"45"=>array("name"=>"宮崎県","name_s"=>"宮崎","area"=>"9"),
				"46"=>array("name"=>"鹿児島県","name_s"=>"鹿児島","area"=>"9"),
				"47"=>array("name"=>"沖縄県","name_s"=>"沖縄","area"=>"9"),
			),
		

			"index_item"=>array(
				"new"=>array(
					"803978","803976","847724",
				),			
				"favorite"=>array(
					"213339","133087","506722",
				),
				"kameyama"=>array(
					"343195","339573","338851",
				),
/*				
				"matsusaka"=>array(
					"1","2","3",
				),		
				"tan"=>array(
					"1","2","3",
				),	
				"horumon"=>array(
					"1","2","3",
				),	
*/								
				"bq"=>array(
					"160413","392433","682383",
				),																		
			),
		); 					
	}
	public function getMaster() {
		return $this->master_array;
	}
	
}
?>