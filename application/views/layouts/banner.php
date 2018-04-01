<div id="main-height">
    <div class="magestore-bannerslider-standard">
        <script src="<?php echo base_url('themes/website/script/flexslider.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.flexslider-7-1').flexslider({animation: "fade", slideshowSpeed: 4500});
            });
        </script>
        <?php
            $query = $this->db->query("SELECT * FROM ci_banners WHERE publish = 1");
            $banners = $query->result('Banner');
        ?>
        <?php if (count($banners) > 0): ?>
            <div class="flexslider flexslider-7-1">
                <ul class="slides">
                    <?php foreach ($banners as $banner): ?>
                        <li><a href="<?php echo !empty($banner->url) ? $banner->url : 'javascript:void(0)'?>" target='_blank' rel='nofollow'><img border=0 src="<?php echo $banner->get_image() ?>" width='986' height='343' alt="<?php echo $banner->name ?>"/></a></li>
                    <?php endforeach ?>
                </ul>
            </div><!--flexslider-->
        <?php endif ?>
    </div>
</div>