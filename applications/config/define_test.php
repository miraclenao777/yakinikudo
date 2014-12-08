<?php
/**
 * config file
 */
/* test */ 
define(PLATFORM,0);
	
define(DB_HOST,"127.0.0.1");		
define(DB_USER,"root");	
define(DB_PASS,"");	
define(DB_NAME,"bclass");	

define(APP_DIR,"../applications/smarty/libs/");
define(IMG_DIR,"/home/naoya/yakiniku/images/");
define(FILE_DIR,"/home/naoya/yakiniku/files/");
define(LOG_DIR,"/home/naoya/yakiniku/log/");
define(DOC_DIR,"/home/naoya/yakiniku/web/");
define(MAX_IMG_SIZE,1000000);

define(BASE_URL,"http://192.168.56.10:8081/");

define(MANAGE_USER,"naoya");	
define(MANAGE_PASS,"urawareds");

// moshimo
define(MOSHIMO_AUTH_CODE,"dklj9gXO4QAtmdnTRxVed5q51VfFP");
define(MOSHIMO_PER_PAGE,"100");	
define(MOSHIMO_SHOP_ID,"528021");


define(MOSHIMO_SHOP_API_URL,"http://api.moshimo.com/article/search2");
define(MOSHIMO_SHOP_REVIEW_API_URL,"http://api.moshimo.com/article/review");
define(MOSHIMO_CATEGORY_API_URL,"http://api.moshimo.com/category/list2");
define(MOSHIMO_SHOP_URL,"http://mp.moshimo.com/article/");
define(MOSHIMO_IMAGE_URL,"http://image.moshimo.com/item_image/");
define(MOSHIMO_CART_URL,"http://mp.moshimo.com/cart/add");

/*
// yahoo
define(YAHOO_AUTH_CODE,"JcDnt4mxg66rsTdyoWDvPMbuqKuNN8fkc8NAGtnKsoo2H_Q4sk0V0tX7s7sU4daqThbJXFcF");
define(YAHOO_NEWS_API_URL,"http://news.yahooapis.jp/NewsWebService/V2/topics");
define(LOCAL_NEWS_FILE_DIR,"news/local/");

// recruit
define(RECRUIT_AUTH_CODE,"db27afec658f7678");
define(RECRUIT_R25_NEWS_API_URL,"http://webservice.recruit.co.jp/r25/article/v1");
define(RECRUIT_R25_CATEGORY_API_URL,"http://webservice.recruit.co.jp/r25/category/v1");
define(RECRUIT_R25_THEME_API_URL,"http://webservice.recruit.co.jp/r25/theme/v1");
define(RECRUIT_R25_NEWS_FILE_DIR,"news/r25/");
*/
// shop
define(SHOP2_PER_PAGE,"20");
define(MANAGE_SHOP2_PER_PAGE,"100");

/*
// news
define(NEWS_INDEX,"5");
*/
	
?>