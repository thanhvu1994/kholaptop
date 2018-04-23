<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="header-height" style="background: rgb(38, 38, 38)">
    <div class="navbar navbar-default portal">
        <div class="container container-custom">
            <div class="navbar-header">
                <a href="<?php echo base_url() ?>" class="navbar-brand" title="<?php echo $this->settings->get_param('defaultPageTitle') ?>">
                    <img src="<?php echo $this->settings->get_logoFE() ?>" height="18" alt="<?php echo $this->settings->get_param('defaultPageTitle') ?>">       
                </a>
            </div>
            <div class="skip-links">
			    <a href="#header-nav" class="skip-link skip-nav">
			        <span class="icon"></span>
			    </a>
			</div>
            <div id="header-nav" class="skip-content">
	            <nav id="nav navbar-nav navbar-left en">
	            	<?php $menus = $this->categories->get_menuFE();
	            	if (!empty($menus)) :?>
		                <ol class="nav-primary">
		                <?php foreach ($menus as $menu): ?>
		                	<li class="level0 nav-1 first parent">
				                <a href="<?php echo !empty($menu['url']) ? base_url($menu['url']) : 'javascript:void(0)' ?>" class="level0 has-children"><?php echo $menu['name'] ?></a>
				                <?php if (!empty($menu['child'])):?>
					                <ul class="level0">
						                <?php foreach ($menu['child'] as $childs): ?>
						                	<?php if (!empty($childs['child'])):?>
							                	<li class="level1 nav-1-1 parent">
							                        <a class="level1 has-children" href="<?php echo !empty($childs['url']) ? base_url($childs['url']) : 'javascript:void(0)' ?>"><?php echo $childs['name'] ?></a>
							                    	<ul class="level1">
								                    	<?php foreach ($childs['child'] as $row): ?>
					                            			<li class="level2"><a class="level2" href="<?php echo !empty($row['url']) ? base_url($row['url']) : 'javascript:void(0)' ?>"><?php echo $row['name'] ?></a></li>
								                    	<?php endforeach ?>
							                    	</ul>
							                    </li>

							                <?php else: ?>
							                	<li class="level1">
							                        <a class="level1" href="<?php echo !empty($childs['url']) ? base_url($childs['url']) : 'javascript:void(0)' ?>"><?php echo $childs['name'] ?></a>
							                    </li>
						                	<?php endif ?>
						                <?php endforeach ?>
					                </ul>
				            	<?php endif ?>
				            </li>
		                <?php endforeach ?>
				            <li class="level0 nav-1 first parent"><a class="level0 has-children" href="<?php echo base_url('gio-hang.html') ?>"><i class="fa fa-shopping-cart"></i> (<?php echo isset($_SESSION['shopping_cart']['count']) ? $_SESSION['shopping_cart']['count'] : 0 ?>)</a></li>
				        </ol>
				    <?php endif ?>
		        </nav>
		    </div>
        </div>
    </div>
</div>

<!-- <div class="header-language-background">
    <div class="header-language-container">
        <div class="store-language-container"> HOTLINE BÁN HÀNG: 04.35379395 | CHĂM SÓC KHÁCH HÀNG: 0985 985
            278
        </div>
        <p class="welcome-msg">
        <div id="header-search" class="skip-content">
            <form id="search_mini_form" action="http://kholaptop.vn/tim" method="get" enctype="multipart/form-data">
                <div class="input-box"><label for="search">Search:</label>
                    <input id="search" type="search" name="q" value="" class="input-text required-entry" autocomplete="off" placeholder="Tìm toàn bộ cửa hàng ở đây…"/>
                    <button type="submit" title="Tìm" class="button search-button"><span><span>Tìm</span></span>
                    </button>
                </div>
                <div id="search_autocomplete" class="search-autocomplete"></div>
            </form>
        </div>
        </p>
    </div>
</div> -->
<!-- <header id="header" class="page-header visible-xs">
	<div class="page-header-container">
	    <a class="logo" href="index.html">
	        <img src="<?php echo base_url('themes/website/media/banner/logo_logo_logo.gif')?>" alt="KHOLAPTOP.VN | Phân phối Laptop chính hãng" class="large"/>
	        <img src="<?php echo base_url('themes/website/media/banner/logo_logo_logo.gif')?>" alt="KHOLAPTOP.VN | Phân phối Laptop chính hãng" class="small"/>
	    </a>
	    <div class="store-language-container">
	        <ul>
	            <li class="address">09 Thái Hà -Hà Nội | <span>8h30 -18h00</span></li>
	            <li class="phone">Tel 024.35379395 - 0985 985 278</li>
	            <li class="address">121 Hồ Bá Kiện - P15 - Q10 - TP HCM | <span>8h30 -18h00</span></li>
	            <li class="phone">Tel 028.3977 1918 - Mobile: 0904325909</li>
	        </ul>
	    </div>

	    <?php $this->load->view('layouts/menu'); ?>
	</div>
</header> -->