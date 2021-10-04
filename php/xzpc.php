<?php
//print_r($_SERVER);
function getRealIp() {
	$ip = false;
	if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) {
			array_unshift($ips, $ip);
			$ip = FALSE;}
		for ($i = 0; $i < count($ips); $i++) {
			if (!preg_match("/^(10│172.16│192.168)./i", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function go302(){
    echo "Hello stupid!";
    setLog($_SERVER["DOCUMENT_ROOT"]."/log/failure/".date("Ymd").".log");
    exit();
}

$ua = $_SERVER['HTTP_USER_AGENT'];
//将恶意USER_AGENT存入数组
$now_ua = array('FeedDemon ','(BOT for JCE)','CrawlDaddy ','Java','Feedly','UniversalFeedParser','ApacheBench','Swiftbot','ZmEu','Indy Library','oBot','jaunty','YandexBot','AhrefsBot','MJ12bot','WinHttp','EasouSpider','HttpClient','Microsoft URL Control','YYSpider','jaunty','Python-urllib','lightDeckReports Bot');
//禁止空USER_AGENT，dedecms等主流采集程序都是空USER_AGENT，部分sql注入工具也是空USER_AGENT
$have_ua = array('Gecko','WebKit','KHTML','Presto','Trident','Tasman');
if(!$ua) {
    go302();
}else{
    foreach($now_ua as $value ){
        if(preg_match("/".$value."/i",$ua)) {
            go302();
        }
    }
    $isOk = false;
    foreach($have_ua as $value ){
        if(preg_match("/".$value."/i",$ua)) {
          $isOk = true;
        }
    }
    if(!$isOk){
        go302();
    }
}
session_start();
if($_SESSION["ipinfo"]){
    $ipInfo = $_SESSION["ipinfo"];
    $ipInfo = (array)json_decode($ipInfo);
    //echo "err1";
    if($ipInfo["query"]!=getRealIp()){
        //echo "err";
        $ipInfo = file_get_contents("http://ip-api.com/json/".getRealIp());
        $_SESSION["ipinfo"] = $ipInfo;
        $ipInfo = (array)json_decode($ipInfo);
    }
}else{
    $ipInfo = file_get_contents("http://ip-api.com/json/".getRealIp());
    $_SESSION["ipinfo"] = $ipInfo;
    $ipInfo = (array)json_decode($ipInfo);
}

$langorip = true;
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4);
if(preg_match("/jp/i", $lang) || preg_match("/ja/i", $lang)){
    $langorip = false;
}
if($ipInfo["countryCode"] == "JP"){
    $langorip = false;
}
if($langorip){
    go302();
}

// if(getRealIp()!="35.194.242.193"){
//     go302();
// }
setLog($_SERVER["DOCUMENT_ROOT"]."/log/success/".date("Ymd").".log");
function setLog($logfilePath){
    $logfile = fopen($logfilePath, "a");
    $log = getRealIp()."--[".date("Y/m/d H:i:s")."]--".$_SERVER["REQUEST_METHOD"]."--".$_SERVER["HTTP_X_FORWARDED_PROTO"]."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."--".$_SERVER["HTTP_REFERER"]."--".$_SERVER["HTTP_USER_AGENT"]."--".$_SERVER['HTTP_ACCEPT_LANGUAGE']."--".http_build_query($_POST).PHP_EOL.PHP_EOL;
    fwrite($logfile, $log);
    fclose($logfile);
}


?>
