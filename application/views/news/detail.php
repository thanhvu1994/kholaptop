<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="<?php echo base_url() ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
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
						<ol>
							<?php if (count($categories) > 0):
								foreach ($categories as $category_id => $category): ?>
									<li><?php echo $this->categories->getUrlCustom($category) ?></li>
								<?php endforeach;
							endif ?>
						</ol>
					</dd>
				</dl>  
			</div><!--block-content-->
		</div>
	</div><!--col-left-->

	<div class="col-main">
		<div class="page-title category-title"><h1><?php echo $new->title ?></h1></div>
		<div class="nd">
			<div class="content">
				<?php echo $new->content ?>
			</div>
            <div class="product-view">
		        <ul class="sharing-links" style="padding-top: 5px;list-style: none; float:none">
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

			<div id="other-news">
				<?php if (count($news) > 0): ?>
					<h2>Bài viết liên quan</h2>
					<ul style="padding-left: 0px">
						<?php foreach ($news as $row): ?>
							<li><a href="<?php echo $row->getNewsUrl(); ?>"> <?php echo $row->title ?></a> (<?php echo $row->get_created_date('d-m-y, m:h') ?>)</li>
						<?php endforeach ?>
					</ul>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<div class="col-right sidebar">
    <?php $this->load->view('layouts/right_side_bar'); ?>
</div>