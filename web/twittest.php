<?php
/*
 * Created on 2013/07/04
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
echo "test <br>";
$api_url="http://search.twitter.com/search.atom?q=blue%20angels&rpp=5&include_entities=true&result_type=mixed";
//$api_url="http://search.twitter.com/search.atom?q=@cyzo&rpp=10";
$resdata=file_get_contents($api_url);
print $resdata;
$twitterdata=simplexml_load_string($resdata);
print($twitterdata); 
?>
