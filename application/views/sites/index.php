<div class="main-container col2-right-layout">
    <div class="main">
        <?php $this->load->view('layouts/banner'); ?>

        <div class="col-main">
            <div class="banner-homepage">
                <img border=0 src="<?php echo base_url('themes/website/media/banner/banner_3c59dc04.gif')?>" width='956' height='128' alt=""/>
            </div>
            <?php $this->load->view('layouts/new_products'); ?>

            <div class="banner-homepage">
                <img border=0 src="<?php echo base_url('themes/website/media/banner/banner_3c59dc04.gif')?>" width='956' height='128' alt=""/>
            </div>
            <?php $this->load->view('layouts/feature_products'); ?>

            <div class="banner-homepage">
                <img border=0 src="<?php echo base_url('themes/website/media/banner/banner_3c59dc04.gif')?>" width='956' height='128' alt=""/>
            </div>
            <?php $this->load->view('layouts/accessories'); ?>
        </div>

        <div class="col-right sidebar">
            <?php $this->load->view('layouts/right_side_bar'); ?>
        </div>
    </div>
</div>
