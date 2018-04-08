<div class="breadcrumbs">
  	<ul>
	    <li class="home"><a href="<?php echo base_url() ?>" title="Quay lại trang chủ">Trang chủ</a> <span>/ </span></li>
	    <li class="category3">
	    	<?php echo $page->title ?>
	    </li>
  	</ul>
</div>

<div class="col-wrapper">
	<div class="col-left sidebar col-left-first">
		<div class="block block-layered-nav block-layered-nav--no-filters">
			<div class="block-content toggle-content">
				<p class="block-subtitle block-subtitle--filter">Filter</p>
				<dl id="narrow-by-list">
					<dt>Tất cả</dt>
					<dd>
						<ol>
							<?php if (count($pages) > 0):
								foreach ($pages as $row): ?>
									<li><a href="<?php echo $row->getUrl() ?>" title="<?php echo $row->title ?>"><?php echo $row->title ?></a></li>
								<?php endforeach;
							endif ?>
						</ol>
					</dd>
				</dl>  
			</div><!--block-content-->
		</div>
	</div><!--col-left-->

	<div class="col-main">
		<div class="page-title category-title"><h1><?php echo $page->title ?></h1></div>
		<div class="nd">
			<div class="content">
				<?php echo $page->content ?>
			</div>
		</div>
	</div>
</div>
<div class="col-right sidebar">
    <?php $this->load->view('layouts/right_side_bar'); ?>
</div>