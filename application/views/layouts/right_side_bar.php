<div class="widget widget-static-block">
    <h2 class="subtitle">Bán hàng online</h2>
    <div id="right_content">
        <?php echo $this->settings->get_param('right_sidebar'); ?>
    </div>
</div>

<?php $newest = $this->news->get_model([], 10) ?>
<div class="widget widget-static-block">
	<h2 class="subtitle">Tin tức mới nhất</h2>
	<ul>
	    <?php foreach($newest as $new): ?>
	        <li class="item">
	            <a href="<?php echo $new->getNewsUrl(); ?>" title="<?php echo $new->title ?>" class="product-image">
	                <img src="<?php echo base_url($new->featured_image); ?>" alt="<?php echo $new->title ?>"/>
	            </a>
	            <h3 class="product-name" style="margin-top:15px"><a href="<?php echo $new->getNewsUrl(); ?>" title="<?php echo $new->title ?>"><?php echo $new->shorterContent($new->title, 70) ?></a></h3>
	        </li>
	    <?php endforeach; ?>
	</ul>
</div>