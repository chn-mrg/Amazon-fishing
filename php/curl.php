<?php


include 'config.php';

function get_curl($cookieSuccess,$url,$isagent){
    $ch = curl_init();

    if(isproxy()){
        curl_setopt($ch, CURLOPT_PROXY, proxy());
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, proxyuserpwd());
    }
    
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_POST, 0);
    if($isagent){
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, headers($url,"GET"));
    //curl_setopt($ch, CURLOPT_REFERER, $url);//模拟来路
    
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieSuccess);//用来存放登录成功的cookie
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieSuccess);
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result= curl_exec($ch);
    //print_r(curl_getinfo($ch));
    curl_close($ch);
    return $result;
}

function post_curl($cookieSuccess,$url,$data,$isagent,$where){
    $ch = curl_init();
   
    if(isproxy()){
        curl_setopt($ch, CURLOPT_PROXY, proxy());
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, proxyuserpwd());
    }
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    
    if($isagent){
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, headers($url,"POST"));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    if($where){
        curl_setopt($ch, CURLOPT_REFERER, $where);//模拟来路
    }
    
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieSuccess);//用来存放登录成功的cookie
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieSuccess);
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result= curl_exec($ch);
    //print_r(curl_getinfo($ch));
    curl_close($ch);
    return $result;
}

 
function is_mobile_request(){  
    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';  
    $mobile_browser = '0';  
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))  
        $mobile_browser++;  
    if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))  
        $mobile_browser++;  
    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))  
        $mobile_browser++;  
    if(isset($_SERVER['HTTP_PROFILE']))  
        $mobile_browser++;  
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
    $mobile_agents = array(  
        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
        'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
        'wapr','webc','winw','winw','xda','xda-' 
        );  
    if(in_array($mobile_ua, $mobile_agents))  
        $mobile_browser++;  
    if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)  
        $mobile_browser++;  
    // Pre-final check to reset everything if the user is on Windows  
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)  
        $mobile_browser=0;  
    // But WP7 is also Windows, with a slightly different characteristic  
    if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)  
        $mobile_browser++;  
    if($mobile_browser>0)  
        return true;  
    else
        return false;  
}


?>