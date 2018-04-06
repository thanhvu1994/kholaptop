<div class="footer-container">
    <div class="ft-left">
        <div class="row">
            <?php echo $this->settings->get_param('showroom'); ?>
        </div>
        <div class="row">
            <h1>Thông tin hỗ trợ</h1>
            <ul>
                <li><a href="#" title="Giới thiệu công ty">Giới thiệu công ty</a></li>
                <li><a href="#" title="Chính sách ưu đãi">Chính sách ưu đãi</a></li>
                <li><a href="#" title="Chính sách bảo hành">Chính sách bảo hành</a></li>
                <li><a href="#" title="Dowload Driver">Dowload Driver</a></li>
            </ul>
        </div>
        <?php 
        $categories_news = $this->categories->getCategoryNewFE();
        if (count($categories_news) > 0): ?>
            <div class="row"><h1>Tin tức</h1>
                <ul>
                    <?php foreach ($categories_news as $category_id => $category): ?>
                        <li><?php echo $this->categories->getUrlCustom($category) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
    </div>
    <div class="ft-right">
        <div class="share-fb">
            <div id="fb-root"></div>
        </div>
        <div class="dangky"><img
                    src="../i1.wp.com/online.gov.vn/PublicImages/2015/08/27/11/20150827110756-dadangky.png" alt="" />
        </div>
    </div>
</div>
<div class="footer-container">
    <address class="copyright"><?php echo $this->settings->get_param('copyrightOnFooter'); ?></address>
</div>