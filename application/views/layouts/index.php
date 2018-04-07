<!DOCTYPE html><!--[if lt IE 7 ]>
<html lang="vi" id="top" class="no-js ie6"> <![endif]--> <!--[if IE 7 ]>
<html lang="vi" id="top" class="no-js ie7"> <![endif]--> <!--[if IE 8 ]>
<html lang="vi" id="top" class="no-js ie8"> <![endif]--> <!--[if IE 9 ]>
<html lang="vi" id="top" class="no-js ie9"> <![endif]--> <!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi" id="top" class="no-js"> <!--<![endif]-->
  
<!-- Mirrored from kholaptop.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Mar 2018 03:30:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Head -->
    <?php $this->load->view('layouts/head'); ?>
</head>
<body class=" cms-index-index cms-home">
<div class="wrapper">
    <div class="page">
        <script type="text/javascript">
            $(document).ready(function(){
                var curr_text = "";
                var count_select = 0;
                var curr_element="";
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
        
        <!-- Header -->
        <?php $this->load->view('layouts/header'); ?>
        <script type="text/javascript">
            $('#search-mobi-click').click(function (event) {
                $('.header-search').toggle();
            });
        </script>

        <?php 
            if ($this->router->fetch_class() == 'sites' && $this->router->fetch_method() == 'index') {
                $this->load->view('layouts/banner'); 
            }
        ?>
        <?php 

            if ($this->router->fetch_class() == 'sites' && $this->router->fetch_method() == 'index') {
                $class_main = 'col2-right-layout';
            } else {
                $class_main = 'col3-layout';
            }
        ?>
        <div class="main-container <?php echo $class_main ?>">
            <div class="main">
                <?php $this->load->view($template); ?>
            </div>
        </div>

        <div id="mHotline_fixed" style="display:none;">
            <p><span style="float:left; margin-right:2px;">Mua hàng gọi ngay</span> <a href="tel:0985 985 278" style="font-weight:bold; float:left;">0985 985 278</a></p>
            <a href="tel:0985 985 278" class="font18"><img src="<?php echo base_url('themes/website/images/icon_tel_whitef195.png?v=2.1')?>" alt="hotline" />&nbsp;Gọi</a>
        </div>
        <div id="footer" class="footer">
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
