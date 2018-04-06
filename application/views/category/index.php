<div class="main-container col3-layout">
    <div class="main">
        <div class="breadcrumbs">
            <ul>
                <li class="home"><a href="<?php echo base_url(); ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
                <?php $curCategory->getBreadCrumb(); ?>
            </ul>
        </div>
        <div class="col-wrapper">
            <div class="col-left sidebar col-left-first">
                <div class="block block-layered-nav block-layered-nav--no-filters">
                    <div class="block-title"><strong><span>Shop By</span></strong></div>
                    <div class="block-content toggle-content"><p class="block-subtitle block-subtitle--filter">
                        Filter</p>
                        <dl id="narrow-by-list">
                            <dt>Danh mục</dt>
                            <dd>
                                <ol>
                                    <?php foreach($treeCategory as $category): ?>
                                        <li><a href="<?php echo $category['url']; ?>"><?php echo $category['name']; ?> <span class="count"> (<?php echo $category['countProducts']; ?>)</span> </a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </dd>
                        </dl>
                    </div><!--block-content-->
                </div>
            </div><!--col-left-->
            <div class="col-main">
                <div class="page-title category-title"><h1><?php echo $curCategory->category_name; ?></h1></div>
                <ul class="messages" style="display:none;">
                    <li class="success-msg">
                        <ul><li><span></span></li></ul>
                    </li>
                </ul>
                <div class="category-products">
                    <div class="toolbar">
                        <div class="sorter">
                            <p class="view-mode">
                                <?php if(isset($_GET['display']) && $_GET['display'] == 'list'): ?>
                                    <strong title="Danh sách" class="list">Danh sách</strong>
                                    <?php
                                    $get = $_GET;
                                    if(isset($get['display'])){
                                        unset($get['display']);
                                    }
                                    if((count($get) > 0)){
                                        $href = current_url().'?'.http_build_query($get, '', "&");
                                    }else{
                                        $href = current_url();
                                    }
                                    ?>
                                    <a href="<?php echo $href; ?>" title="Grid" class="grid">Grid</a>
                                <?php else: ?>
                                    <?php
                                    if((count($_GET) > 0)){
                                        $href = current_url().'?'.http_build_query($_GET, '', "&").'&display=list';
                                    }else{
                                        $href = current_url().'?display=list';
                                    }
                                    ?>
                                    <a href="<?php echo $href; ?>" title="Danh sách" class="list">Danh sách</a>
                                    <strong title="Grid" class="grid">Grid</strong>
                                <?php endif; ?>
                            </p>
                            <div class="sort-by">
                                <select onchange="location.href=this.value" title="Sort By">
                                    <option>Sắp xếp theo</option>
                                    <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_asc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=price_asc'); ?>" >Giá: thấp -> cao</option>
                                    <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_desc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=price_desc'); ?>" >Giá: cao -> thấp</option>
                                    <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_asc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=name_asc'); ?>" >Tên A -> Z</option>
                                    <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_desc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=name_desc'); ?>" >Tên Z -> A</option>
                                </select>
                            </div><!--sort-by-->
                        </div><!--sorter-->
                        <div class="pager">
                            <div class="count-container">
                                <p class="amount amount--no-pages"> <strong><?php echo $countProducts; ?> mặt hàng</strong></p>
                            </div>
                            <div class="pages"><strong>Trang:</strong>
                                <ol>
                                    <?php echo $links; ?>
                                </ol>
                            </div>
                        </div><!--pager-->
                    </div><!--toolbar-->
                    <?php if(isset($_GET['display']) && $_GET['display'] == 'list'): ?>
                        <ol class="products-list" id="products-list">
                            <?php foreach($products as $key => $product): ?>
                                <li class="item">
                                    <a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->title; ?>" class="product-image">
                                        <img id="product-collection-image-<?php echo $key; ?>" src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->product_name; ?>">
                                    </a>
                                    <div class="product-shop">
                                        <div class="f-fix">
                                            <div class="product-primary">
                                                <h2 class="product-name"><a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->title; ?>"><?php echo $product->product_name; ?></a></h2>
                                            </div>
                                            <div class="product-secondary">
                                                <div class="price-box">
                                                <span class="regular-price" id="product-price-<?php echo $key; ?>">
                                                    <span class="price"><?php echo number_format($product->price).' đ'; ?></span>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="desc std">
                                                <div><p><?php echo $product->content; ?></p></div>
                                                <div><p><?php echo $product->description; ?></p></div>
                                                <a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->title; ?>" class="link-learn">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <ul class="products-grid products-grid--max-4-col first last odd">
                            <?php foreach($products as $key => $product): ?>
                                <li class="item last">
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
                    <?php endif; ?>

                    <div class="toolbar-bottom">
                        <div class="toolbar">
                            <div class="sorter">
                                <p class="view-mode">
                                    <?php if(isset($_GET['display']) && $_GET['display'] == 'list'): ?>
                                        <strong title="Danh sách" class="list">Danh sách</strong>
                                        <?php
                                        $get = $_GET;
                                        if(isset($get['display'])){
                                            unset($get['display']);
                                        }
                                        if((count($get) > 0)){
                                            $href = current_url().'?'.http_build_query($get, '', "&");
                                        }else{
                                            $href = current_url();
                                        }
                                        ?>
                                        <a href="<?php echo $href; ?>" title="Grid" class="grid">Grid</a>
                                    <?php else: ?>
                                        <?php
                                        if((count($_GET) > 0)){
                                            $href = current_url().'?'.http_build_query($_GET, '', "&").'&display=list';
                                        }else{
                                            $href = current_url().'?display=list';
                                        }
                                        ?>
                                        <a href="<?php echo $href; ?>" title="Danh sách" class="list">Danh sách</a>
                                        <strong title="Grid" class="grid">Grid</strong>
                                    <?php endif; ?>
                                </p>
                                <div class="sort-by">
                                    <select onchange="location.href=this.value" title="Sort By">
                                        <option>Sắp xếp theo</option>
                                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_asc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=price_asc'); ?>" >Giá: thấp -> cao</option>
                                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'price_desc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=price_desc'); ?>" >Giá: cao -> thấp</option>
                                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_asc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=name_asc'); ?>" >Tên A -> Z</option>
                                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name_desc')? 'selected': ''; ?> value="<?php echo base_url($curCategory->slug.'c.html?sort=name_desc'); ?>" >Tên Z -> A</option>
                                    </select>
                                </div><!--sort-by-->
                            </div><!--sorter-->
                            <div class="pager">
                                <div class="count-container">
                                    <p class="amount amount--no-pages"> <strong><?php echo $countProducts; ?> mặt hàng</strong></p>
                                </div>
                                <div class="pages"><strong>Trang:</strong>
                                    <ol>
                                        <?php echo $links; ?>
                                    </ol>
                                </div>
                            </div><!--pager-->
                        </div><!--toolbar-->
                    </div><!--toolbar-bottom-->
                </div><!--category-products-->
            </div><!--col-main-->
            <div class="col-left sidebar"></div>
        </div><!--col-wrapper-->
        <div class="col-right sidebar">

            <div class="block block-list block-compare">
                <div class="block-title"><strong><span>So sánh sản phẩm <small>(<span id="countItemCompare">0</span>)</small> </span></strong></div>
                <div class="block-content">
                    <ol id="compare-items">
                    </ol>
                    <div class="actions">
                        <button type="button" title="Compare" class="button" id="btnCompare"><span><span>So sánh</span></span></button>
                        <a href="javascript:void(0)" onclick="clearCompare()">Xóa tất cả</a>
                    </div>
                </div>
            </div><!--block-compare-->


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
        </div><!--col-right-->
    </div><!--main-->
</div><!--main-container-->
<style>
    .desc p{
        margin: 0;
    }

    .desc p:last-child{
        margin: 0 0 1.5em;
    }
</style>