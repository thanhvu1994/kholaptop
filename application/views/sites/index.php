<div class="main-container col2-right-layout">
    <div class="main">
        <div class="col-main">
            <?php if (isset($advertisements[0])): ?>
                <div class="banner-homepage">
                    <a href="<?php echo !empty($advertisements[0]->url) ? $advertisements[0]->url : 'javascript:void(0)'?>"><img border=0 src="<?php echo $advertisements[0]->get_image() ?>" alt="<?php echo $advertisements[0]->name ?>"/></a>
                </div>
            <?php unset($advertisements[0]); endif ?>
            
            <?php $this->load->view('layouts/new_products'); ?>

            <?php if (isset($advertisements[1])): ?>
                <div class="banner-homepage">
                    <a href="<?php echo !empty($advertisements[1]->url) ? $advertisements[1]->url : 'javascript:void(0)'?>"><img border=0 src="<?php echo $advertisements[1]->get_image() ?>" alt="<?php echo $advertisements[1]->name ?>"/></a>
                </div>
            <?php unset($advertisements[1]); endif ?>
            <?php $this->load->view('layouts/feature_products'); ?>
            
            <?php $this->load->view('layouts/accessories', ['advertisements' => $advertisements]); ?>
        </div>

        <div class="col-right sidebar">
            <?php $this->load->view('layouts/right_side_bar'); ?>
        </div>
    </div>
</div>
