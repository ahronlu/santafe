<?php
require_once './server/classes/Security.class.php';

error_reporting(0);
ini_set('display_errors', 0);
// $_SESSION["oppt_source_id"] = $_GET['oppt_source_id'];
function getUserIP(){
$client  = $_SERVER['HTTP_CLIENT_IP'];
$forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = $_SERVER['REMOTE_ADDR'];
if ( filter_var($client, FILTER_VALIDATE_IP) ) {
$ip = $client;
} elseif( filter_var($forward, FILTER_VALIDATE_IP) ){
$ip = $forward;
} else {
$ip = $remote;
}
return $ip;
}

function isMobile() {
$user_device = "desktop";
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
$user_device = "mobile";
}

return $user_device;
}
$user_ip = getUserIP();
$useragent=$_SERVER['HTTP_USER_AGENT'];
$user_device = isMobile();
session_start();

// $phone_number   = "0772318970";
$phone_number   = "0772318892";
$client_id  = '';
if  ( isset($_GET['client_id'])  && Security::hasNumbers($_GET['client_id'] , array('onlyNumbers' => true )  )   ) { // id for the sending compeny
$client_id  =  Security::trimHTML($_GET['client_id']); 
}

$form_id  = '';
if  ( isset($_GET['form_id'])  && Security::hasNumbers($_GET['form_id'] , array('onlyNumbers' => true )  )   ) { // Form Type Id 
$form_id  =  Security::trimHTML($_GET['form_id']); 
}

$model_id  = '';
if  ( isset($_GET['model_id'])  && Security::hasNumbers($_GET['model_id'] , array('onlyNumbers' => true )  )   ) { // car model id 
$model_id  =  Security::trimHTML($_GET['model_id']); 
}

$brand_id  = '';
if  ( isset($_GET['brand_id'])  && Security::hasNumbers($_GET['brand_id'] , array('onlyNumbers' => true )  )   ) { // car model id 
$brand_id  =  Security::trimHTML($_GET['brand_id']); 
}

$partner_id  = '';
if  ( isset($_GET['partner_id'])  && Security::hasNumbers($_GET['partner_id'] , array('onlyNumbers' => true )  )   ) { // showcase
$partner_id  =  Security::trimHTML($_GET['partner_id']); 
}

$web_site_id  = '';
if  ( isset($_GET['web_site_id'])  && Security::hasNumbers($_GET['web_site_id'] , array('onlyNumbers' => true )  )   ) { // showcase
$web_site_id  =  Security::trimHTML($_GET['web_site_id']); 
}

$oppt_source_id  = '1';
if  ( isset($_GET['oppt_source_id'])  && Security::hasNumbers($_GET['oppt_source_id'] , array('onlyNumbers' => true )  )   ) { // media id 
$oppt_source_id  =  Security::trimHTML($_GET['oppt_source_id']); 
}

$utm_source  = '';
if  ( isset($_GET['utm_source'])   ) {  // traffic_source
$utm_source  =     Security::trimHTML(
                         Security::trimTags($_GET['utm_source'])
                     ); 
}

$utm_campaign  = '';
if  ( isset($_GET['utm_campaign'])   ) {  // traffic_source

$utm_campaign  =     Security::trimHTML(
                           Security::trimTags($_GET['utm_campaign'])
                       ); 
}

$utm_medium  = '';
if  ( isset($_GET['utm_medium'])   ) {  // tutm_medium
$utm_medium  =     Security::trimHTML(
                           Security::trimTags($_GET['utm_medium'])
                       ); 
}

$utm_term  = '';
if  ( isset($_GET['utm_term'])   ) {  // campaign term'
$utm_term  =     Security::trimHTML(
                        Security::trimTags($_GET['utm_term'])
                       ); 
}

$utm_content  = '';
if  ( isset($_GET['utm_content'])   ) {  // campaign term'
$utm_content  =     Security::trimHTML(
                         Security::trimTags($_GET['utm_content'])
                       ); 
}

$page_source    =  'http:/' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'; // website link  //"http://campaigns.hyundaimotors.co.il/publish/03_2018/i10-testzone/";
$lead_approve_marketing =  '';

if ( $utm_campaign == 'hy_santafefamily_0221' ){

  if ( $utm_source == 'Google_SEARCH' ){
    $phone_number = '0778035772';
  }
  elseif ( $utm_source == 'Google_GDN' ) {
    $phone_number = '0778047242';
  }
  elseif ( $utm_source == 'YouTube_trueview' ) {
    $phone_number = '0778037896';
  }
  elseif ( $utm_source == 'YouTube_trueview_4_Action' ) {
    $phone_number = '0778046211';
  }
  elseif ( $utm_source == 'artimedia_il' ) {
    $phone_number = '0778042156';
  }
   else if ( $utm_source == 'Facebook_Postlink' ){
    $phone_number = '0778050158';
  }
   else if ( $utm_source == 'Instagram' ){
    $phone_number = '0778048198';
  }
   else if ( $utm_source == 'Instagram_Stories' ){
    $phone_number = '0778044803';
  }
  elseif ( $utm_source == 'Instagram_Video' ) {
    $phone_number = '0778037660';
  }
}

?>


<!doctype html><html lang="en"><head><script>!function(e,t,a,n,g){e[n]=e[n]||[],e[n].push({"gtm.start":(new Date).getTime(),event:"gtm.js"});var m=t.getElementsByTagName(a)[0],r=t.createElement(a);r.async=!0,r.src="https://www.googletagmanager.com/gtm.js?id=GTM-NPRJ2Q",m.parentNode.insertBefore(r,m)}(window,document,"script","dataLayer")</script><meta charset="utf-8"/><link rel="icon" href="/publish/02_2021/hy_santafefamily_0221/favicon.ico"/><meta name="viewport" content="width=device-width,initial-scale=1"/><meta name="theme-color" content="#000000"/><meta name="description" content="Web site created using create-react-app"/><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/><link rel="stylesheet" charset="UTF-8" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"/><link rel="manifest" href="/publish/02_2021/hy_santafefamily_0221/manifest.json"/><title>Hyundai SANTA FE</title><script>!function(e,t,a,n,g){e[n]=e[n]||[],e[n].push({"gtm.start":(new Date).getTime(),event:"gtm.js"});var m=t.getElementsByTagName(a)[0],r=t.createElement(a);r.async=!0,r.src="https://www.googletagmanager.com/gtm.js?id=GTM-MZGZPJC",m.parentNode.insertBefore(r,m)}(window,document,"script","dataLayer")</script><link href="/publish/02_2021/hy_santafefamily_0221/static/css/main.0bf49043.chunk.css" rel="stylesheet"></head><body><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPRJ2Q" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><noscript>You need to enable JavaScript to run this app.</noscript><div id="root"></div><script>!function(e){function t(t){for(var n,o,i=t[0],c=t[1],l=t[2],s=0,p=[];s<i.length;s++)o=i[s],Object.prototype.hasOwnProperty.call(a,o)&&a[o]&&p.push(a[o][0]),a[o]=0;for(n in c)Object.prototype.hasOwnProperty.call(c,n)&&(e[n]=c[n]);for(f&&f(t);p.length;)p.shift()();return u.push.apply(u,l||[]),r()}function r(){for(var e,t=0;t<u.length;t++){for(var r=u[t],n=!0,o=1;o<r.length;o++){var c=r[o];0!==a[c]&&(n=!1)}n&&(u.splice(t--,1),e=i(i.s=r[0]))}return e}var n={},o={1:0},a={1:0},u=[];function i(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,i),r.l=!0,r.exports}i.e=function(e){var t=[];o[e]?t.push(o[e]):0!==o[e]&&{4:1}[e]&&t.push(o[e]=new Promise((function(t,r){for(var n="static/css/"+({}[e]||e)+"."+{3:"31d6cfe0",4:"e17c7ef5"}[e]+".chunk.css",a=i.p+n,u=document.getElementsByTagName("link"),c=0;c<u.length;c++){var l=(f=u[c]).getAttribute("data-href")||f.getAttribute("href");if("stylesheet"===f.rel&&(l===n||l===a))return t()}var s=document.getElementsByTagName("style");for(c=0;c<s.length;c++){var f;if((l=(f=s[c]).getAttribute("data-href"))===n||l===a)return t()}var p=document.createElement("link");p.rel="stylesheet",p.type="text/css",p.onload=t,p.onerror=function(t){var n=t&&t.target&&t.target.src||a,u=new Error("Loading CSS chunk "+e+" failed.\n("+n+")");u.code="CSS_CHUNK_LOAD_FAILED",u.request=n,delete o[e],p.parentNode.removeChild(p),r(u)},p.href=a,document.getElementsByTagName("head")[0].appendChild(p)})).then((function(){o[e]=0})));var r=a[e];if(0!==r)if(r)t.push(r[2]);else{var n=new Promise((function(t,n){r=a[e]=[t,n]}));t.push(r[2]=n);var u,c=document.createElement("script");c.charset="utf-8",c.timeout=120,i.nc&&c.setAttribute("nonce",i.nc),c.src=function(e){return i.p+"static/js/"+({}[e]||e)+"."+{3:"c2a06cbc",4:"bf83c723"}[e]+".chunk.js"}(e);var l=new Error;u=function(t){c.onerror=c.onload=null,clearTimeout(s);var r=a[e];if(0!==r){if(r){var n=t&&("load"===t.type?"missing":t.type),o=t&&t.target&&t.target.src;l.message="Loading chunk "+e+" failed.\n("+n+": "+o+")",l.name="ChunkLoadError",l.type=n,l.request=o,r[1](l)}a[e]=void 0}};var s=setTimeout((function(){u({type:"timeout",target:c})}),12e4);c.onerror=c.onload=u,document.head.appendChild(c)}return Promise.all(t)},i.m=e,i.c=n,i.d=function(e,t,r){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(i.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)i.d(r,n,function(t){return e[t]}.bind(null,n));return r},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/publish/02_2021/hy_santafefamily_0221/",i.oe=function(e){throw console.error(e),e};var c=this["webpackJsonpdocs-app"]=this["webpackJsonpdocs-app"]||[],l=c.push.bind(c);c.push=t,c=c.slice();for(var s=0;s<c.length;s++)t(c[s]);var f=l;r()}([])</script><script src="/publish/02_2021/hy_santafefamily_0221/static/js/2.84d2e428.chunk.js"></script><script src="/publish/02_2021/hy_santafefamily_0221/static/js/main.08c62098.chunk.js"></script></body></html>