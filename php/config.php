<?php

$servername = "127.0.0.1";
$username = "amazon";
$password = "YNMtJbbefJAj7nW7";
$dbname = "amazon";


function proxy(){
    return 'http://zproxy.lum-superproxy.io:22225';
    //return 'as.ipidea.io:2333';
} 
function proxyuserpwd(){
    session_start();
    //return 'ipidea915346-zone-custom-region-jp-session-'.md5("zmdy".session_id()).'-sessTime-20:xiaoG1998';
    return 'lum-customer-hl_d4853ff5-zone-sjzx-session-'.md5("zmdy".session_id()).'-country-jp:rkuxdg1l8hgc';
    //zproxy.lum-superproxy.io:22225:lum-customer-hl_d4853ff5-zone-sjzx-session-1-country-jp:rkuxdg1l8hgc
}

function isproxy(){
    return 1;
}

function headers($url,$method){
    return array(
        // ":authority: www.amazon.co.jp",
        // ":method: ".$method,
        // ":path: ".str_replace('https://www.amazon.co.jp', '', $url),
        // ":scheme: https",
        //"accept-encoding: gzip, deflate, br",
        // "content-type: application/x-www-form-urlencoded",
        // "downlink: 1.3",
        // "ect: 4g",
        // "rtt: 300",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-language: ja,en-US;q=0.9,en;q=0.8",        
        "sec-ch-ua: ".$_SERVER["HTTP_SEC_CH_UA"],
        "sec-ch-ua-mobile: ".$_SERVER["HTTP_SEC_CH_UA_MOBILE"],
        "sec-fetch-dest: ".$_SERVER["HTTP_SEC_FETCH_DEST"],
        "sec-fetch-mode: ".$_SERVER["HTTP_SEC_FETCH_MODE"],
        "sec-fetch-site: ".$_SERVER["HTTP_SEC_FETCH_SITE"],
        "sec-fetch-user: ".$_SERVER["HTTP_SEC_FETCH_USER"],
        "upgrade-insecure-requests: ".$_SERVER["HTTP_UPGRADE_INSECURE_REQUESTS"],
    );
}

?>