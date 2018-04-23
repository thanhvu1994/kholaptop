<div class="footer-container">
    <div class="ft-left">
        <div class="row">
            <?php echo $this->settings->get_param('showroom'); ?>
        </div>
        <?php 
        $page = $this->posts->get_model();
        if (count($page)): ?>
            <div class="row">
            <h1>Thông tin hỗ trợ</h1>
                <ul>
                    <?php foreach ($page as $row): ?>
                        <li><a href="<?php echo $row->getUrl() ?>" title="<?php echo $row->title ?>"><i class="fa fa-arrow-circle-right"></i> <?php echo $row->title ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        <?php 
        $categories_news = $this->categories->getCategoryNewFE();
        if (count($categories_news) > 0): ?>
            <div class="row"><h1>Tin tức</h1>
                <ul>
                    <?php foreach ($categories_news as $category_id => $category): ?>
                        <li><i class="fa fa-arrow-circle-right"></i> <?php echo $this->categories->getUrlCustom($category) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
    </div>
    <div class="ft-right">
        <div class="share-fb">
            <div id="fb-root">
                <?php echo $this->settings->get_param('fanpage'); ?>
            </div>
        </div>
    </div>
</div>
<div class="footer-container">
    <address class="copyright"><?php echo $this->settings->get_param('copyrightOnFooter'); ?></address>
</div>