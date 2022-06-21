<?php
global $themebucket_resumi;
$section_map_display = $themebucket_resumi['section_map_display'];
$class = "panel-hide";
if (!$section_map_display) $class = "panel-show";
?>

<!--section contact start-->
<div class="section-contact">
    <?php if ($themebucket_resumi['section_contact_display']) { ?>
        <div class="map-header" id="contact">
            <div class="container">
			<span class="map-link">
			<i class=" fa fa-map-marker"></i><?php if (isset($themebucket_resumi['section_contact_title'])) echo $themebucket_resumi['section_contact_title']; ?>
			</span>
            </div>
            <div id="marker-content">
                <?php if (isset($themebucket_resumi['section_contact_description'])) echo wpautop($themebucket_resumi['section_contact_description']); ?>
            </div>
        </div>
        <div class="contact-map">
            <div id="map-canvas" class="location-map">
            </div>
            <div class="contact-form  <?php echo $class; ?> wow bounceInUp">
                <div class="form-container">
                    <?php if (isset($themebucket_resumi['section_contact_shortcode'])) {
                        echo do_shortcode($themebucket_resumi['section_contact_shortcode']);
                    } else {
                        ?>
                        <h3><?php _e('Drop me a line', 'resumi'); ?></h3>

                        <form role="form">
                            <div class="form-group">
                                <input type="text" id="ename" class="form-control"
                                       placeholder="<?php _e('Name', 'resumi'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" id="eemail" class="form-control"
                                       placeholder="<?php _e('Email Address', 'resumi'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" id="esubject" class="form-control"
                                       placeholder="<?php _e('Subject', 'resumi'); ?>">
                            </div>
                            <div class="form-group">
                                <textarea rows="4" id="emessage" class="form-control" cols="50"
                                          placeholder="<?php _e('Message', 'resumi'); ?>"></textarea>
                            </div>
                            <button type="submit" id="sendmail"
                                    class="wpcf7-form-control wpcf7-submit btn btn-danger btn-contact"
                                    class="btn btn-danger btn-contact"><?php _e('Submit', 'resumi'); ?></button>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="toggle-contact-form wow bounceInUp">
                <a href="#" class="form-toggle-icon">
                    <i class="fa fa-envelope-o"></i>
                </a>
            </div>
        </div>
    <?php } ?>
    <?php if ($themebucket_resumi['section_footer_primary_display']) { ?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="wow slideInLeft">
                            <?php if (!dynamic_sidebar("sidebar-footer-1")) { ?>
                                <?php if (isset($themebucket_resumi['section_footer_signature'])) { ?>
                                    <img src="<?php echo $themebucket_resumi['section_footer_signature']['url']; ?>"
                                         alt="">
                                <?php } ?>
                                <?php if (isset($themebucket_resumi['section_footer_left_text'])) echo wpautop($themebucket_resumi['section_footer_left_text']); ?>
                            <?php } ?>
                        </div>
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
    <?php } ?>
    <?php if ($themebucket_resumi['section_footer_secondary_display']) { ?>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($themebucket_resumi['section_footer_bottom'])) echo $themebucket_resumi['section_footer_bottom']; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--section contact end-->
