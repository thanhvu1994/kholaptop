
<!DOCTYPE html><!--[if lt IE 7 ]>
<html lang="vi" id="top" class="no-js ie6"> <![endif]--> <!--[if IE 7 ]>
<html lang="vi" id="top" class="no-js ie7"> <![endif]--> <!--[if IE 8 ]>
<html lang="vi" id="top" class="no-js ie8"> <![endif]--> <!--[if IE 9 ]>
<html lang="vi" id="top" class="no-js ie9"> <![endif]--> <!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi" id="top" class="no-js"> <!--<![endif]-->
  
<!-- Mirrored from kholaptop.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Mar 2018 03:30:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KHOLAPTOP.VN | Phân phối Laptop chính hãng</title>
    <meta name="description" content="Phân phối, Laptop, chính hãng, giá rẻ, laptop hà nôị"/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="icon" href="<?php echo base_url('themes/website/images/favicon.ico')?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url('themes/website/images/favicon.ico')?>" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/website/script/style5015.css?v=2.99')?>" media="all"/>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,600"/>
    <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/jquery-1.11.0.min.js')?>"></script>

    <!--[if (lte IE 8) & (!IEMobile)]>
    <link rel="stylesheet" type="text/css" href="/template/default/script/ie8.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/template/default/script/ie8_mandison.css" media="all"/> <![endif]-->
    <!--[if (gte IE 9) | (IEMobile)]><!-->
    <script src="<?php echo base_url('themes/website/script/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/website/script/product_view_history.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/website/script/common.js')?>"></script>
    <!-- Global site tag (gtag.js) - Google Analytics --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116231262-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116231262-1');
    </script>
</head>
<body class=" cms-index-index cms-home">
<div class="wrapper">
    <div class="page">
        <script type="text/javascript">
            $(document).ready(function(){
                var curr_text = "";
                var count_select = 0;
                var curr_element="";

                $("#search").keyup(function(b){

                    if (b.keyCode != 38 && b.keyCode != 40) {
                        inputString = $(this).val();
                        if(inputString.trim() !=''){
                            $("#search_autocomplete").show();
                            $("#search_autocomplete").load("ajax/get_product_list03d2.html?q="+encodeURIComponent(inputString));
                        }else  {
                            $("#search_autocomplete").hide();
                            count_select=0;
                        }
                    }
                });

                $('body').click(function(){
                    $(".autocomplete-suggestions").hide();
                });
            });
        </script>
        <script type="text/javascript">
            $('#search-mobi-click').click(function (event) {
                $('.header-search').toggle();
            });

            $(function(){
                $(".skip-link").click(function(){
                    $(this).toggleClass("skip-active");
                    $("#header-nav").toggleClass("skip-active");

                    return false;
                });
                $("#header-nav a.has-children").click(function(){
                    $(this).parent("li").toggleClass("menu-active");
                    if($(".skip-active").length > 0)
                        return false;
                });
            });

            $(window).resize(function(){
                $("#header-nav li.parent").removeClass("menu-active");
                $(".skip-active").removeClass("skip-active");
            });
        </script>
        <div class="header-language-background">
            <div class="header-language-container">
                <div class="store-language-container"> HOTLINE BÁN HÀNG: 04.35379395 | CHĂM SÓC KHÁCH HÀNG: 0985 985
                    278
                </div>
                <p class="welcome-msg">
                <div id="header-search" class="skip-content">
                    <form id="search_mini_form" action="http://kholaptop.vn/tim" method="get" enctype="multipart/form-data">
                        <div class="input-box"><label for="search">Search:</label>
                            <input id="search" type="search" name="q" value="" class="input-text required-entry" autocomplete="off" placeholder="Tìm toàn bộ cửa hàng ở đây…"/>
                            <button type="submit" title="Tìm" class="button search-button"><span><span>Tìm</span></span>
                            </button>
                        </div>
                        <div id="search_autocomplete" class="search-autocomplete"></div>
                    </form>
                </div>
                </p>
            </div><!--header-language-container-->
        </div><!--header-language-background-->
        <header id="header" class="page-header">
            <!-- Header -->
            <?php $this->load->view('layouts/header'); ?>
        </header>
        <script type="text/javascript">
            $('#search-mobi-click').click(function (event) {
                $('.header-search').toggle();
            });
        </script>
        <div class="main-container col2-right-layout">
            <div class="main">
                <?php $this->load->view($template); ?>
            </div>
        </div>
        <div id="mHotline_fixed" style="display:none;">
            <p><span style="float:left; margin-right:2px;">Mua hàng gọi ngay</span> <a href="tel:0985 985 278" style="font-weight:bold; float:left;">0985 985 278</a></p>
            <a href="tel:0985 985 278" class="font18"><img src="<?php echo base_url('themes/website/images/icon_tel_whitef195.png?v=2.1')?>" alt="hotline" />&nbsp;Gọi</a>
        </div>
        <div class="footer">
            <!-- Footer -->
            <?php $this->load->view('layouts/footer'); ?>
        </div>
        <script>
            // function subscribe_newsletter(){
            // var email = document.getElementById('email_newsletter').value;
            // if(email.length > 3){
            //     $.post("ajax/register_for_newsletter.html", {email:email}, function(data) {
            //         if(data=='success') {alert("Quý khách đã đăng ký thành công "); $("#email_newsletter").val("Nhập Email nhận bản tin");}
            //         else if(data=='exist'){ alert("Email này đã tồn tại");}
            //         else { alert('Lỗi xảy ra, vui lòng thử lại '); }

            //     });
            // }else{
            // 	alert('Vui lòng nhập địa chỉ email');
            // }
            // }
        </script>
        <script>
            $("#narrow-by-list dt").click(function(){
                var index = $(this).index();
                var dd = $("#narrow-by-list dd").eq(index);
                if(dd.is(":visible")==false) {
                    dd.show();
                }
                else dd.hide();
            });
        </script>
        <style>@media (min-width:770px){#narrow-by-list dd{display:block !important;}}</style>
    </div>
</div>
</body>
</html>
