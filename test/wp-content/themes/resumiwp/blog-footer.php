<?php
global $themebucket_resumi;
?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if (!dynamic_sidebar("sidebar-footer-1")) { ?>
                    <div class="wow slideInLeft">
                        <?php if (isset($themebucket_resumi['section_footer_signature'])) { ?>
                            <img src="<?php echo $themebucket_resumi['section_footer_signature']['url']; ?>"
                                 alt="">
                        <?php } ?>
                        <?php if (isset($themebucket_resumi['section_footer_left_text'])) echo wpautop($themebucket_resumi['section_footer_left_text']); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <?php if (!dynamic_sidebar("sidebar-footer-2")) { ?>
                    <h3 class="footer-w-head"><?php _e("Latest Comments", "resumi"); ?></h3>
                    <?php
                    $latest_posts = resumi_get_latest_commented_posts(3);
                    if ($latest_posts) {
                        ?>
                        <ul class="awards-list">
                            <?php
                            foreach ($latest_posts as $lp) {
                                ?>
                                <li class="clearfix">
                                    <div
                                        class="award-thumb"><?php if (get_the_post_thumbnail($lp->ID, "blog-sidebar")) echo get_the_post_thumbnail($lp->ID, "blog-sidebar"); else echo "<img width=81 height=81 src='" . get_template_directory_uri() . "/img/no_thumb.jpg'/>"; ?></div>
                                        <span class="award-title"><a
                                                href="<?php echo $lp->guid; ?>"><?php echo $lp->post_name; ?></a></span>

                                    <p><?php echo resumi_truncate(strip_tags($lp->post_content), 40, " "); ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="wow slideInRight">
                    <?php if (!dynamic_sidebar("sidebar-footer-3")) { ?>
                        <h3 class="footer-w-head"><?php _e("Flickr Photos", "resumi"); ?></h3>
                        <ul class="flickr-feed clearfix">
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($themebucket_resumi['section_footer_bottom'])) echo $themebucket_resumi['section_footer_bottom']; ?>
            </div>
        </div>
    </div>
</div>