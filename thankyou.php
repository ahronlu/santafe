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

$phone_number   = "0777298508";

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



if ( $utm_source == 'GoogleDBM_YNET' ){

  $phone_number = '0772311637';

}

else if ( $utm_source == 'N12_il' ){

  $phone_number = '0772311597';

}

else if ( $utm_source == 'mako_il' ){

  $phone_number = '0772312600';

}

else if ( $utm_source == 'IDX' ){

  $phone_number = '0772309132';

}

else if ( $utm_source == 'YouTube_trueview' ){

  $phone_number = '0779707167';

}

else if ( $utm_source == 'YouTube_bumper' ){

  $phone_number = '0779977810';

}

else if ( $utm_source == 'Icar' ){

  $phone_number = '0772311617';

}
else if ( $utm_source == 'Facebook_Postlink' ){

  $phone_number = '0779707107';

}
else if ( $utm_source == 'Facebook_leads_Inbox' ){

  $phone_number = '0779973166';

}
else if ( $utm_source == 'Google_SEARCH' ){

  $phone_number = '0779979846';

}
else if ( $utm_source == 'Google_Discovery' ){

  $phone_number = '0772305070';

}
else if ( $utm_source == 'Google_SEARCH_ Competitors' ){

  $phone_number = '0772315270';

}
else if ( $utm_source == 'Google_SEARCH_Competitors' ){

  $phone_number = '0772315270';

}
else if ( $utm_source == 'Google_GDN' ){

  $phone_number = '0772313807';

}
else if ( $utm_source == 'Google_GDN_RMK' ){

  $phone_number = '0779707162';

}
else if ( $utm_source == 'Hyundai_website' ){

  $phone_number = '0779706904';

}
?>



<html>

  <head>


      <!-- Page Meta  -->

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">

        <meta name="keywords" content="">

        <meta name="author" content="Activated ">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="assets/css/accessibility.css">

          <link rel="icon" href="./favicon.png"/>
          
        <title> Hyundai PALISADE </title>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MZGZPJC');</script>
        <!-- End Google Tag Manager -->


        <!-- End page meta  -->



          <style type="text/css">



          html , body {

            padding: 0;

            margin: 0;

            direction: rtl;



          }



          h1 , 

          h2,

          h3,

          h4,

          h5,

          h6,

          p {

            padding: 0;

            margin: 0;

          }

          .ac-show-on-mobile {

            display: none!important;

          }



          .ac-primery-color {

            color: #EF3A4E

          }

          button {
            cursor: pointer;
          }


          

        

             .ac-flex {
            display: -webkit-box; 
            display: -ms-flexbox; 
            display: flex; 
            }
            .ac-align-center {
            -webkit-box-align: center; 
            -ms-flex-align: center; 
            align-items: center;
            }

           
            .ac-align-start {
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: flex-start;
            }

            .ac-align-end {
                -webkit-box-align: end;
                -ms-flex-align: end;
                align-items: flex-end;
            }
            .ac-justify-center {

            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;

            }


             .ac-justify-end {

            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;

            }

            .ac-justify-between {
                 -webkit-box-pack: justify;
                 -ms-flex-pack: justify;
                 justify-content: space-between;
            }

             .ac-justify-even {
              
 -webkit-box-pack: justify;
                 -ms-flex-pack: justify;
                 justify-content: space-evenly;
            }
            .ac-text-align-center {
                text-align: center;
            }
            .ac-text-align-right {
                text-align: right;
            }



            .ac-align-text-center {

                text-align: center;

            }

            .ac-logo-wrapper {

                /*text-align: center;*/

                margin-bottom: 1vw;

            }







           

            .ac-col-2 {

                width: 70vw;

            }



            h1 {

            

                font-size: 3vw;

                font-weight: bold;

                line-height: 1;

                margin-top: 0;

           

            }



            p {

                font-size: 54px;

                font-size: 1.4vw;

                line-height: 1;

                padding-bottom: 0;

            }



            .banner-bg {

   

                height: 86vh!important;

                background-size: cover;

                background-position: center center;

                color: #fff;



            }



            .ac-banner-bg-inner {

                width: 65vw;
                margin: 0 auto;
                padding-top: 2vw;
                text-align: center;
                direction: rtl;
                position: relative;
                padding-right: 0;

            }

            

            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */

              font-family: 'AlmoniDLAAA';

              font-size: 1vw;

              color: #000;

            }

            ::-moz-placeholder { /* Firefox 19+ */

             font-family: 'AlmoniDLAAA';

             font-size: 1vw;

             color: #000;

            }

            :-ms-input-placeholder { /* IE 10+ */

             font-family: 'AlmoniDLAAA';

             font-size: 1vw;

             color: #000;

            }

            :-moz-placeholder { /* Firefox 18- */

              font-family: 'AlmoniDLAAA';

              font-size: 1vw;

              color: #000;

            }   





            .ac-form-wrapper {

                width: 30vw;
                background: #E4DBD2;

            }



            .ac-leagel-mobile {
              display: none;
            }

            .ac-form-inner {

                  padding: 2vw;

            }

            .ac-banner-bg-inner strong {
                font-weight: 100;
                margin-top: -1.4vw;
                float: right;
            }


            .ac-form-wrapper input,
            .ac-form-wrapper select
             {

                width: 100%;

                height: 6vh;

                margin-bottom: 1vw;

                border-radius: 0;

                border: 0;

                border: 0;

                text-indent: 1vw;


                 font-family: 'AlmoniDLAAA';

              font-size: 1vw;

              color: #000;
            }



            .form h3 {

                font-size: 1.5vw;

                margin-bottom: 1vw;

                font-weight: bold;



            }

         
        

            .ac-link-wrapper  a {

                font-size: 1.7vw;

                color: #000;

                text-decoration: none;

            }

            .ac-logo-2-wrapper {

                margin-top: 2vw;

                margin-bottom: 2vw;

            }


            .ac-slick .slick-slide {
                position: relative;
            }

            .ac-slick .slick-slide  h1 {
                font-family: 'HyundaiSansText-Medium';
                color: #000;
            }


            .ac-slick .ac-slider-1 h1 {
               font-family: 'AlmoniDLAAA';
            }

           .ac-slick .ac-slider-1 .ac-slide-text h3 {
                font-family: 'HyundaiSansText-Medium';
                line-height: 1;
                font-size: 2.5vw;
            }

             .ac-slick .ac-slider-1 .ac-slide-text h3 span {
              font-size: 1.5vw
             }
            .ac-legal-text small {

                position: absolute;
                bottom: 2.5vw;
                right: 3vw;
                font-size: 1.2vw;
                text-align: right;
                font-weight: 400;
                direction: rtl;

            }



            .ac-checkbox-wrapper {

              text-align: right;

                display: -webkit-box;

                display: -ms-flexbox;

                display: flex;

                -webkit-box-align: FLEX-START;

                -ms-flex-align: FLEX-START;

                align-items: FLEX-START;

            }

            .ac-checkbox-wrapper label {
                font-size: .9vw;
            }

            .ac-leagal-v2 {

                margin-top: .4vw;
                float: right;
                margin-bottom: 1vw;
                margin-right: -1.7vw;
            }



            .ac-checkbox-div {

                width: 3vw;

            }





              .ac-form-wrapper .ac-checkbox-div input{

                width: 2vw;

                height: auto;

                    height: 1.4vw;

            }





            .ac-dir-left {
                direction: ltr;
            }

            .submit {

                background: #012C5F;

                border: 0;

                /*width: 49%;*/
                width: 100%;

                padding-top: .2vw;

                padding-bottom: .2vw;

                font-size: 1.4vw;

                color: #fff;

                font-family: 'AlmoniDLAAA';

                font-weight: bold;

                border-radius: 0;

                line-height: 1;

                height: 6vh;

                cursor: pointer;



            }

            .ac-top-part {
                align-items: center;
                justify-content: flex-start;
                direction: ltr;
                padding-left: 2vw;
                padding-top: 1vw;
            }


            .ac-after-main {}
            .ac-after-main .ac-col-2 {
                padding-top: .5vw;
            }

            .ac-after-main .ac-col-2 .ac-banner-bg-inner {
                padding-top: 0;
                padding-right: 1vw;
            }



            .ac-after-main p {
                font-size: 1.7vw;
                margin-bottom: .6vw;
            }

         
            .ac-footer-legal .ac-banner-bg-inner {
                font-size: 1.4vw;
                width: 97%;
                padding-top: 1vw!important;
                margin-top: -.8vw;
                padding-right: 0;
            }

            .ac-footer-legal .ac-col-2 {
                width: 100%;
                border-top: 0;
                padding-top: .2vw;
            }
            .ac-footer-legal a {
                color: #000;
                text-decoration: none;
            }
            .ac-square {
                padding: 0 .35vw;
               
                width: 1vw;
                display: inline-block;
                text-align: center;
            }

             .ac-square-1 {
                background: #4170B6;
                color: #fff;

             }
             .ac-square-2 {
                background: #1B6FB7;
                color: #fff;
                
             }
             .ac-square-3 {
                background: #E9CA1A;
                color: #000;
             }

            .slick-next, .slick-prev {
                top:60%!important;
            }
            .slick-arrow {
                position: absolute;
                /*left: 0;*/
                top:0;
                
            }
            .slick-prev {
                left: 4vw!important;
                z-index: 999;

            }
            .slick-next {
                right: 4vw!important;
                z-index: 999;
                
            }

        


            .ac-text-align-right {
              text-align: right;
            }


            .ac-slider-1  h1  {
              text-align:right!important
            } 

            .ac-slider-2 h1 ,
            .ac-slider-3 h1 
              {
              direction: ltr;
              text-align: right!important;
            }

            .ac-tab {
              display: none;
            } 

            .ac-tab.ac-active {
              display: block;
            }
            /*ac-tab-1*/
            /*ac-tab-2*/


            .ac-nav-section {
              background: #012C5F
            }
            .ac-nav {
                list-style: none;
            }
            
            .ac-nav li  {
                margin-left: .5vw;
                margin-right: .5vw;
            } 

            .ac-nav li  a,
              .ac-nav li  span {
                font-size: 1.4vw;
                color: #000;
                text-decoration: none;
                color: #fff;
            }
            
               .ac-nav-section.ac-active {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              background: #012C5F;
              z-index: 99
          }
            
            .ac-col-50 {
              width: 50vw;
            }

            .ac-full-section-bg-height {
              background-size: cover!important;
              background-position: center center!important;
            }


            .ac-section-tab-1 .ac-row {
              height: 40vw;
            }

          /*.ac-section-tab-2  ,
          .ac-section-tab-4 ,
          .ac-footer {
              background: #E3DCD3;
          }
          */


          .ac-slider-nav{
              background: #E3DCD3;
          }
          




            .ac-tab .ac-section  .ac-inner {
              padding: 1vw;
            }

            .ac-section-title-weapper h2 {
              font-size: 3vw;
              font-weight: 100
            }
            .ac-section  {
              text-align: right;
            }
            .ac-section-tab-padding {
              /*padding-top: 3vw;
              padding-bottom: 3vw;
              */

              padding-top: 5vw;
              padding-bottom: 5vw;
              

            }
            .ac-section-tab-padding.ac-nav-section ,
            .ac-section-tab-padding.ac-section-footer ,
            .ac-section-tab-padding.ac-slider-nav{
                padding-top: .5vw;
                padding-bottom: .5vw;

            }

            .ac-section-tab-1.ac-section-tab-padding {
              padding-top: 0;
            }

           

            .ac-section-text-weapper-small small {
              font-size: 1vw;
            }
            .ac-width-100-precent ,
            .ac-section-tab-1 .ac-inner-row-col.ac-width-100-precent  {
              width: 100%;
            }

          .ac-section-tab  .ac-section-text-weapper-small p {
              font-size: .9vw;
          }
            .ac-section-tab .ac-section-text-weapper-small p strong{}

            .ac-section-tab .ac-inner-row-col {
              margin-bottom: 3vw;
            }
            .ac-section-tab .ac-inner-row-col  .img-wrapper {
                  width: 23vw;
            }
            .ac-section-tab .ac-inner-row-col  .img-wrapper  img {
                  width: 20.5vw;
            }
           .ac-section-tab-2  .ac-row-3 small {

            }
            .ac-section-text-weapper ,
            .ac-section-title-weapper  {
              margin-bottom: 1vw;
            }


             .ac-section-tab-1 .ac-inner-row-col {
              width: 15vw;
            }
            .ac-section-tab-1 .ac-inner-row-col .img-wrapper  {}
            .ac-section-tab-1 .ac-inner-row-col .img-wrapper img  {
                  width: 15vw;     
            }


            .ac-section-tab-1 .ac-section-text-weapper-small p {
              font-size: 1.2vw;
              padding-top: .5vw;
              padding-bottom: .5vw;
            }

            .ac-slider-nav {}
            .ac-slider-nav .ac-container {
              width: 95vw;
              margin: 0 auto;
            }
            .ac-slider-nav .ac-container .ac-col-1 {}
            .ac-slider-nav .ac-container .ac-col-1  button {}

            .ac-remove-margin-bottom {
              margin-bottom: 0!important
            }

            .ac-remove-margin-bottom .ac-section-text-weapper-small {
              margin-bottom:0!important 
            }

            .ac-footer  {
              display: none;
              margin-top: .5vw;
              /*margin-bottom: .5vw;*/
            }

            .ac-footer.ac-active {
              display: block;
            }

            .ac-footer .ac-container {
                width: 90vw;
                margin: 0 auto;
            }

           .ac-footer .ac-container  .ac-row {}

            .ac-footer .ac-container  .ac-row .ac-footer-box {
              width: 17vw
           }

            .ac-footer .ac-container  .ac-row .img-wrapper {
                  width: 15vw
            }
            .ac-footer .ac-container  .ac-row .img-wrapper  img {
              width: 15.5vw
            }

            .ac-footer .ac-text-wrapper p {
              font-size: 1vw;
              color: #012C5F;
              margin-top: 5px;
            }

            .ac-footer-2 {
              background: #1C1C1C;
            }


            .ac-footer-2 .ac-col  {
              width: 50%;
            }

            .ac-footer-2 .ac-logo-wrapper {
              text-align: left;
              margin-bottom: 0
            }

            .ac-footer-2 .ac-footer-socials-wrapper {
              width: 10vw;
            }


        

          .ac-slider-nav-button {
              background: transparent;
              border: 0;
              font-size: 1.4vw;
              font-weight: BOLD;
          }


          /* venue */

          .ac-change-color-img-wrapper img {
            width: 100%;
          }
          #ac-tab-2-section-3 .ac-row {
              height: 20vw;
          }


          /*mobile*/

          .ac-show-on-mobile {
            display: none;
          }


           /* v3 */

          .ac-slider-text-1 {
            position: absolute;
            left: 12vw;
            bottom: 2vw;
            text-align: left;
          }

          .ac-slider-text-2 {
            position: absolute;
            left: 42vw;
            bottom: 2vw;
            text-align: left;
          }

          .ac-slide-text  {
                font-size: 2vw;
          }
          .ac-slide-text  h3 {}

          .ac-img-box {
              width: 23vw;
          }
          .ac-img-box  img{
            width: 22vw;
          }
          .ac-img-box .ac-text-wrapper{}
          .ac-img-box .ac-text-wrapper p {}

          #ac-tab-2-section-4 .ac-col-2{  
            height: 40vw
          }


         .ac-tab-2 .ac-section-tab-4 .ac-img-wrapper-0 img {
              width: 20vw;
              margin-bottom: 6vw;
          }
          .ac-tab-2 .ac-section-tab-4 .ac-row-1  .ac-inner-row-col-1{
                width: 30vw;
          } 

          .ac-tab-2 .ac-section-tab-4 .ac-row-1  .ac-inner-row-col-2{
                width: 17vw;
                margin-top: 2vw;
          } 
          
        .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-img-wrapper-2 {
               width: 17vw; 
              text-align: center;
          }

          .ac-tab-2 .ac-section-tab-4 .ac-row-2  .img-wrapper {}
          .ac-tab-2 .ac-section-tab-4 .ac-row-1  .ac-inner-row-col .ac-img-wrapper-1 img {
              width: 28vw;
          } 

          .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-inner-row-col .ac-img-wrapper-2 img {
              width: 12vw;
              margin: 0 auto;
          }
                 

          @media all and (max-width: 1000px) {
            .ac-footer-legal {
              display: none!important;
            }
            .ac-main {
              flex-wrap: wrap;
            }
            .ac-show-on-mobile {
              display: block!important;
            }

            .ac-show-on-mobile-show-flex {
              display: flex;
            }

             .ac-hide-on-mobile {
              display: none!important;
            }


            .ac-form-wrapper {
              width: 100%;
            }

            .ac-main .ac-col-2 {
              width: 100%;
            }

            .ac-slider-1,
            .ac-slider-2,
            .ac-slider-3 {
              background: none!important
            }

            .ac-c2c {
              position: fixed;
              top: 40vw;
              right: 0;
              z-index: 99;
            }
            .ac-c2c img {
              width: 15vw;
            }

            .banner-bg {
              height: auto!important;
            }
            .slick-slide img {
                width: 100%;
            }

            .ac-top-part .ac-inner {
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              justify-content: space-between;
              width: 100%;
            }

            .ac-main .ac-banner-bg-inner {
              position: absolute;
              top:2vw;
              right: 2vw;
            }

             .ac-main .ac-banner-bg-inner h1 {
              font-size: 6vw
             }

             .ac-logo-wrapper-1 {}
             .ac-logo-wrapper-1 img {
                width: 10vw;
                position: relative;
                top: 3vw;
                right: 5vw;
            }
             .ac-logo-wrapper-2 {}
             .ac-logo-wrapper-2 img {
              width: 15vw;
             }

             .ac-section-title-weapper h2 {
                  font-size: 8vw;
                  font-weight: 100;
              }

              p{
                font-size: 5vw;
              }

              .ac-flex-wrap-on-mobile {
                flex-wrap:wrap;
              }
             .ac-col-50 {
              width: 100%;
             }

             .ac-img-mobile-wrapper  img {
              width: 100%;
             }

             .ac-section-tab-1 .ac-row {
              height: auto;
             }

             .ac-section-tab-1 .ac-inner-row-col {
              width: 49.5%;
             }

             .ac-section-tab-1 .ac-inner-row-col .img-wrapper img {
                  width: 100%;
              }

              .ac-engine-img {
                margin-top: 5vw;
                margin-bottom: 5vw;
              }

              .ac-section-tab-1 .ac-section-text-weapper-small p {
                font-size: 4vw;
              }

              .ac-section-text-weapper-small small {
                font-size: 3vw;
              }

              .ac-section-tab .ac-inner-row-col .img-wrapper {
                  width: 100%;
              }

              .ac-section-tab .ac-inner-row-col {
                  margin-bottom: 3vw;
                  width: 49.5%;
              }

              .ac-section-tab .ac-inner-row-col .img-wrapper img {
                  width: 100%;
              }
              .ac-section-tab-2 .ac-flex-wrap-on-mobile{
                justify-content: space-between;
              }

              .ac-section-tab .ac-section-text-weapper-small p {
                  font-size: 4vw;
              }


              #ac-tab-1-section-3.ac-section-tab .ac-inner-row-col {
                width: 100%;
              }

              #ac-tab-1-section-3.ac-section-tab .ac-inner-row-col .img-wrapper {
                  width: 100%;
                  display: flex;
                  flex-wrap: wrap;
                  flex-direction: column-reverse;
              }

              #ac-tab-1-section-3.ac-section-tab .ac-inner-row-col {
                margin-bottom: 6vw; 
              }

              .ac-slider-nav-button {
                font-size: 5.4vw;
              }

              .ac-footer .ac-container .ac-row .img-wrapper img ,
                 .ac-footer .ac-container .ac-row .img-wrapper {
                  width: 15.5vw;
                  width: 100%;
              }
              .ac-footer .ac-container .ac-row .ac-footer-box {
                  width: 48.5%;
                      margin-bottom: 3vw;
              }

              .ac-footer .ac-container {
                width: 100%;
              }
              .ac-footer .ac-text-wrapper p {
                  font-size: 4vw;
              }
              .ac-footer-2 .ac-col {
                  width: 100%;
              }
              .ac-footer .ac-container .ac-row {
                  flex-wrap: wrap;
              }

              .ac-footer-social-wrapper img {
                width: 10vw
              }
              
              .ac-leagel-mobile ,
              .ac-tab-1-click-to-call {
                text-align: center;
                 color: #000;
              }

              
              .ac-leagel-mobile {
                margin-top: 3vw;
                margin-bottom: 3vw;
                font-size: 6vw;
                display: block;
              } 

              .ac-square {
                width: 4vw;
              }

              .ac-tab-1-click-to-call h1 {
                text-align: center!important;
                font-size: 7vw;
                color: #000;
                margin-bottom: 3vw;
              }

              .ac-tab-1-click-to-call {
                padding: 3vw;
              }

              .ac-mobile-image-wrapper {
                position: relative;
              }
              .ac-tab-1-click-to-call .ac-open-form-btn {
                  background: #012C5F;
                  border: 0;
                  width: 100%;
                  padding-top: .2vw;
                  padding-bottom: .2vw;
                  font-size: 1.4vw;
                  color: #fff;
                  font-family: 'AlmoniDLAAA';
                  font-weight: bold;
                  border-radius: 0;
                  line-height: 1;
                  height: 6vh;
                  cursor: pointer;
                  font-size: 6vw;
              }

              .ac-slick .ac-slider-1 .ac-slide-text h3 {
                font-size: 7vw;
                line-height: 1.2
              }

              .ac-slick .ac-slider-1 .ac-slide-text h3 span {
                    font-size: 4vw;
              }

              .ac-slider-text-1,
              .ac-slider-text-2 {
                   bottom: 12vw;
              }

              .ac-slider-text-2 {
                left: 55vw;

              }


              /*tab 2*/

              #ac-tab-2-section-2 .ac-inner-row-col {
                  margin-bottom: 3vw;
                  width: 100%;
              }

              #ac-tab-2-section-2.ac-section-tab .ac-inner-row-col .img-wrapper{
                  width: 100%;
                  display: flex;
                  flex-wrap: wrap;
                  flex-direction: column-reverse;

              }

              .ac-add-margin-on-mobile {
                margin-bottom: 5vw;
              }

              .ac-img-box {
                      width: 49.5%;
              }
              .ac-img-box  img {
                width: 100%;
              }

              #ac-tab-2-section-3 .ac-row {
                height: auto!important;
              }

              #ac-tab-2-section-3-b .ac-row {
                padding: 1vw;
              }

              .ac-img-box .ac-text-wrapper p {
                  font-size: 4vw;
                  margin-bottom: 4vw;
              }

              #ac-tab-2-section-4 .ac-img-mobile-wrapper-0  {
                margin-top: 5vw;
                margin-bottom: 5vw;
              }

              .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-img-wrapper-2 {
                  width: 100%;
                  text-align: center;
              }

              .ac-tab-2 .ac-section-tab-4 .ac-row-1  {
                  flex-direction: column-reverse;
              }
              .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-inner-row-col .ac-img-wrapper-1 img {
                  width: 100%;
              }

              .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-inner-row-col-1,
              .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-inner-row-col-2 {
                width: 100%;
              }

              .ac-tab-2 .ac-section-tab-4 .ac-row-1 .ac-inner-row-col .ac-img-wrapper-2 img {
                  width: 45vw;
                  margin: 0 auto;
                  margin-bottom: 2vw;
              }

              .ac-form-wrapper.ac-active {
                  width: 100%;
                  position: relative;
                  display: block;
                  top: 0;
                  height: auto;
                  z-index: 999;
                  overflow-y: scroll;
              }

               .ac-form-wrapper.ac-active .ac-form-inner {
                    padding-top: 12vw;
                }
                .ac-checkbox-div {
                  width: 9vw;
                }

                .submit {
                  margin-top: 2vw;
                  margin-bottom: 1vw;
                  font-size: 5vw;

                }
                .ac-form-wrapper .ac-checkbox-div input {
                    width: 9vw;
                    height: auto;
                    height: 5.4vw;
                }
               .ac-form-wrapper input, .ac-form-wrapper select {

                  height: 10vw;
                  font-size: 6vw;
                  margin-bottom: 3vw;
                  background: #fff;
               }  
                .form h3 {
                  font-size: 5.5vw;
                  margin-top: 2vw;
                  margin-bottom: 4vw;
                }
                .ac-checkbox-wrapper label {
                    font-size: 3.9vw;
                }
               ::-webkit-input-placeholder { /* Chrome/Opera/Safari */

                    font-size: 6vw;
                  }

                  ::-moz-placeholder { /* Firefox 19+ */

                    font-size: 6vw;

                  }

                  :-ms-input-placeholder { /* IE 10+ */

                  font-size: 6vw;

                  }

                  :-moz-placeholder { /* Firefox 18- */

                    font-size: 6vw;

                  }   




                  .ac-ios-btn {
                      position: absolute;
                      right: 5vw;
                      background: none;
                      border: none;
                      font-size: 20px;
                      font-weight: 900;
                      top: 10px;
                  }

              .ac-keep-showing {
                display: block!important;
              }

              .ac-footer-2 .ac-footer-socials-wrapper {
                  width: 40vw;
                  margin: 0 auto;
                  margin-top: 4vw;
                  margin-bottom: 4vw;
              }

              .ac-footer-2 .ac-logo-wrapper {
                  text-align: center;
                  border-top: 2vw solid #898989;
                  padding-top: 3vw;
                  padding-bottom: 3vw;
              }


              .ac-footer-2 .ac-logo-wrapper img {
                width: 25vw;
              }

              .ac-footer-legal .ac-banner-bg-inner {
                    position: relative!important;
                    right: 0;
                    top: 0;
                    margin-top: 1vw;
                    margin-bottom: 3vw;
                }

              .ac-bottom-leagel {
                  display: none;
                  font-size: 4vw;
                  text-align: center;
                  padding: 0;
                  margin: 0;
                  width: 100%;
              }
              .ac-bottom-leagel-0 {
                display: none!important;
              }



               .ac-tab-2 .ac-section-tab-4 .ac-img-wrapper-0 img {
                    margin-bottom: 2vw;
                }
                .ac-tab-2 .ac-section-tab-4 .ac-row-1  .ac-inner-row-col-2{

                      margin-top: 0;
                } 
                
          }

          .ac-tab-1-click-to-call {
              display: none;
            }

            .ac-tab-1-click-to-call.ac-active {
              display: block;
            }
            
            .ac-bottom-leagel {
              display: none;
            }

            .ac-bottom-leagel.ac-active {
              display: block;
            }


            .ac-square-two {
              background: #106649
            }
            

            .ac-square-seven {
                background: #3C70B7;
                color: #fff;
            }

            .ac-square-six {
                background: #1A6EB7;
                color: #fff;
            }

            .ac-square-eight {
              background: #F5F000
            }



            /* v3 */

            .ac-slick .ac-slider-3  h1 {
                color: #fff!important;
            }

            .submit-2 {
              background: #767770;
            } 

            #ac-tab-2-section-2 {
              padding-top: 0!important;
            }

            #ac-tab-2-section-1 {
              padding-bottom: 0!important
            }

            .ac-tab-2 .ac-section-tab-1 .ac-row {
              height: auto;
            }
            @media all and (min-width: 1000px) {
              #ac-tab-1-section-2 .ac-inner ,
              #ac-tab-1-section-3 .ac-inner , 
              #ac-tab-2-section-2 .ac-inner,
              #ac-tab-2-section-3 .ac-inner ,
              #ac-tab-1-section-2 .ac-inner {
                padding-top: 0;
                margin-top: -.5vw;
              }

              .ac-form-wrapper {
                display: flex;
    align-items: center;
    justify-content: center;
              }
              .ac-form-inner {
                margin: auto;
              }
            }



            #player {
              width: 100%;
            }

            /* @media all and (max-width: 1000px){
              .ac-form-wrapper {
                height: 85vh;
                display: flex;
                justify-content: center;
                align-items: center;
              }
            } */
            @media all and (min-width: 1000px){
              .ac-form-wrapper {
                width: 100%;
                height: 89vh;
              }
              .ac-form-inner {
                width: 100%;
              }
            }


            .embed-responsive {
              position: relative;
              display: block;
              height: 0;
              padding: 0;
              overflow: hidden;
            }
            .embed-responsive .embed-responsive-item,
            .embed-responsive iframe,
            .embed-responsive embed,
            .embed-responsive object,
            .embed-responsive video {
              position: absolute;
              top: 0;
              bottom: 0;
              left: 0;
              width: 100%;
              height: 100%;
              border: 0;
            }
            .embed-responsive-16by9 {
              padding-bottom: 56.25%;
            }
            .embed-responsive-4by3 {
              padding-bottom: 75%;
            }

            html, body {
                background: rgb(228, 219, 210);
            }
          </style>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: 'aPL9C3rwiwY',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        // if (event.data == YT.PlayerState.PLAYING && !done) {
        //   setTimeout(stopVideo, 6000);
        //   done = true;
        // }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>

  </head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZGZPJC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php 

function AC_render_picture($src = false , $webpSrc = false , $showLoader = true ){


    $html = '

        <picture>
                <img

                    data-src="'.$src.'"

                    ';


        if ( $showLoader === true ) {
            $html  .= 'src="./assets/img/loader.png"';
        }
        
        

        $html .= '
                     

                    alt=""

                    class="lazy"

                />
            </picture>
    ';

    if ( $webpSrc != false ) {

        $html  = '
            <picture>
                    <source

                        type="image/webp"

                        data-srcset="'.$webpSrc.'"

                        src="./assets/img/loader.png"
                        class="lazy"

                    />
                    <img

                        src="./assets/img/loader.png"
                             data-src="'.$src.'"

                           

                        alt=""

                        class="lazy"

                    />
                </picture>

            ';
    }
    

    return $html ;
}

?>



  

  <!--Form-Section-->

<div id="form-section" class="ac-align-text-center">



  <!-- C2C -->

  <!-- <a href="tel:<?php echo $phone_number ?>" class="ac-show-on-mobile ac-c2c">

        <picture>

            <source

                type="image/webp"

                data-srcset="./assets/img/c2c.webp?v=1.1"

                

            />

            <img

                data-src="./assets/img/c2c.png"

                   src="./assets/img/c2c.png"

                alt=""

                class="lazy"

            />

        </picture>

  </a>  -->

  <!-- /C2C -->

    <div class="ac-flex ac-top-part">

        <div class="ac-inner">

            





            <div class="ac-logo-wrapper ac-logo-wrapper-1 ac-hide-on-mobile">
                <?php echo AC_render_picture( './assets/img/logo.png' , false , false); ?>
            </div>
            
            <div class="ac-logo-wrapper ac-logo-wrapper-2 ac-show-on-mobile">
                <?php echo AC_render_picture( './assets/img/mobile/logo.gif' , false , false); ?>
            </div>

            <!-- <div class="ac-logo-wrapper ac-logo-wrapper-1 ac-show-on-mobile">
                <?php echo AC_render_picture( './assets/img/mobile/menu.gif' , false , false); ?>
            </div> -->
            



           

           
        </div>



      

    </div>




    <!-- ac-main -->
    <div class="ac-flex ac-main">







        <div class="ac-form-wrapper">

            <div class="ac-form-inner">

                <!-- <div class="close-form-wrapper ac-show-on-mobile">
                    <button class="ac-ios-btn ac-toggole-form">
                        X
                    </button>

                </div> -->






               

                 <!-- form  -->

                <form id="form-1" class="form">

                    <h3 class="ac-title ">

                       

                      תודה, פרטיך נקלטו<br/>
                      אחד מנציגינו יחזור<br/>
                      אליך בהקדם!


                    </h3>

                  


                   
                   
                </form>

                <!-- /form -->

                <!-- end form -->

            </div>

        </div>


      
        

      

    </div>
    <!-- .ac-main -->
    
    <!--  .ac-tab -->
        <div class="ac-tab ac-tab-1">


            <section class="ac-section ac-section-tab-0 ac-section-tab-padding ac-nav-section ac-hide-on-mobile" id="ac-nav-section-1">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                        <ul class="ac-nav  ac-flex ac-flex-align-center ac-justify-center">
                          <li class="ac-nav-item">
                                <a href="#ac-tab-1-section-1">
                                  ביצועים
                                </a>
                          </li>
                          <li class="ac-nav-item ac-nav-divder">
                                <span>
                                  |
                                </span>
                          </li>
                          <li class="ac-nav-item">
                                <a href="#ac-tab-1-section-2">
                                    מבט מבפנים
                                </a>
                          </li>
                          <li class="ac-nav-item ac-nav-divder">
                               <span>
                                  |
                                </span>
                          </li>
                          <li class="ac-nav-item">
                                 <a href="#ac-tab-1-section-3">
                                בטיחות
                              </a>
                          </li>
                        </ul>
                    </div>  
                </div>
            </section>

            <section class="ac-section ac-section-tab-1 ac-section-tab-padding" id="ac-tab-1-section-1">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                      

                        <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                            <div class="ac-inner">
                                <div class="ac-section-title-weapper">
                                  <h2>
                                    יונדאי <span class="en-font">KONA</span> הייבריד
                                    <br/>
                                      כבר כאן.
                                  </h2>
                                </div>

                                <div class="ac-section-text-weapper">
                                  <p>
                                     כל העוצמה בדגם האהוב, עכשיו גם בגרסה עם<br/>
                                     מערכת הנעה היברידית השילוב המושלם של <span class="en-font">SUV</span><br/>
                                     ומרשים עם יעילות וחסכון*
                                  </p>
                                </div>

                                <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-1">
                                   <?php echo AC_render_picture( './assets/img/mobile/4.jpg' , false , false); ?>
                                </div>

                                 <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-2 ac-engine-img">
                                   <?php echo AC_render_picture( './assets/img/mobile/5-b.png' , false , false); ?>
                                </div>

                              <div class=" ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-justify-between">
                                  <div class="ac-col ac-inner-row-col ac-dke">
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-2.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          מנופי העברת הילוכים מההגה
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-2">
                                      <?php echo AC_render_picture( './assets/img/section/img-3.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                           כונס אוויר לשיפור האווירודמניות
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="ac-col ac-inner-row-col ac-hide-on-mobile">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-4.png' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">

                                      </div>
                                    </div>
                                  </div>
                               </div>

                               <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-row-3">
                                  
                                  <div class="ac-col ac-inner-row-col ac-width-100-precent">
                                   
                                
                                      
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <small>
                                         *לעומת הדגם הקודם, על-פי נתוני היצרן לפי בדיקות מעבדה. צריכת הדלק בפועל מושפעת, בין היתר, 3 גם מתנאי הדרך, מתחזוקת<br class="ac-hide-on-mobile"/>
                                         הרכב, וממאפייני הנהיגה ויכולה להיות שונה מהמצוין.
                                        </small>
                                      </div>
                                  

                                  </div>

                                  
                                
                               </div>
                            </div>
                        </div>
                        <!-- /.ac-col -->

                          <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/section/img-1.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>
            <!-- serction -->

            <section class="ac-section ac-section-tab ac-section-tab-2 ac-section-tab-padding" id="ac-tab-1-section-2">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                      

                      

                          <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/section/img-5.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->

                          <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                            <div class="ac-inner">
                                <div class="ac-section-title-weapper">
                                  <h2>
                                     <span class="en-font">KONA</span> הייבריד- <br class="ac-show-on-mobile"/> מבט מפנים.
                                  </h2>
                                </div>

                               
                              <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-1 ac-flex-wrap-on-mobile">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-6.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p class="ac-hide-on-mobile">
                                          <strong>
                                            מערכת מולטימדיה “8 מקורית מתקדמת
                                          </strong>
                                          <br/>
                                          עם אפשרות חיבור <span class="en-font">*Apple CarPlay ,Android Auto</span>
                                        </p>

                                        <p class="ac-show-on-mobile">
                                          <strong>
                                            מערכת מולטימדיה “8 מקורית<br/>
                                            מתקדמת  עם אפשרות חיבור<br/>
                                            *Apple CarPlay ,Android Auto
                                          </strong>
                                          <br/>
                                        
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-7.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          <strong>
                                           לוח מחוונים “ 4.2
                                          </strong>
                                          
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-2 ac-flex-wrap-on-mobile">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-8.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          <strong>
                                            תיבת 6 הילוכים אוטומטית כפולת מצמדים (DCT)
                                          </strong>
                                          
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-9.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          <strong>
                                           EPB- בלם יד חשמלי
                                          </strong>
                                          
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-row-3 ">
                                  
                                  <div class="ac-col ac-inner-row-co ac-remove-margin-bottom">
                                   
                                
                                      
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                           *באמצעות טלפון נייד התומך ומאפשר זאת ובכפוף למגבלות שונות.
                                        </p>
                                      </div>
                                  

                                  </div>

                                  
                                
                               </div>
                               <!--  ac-row -->
                               
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>
            <!-- section -->

             <section class="ac-section ac-section-tab ac-section-tab-3 ac-section-tab-padding" id="ac-tab-1-section-3">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                      

                      

                       

                          <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                            <div class="ac-inner">
                                <div class="ac-section-title-weapper">
                                  <h2>
                                      מערכות בטיחות <br class="ac-hide-on-mobile"/>
                                      מתקדמות
                                  </h2>
                                </div>

                                
                              <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-1 ac-flex-wrap-on-mobile">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-10.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                          <p>
                                          <strong>
                                           בקרת סטיה מנתיב + תיקון הגה (LKA)
                                          </strong>
                                          <br/>
                                         סיוע אקטיבי בשמירה על נתיב הנסיעה, הכולל חיווי בלוח<br/>
                                         השעונים, התראה קולית ותיקון אקטיבי של נתיב הנסיעה.
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-12.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                          <p>
                                          <strong>
                                            מערכת למעבר אוטומטי בין אור גבוה לנמוך (HBA)
                                          </strong>
                                          <br/>
                                          החלפה אוטומטית בין אור גבוה לנמוך בהתאם לתנאי הדרך,<br/>
                                          מונעת סינוור רכבים ומגבירה את הבטיחות בנהיגת לילה.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-flex-wrap-on-mobile ac-row-2">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-13.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                       <p>
                                          <strong>
                                           בלימה אוטונומית במצבי חירום (FCA)
                                          </strong>
                                          <br/>
                                          מערכת להתראה מפני סכנת התנגשות, ובלימה אקטיבית<br/>
                                          של הרכב במצב חירום
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-14.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          <strong>
                                           מערכת התראה על עייפות הנהג (DAW)
                                          </strong>
                                          <br/>
                                          מערכת המזהה סימני עייפות אצל הנהג/ת, מתריאה <br/>
                                          על כך וממליצה על הפסקת התרעננות.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-row-3">
                                  
                                  <div class="ac-col ac-inner-row-col ac-remove-margin-bottom">
                                   
                                
                                      
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                           מערכות הבטיחות פועלות תחת תנאים ומגבלות שונות ואינן באות במקום כללי נהיגה זהירים כדין.
                                        </p>
                                      </div>
                                  

                                  </div>

                                  
                                
                               </div>

                          
                               
                            </div>
                        </div>
                        <!-- /.ac-col -->

                           <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/section/img-15.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>

            <section class="ac-section ac-section-tab ac-section-tab-4 ac-section-tab-padding ac-slider-nav" id="ac-tab-1-section-4">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                          <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-100 ac-flex  ac-flex-align-center ac-justify-between ac-width-100-precent">
                              

                              <div class="ac-slider-nav-button-wrapper">
                                  <button class="ac-slider-nav-button" data-goto="2">
                                    <span class="ac-btn-arrow">
                                      < 
                                    </span>
                                    <span class="ac-text en-font">
                                     VENUE
                                    </span>
                                  </button>
                              </div>

                              <div class="ac-slider-nav-button-wrapper">
                                  <button class="ac-slider-nav-button" data-goto="0">
                                    <span class="ac-text">
                                      לעמוד הקמפיין
                                    </span>
                                    <span class="ac-btn-arrow">
                                      >
                                    </span>
                                  </button>
                              </div>

                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>



        </div>
        <!-- /ac-tab -->

         <!--  .ac-tab -->
        <div class="ac-tab ac-tab-2">
            

            <section class="ac-section ac-section-tab-0 ac-section-tab-padding ac-nav-section ac-hide-on-mobile" id="ac-nav-section-1">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                        <ul class="ac-nav  ac-flex ac-flex-align-center ac-justify-center">
                          <li class="ac-nav-item">
                                <a href="#ac-tab-2-section-1">
                                  עיצוב
                                </a>
                          </li>
                          <li class="ac-nav-item ac-nav-divder">
                                <span>
                                  |
                                </span>
                          </li>
                          <li class="ac-nav-item">
                                <a href="#ac-tab-2-section-2">
                                   בטיחות
                                </a>
                          </li>
                          <li class="ac-nav-item ac-nav-divder">
                               <span>
                                  |
                                </span>
                          </li>
                          <li class="ac-nav-item">
                                 <a href="#ac-tab-2-section-3">
                                מולטימדיה
                              </a>
                          </li>

                          <li class="ac-nav-item ac-nav-divder">
                               <span>
                                  |
                                </span>
                          </li>
                          <li class="ac-nav-item">
                                 <a href="#ac-tab-2-section-4">
                                ביצועים
                              </a>
                          </li>
                        </ul>
                    </div>  
                </div>
            </section>

            <section class="ac-section ac-section-tab-1 ac-section-tab-padding " id="ac-tab-2-section-1">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center ac-flex-wrap-on-mobile">
                      

                        <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                            <div class="ac-inner">
                                <div class="ac-section-title-weapper">
                                  <h2>
                                    לצבוע את העיר מחדש.
                                    
                                  </h2>
                                </div>

                                <div class="ac-section-text-weapper">
                                  <p>
                                    יונדאי VENUE בעיצוב חיצוני מרהיב, עם <Br/>
                                    אפשרות לגוון שונה בגג הרכב ובאזורים<br/>
                                    נוספים* המקנים נוכחות בולטת ומיוחדת<br/> בכל נסיעה.
                                  </p>
                                </div>

                            </div>
                        </div>
                        <!-- /.ac-col -->

                          <!--  .ac-col -->
                        <div  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height">
                            <div class="ac-inner">
                              <div class="ac-img-wrapper ac-change-color-img-wrapper ac-slider ac-slick">
                                <div>
                                  <img src="./assets/img/venue/1.png" alt="" class="">
                                  <!-- <?php echo AC_render_picture( './assets/img/venue/1.png' , false , false); ?> -->
                                </div>
                                <div>
                                  <img src="./assets/img/venue/1-a.png" alt="" class="">
                                </div>
                                <div>
                                  <img src="./assets/img/venue/1-b.png" alt="" class="">
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>
            <!-- serction -->

            <section class="ac-section ac-section-tab ac-section-tab-2 ac-section-tab-padding" id="ac-tab-2-section-2">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center ac-flex-wrap-on-mobile">
                      

                      

                          <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/venue/4.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->

                          <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                            <div class="ac-inner">
                                <div class="ac-section-title-weapper">
                                  <h2>
                                      מערכות בטיחות <br class="ac-hide-on-mobile"/>
                                      מתקדמות
                                  </h2>
                                </div>

                                <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-1 ac-add-margin-on-mobile">
                                    <?php echo AC_render_picture( './assets/img/mobile/6.jpg' , false , false); ?>
                                </div>

                                
                              <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-1  ac-flex-wrap-on-mobile">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-10.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                          <p>
                                          <strong>
                                           בקרת סטיה מנתיב + תיקון הגה (LKA)
                                          </strong>
                                          <br/>
                                         סיוע אקטיבי בשמירה על נתיב הנסיעה, הכולל חיווי בלוח<br/>
                                         השעונים, התראה קולית ותיקון אקטיבי של נתיב הנסיעה.
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-12.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                          <p>
                                          <strong>
                                            מערכת למעבר אוטומטי בין אור גבוה לנמוך (HBA)
                                          </strong>
                                          <br/>
                                          החלפה אוטומטית בין אור גבוה לנמוך בהתאם לתנאי הדרך,<br/>
                                          מונעת סינוור רכבים ומגבירה את הבטיחות בנהיגת לילה.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <!-- ac-row -->
                              <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-2  ac-flex-wrap-on-mobile">
                                  
                                  <div class="ac-col ac-inner-row-col">
                                   
                                    <div class="img-wrapper ac-img-wrapper-1">
                                      <?php echo AC_render_picture( './assets/img/section/img-13.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                       <p>
                                          <strong>
                                           בלימה אוטונומית במצבי חירום (FCA)
                                          </strong>
                                          <br/>
                                          מערכת להתראה מפני סכנת התנגשות, ובלימה אקטיבית<br/>
                                          של הרכב במצב חירום
                                        </p>
                                      </div>
                                    </div>

                                  </div>

                                  
                                  <div class="ac-col ac-inner-row-col">
                                    <div class="img-wrapper ac-img-wrapper-3">
                                      <?php echo AC_render_picture( './assets/img/section/img-14.jpg' , false , false); ?>
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                          <strong>
                                           מערכת התראה על עייפות הנהג (DAW)
                                          </strong>
                                          <br/>
                                          מערכת המזהה סימני עייפות אצל הנהג/ת, מתריאה <br/>
                                          על כך וממליצה על הפסקת התרעננות.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                               <!--  ac-row -->

                               <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap ac-row-3">
                                  
                                  <div class="ac-col ac-inner-row-col ac-remove-margin-bottom">
                                   
                                
                                      
                                      <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                        <p>
                                           מערכות הבטיחות פועלות תחת תנאים ומגבלות שונות ואינן באות במקום כללי נהיגה זהירים כדין.
                                        </p>
                                      </div>
                                  

                                  </div>

                                  
                                
                               </div>

                          
                               
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>
            <!-- section -->

             <section class="ac-section ac-section-tab ac-section-tab-3 ac-section-tab-padding" id="ac-tab-2-section-3">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                        <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                             <div class="ac-inner">
                                    <div class="ac-section-title-weapper">
                                      <h2>
                                       להתחבר לקצב האורבני<br/>
                                       מכל מקום ובכל זמן
                                      </h2>
                                    </div>

                                    <div class="ac-section-text-weapper">
                                      <p>
                                       סביבת הנהג מאובזרת ומעוצבת באופן ייחודי<br/>
                                       המותאם לצרכים שלכם עם מערכת מולטימדיה <br/>
                                       מתקדמת על גבי מסך מגע ”8 ומצלמה אחורית.
                                      </p>
                                    </div>
                                    <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-1 ">
                                        <?php echo AC_render_picture( './assets/img/mobile/7.jpg' , false , false); ?>
                                    </div>
                                </div>
                        </div>
                        <!-- /.ac-col -->

                           <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/venue/5.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>

             <section class="ac-section ac-section-tab ac-section-tab-3 ac-section-tab-padding" id="ac-tab-2-section-3-b">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-between ac-flex-wrap-on-mobile">
                        <div class="ac-img-box ac-img-box-1 ">
                              <div class="img-wrapper">
                                <?php echo AC_render_picture( './assets/img/venue/6.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                 מערכת מולטימדיה מקורית ״8 <br/>
                                 עם אפשרות חיבור למערכת <br/>
                                 *Apple Carplay ,Android Auto
                                </p>
                              </div>
                        </div>

                         <div class="ac-img-box ac-img-box-1 ">
                              <div class="img-wrapper">
                                <?php echo AC_render_picture( './assets/img/venue/7.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                               <p>
                                 ** מערכת בקרת אקלים דיגיטלית 
                                </p>
                              </div>
                        </div>

                         <div class="ac-img-box ac-img-box-1 ">
                              <div class="img-wrapper">
                                <?php echo AC_render_picture( './assets/img/venue/8.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                 לוח מחוונים דיגיטלי “3.5
                                </p>
                              </div>
                        </div>

                         <div class="ac-img-box ac-img-box-1 ">
                              <div class="img-wrapper">
                                <?php echo AC_render_picture( './assets/img/venue/9.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                  מצלמה אחורית
                                </p>
                              </div>
                        </div>

                       
                    </div>  

                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-end ac-flex-wrap-on-mobile">
                        <div class="ac-section-text-weapper ac-section-text-weapper-small">
                          * באמצעות טלפון נייד התומך ומאפשר זאת ובכפוף למגבלות שונות. **בחלק מהדגמים.
                        </div>
                       
                    </div>  
                </div>
            </section>

              <section class="ac-section ac-section-tab ac-section-tab-4 ac-section-tab-padding" id="ac-tab-2-section-4">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                        <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-50">
                             <div class="ac-inner">
                                    <div class="ac-section-title-weapper">
                                      <h2>
                                       ביצועים
                                      </h2>
                                    </div>

                                    <div class="ac-section-text-weapper">
                                      <p>
                                       מערכת ההנעה של VENUE מאפשרת<br/>
                                       ליהנות מחווית נהיגה נוחה וספורטיבית.
                                      </p>
                                    </div>

                                    <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-0 ">
                                        <?php echo AC_render_picture( './assets/img/mobile/5.png' , false , false); ?>
                                    </div>

                                    <div class="ac-show-on-mobile ac-img-wrapper ac-img-mobile-wrapper ac-img-mobile-wrapper-1 ">
                                        <?php echo AC_render_picture( './assets/img/mobile/8.jpg' , false , false); ?>
                                    </div>

                                   <div class="img-wrapper ac-img-wrapper-0 ac-hide-on-mobile">
                                      <?php echo AC_render_picture( './assets/img/venue/11.png' , false , false); ?>
                                    </div>
                                   <!-- row  -->

                                    <!-- ac-row -->
                                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-top ac-flex-wrap  ac-row-1 ac-flex-wrap-on-mobile">
                                        
                                        <div class="ac-col ac-inner-row-col ac-col ac-inner-row-col-1">
                                         
                                          <div class="img-wrapper ac-img-wrapper-1">
                                            <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                              <p>
                                                תיבת  הילוכים  אוט' רציפה IVT בעלת חלוקה ל 8  יחסי  העברה.
                                              </p>
                                            </div>
                                             <?php echo AC_render_picture( './assets/img/venue/12.jpg' , false , false); ?>
                                          </div>

                                        </div>

                                        
                                        <div class="ac-col ac-inner-row-col ac-col ac-inner-row-col-2">
                                          <div class="img-wrapper ac-img-wrapper-2">
                                          <?php echo AC_render_picture( './assets/img/venue/13.jpg' , false , false); ?>
                                            <div class="ac-section-text-weapper ac-section-text-weapper-small">
                                              <p>
                                                בורר מצבי נהיגה  | מערכת בקרת<br/>   
                                                אחיזה מתקדמת  2WD
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                     </div>
                                     <!--  ac-row -->
                                   <!-- row -->
                              </div>
                        </div>
                        <!-- /.ac-col -->

                           <!--  .ac-col -->
                        <div   data-bg="url('./assets/img/venue/10.jpg')"  class="ac-col ac-col-2 ac-col-50 lazy ac-full-section-bg-height ac-hide-on-mobile">
                            <div class="ac-inner">
                              
                            </div>
                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>

            <section class="ac-section ac-section-tab ac-section-tab-4 ac-section-tab-padding ac-slider-nav" id="ac-tab-1-section-5">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-center">
                          <!-- .ac-col -->
                        <div class="ac-col ac-col-1 ac-col-100 ac-flex  ac-flex-align-center ac-justify-between ac-width-100-precent">
                              

                              <div class="ac-slider-nav-button-wrapper">
                                  <button class="ac-slider-nav-button" data-goto="0">
                                    <span class="ac-btn-arrow">
                                      < 
                                    </span>
                                    <span class="ac-text">
                                     לעמוד הקמפיין
                                    </span>
                                  </button>
                              </div>

                              <div class="ac-slider-nav-button-wrapper">
                                  <button class="ac-slider-nav-button" data-goto="1">
                                    <span class="ac-text">
                                      
                                      KONA Hybrid
                                    </span>
                                    <span class="ac-btn-arrow">
                                      >
                                    </span>
                                  </button>
                              </div>

                        </div>
                        <!-- /.ac-col -->
                    </div>  
                </div>
            </section>

        </div>
        <!-- /ac-tab -->


         <!--  .ac-tab -->
        <div class="ac-footer ">
            <section class="ac-section ac-section-footer ac-section-tab-padding" id="ac-footer-1">
                <div class="ac-container">
                    <div class="ac-row  ac-flex ac-flex-row ac-flex-align-center ac-justify-even ac-flex-wrap-on-mobile">
                        <div class="ac-footer-box ac-footer-box-1">
                              <div class="img-wrapper">
                                <?php echo AC_render_picture( './assets/img/footer/1.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                  לרכישת יונדאי חדשה<br/>
                                  מבלי לצאת מהבית - Online >
                                </p>
                              </div>
                        </div>

                        <div class="ac-footer-box ac-footer-box-2">
                              <div class="img-wrapper">
                                  <?php echo AC_render_picture( './assets/img/footer/2.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                  לצ'ט עם נציג המכירות שלנו >
                                </p>
                              </div>
                        </div>

                        <div class="ac-footer-box ac-footer-box-3">
                              <div class="img-wrapper">
                                  <?php echo AC_render_picture( './assets/img/footer/3.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                  לתיאום פגישה באולמות תצוגה<br/>
                                  ברחבי הארץ >
                                </p>  
                              </div>
                        </div>

                        <div class="ac-footer-box ac-footer-box-4">
                              <div class="img-wrapper">
                                   <?php echo AC_render_picture( './assets/img/footer/4.jpg' , false , false); ?>
                              </div>
                              <div class="ac-text-wrapper">
                                <p>
                                  לקביעת נסיעת מבחן עד הבית >
                                </p>
                              </div>
                        </div>
                    </div>

                    <div class="ac-tab-1-click-to-call ac-keep-showing">
                          <h1>
                            הכירו את יונדאי<br/>
                            KONA Hybrid ו- VENUE החדשים
                          </h1>
                          <button class="ac-btn ac-open-form-btn ac-toggole-form">
                            צרו איתי קשר
                          </button>

                       </div>  
                  </div>
            </section>

            <section class="ac-section ac-section-footer ac-section-tab-padding ac-footer ac-footer-2" id="ac-footer-2">
                <div class="ac-container">
                    <div class="ac-row ac-flex ac-flex-row ac-align-center ac-justify-between">
                        
                        <div class="ac-col ac-col-1">
                          <div class="ac-footer-socials-wrapper ac-flex  ac-flex-row ac-align-center ac-justify-between">
                              <div class="ac-footer-social-wrapper">
                                <a href="https://www.instagram.com/hyundai.israel1/" target="_blank">
                                 <?php echo AC_render_picture( './assets/img/footer/i.png' , false , false); ?>
                                </a>
                              </div>

                              <div class="ac-footer-social-wrapper">
                                <a href="https://www.youtube.com/user/hyundaiisrael" target="_blank">
                                 <?php echo AC_render_picture( './assets/img/footer/y.png' , false , false); ?>
                                </a>
                              </div>

                              <div class="ac-footer-social-wrapper">
                                <a href="https://www.facebook.com/HyundaiIsrael/" target="_blank">
                                 <?php echo AC_render_picture( './assets/img/footer/f.png' , false , false); ?>
                                </a>
                              </div>


                          </div>
                        </div>

                        <div class="ac-col ac-col-2">
                          <div class="ac-logo-wrapper">
                            <a href="">
                             <?php echo AC_render_picture( './assets/img/footer/logo.png' , false , false); ?>
                            </a>
                          </div>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
        <!-- /ac-tab -->



    <!-- <div class="ac-flex ac-main ac-footer-legal ">
        <div class="ac-col  ac-col-2">
            <div class="ac-banner-bg-inner ac-text-align-right">
                <small class="ac-bottom-leagel ac-bottom-leagel-0">
                    רמת  אבזור בטחותי: 
                    <span class="ac-square ac-square-seven" >7</span>
                    <span class="ac-square ac-square-six">6</span> 
                    דרגת זיהום אוויר: 
                    <span class="ac-square ac-square-eight">8</span>
                    <span class="ac-square ac-square-two">2</span>

                    לפרטים: <a target="_blank" href="https://www.hyundaimotors.co.il/">www.hyundaimotors.co.il</a>
                </small>

                <small class="ac-bottom-leagel ac-bottom-leagel-1">
                    רמת  אבזור בטחותי: 
                    <span class="ac-square ac-square-seven" >7</span>
                    <span class="ac-square ac-square-six">6</span> 
                    דרגת זיהום אוויר: 
                    <span class="ac-square ac-square-two">2</span>

                    לפרטים: <a target="_blank" href="https://www.hyundaimotors.co.il/">www.hyundaimotors.co.il</a>
                </small>

                <small class="ac-bottom-leagel ac-bottom-leagel-2">
                    רמת  אבזור בטחותי: 
                    <span class="ac-square ac-square-six">6</span> 
                   
                    דרגת זיהום אוויר: 
                    <span class="ac-square ac-square-eight">8</span>

                    לפרטים: <a target="_blank" href="https://www.hyundaimotors.co.il/">www.hyundaimotors.co.il</a>
                </small>
            </div>
        </div>
      
    </div> -->

    <!-- <div class="ac-leagel ac-leagel-mobile">
        <small >
              רמת  אבזור בטחותי: 
              <span class="ac-square ac-square-seven" >7</span>
              <span class="ac-square ac-square-six">6</span> 
              דרגת זיהום אוויר: 
              <span class="ac-square ac-square-eight">8</span>
              <span class="ac-square ac-square-two">2</span>

              לפרטים: <a target="_blank" href="https://www.hyundaimotors.co.il/">www.hyundaimotors.co.il</a>
          </small>
    </div> -->




  <script type="text/javascript" async src="./assets/js/init.js"></script>
  <script type="text/javascript" src="assets/js/accessibility.js"></script>


</body>

</html>