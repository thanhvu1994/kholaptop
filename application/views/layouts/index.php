
<?php $this->load->view('layouts/head'); ?>
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
        
        <!-- Header -->
        <?php $this->load->view('layouts/header'); ?>

        <?php $this->load->view('layouts/banner'); ?>

        <script type="text/javascript">
            $('#search-mobi-click').click(function (event) {
                $('.header-search').toggle();
            });
        </script>
        <div class="main-container col2-right-layout">
            <div class="main">
                <?php //$this->load->view($template); ?>
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
