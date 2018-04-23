<h2 class="subtitle">Sản phẩm mới</h2>
<ul class="products-grid products-grid--max-4-col">
    <?php foreach($newProducts as $key => $product): ?>
        <li class="item">
            <a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->product_name; ?>" class="product-image">
                <img src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->product_name; ?>"/>
            </a>
            <h3 class="product-name"><a href="<?php echo $product->getUrl(); ?>" title="<?php echo $product->product_name; ?>"><?php echo $product->product_name; ?></a></h3>
            <div class="price-box"><span class="regular-price" id="product-price-<?php echo $key; ?>-new">
            <span class="price"><?php echo number_format($product->price).' đ'; ?></span> </span>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<div class="view-more"><a href="<?php echo base_url('san-pham-moi.html'); ?>" title="">Xem thêm sản phẩm</a></div>