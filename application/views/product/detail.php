<link rel="stylesheet" href="<?php echo base_url('themes/website/script/magiczoom.css'); ?>" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('themes/website/script/magiczoom.js'); ?>"></script>
<script type="text/javascript">
    MagicZoom.options = {
        'disable-zoom' : false,
        'selectors-change' : 'click'
    }
</script>
<div class="main-container col2-right-layout">
    <div class="main">
        <div class="breadcrumbs">
            <ul>
                <li class="home"><a href="<?php echo base_url(); ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
                <?php (!empty($category))? $category->getBreadCrumb() : ''; ?>
                <li class="category3"><a title="<?php echo $product->product_name; ?>"><span>/ </span> <?php echo $product->product_name; ?></a></li>
            </ul>
        </div>
        <div class="col-main">
            <div id="messages_product_view"></div>
            <div class="product-view">
                <div class="product-essential">
                    <div class="product-essential">
                        <form action="" method="post" id="product_addtocart_form">
                            <div class="product-img-box">
                                <div class="product-name"><h1><?php echo $product->getFirstImage(); ?></h1></div>
                                <div class="product-image product-image-zoom">
                                    <div class="product-image-gallery">
                                        <a class="MagicZoom" id="Zoomer" rel="selectors-effect-speed: 600" href="<?php echo $product->getFirstImage(); ?>" title="<?php echo $product->product_name; ?>" >
                                            <img id="image-main" class="gallery-image visible" src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->product_name; ?>" title="<?php echo $product->product_name; ?>"/>
                                        </a>
                                    </div>
                                </div>

                            </div><!--product-img-box-->
                            <div class="product-shop">
                                <div class="product-name"><span class="h1"><?php echo $product->product_name; ?></span></div>
                                <div class="price-info">
                                    <div class="price-box"><span class="regular-price" id="product-price-241">
                                    <span class="price"><?php echo number_format($product->price,0, ',', '.').' đ'; ?></span> </span>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="desc std">
                                    <?php echo $product->content; ?>
                                </div>
                            </div><!--product-shop-->
                            <div class="add-to-cart-wrapper">
                                <div class="add-to-box" style="margin-top:10px;"><span class="or">Hoặc</span>
                                    <ul class="add-to-links">
                                        <li><a class="btn" href="javascript:void(0)" onclick="addToShoppingCart('pro','241',1,'12590000')">Đặt mua hàng</a></li>
                                    </ul>
                                    <ul class="sharing-links" style="padding-top: 5px;">
                                        <li>
                                            <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo str_replace(base_url(),'', current_url()); ?>"
                                               target="_blank" title="Share on Facebook" class="link-facebook">
                                                Share Facebook
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://twitter.com/home?status=<?php echo str_replace(base_url(),'', current_url()); ?>"
                                               target="_blank" title="Share on Twitter" class="link-twitter">Share
                                                on Twitter
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--add-to-cart-wrapper-->

                            <div class="clearer"></div>
                        </form>
                    </div><!--product-essential-->
                </div><!--product-essential-->

                <div class="clear" style="padding:10px"></div>

                <div class="product-collateral toggle-content tabs">

                    <ul class="toggle-tabs" style="font-weight:700">
                        <li class="current" data-tab="#tab1"><span>CHI TIẾT SẢN PHẨM</span></li>
                        <li class="last" data-tab="#tab2"><span>HÌNH ẢNH SẢN PHẨM</span></li>
                    </ul>

                    <dl id="collateral-tabs" class="collateral-tabs">
                        <dt class="tab current" data-tab="#tab1"><span>CHI TIẾT SẢN PHẨM</span></dt>
                        <dd class="tab-container current" id="tab1">
                            <div class="tab-content"><h2>Chi tiết</h2>
                                <div class="std">
                                    <div class="std">
                                        <?php echo $product->description; ?>
                                    </div>
                                </div>
                            </div>
                        </dd>
                        <dt class="tab last" data-tab="#tab2"><span>HÌNH ẢNH SẢN PHẨM</span></dt>
                        <dd class="tab-container" id="tab2" style="text-align:center;">
                            <div class="tab-content"><h2>Hình ảnh</h2>
                                <?php $images = $product->getImages(); ?>
                                <?php foreach($images as $key => $image): ?>
                                    <img class="img-responsive" id="thumb_<?php echo $image->id; ?>" src="<?php echo base_url($image->image); ?>" alt="<?php echo $product->title; ?>" title="<?php echo $product->title; ?>"/>
                                <?php endforeach; ?>
                            </div>
                        </dd>
                    </dl>
                </div><!--product-collateral toggle-content-->

                <div class="clear"></div>
                <div class="fb-comments" data-width="970" data-href="<?php echo current_url(); ?>" data-numposts="10" data-colorscheme="light"></div>
                <div class="clear"></div>


            </div><!--product-view-->
        </div><!--col-main-->
        <div class="col-right sidebar">
            <div class="widget widget-static-block"><h2 class="subtitle">Bán hàng online</h2>
                <div id="right_content">
                    <div id="help">
                        <table style="width: 100%;">
                            <tbody>
                            <tr>
                                <td colspan="2" style="font-weight: bold; font-size: 16px;"><span style="color: #000000;">HÀ NỘI - <span style="color: #ff0000;">024 3537 9395</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold;">Kinh doanh bán lẻ</td>
                            </tr>
                            <tr>
                                <td><a href="Skype:anhanh552?chat"><img alt="" src="http://findicons.com/files/icons/727/leopard/128/skype.png"/>
                                    </a></td>
                                <td><a href="Skype:anhanh552?chat">&nbsp;Mr. Toản</a> - 096 727 6008</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold;">Bảo hành & Sửa chữa</td>
                            </tr>
                            <tr>
                                <td><a href="Skype:duyhunghhtv?chat"><img alt="" src="http://findicons.com/files/icons/727/leopard/128/skype.png"/>
                                    </a></td>
                                <td><p><a href="Skype:duyhunghhtv?chat">&nbsp;Mr. Hùng</a>- 024 3538 1088
                                    </p>
                                    <p>098 273 6916</p></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="help">
                        <table style="width: 100%;">
                            <tbody>
                            <tr>
                                <td colspan="2" style="font-weight: bold; font-size: 16px;">
                                    <span style="color: #000000;">SÀI GÒN - </span><span style="color: #000000;"><span
                                                style="color: #ff0000;">028 3977 1918</span></span></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold;">121 Hồ Bá Kiện - P15 - Q10</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold;">Kinh doanh bán lẻ</td>
                            </tr>
                            <tr>
                                <td><a href="Skype:thanglaptopnp-sg1?chat"><img alt="" src="http://findicons.com/files/icons/727/leopard/128/skype.png"/>
                                    </a></td>
                                <td><a href="Skype:thanglaptopnp-sg1?chat">&nbsp;Mr. Thắng</a> - 0904 325 909
                                </td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="widget widget-static-block" id="navigation">
                <ul class="products-grid products-grid--max-4-col first last odd">
                    <h2 class="subtitle">Sản Phẩm Cùng Loại</h2>
                    <?php foreach($recentProducts as $key => $product): ?>
                        <li class="item last" style="width: 100%">
                            <a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->title; ?>" class="product-image">
                                <img id="product-collection-image-<?php echo $key; ?>" src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->product_name; ?>" />
                            </a>
                            <div class="product-info" style="padding-bottom: 75px; min-height: 157px;">
                                <h2 class="product-name"><a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->title; ?>"><?php echo $product->product_name; ?></a></h2>
                                <div class="price-box">
                                    <span class="regular-price" id="product-price-<?php echo $key; ?>">
                                    <span class="price"><?php echo number_format($product->price).' đ'; ?></span> </span></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div><!--col-right-->
    </div>
</div>
<script>
    $(".tab").click(function(){
        $(".tab").removeClass("current");
        $(this).addClass("current");
        $($(this).attr("data-tab")).toggle();
    });
    $(".toggle-tabs li").click(function(){
        $(".toggle-tabs li").removeClass("current");
        $(this).addClass("current");
        $(".tab-container").hide();
        $($(this).attr("data-tab")).show();
    });

    var elementPosition = $('#navigation').offset();

    $(window).scroll(function(){
        if($(window).scrollTop() > elementPosition.top){
            var width = $('#navigation').width();
            $('#navigation').css('position','fixed').css('width',width).css('top','0');
        } else {
            $('#navigation').css('position','static').css('width','100%');
        }
    });
</script>
<style>
    .btn{
        background: #39c;
        text-decoration: none !important;
        color: #fff !important;
        display: inline-block;
        text-transform: uppercase;
        border: none;
        padding: 5px !important;
    }
    .btn:hover {
        background-color: #126b98;
    }
</style>
