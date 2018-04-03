<?php foreach($categories as $category): ?>
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

