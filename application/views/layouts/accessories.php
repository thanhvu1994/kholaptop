<?php foreach($categories as $key => $category): 
    $key_qc = $key + 2;
    if (isset($advertisements[$key_qc])) :?>
        <div class="banner-homepage">
            <a href="<?php echo !empty($advertisements[$key_qc]->url) ? $advertisements[$key_qc]->url : 'javascript:void(0)'?>"><img border=0 src="<?php echo $advertisements[$key_qc]->get_image() ?>" alt="<?php echo $advertisements[$key_qc]->name ?>"/></a>
        </div>
    <?php endif; ?>
    
    <?php $products = $category->getProducts(0,0); ?>
    <?php if(!empty($products)): ?>
        <h2 class="subtitle"> <?php echo $category->title; ?></h2>
        <ul class="products-grid products-grid--max-5-col">

            <?php foreach($products as $key => $product): ?>
                <li class="item">
                    <a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->product_name; ?>" class="product-image">
                        <img src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->product_name; ?>"/>
                    </a>
                    <h3 class="product-name"><a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->product_name; ?>"><?php echo $product->product_name; ?></a></h3>
                    <div class="price-box"><span class="regular-price" id="product-price-<?php echo $key; ?>-new">
            <span class="price"><?php echo $product->sale_price; ?></span> </span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="view-more"><a href="<?php echo $category->getUrl(); ?>" title="">Xem thêm sản phẩm</a></div>
    <?php endif; ?>
<?php endforeach; ?>