<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="/" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
	    <li class="category3">
	    	<?php echo $link_1 ?>
	    	<?php if (isset($link_2)): ?>
	    		<span>/ </span>
	    	<?php endif ?>
	    </li>
	    <?php if (isset($link_2)): ?>
	    	<li class="category3">
		    	<?php echo $link_2 ?>
		    </li>
	    <?php endif ?>
  	</ul>
</div>

<div class="col-wrapper">
	<div class="col-left sidebar col-left-first">
		<div class="block block-layered-nav block-layered-nav--no-filters">
			<div class="block-content toggle-content">
				<p class="block-subtitle block-subtitle--filter">Filter</p>
				<dl id="narrow-by-list">
					<dt>Danh mục tin</dt>
					<dd>
						<?php if (count($categories) > 0):
							foreach ($categories as $category_id => $category): ?>
								<li><?php echo $this->categories->getUrlCustom($category) ?></a></li>
							<?php endforeach;
						endif ?>
						<ol>
						</ol>
					</dd>
				</dl>  
			</div><!--block-content-->
		</div>
	</div><!--col-left-->
	<div class="col-main">
		<div class="page-title category-title"><h1><?php echo $category_name ?></h1></div>
		<div class="category-products">
			<div class="list-news">
				<ul>
				<?php if (count($news) > 0): ?>
					<?php foreach ($news as $new): ?>
						<li>
							<a href="<?php echo $new->getNewsUrl(); ?>" class="a-img">
								<img src="<?php echo base_url($new->featured_image); ?>" alt="<?php echo $new->title ?>" width="250">
							</a>
							<div class="a-right">
								<a href="<?php echo $new->getNewsUrl(); ?>" class="a-name"><?php echo $new->title ?></a>
								<span class="time"><?php echo $new->get_created_date('d-m-y, m:h') ?></span>
								<span class="a-summary"></span>
							</div>
						</li>
					<?php endforeach ?>
				<?php else: ?>
					<li><p>Đang cập nhật...</p></li>
				<?php endif ?>
				</ul>
			</div><!--list-news-->
		</div><!--category-products-->
		<div class="row">
            <div class="post-page col-md-12">
                <div class="col-md-6">
                    <div id="pagination_bottom" class="pagination clearfix">
                        <?php echo $links; ?>
                    </div>
                </div>
            </div>
        </div>
	</div><!--col-main-->
	<div class="col-left sidebar"></div>
</div>
<div class="col-right sidebar">
    <?php $this->load->view('layouts/right_side_bar'); ?>
</div>